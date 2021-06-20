<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NasabahController extends Controller
{
    public function homepage(){
        if(Session::get('login') == FALSE) {
            return redirect()->route('loginpage');
        }
        else if(Session::get('role') != "nasabah") {
            return redirect()->back();
        }

        $id = Session::get('rfid');
        $jumlah_setor = Transaction::where('user_id', $id)->count();
        $jumlah_berat = Transaction::where('user_id', $id)->sum('berat');
        $data = Transaction::where('user_id', $id)->get();
        return view('Nasabah.index', ['datas' => $data], compact('jumlah_setor', 'jumlah_berat'));
    }
}
