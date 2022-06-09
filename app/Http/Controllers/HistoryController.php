<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function crudform(Request $request)
    {
        if(isset($request->product_id)){
            return view('crudriwayatform',['request' => $request]);
        } 
        return view('crudriwayatform');
    }

    public function save(Request $request)
    {
        $riwayat = new History;
        $riwayat->product_id = $request->product_id;
        $riwayat->history_date = $request->history_date;
        $riwayat->history = $request->history;
        $riwayat->save();

        if(isset($request->again)){
            return redirect('/crudriwayatform')->with('product_id', $request->product_id);
        }

        return redirect('/crudproduk');
    }

    public function delete(Request $request)
    {
        $produk = History::where('id',$request->id)->first();
        $produk->delete();
        return redirect('/crudproduk');
    }
}
