<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\BuyCopper;
use App\Models\MasterSize;
use App\Models\MasterUtuhProduk;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function view()
    {
        $buyCopper = BuyCopper::all();
        $size = MasterSize::all();
        return view('buying.buying', compact('buyCopper','size'));
    }

    public function add(Request $request)
    {
        

        $existPemesanan = BuyCopper::where('status', "Pemesanan")->count();

        $tahun = now()->format('y');
        $urut = $existPemesanan + 1;                
        $formattedNoSppt = str_pad($urut, 4, '0', STR_PAD_LEFT) . '/SPPT/' . $tahun;

        $newBuyying = new BuyCopper();
        $newBuyying->date =  Carbon::now();
        $newBuyying->no_sppt =  $formattedNoSppt;
        $newBuyying->no = $existPemesanan == null ? 1 : $existPemesanan + 1;
        $newBuyying->item_number = $request->item_number;
        $newBuyying->item_description = $request->size;
        $newBuyying->merk = $request->merk;
        $newBuyying->required = $request->quantity;
        $newBuyying->uo = "BTG";
        $newBuyying->expired_date = $request->expired_date;
        $newBuyying->description = $request->notes;
        $newBuyying->status = "Pemesanan";
        $newBuyying->save();
        


        return redirect('/buying')->with('success', "Berhasil membuat pemesanan!");
    }

    public function detailBuy($id)
    {
        $detailBuy = BuyCopper::find($id);

        return view('buying.detail', compact('detailBuy'));
    }

    public function done($id)
    {
        $detailBuy = BuyCopper::find($id);

        $stokUtuh = MasterUtuhProduk::where('ukuran',$detailBuy->item_description)->first();

        if($stokUtuh != null){
            $stokUtuh->quantity += $detailBuy->required;
            $stokUtuh->save();
        }else{
            $newStok = new MasterUtuhProduk();
            $newStok->name = "Tembaga ". $detailBuy->item_description;
            $newStok->ukuran = $detailBuy->item_description;
            $newStok->quantity = $detailBuy->required;
            $newStok->save();
        }

        $detailBuy->delete();
        
        $remainingRecords = BuyCopper::orderBy('id')->get();

        $counter = 1;
        foreach ($remainingRecords as $record) {
            $record->no = $counter;
            $record->save();
            $counter++;
        }

        return redirect('/buying')->with('success', "Berhasil melakukan penyelesaian pemesanan!");
    }
}
