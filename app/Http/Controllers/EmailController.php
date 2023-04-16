<?php

namespace App\Http\Controllers;

use App\Mail\sendEmail;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail($id)
    {
        // $isiEmail = [
        //     'title' => ''
        // ];
        $lelang = Lelang::find($id);
        $isiEmail = HistoryLelang::with('user','barang','lelang','petugas')->where('id_user',$lelang->id_user)->where('id_lelang',$lelang->id_lelang)->first();
        Mail::to($isiEmail->user->email)->send(new sendEmail($isiEmail));
        return redirect()->back()->with(['msg' => 'Berhasil mengirim email']);
    }
}
