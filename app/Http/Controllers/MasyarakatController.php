<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    public function index()
    {
        return view('petugas.masyarakat.index');
    }

    public function data()
    {
        // $data = Masyarakat::paginate(10);
        $data = DB::select('call getAllMasyarakat()');

        return view('petugas.masyarakat.table')->with(['data' => $data]);
    }

    public function show($id)
    {
        $masyarakat = Masyarakat::find($id);

        return response()->json($masyarakat);
    }

    public function store(Request $request)
    {
        $masyarakat = new Masyarakat();
        $masyarakat->nama_petugas = $request->nama;
        $masyarakat->masyarakatname = $request->masyarakatname;
        $masyarakat->email = $request->email;
        $masyarakat->password = bcrypt($request->password);
        $masyarakat->save();

        return response()->json('berhasil menyimpan', 200);
    }

    public function update(Request $request)
    {
        $masyarakat = new Masyarakat();
        $masyarakat->nama_petugas = $request->nama;
        $masyarakat->masyarakatname = $request->masyarakatname;
        $masyarakat->email = $request->email;
        
        if($request->has('password') && $request->password != ''){
            if(Hash::check($request->old_password, $masyarakat->password)){
                if ($request->password == $request->password_confirmation) {
                    $masyarakat->password = bcrypt($request->password);
                } else {
                    return response()->json('Konfirmasi Password tidak sesuai', 422);
                }
            } else {
                return response()->json('Password lama tidak sesuai', 422);
            }
        }

        return response()->json('berhasil menyimpan', 200);
    }

    public function destroy($id)
    {
        $masyarakat = Masyarakat::find($id);

        $masyarakat->delete();

        return response(null,204);
    }

    public function paginate(Request $request)
    {
        $data = Masyarakat::paginate(10);

        return view('petugas.masyarakat.table')->with(['data' => $data]);
    }
}
