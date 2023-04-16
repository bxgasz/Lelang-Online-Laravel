<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $isiEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($isiEmail)
    {
        $this->isiEmail = $isiEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('petugas.lelang.email')->with([
            'pemenang' => $this->isiEmail->user->username,
            'tgl_lelang' => $this->isiEmail->lelang->tgl_lelang,
            'barang' => $this->isiEmail->barang->nama_barang,
            'harga' => $this->isiEmail->lelang->harga_akhir
        ])->subject('Pemberitahuan Kemenangan Lelang');
    }
}
