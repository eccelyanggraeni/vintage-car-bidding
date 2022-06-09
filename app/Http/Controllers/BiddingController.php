<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidding;

class BiddingController extends Controller
{
    public function view_winner(){
        return view('bidding.list_winner', ['title'=> 'Daftar Pemenang']);
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