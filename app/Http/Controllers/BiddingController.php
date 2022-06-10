<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidding;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BiddingController extends Controller
{
    public function add_bidding(Request $request)
    {
        $bidding = new Bidding;
        $bidding->bidding_date = date('Y-m-d H:i:s');
        $bidding->product_id = $request->product_id;
        $bidding->bid_price = $request->bid_price;
        $bidding->win_status = 0;
        $bidding->pay_status = 0;
        $bidding->pay_file = '';
        $bidding->expired_date =  date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 7 days'));;
        $bidding->created_at = date('Y-m-d H:i:s');
        $bidding->updated_at = date('Y-m-d H:i:s');
        $bidding->approver_id = 0;
        $bidding->user_id = Auth::id();

        $bidding->save();
        return redirect('/detail?id='.$request->product_id);
    }

    public function view_winner(){
        $bidding = Bidding::where('win_status', 1)->get();
        $user_name = array();
        foreach($bidding as $v){
            $user = User::where('id', $v->user_id)->first();
            $user_name= [$v->id => $user->name];
        }
        
        return view('bidding.list_winner', ['title'=> 'Daftar Pemenang', 'data' => $bidding, 'user' => $user_name]);
    }

    public function view_konfirmasi_bayar($id, Request $request){
        $get_user = User::where('email', $request->session()->get('email'))->first();
        $check_user = Bidding::where('id', $id)->where('user_id', $get_user->id)->first();
        if(!$check_user){
            return "Mohon maaf Anda bukan pemenang dan tidak bisa mengakses halaman ini.";
        }
        return view('bidding.konfirmasi_bayar', ['bidding_id' => $id, 'title'=> 'Konfirmasi Pembayaran']);
    }

    public function save_konfirmasi_bayar(Request $request){
        $request->validate([
            'bidding_id' => 'required|max:255',
            'nominal' => 'required',
            'bukti_bayar' => 'required'
        ]);
        
        $get_user = User::where('email', $request->session()->get('email'))->first();
        $conf_pay = Bidding::where('id', $request->bidding_id)->where('bid_price', $request->nominal)->where('user_id', $get_user->id)->first();

        if(!$conf_pay){
            return redirect("/konfirmasi_bayar/".$request->bidding_id)->withFail('Konfirmasi Pembayaran gagal. Bidding ID atau nominal tidak sesuai.');
        }

        $file = $request->file('bukti_bayar');
        $filename = time() . '.' . $file->extension();

        $conf_pay->pay_file = $filename;

        $file->move('files', $filename);
        $update = $conf_pay->update();

        if($update){
            return redirect("/konfirmasi_bayar/".$request->bidding_id)->withSuccess('Konfirmasi pembayaran berhasil');
        } else {
            return redirect("/konfirmasi_bayar/".$request->bidding_id)->withFail('Konfirmasi pembayaran gagal terkirim');
        }
    }
}

?>