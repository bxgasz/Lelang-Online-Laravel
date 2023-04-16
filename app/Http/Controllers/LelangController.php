<?php

namespace App\Http\Controllers;

use App\Mail\sendEmail;
use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LelangController extends Controller
{
    public function lelangBuka()
    {
        return view('petugas.lelang.buka');
    }

    public function lelangTutup()
    {
        return view('petugas.lelang.tutup');
    }

    public function form()
    {
        // form buka lelang
        $data = Barang::where('status','ready')->get();
        return view('petugas.lelang.form', compact('data'));
    }

    public function dataBuka()
    {
        $lelang = Lelang::with('barang')->where('status','=','dibuka')->paginate(10);

        foreach($lelang as $l){
            // membuat batas waktu
            $tanggal = Carbon::parse($l->tgl_lelang);
            $batas_waktu = 1;
            $batas = $tanggal->addDays($batas_waktu);
            $today = Carbon::now();
            if ($today > $batas) {
                // melakukan aksi jika sudah mencapai batas waktu
                $data = Lelang::find($l->id_lelang);
                $barang = Barang::where('id_barang',$data->id_barang)->get();
                
                // menentukan pemenang dan update status lelang dan barang
                $harga_akhir = HistoryLelang::where('id_lelang', $data->id_lelang)->max('penawaran_harga');
                $pemenang = HistoryLelang::with('user')->where('id_lelang', $data->id_lelang)->where('penawaran_harga',$harga_akhir)->first();
                
                if ($pemenang != null && $pemenang->penawaran_harga != null) {
                    $data->harga_akhir = $pemenang->penawaran_harga;
                    $data->id_user = $pemenang->id_user;
                    $data->status = 'selesai';
                    $data->update();

                    $barang->status = 'terjual';
                    $barang->update();
                }else{
                    $data->status = 'ditutup';
                    $data->update();
                }
            }
        }

        return view('petugas.lelang.tableBuka')->with(['data' => $lelang]);
    }

    public function dataTutup()
    {
        $lelang = Lelang::where('status','=','ditutup')->orderBy('id_lelang', 'desc')->paginate(10);

        foreach($lelang as $l){
            // melakukan pengecekan tanggal buka
            $tanggal = Carbon::parse($l->tgl_lelang);
            if ($tanggal == Carbon::today()) {
                // mengubah status menjadi dibuka saat sudah mencapai tanggalnya
                $l->status = 'dibuka';
                $l->update();
            }
        }

        return view('petugas.lelang.tableTutup')->with(['data' => $lelang]);
    }

    public function show($id)
    {
        $lelang = Lelang::find($id);
        return response()->json($lelang, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'tgl_lelang' => 'required|date',
        ]);

        if ($request->tgl_lelang < date('Y-m-d',)) {
            return redirect()->back()->withErrors(['msg' => 'Input date now or tomorrow']);
        }

        $lelang = new Lelang();
        $lelang->id_barang = $request->id_barang;
        $lelang->tgl_lelang = $request->tgl_lelang;
        $lelang->id_petugas = Auth::guard('user')->user()->id;
        $lelang->status = 'ditutup';
        $lelang->save();

        return redirect()->route('lelang.tutup');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'id_barang' => 'required',
            'tgl_lelang' => 'required|date',
            'harga_akhir' => 'required|number',
            'id_petugas' => 'required',
        ]);

        $lelang = new Lelang();
        $lelang->id_barang = $request->id_barang;
        $lelang->tgl_lelang = $request->tgl_lelang;
        $lelang->harga_akhir = $request->harga_akhir;
        $lelang->id_petugas = $request->id_petugas;
        $lelang->update();
    }

    public function editStatus(Request $request,$id)
    {
        // menemukan lelang yang ingin diubah
        $lelang = Lelang::find($id);

        // jika status diubah selesai
        if($request->status == 'selesai'){
            $barang = Barang::where('id_barang',$lelang->id_barang)->first();
            $harga_akhir = HistoryLelang::where('id_lelang', $lelang->id_lelang)->max('penawaran_harga');
            $pemenang = HistoryLelang::where('id_lelang', $lelang->id_lelang)->where('penawaran_harga',$harga_akhir)->first();
            $lelang->harga_akhir = $pemenang->penawaran_harga ?? null;
            $lelang->id_user = $pemenang->id_user ?? null;
            $lelang->status = $request->status;
            $lelang->update();

            if($lelang->harga_akhir != null){
                $barang->status = 'terjual';
                $barang->update();
            }else{
                $lelang->status = 'ditutup';
                $lelang->update();
            }
        }else{
            // jika statys diubah selain selesai
            $lelang->status = $request->status;
            $lelang->update();
        }

        return response(null,204);
    }

    public function destroy($id)
    {
        $lelang=Lelang::find($id);
        $lelang->delete();

        return response(null,204);
    }
}
