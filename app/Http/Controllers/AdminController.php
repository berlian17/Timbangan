<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard() {
        if(Session::get('login') == FALSE) {
            return redirect()->route('loginpage');
        }
        else if(Session::get('role') != "admin") {
            return redirect()->back();
        }

        $jumlah_setor = Transaction::all()->count();
        $jumlah_berat = Transaction::all()->sum('berat');
        $jumlah_akun = User::all()->count();
        $data = User::all();
        return view('Admin.dashboard', ['datas' => $data], compact('jumlah_setor', 'jumlah_berat', 'jumlah_akun'));
    }

    public function addAccountPage() {
        if(Session::get('login') == FALSE) {
            return redirect()->route('loginpage');
        }
        else if(Session::get('role') != "admin") {
            return redirect()->back();
        }

        return view('Admin/account_add');
    }

    public function addAccount(Request $request) {
        $rules = [
            'username' => 'required|max:20',
            'rfid' => 'required',
            'no_telp' => 'required|unique:users|numeric|min:11',
            'lokasi' => 'required|max:200',
            'role' => 'required',
            'password' => 'required|min:8',
        ];
        $message = [
            'username.required' => 'Username is required',
            'username.max' => 'Username maximum 20 characters',
            'rfid.required' => 'RFID is required',
            'no_telp.required' => 'Phone number is required',
            'no_telp.unique' => 'Phone number is already registered',
            'no_telp.numeric' => 'Phone number must be a number',
            'no_telp.min' => 'Phone number minimum 11 numbers',
            'lokasi.required' => 'Address is required',
            'lokasi.max' => 'Address maximum 200 characters',
            'role.required' => 'Role is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password minimum 8 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = User::create([
            'username' => $request->username,
            'rfid' => $request->rfid,
            'no_telp' => $request->no_telp,
            'lokasi' => $request->lokasi,
            'role' => $request->role,
            'password' => $request->password,
        ]);
        $save = $user->save();

        if($save) {
            return redirect()->route('admin.dashboard')->with(['success1' => 'Account has been created successfully']);;
        } else {
            return redirect()->back()->with(['failed' => 'account was not created successfully']);
        }
    }

    public function editAccountPage($id) {
        if(Session::get('login') == FALSE) {
            return redirect()->route('loginpage');
        }
        else if(Session::get('role') != "admin") {
            return redirect()->back();
        }

        $data = User::find($id);
        return view('Admin/account_edit', compact('data'));   
    }

    public function editAccount(Request $request, $id) {
        $rules = [
            'username' => 'required|max:20',
            'rfid' => 'required',
            'no_telp' => 'required|numeric|min:11',
            'lokasi' => 'required|max:200',
            'role' => 'required',
            'password' => 'required|min:8',
        ];
        $message = [
            'username.required' => 'Username is required',
            'username.max' => 'Username maximum 20 characters',
            'rfid.required' => 'RFID is required',
            'no_telp.required' => 'Phone number is required',
            'no_telp.numeric' => 'Phone number must be a number',
            'no_telp.min' => 'Phone number minimum 11 numbers',
            'lokasi.required' => 'Address is required',
            'lokasi.max' => 'Address maximum 200 characters',
            'role.required' => 'Role is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password minimum 8 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = User::find($id);
        $data->username = $request->username;
        $data->rfid = $request->rfid;
        $data->no_telp = $request->no_telp;
        $data->lokasi = $request->lokasi;
        $data->role = $request->role;
        $data->password = $request->password;
        $data->save();

        return redirect()->route('admin.dashboard')->with(['success2' => 'Data updated successfully']);
    }

    public function deleteAccount($id) {
        $data = User::find($id);
        if(Session::get('id') != $id) {
            $data->delete();
            return redirect()->route('admin.dashboard')->with(['success' => 'Data has been deleted']);    
        }
        return redirect()->back()->with(['failed' => 'Data cannot be deleted']);    
    }
}
