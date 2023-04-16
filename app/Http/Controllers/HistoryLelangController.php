<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;

class HistoryLelangController extends Controller
{
    public function index()
    {
        $data = Lelang::where('harga_akhir', '!=', null)->where('status','selesai')->orderBy('id_lelang','desc')->paginate(10);
        return view('petugas.history.index', compact('data'));
    }

    public function store(Request $request)
    {
        $penawaran = new HistoryLelang();
        $penawaran->id_lelang = $request->id_lelang;
        $penawaran->id_barang = $request->id_barang;
        $penawaran->id_user = $request->id_user;
        $penawaran->penawaran_harga = $request->penawaran_harga;
        $penawaran->save();

        return response()->json('berhasil menyimpan', 200);
    }

    public function show($id)
    {
        $history = HistoryLelang::with('user')->where('id_lelang',$id)->get();
        $lelang = Lelang::with('barang')->where('id_lelang',$id)->first();

        return view('petugas.history.history', compact('history','lelang'));
    }
}
