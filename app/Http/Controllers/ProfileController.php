<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function indexPetugas()
    {
        $profil = Auth::guard('user')->user();
        return view('petugas.user.profile',compact('profil'));
    }

    public function updateProfilPetugas(Request $request)
    {
        //update profil
        $user = Auth::guard('user')->user();

        $user->nama_petugas = $request->nama_petugas;
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

        // if ($request->hasFile('foto')) {
        //     $file = $request->file('foto');
        //     $nama = 'profil-' . date('Y-m-dHis') .'.'. $file->getClientOriginalExtension();
        //     $file->move(public_path('/img'), $nama);

        //     $user->foto = "/img/$nama";
        // }

        $user->update();

        return response()->json($user, 200);
    }

    public function updateProfil(Request $request)
    {
        //update profil
        $user = Auth::guard('masyarakat')->user();

        $user->nama_lengkap = $request->name;
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

        $user->update();

        return response()->json($user, 200);
    }
}
