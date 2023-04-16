<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $lelang = Lelang::count();
        $petugas = User::count();
        $masyarakat = Masyarakat::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        // menghitung hari dari tanggal awal sampai akhir
        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_penjualan = Lelang::where('tgl_lelang', 'LIKE', "%$tanggal_awal%")->where('harga_akhir','!=',null)->sum('harga_akhir');

            $pendapatan = $total_penjualan;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        if (Auth::guard('user')->user()->id_role == 1) {
            return view('petugas.admin.index', compact('barang', 'lelang', 'petugas', 'masyarakat', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
        } else {
            return view('petugas.petugas.dashboard', compact('tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan'));
        }

    }
}
