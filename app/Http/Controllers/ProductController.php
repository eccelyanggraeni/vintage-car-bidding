<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function check()
    {
        $produk = Product::has('history','>','0')->get();
        return $produk;
    }
    public function get(Request $request)
    {
        $produk = Product::all();
        if($request->has('id')){
            $produk = Product::where('id',$request->id)->first();
            return view('detail', ['produk' => $produk]);
        }
        return view('produk', ['produk' => $produk]);
    }

    public function getcrud(Request $request)
    {
        $produk = Product::all();
        if($request->has('id')){
            $produk = Product::where('id',$request->id)->first();
            return view('detail', ['produk' => $produk]);
        }
        
        return view('crudproduk', ['produk' => $produk]);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "contact" => "required",
            "location" => "required",
            "picture" => "required:image",
        ]);

        $file = $request->file('picture');
        $filename = $file->getClientOriginalName();
        $extension = $file->extension();
        $file->move("uploads/", date('YmdHis').$filename);

        $produk = new Product;
        $produk->name = $request->name;
        $produk->price = $request->price;
        $produk->contact = $request->contact;
        $produk->location = $request->location;
        $produk->expired_date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 10 days'));
        // $produk->picture = "uploads/".date('YmdHis').$filename;

        $produk->save();

        return redirect('/crudproduk');
    }

    public function editform(Request $request)
    {
        $produk = Product::where('id',$request->id)->first();
        return view('crudprodukform', ['produk' => $produk]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "contact" => "required",
            "location" => "required",
            // "picture" => "required:image",
        ]);

        $produk = Product::where('id',$request->id)->first();
        $produk->name = $request->name;
        $produk->price = $request->price;
        $produk->contact = $request->contact;
        $produk->location = $request->location;
        $produk->expired_date = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s').' + 10 days'));

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file->extension();
            $file->move("uploads/", date('YmdHis').$filename);
            $produk->picture = "uploads/".date('YmdHis').$filename;
        }

        $produk->save();

        return redirect('/crudproduk');
    }

    public function delete(Request $request)
    {
        $produk = Product::where('id',$request->id)->first();
        $produk->delete();
        return redirect('/crudproduk');
    }
}
