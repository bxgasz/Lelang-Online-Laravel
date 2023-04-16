<?php

namespace App\Http\Controllers;

use App\Models\HistoryLelang;
use App\Models\Image;
use App\Models\Lelang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiddingController extends Controller
{
    public function index()
    {
        $lelang = Lelang::with('barang','image')->where('id_user', '=', null)->where('harga_akhir', '=', null)->where('status', 'dibuka')->orderBy('id_lelang', 'desc')->paginate(4);
        // $img = Image::find($lelang->barang->id_barang)->first();

        return view('masyarakat.home', compact('lelang'));
    }

    public function show($id)
    {
        $penawaran_user = null;
        $lelang = Lelang::with('barang','image')->find($id);
        $history = HistoryLelang::with('user')->orderBy('penawaran_harga','desc')->where('id_lelang',$lelang->id_lelang)->get();
        $image = Image::where('id_barang',$lelang->id_barang)->get();

        if (Auth::guard('masyarakat')->user() != null) {
            $penawaran_user = HistoryLelang::where('id_lelang',$lelang->id_lelang)->where('id_user',Auth::guard('masyarakat')->user()->id_user)->first();
        }

        $nominal_tertinggi = HistoryLelang::where('id_lelang', $lelang->id_lelang)->max('penawaran_harga');

        $tanggal = Carbon::parse($lelang->tgl_lelang);
        $batas_waktu = 1;
        $batas = $tanggal->addDays($batas_waktu);

        return view('masyarakat.detail', compact('lelang','history','image', 'batas', 'penawaran_user', 'nominal_tertinggi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required'
        ]);

        $nominal_minimum = Lelang::with('barang')->find($request->id_lelang);
        // $nominal_tertinggi = HistoryLelang::where('id_lelang', $request->id_lelang)->max('penawaran_harga');

        // if ($nominal_tertinggi != null) {
        //     if ($request->nominal <= $nominal_tertinggi) {
        //         return redirect()->back()->with(['msg' => 'Penawaran Tidak memenuhi minimal']);
        //     }
        // }
        // else

        if ($request->nominal < $nominal_minimum->barang->harga_awal) {
            return redirect()->back()->with(['msg' => 'Penawaran Tidak memenuhi minimal']);
        }

        $penawaran = new HistoryLelang();
        $penawaran->id_lelang = $request->id_lelang;
        $penawaran->id_barang = $nominal_minimum->id_barang;
        $penawaran->id_user = Auth::guard('masyarakat')->user()->id_user;
        $penawaran->penawaran_harga = $request->nominal;
        $penawaran->save();

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'nominal' => 'required'
        ]);

        $nominal_minimum = Lelang::with('barang')->find($request->id_lelang);
        $nominal_tertinggi = HistoryLelang::where('id_lelang', $request->id_lelang)->max('penawaran_harga');

        if ($nominal_tertinggi != null) {
            if ($request->nominal <= $nominal_tertinggi) {
                return redirect()->back()->with(['msg' => 'Penawaran Tidak memenuhi minimal']);
            }
        }
        else if ($request->nominal <= $nominal_minimum->barang->harga_awal) {
            return redirect()->back()->with(['msg' => 'Penawaran Tidak memenuhi minimal']);
        }

        $penawaran = HistoryLelang::find($id);
        $penawaran->penawaran_harga = $request->nominal;
        $penawaran->update();

        return redirect()->back();
    }

    public function riwayatLelang()
    {
        $history = HistoryLelang::with('lelang','barang')->where('id_user', Auth::guard('masyarakat')->user()->id_user)->orderBy('id_lelang','desc')->get();

        return view('masyarakat.riwayat', compact('history'));
    }

    public function showDetail($id)
    {
        $lelang = Lelang::find($id);

        return response()->json($lelang);
    }

    public function riwayatPembayaran()
    {

    }

    public function destroy($id)
    {
        $history = HistoryLelang::find($id);
        $history->delete();
        
        return response(null,204);
    }

    public function all()
    {
        $lelang = Lelang::with('barang','image')->where('id_user', '=', null)->where('harga_akhir', '=', null)->where('status', 'dibuka')->orderBy('id_lelang', 'desc')->get();

        return view('masyarakat.all', compact('lelang'));
    }

    public function profile()
    {
        $profil = Auth::guard('masyarakat')->user();
        return view('masyarakat.profile',compact('profil'));
    }
}
