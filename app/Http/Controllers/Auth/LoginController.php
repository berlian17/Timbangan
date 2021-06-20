<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginPage() {
        return view('Auth.login(home)');
    }

    public function login(Request $request) {
        $rules = [
            'username' => 'required',
            'password' => 'required|min:8'
        ];
        $message = [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
            'password.min' => 'Minimum 8 characters'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // Auth Admin
        $datachek = User::where('username', $request->username)->first();
        if($datachek) {
            if($datachek->role == "admin"){
                $data = User::where('username', $request->username)->first();
                if($data){
                    if($request->password == $data->password){
                        Session::put('role', $data->role);
                        Session::put('username', $data->username);
                        Session::put('no_telp', $data->no_telp);
                        Session::put('password', $data->password);
                        Session::put('id', $data->id);
                        Session::put('login', TRUE);

                        return redirect()->route('admin.dashboard');
                    } else {
                        return redirect()->back()->with(['error' => 'Invalid Username or Password']);
                    }
                }
            }
        }

        // Auth Nasabah
        $datachek = User::where('username', $request->username)->first();
        if($datachek) {
            if($datachek->role == "nasabah"){
                $data = User::where('username', $request->username)->first();
                if($data){
                    if($request->password == $data->password){
                        error_log($request->username);
                        error_log($request->password);
                        Session::put('role', $data->role);
                        Session::put('username', $data->username);
                        Session::put('no_telp', $data->no_telp);
                        Session::put('password', $data->password);
                        Session::put('rfid', $data->rfid);
                        Session::put('login', TRUE);

                        return redirect()->route('nasabah.homepage');
                    } else {
                        return redirect()->back()->with(['error' => 'Invalid Username or Password']);
                    }
                }
            }
        }
        return redirect()->back()->with(['error' => 'Invalid Username or Password']);
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('loginpage');
    }
}
