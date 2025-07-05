<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\BuyCopper;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function view()
    {
        $buyCopper = BuyCopper::all();
        return view('buying.buying', compact('buyCopper'));
    }

    public function add(Request $request)
    {

        $existPemesanan = BuyCopper::where('status', "Pemesanan")->count();
        $newBuyying = new BuyCopper();
        $newBuyying->date =  Carbon::now();
        $newBuyying->no_sppt = $request->no_sppt;
        $newBuyying->no = $existPemesanan == null ? 1 : $existPemesanan + 1;
        $newBuyying->item_number = $request->item_number;
        $newBuyying->item_description = $request->item_description;
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
