<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d',);

        if($request->has('tanggalAwal') && $request->tanggalAwal != "" && $request->has('tanggalAkhir') && $request->tanggalAkhir != ""){
            $tanggalAwal = $request->tanggalAwal;
            $tanggalAkhir = $request->tanggalAkhir;
        }

        return view('petugas.laporan.index', compact('tanggalAwal', 'tanggalAkhir'));
    }

    public function getData($awal, $akhir)
    {
        $no = 1;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan = 0;

        while(strtotime($awal) <= strtotime($akhir)){
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

            $keuntungan = Lelang::where('created_at', 'LIKE', "%$tanggal%")->where('harga_akhir', '!=', "null")->sum('harga_akhir');
            $pendapatan = $keuntungan;
            $total_pendapatan += $pendapatan;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = $tanggal;
            $row['penjualan'] = number_format($keuntungan);
            $row['pendapatan'] = number_format($pendapatan);

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'penjualan' => 'Total Pendapatan',
            'pendapatan' => number_format($total_pendapatan)
        ];

        // dd($data);

        return $data;
    }

    public function data($awal, $akhir)
    {
        // menampilkan data
        $data = $this->getData($awal, $akhir);
        
        return view('petugas.laporan.table')->with(['data' => $data]);
    }

    public function exportPDF($awal, $akhir)
    {
        $data = $this->getData($awal, $akhir);
        $pdf = PDF::loadView('petugas.laporan.pdf', compact('awal','akhir','data'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan-pendapatan-' . date('Y-m-d-his') . '.pdf');
    }
}
