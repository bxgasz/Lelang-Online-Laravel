<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');   
        $this->middleware('guest:user')->except('logout');   
        $this->middleware('guest:masyarakat')->except('logout');   
    }

    public function index()
    {
        return view('login.auth');
    }

    public function register()
    {
        return view('login.register');
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|unique:users,username|unique:masyarakats,username',
            'email' => 'required|email|unique:users,username|unique:masyarakats,username',
            'phone' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        // if ($request->role == '1') {
        //     $user = new User();
        //     $user->nama_petugas = $request->nama;
        //     $user->username = $request->username;
        //     $user->email = $request->email;
        //     $user->id_role = $request->role;
        //     $user->password = bcrypt($request->password);
        //     $user->save();
        // }else{
        //     $user = new Masyarakat();
        //     $user->nama_lengkap = $request->nama;
        //     $user->username = $request->username;
        //     $user->email = $request->email;
        //     $user->password = bcrypt($request->password);
        //     $user->save();
        // }

        $user = new Masyarakat();
        $user->nama_lengkap = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->telp = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // return redirect()->route('masyarakat.index');
            return redirect()->route('masy.index');
        }elseif(Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password])){
            if (Auth::guard('user')->user()->id_role == 1) {
                return redirect()->route('dashboard.index');
            }else{
                return redirect()->route('dashboard.index');
            }
        }
        return redirect()->route('login.index')->withErrors(['error' => 'one of these credentials are not match'])->withInput();
    }

    public function logout()
    {
        if (Auth::guard('masyarakat')->check()) {
            Auth::guard('masyarakat')->logout();
        }elseif(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        Session::flush();
        return redirect()->route('login.index');
    }
}
