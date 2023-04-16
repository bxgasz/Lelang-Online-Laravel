<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Image;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        return view('petugas.barang.index');
    }

    public function data()
    {
        // $barang = Barang::where('status', '=', 'ready')->get();
        $barang = Barang::latest()->paginate(10);
        return view('petugas.barang.table')->with(['data' => $barang]);
    }

    public function show($id)
    {
        // $barang = Barang::find($id);

        // return response()->json($barang);

        $file = Image::where('id_barang',$id)->get();

        return response()->json($file,200,['Content-Dispotition' => "inline;"]);
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $image = Image::where('id_barang', $barang->id_barang)->get();

        foreach ($image as $item) {
            Storage::disk('local')->delete('public/'.$item->image);
            $item->delete();
        }

        $barang->delete();

        return response()->json(null,204);
    }

    public function updateStatus(Request $request,$id)
    {   
        $barang = Barang::find($id);
        $barang->status = $request->status;
        $barang->update();

        return response(null,204);
    }

    public function paginate(Request $request)
    {
        $barang = Barang::latest()->paginate(10);
        return view('petugas.barang.table')->with(['data' => $barang]);
    }
}
