<?php

namespace App\Http\Controllers;

use App\Models\DetailMasterStokProduk;
use App\Models\MasterSize;
use App\Models\MasterStokProduk;
use App\Models\MasterUtuhProduk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {

        $stokProduk = MasterStokProduk::paginate(10);
        $stokUtuhProduk = MasterUtuhProduk::paginate(10);
        $ukuran = MasterSize::all();

        return view('product.product', compact('stokProduk', 'stokUtuhProduk', 'ukuran'));
    }


    public function detailStokProduct($id)
    {
        $stockProduct = DetailMasterStokProduk::with('stok')->where('stok_id', $id)->orderByDesc('id')->get();
        return view('product.detail', compact('stockProduct'));
    }

    public function addStok(Request $request)
    {

        if ($request->jenis_stok == "utuh") {

            $utuhProduk = MasterUtuhProduk::where('ukuran', $request->ukuranProduk)->first();

            if ($utuhProduk) {
                $utuhProduk->quantity = $utuhProduk->quantity + 1;
                $utuhProduk->save();
            } else {
                $newUtuhProduk = new MasterUtuhProduk();
                $newUtuhProduk->name = "Tembaga " . $request->ukuranProduk;
                $newUtuhProduk->ukuran = $request->ukuranProduk;
                $newUtuhProduk->quantity = 1;
                $newUtuhProduk->save();
            }
        } else {

            $stokProduk = MasterStokProduk::where('ukuran', $request->ukuranProduk)->first();

            if ($stokProduk) {
                $newDetailStokMaster = new DetailMasterStokProduk();
                $newDetailStokMaster->stok_id = $stokProduk->id;
                $newDetailStokMaster->panjang = $request->panjang;
                $newDetailStokMaster->description = $request->deskripsi;
                $newDetailStokMaster->save();

                $stokProduk->total_panjang = $stokProduk->total_panjang + $request->panjang;
                $stokProduk->save();
            } else {
                $newStokMaster = new MasterStokProduk();
                $newStokMaster->ukuran = $request->ukuranProduk;
                $newStokMaster->total_panjang = $request->panjang;
                $newStokMaster->save();

                $newDetailStokMaster = new DetailMasterStokProduk();
                $newDetailStokMaster->stok_id = $newStokMaster->id;
                $newDetailStokMaster->panjang = $request->panjang;
                $newDetailStokMaster->description = $request->deskripsi;
                $newDetailStokMaster->save();
            }
        }

        //   "jenis_stok" => "utuh"
        //   "ukuranProduk" => "80x10"
        //   "panjang" => "200"
        //   "deskripsi" => "sisaan"
        return redirect('product');
    }
}
