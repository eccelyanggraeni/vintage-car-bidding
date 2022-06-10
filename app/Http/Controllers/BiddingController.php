<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidding;
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
        // return $id;
    }

    public function view_winner(){
        $bidding = Bidding::all();
        return view('bidding.list_winner', ['title'=> 'Daftar Pemenang', 'data' => $bidding]);
    }

    public function view_konfirmasi_bayar($id){
        return view('konfirmasi_bayar', ['bidding_id' => $id, 'title'=> 'Konfirmasi Bayar']);
    }

    public function save_konfirmasi_bayar(Request $request){
        $request->validate([
            'bidding_id' => 'required|max:255',
            'nominal' => 'required',
            'bukti_bayar' => 'required'
        ]);

        $conf_pay = Bidding::where('id', $request->bidding_id)->where('pay_price', $request->nominal)->first();

        if(!$conf_pay){
            return redirect("/konfirmasi_bayar")->withFail('Konfirmasi Pembayaran gagal. Bidding ID atau nominal tidak sesuai.');
        }

        $file = $request->file('bukti_bayar');
        $filename = time() . '.' . $file->extension();

        $conf_pay->pay_file = $filename;

        $file->move('files', $filename);
        $update = $conf_pay->update();

        if($update){
            return redirect("/konfirmasi_bayar")->withSuccess('Produk updated');
        } else {
            return redirect("/konfirmasi_bayar")->withFail('Produk failed to update');
        }
    }
}

?>