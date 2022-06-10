<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidding;
use App\Models\Product;
use App\Models\User;

class ApprovalController extends Controller
{
    public function view_approval_winner(){
        $bidding = Bidding::all();
        return view('approval.choose_winner', ['title'=> 'Daftar List Bidding', 'data' => $bidding]);
    }

    public function approve_winner($id, $product_id){
        $check_bid_winner_exist = Bidding::where('product_id', $product_id)->where('win_status', 1)->first();
        if($check_bid_winner_exist){
            $check_bid_winner_exist->win_status = 0;
            $check_bid_winner_exist->update();
        }
        $check_bid = Bidding::where('id', $id)->first();
        $check_bid->win_status = 1;
        $update = $check_bid->update();

        if($update){
            return redirect("/approve/show_list_bid")->withSuccess('Pemenang berhasil ditentukan');
        } else {
            return redirect("/approve/show_list_bid")->withFail('Pemenang gagal ditentukan');
        }
    }

    public function view_approval_bayar(){
        $bidding = Bidding::where('win_status', 1)->whereNotNull('pay_file')->orderBy('id', 'asc')->get();
        return view('approval.approve_payment', ['title'=> 'Daftar Konfirmasi Bayar', 'data' => $bidding]);
    }

    public function approve_bayar($id, Request $request){
        $conf_pay = Bidding::where('id', $id)->first();
        $get_user = User::where('email', $request->session()->get('email'))->first();

        $conf_pay->pay_status = 1;
        $conf_pay->approver_id = $get_user->id;
        $update = $conf_pay->update();

        if($update){
            return redirect("/approve/show_list_payment")->withSuccess('Pembayaran berhasil terkonfirmasi');
        } else {
            return redirect("/approve/show_list_payment")->withFail('Pembayaran gagal terkonfirmasi');
        }
    }
}

?>