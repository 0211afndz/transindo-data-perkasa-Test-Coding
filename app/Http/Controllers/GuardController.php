<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class GuardController extends Controller
{
    public function register()
    {
        return view('guard/register');
    }

    public function login()
    {
        return view('guard/login');
    }

    public function login_try(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Harap isikan email',
            'password.required' => 'Harap isikan password',
        ];

        $request->validate(
            $rules, $message
        );

        $cek = User::where('email',$request->email)->where('stat',1)->first();

        if($cek && $cek != null){
            try{
                $attempt = Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);

                if($attempt == true){
                    return redirect()->intended('/home');
                }else{
                    return redirect('/login')->with('error','Kami tidak dapat mengautentikasi anda, harap periksa kembali email dan password anda');
                }
            }catch(\Throwable $e){
                return redirect('/')->with('error','Terjadi Error : . '.$e);
            }
        }else{  
            return redirect('/')->with('warning','Email yang kamu masukan tidak terdaftar, silahkan coba untuk registrasi email anda!');
        }
    }

    public function register_store(Request $request)
    {
        $rules = [
            'nama_user' => 'required|max:100',
            'alamat_user' => 'required|max:300',
            'no_telp' => 'required|max:15',
            'no_sim' => 'required|max:50',
            'email' => 'required|email:rfc,filter',
            'password' => 'required|max:20',
        ];

        $message = [
            'nama_user.required' => 'Harap isikan nama',
            'nama_user.max' => 'Nama tidak lebih dari 100 karakter',
            'alamat_user.required' =>  'Harap isikan alamat',
            'alamat_user.max' => 'Alamat tidak lebih dari 300 karakter',
            'no_telp.required' => 'Harap isikan no. telepon',
            'no_telp.max' => 'No. telepon tidak melebihi dari 15 karakter',
            'no_sim.required' => 'Harap isikan no. sim',
            'no_sim.max' => 'No. sim tidak melebihi dari 50 karakter',
            'email.required' => 'Harap isikan email',
            'email.email' => 'Pastikan format email anda sudah benar',
            'password.required' => 'Harap isikan password',
            'password.max' => 'Password tidak lebih dari 20 karakter',
        ];

        $request->validate($rules, $message);

        $cek = User::where('email',$request->email)->first();

        $input = $request->except('_token','password');

        if($cek){
            return redirect('register')->with('warning','Email yang didaftarkan sudah ada, harap gunakan email baru');
        }else{
            try{
                User::create(array_merge($input,[
                                            'stat' => 1, 
                                            'password' => bcrypt($request->password),
                                            'user_level' => 2
                                        ]));

                return redirect('login')->with('success','Anda berhasil melakukan registrasi! anda dapat login sekarang');
            }catch(\Throwable $e){
                return redirect('register')->with('error','Terjadi Error : '.$e);
            }
        }
    }

    public function logout(){
        Auth::logout();
    	Session::flush();
    	return redirect('/')->with('success','Anda berhasil logout');
    }
}
