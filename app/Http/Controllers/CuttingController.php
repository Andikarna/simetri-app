<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\CuttingRecord;
use App\Models\RequestCutting;
use App\Models\MasterStokProduk;
use App\Models\MasterUtuhProduk;
use App\Models\RequestCuttingDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailMasterStokProduk;

class CuttingController extends Controller
{
    public function view()
    {

        $cuttingLists = RequestCutting::whereNot('status', "Baru")->get();

        return view('cuttingstock.cutting', compact('cuttingLists'));
    }

    public function detail($id)
    {
        $request = RequestCutting::find($id);
        $detail = RequestCuttingDetail::where('copper_cutting_id', $id)->get();
        return view('cuttingstock.detail', compact('request', 'detail'));
    }

    public function put($id)
    {
        $request = RequestCutting::find($id);
        $detail = RequestCuttingDetail::where('copper_cutting_id', $id)->get();

        return view('cuttingstock.update', compact('request', 'detail'));
    }

    public function approve(Request $request, $id)
    {
        $stokUtuh = array_filter($request->input('stok_utuh', []));
        $stokPotong = array_filter($request->input('stok_potong', []));

        foreach ($stokPotong as $dimension => $usedLength) {
            $stok = MasterStokProduk::where('ukuran', $dimension)->first();

            $newCuttingRecord = new CuttingRecord();
            $newCuttingRecord->copper_cutting_id = $id;
            $newCuttingRecord->ukuran = $dimension;
            $newCuttingRecord->quantity = $usedLength;
            $newCuttingRecord->total = $usedLength;
            $newCuttingRecord->stok_utuh_id = 0;
            $newCuttingRecord->stok_utuh = "-";
            $newCuttingRecord->stok_potong_id = $stok->id;
            $newCuttingRecord->stok_potong = $stok->total_panjang;
            $newCuttingRecord->save();

            if ($stok) {
                $stok->total_panjang -= (int)$usedLength;
                if ($stok->total_panjang < 0) {
                    $stok->total_panjang = 0;
                }
                $stok->save();
            }
        }

        foreach ($stokUtuh as $dimension => $usedLength) {

            $stok = MasterUtuhProduk::where('ukuran', $dimension)->first();

            if ($usedLength < 4000) {
                $sisa = 4000 - $usedLength;
                if ($stok) {

                    $stok->quantity -= 1;

                    if ($stok->quantity < 0) {
                        $stok->quantity = 0;
                    }

                    $stok->save();
                }

                $existMasterStok = MasterStokProduk::where('ukuran', $dimension)->first();

                if ($existMasterStok != null) {
                    $detailStok = new DetailMasterStokProduk();
                    $detailStok->stok_id = $existMasterStok->id;
                    $detailStok->panjang = $sisa;
                    $detailStok->description = "-";
                    $detailStok->save();

                    $existMasterStok->total_panjang += $sisa;

                    $newCuttingRecord = new CuttingRecord();
                    $newCuttingRecord->copper_cutting_id = $id;
                    $newCuttingRecord->ukuran = $dimension;
                    $newCuttingRecord->quantity = $usedLength;
                    $newCuttingRecord->total = $usedLength;
                    $newCuttingRecord->stok_utuh_id = $existMasterStok->id;
                    $newCuttingRecord->stok_utuh = $existMasterStok->total_panjang;
                    $newCuttingRecord->stok_potong_id = 0;
                    $newCuttingRecord->stok_potong = "-";
                    $newCuttingRecord->save();

                    $existMasterStok->save();
                } else {
                    $newStokProduk = new MasterStokProduk();
                    $newStokProduk->ukuran = $dimension;
                    $newStokProduk->total_panjang = $sisa;
                    $newStokProduk->save();
                }
            } else {

                $manyCopper = ceil($usedLength / 4000);

                if ($stok) {

                    $stok->quantity -= $manyCopper;

                    if ($stok->quantity < 0) {
                        $stok->quantity = 0;
                    }

                    $stok->save();
                }

                $lenth = $manyCopper * 4000;
                $sisa = $usedLength - $lenth;

                $existMasterStok = MasterStokProduk::where('ukuran', $dimension)->first();

                if ($existMasterStok != null) {

                    $detailStok = new DetailMasterStokProduk();
                    $detailStok->stok_id = $existMasterStok->id;
                    $detailStok->panjang = $sisa;
                    $detailStok->description = "-";
                    $detailStok->save();

                    $existMasterStok->total_panjang += $sisa;

                    $newCuttingRecord = new CuttingRecord();
                    $newCuttingRecord->copper_cutting_id = $id;
                    $newCuttingRecord->ukuran = $dimension;
                    $newCuttingRecord->quantity = $usedLength;
                    $newCuttingRecord->total = $usedLength;
                    $newCuttingRecord->stok_utuh_id = $existMasterStok->id;
                    $newCuttingRecord->stok_utuh = $existMasterStok->total_panjang;
                    $newCuttingRecord->stok_potong_id = 0;
                    $newCuttingRecord->stok_potong = "-";
                    $newCuttingRecord->save();

                    $existMasterStok->save();
                } else {

                    $newStokProduk = new MasterStokProduk();
                    $newStokProduk->ukuran = $dimension;
                    $newStokProduk->total_panjang = $sisa;
                    $newStokProduk->save();

                    $newCuttingRecord = new CuttingRecord();
                    $newCuttingRecord->copper_cutting_id = $id;
                    $newCuttingRecord->ukuran = $dimension;
                    $newCuttingRecord->quantity = $usedLength;
                    $newCuttingRecord->total = $usedLength;
                    $newCuttingRecord->stok_utuh_id = $newStokProduk->id;
                    $newCuttingRecord->stok_utuh = $sisa;
                    $newCuttingRecord->stok_potong_id = 0;
                    $newCuttingRecord->stok_potong = "-";
                    $newCuttingRecord->save();
                }
            }
        }



        $requestCutting = RequestCutting::where('id', $id)->first();
        $requestCutting->status = "Sudah disetujui";
        $requestCutting->save();

        $cuttingLists = RequestCutting::all();

        return view('cuttingstock.cutting', compact('cuttingLists'))->with('success', 'Berhasil Menyetujui Cutting Tembaga!');
    }

    public function printCutting($id)
    {
        // $request = RequestCutting::findOrFail($id);
        $detail = RequestCuttingDetail::where('copper_cutting_id', $id)->get();
        $username = Auth::user()->name;
        
        $request = RequestCutting::findOrFail($id);
        //$detail = $request->details;

        $pdf = PDF::loadView('template.printresultcutting', compact('request', 'detail', 'username'));
        return $pdf->stream('bon_' . $request->id . '.pdf');
    }
}
