<?php

namespace App\Console\Commands;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpiredDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lelang:exdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Lelang Status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lelang = Lelang::with('barang')->where('status','=','dibuka')->get();

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
            \Log::info($batas);
        }
    }
}
