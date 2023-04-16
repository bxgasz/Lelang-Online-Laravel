<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('petugas.user.index');
    }

    public function data()
    {
        $data = User::where('id_role', '!=', 1)->paginate(10);

        return view('petugas.user.table')->with(['data' => $data]);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->nama_petugas = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 2;
        $user->save();

        return response()->json('berhasil menyimpan', 200);
    }

    public function update(Request $request)
    {
        $user = new User();
        $user->nama_petugas = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        
        if($request->has('password') && $request->password != ''){
            if(Hash::check($request->old_password, $user->password)){
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
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
        $user = User::find($id);

        $user->delete();

        return response(null,204);
    }

    public function paginate(Request $request)
    {
        $data = User::paginate(10);

        return view('petugas.masyarakat.table')->with(['data' => $data]);
    }
}
