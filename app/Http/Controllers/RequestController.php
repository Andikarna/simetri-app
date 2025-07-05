<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF;
use App\Models\BuyCopper;
use App\Models\MasterSize;
use Illuminate\Http\Request;
use App\Models\RequestCutting;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RequestCuttingDetail;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function view()
    {

        $cuttingLists = RequestCutting::orderBy('id', 'desc')->get();

        return view('request.request', compact('cuttingLists'));
    }
    public function post()
    {
        return view('request.createRequest');
    }

    public function save(Request $request)
    {
        $newRequest = new RequestCutting();
        $newRequest->production_code = $request->production_code;
        $newRequest->project_code = $request->project_code;
        $newRequest->project_name = $request->project_name;
        $newRequest->production_date = $request->production_date;
        $newRequest->status = "Baru";
        $newRequest->save();

        return redirect('/request')->with('success', "Berhasil membuat permintaan potong tembaga!");
    }

    public function put($id)
    {
        $request = RequestCutting::find($id);
        $detail = RequestCuttingDetail::where('copper_cutting_id', $id)->get();

        return view('request.updateRequest', compact('request', 'detail'));
    }

    public function detailAdd($id)
    {
        $request = RequestCutting::find($id);
        $masterSize = MasterSize::all();

        return view('request.detailUpdate', compact('request', 'masterSize'));
    }

    public function detailPut($id, Request $request)
    {
        $newDetailCopper = new RequestCuttingDetail();
        $newDetailCopper->copper_cutting_id = $id;
        $newDetailCopper->panel_name_utama = $request->panel_name_utama;
        $newDetailCopper->panel_name = $request->panel_name;
        $newDetailCopper->type = $request->type;
        $newDetailCopper->dimension = $request->size;
        $newDetailCopper->length = $request->length;
        $newDetailCopper->quantity = $request->quantity;
        $newDetailCopper->total_length = $request->total_length;
        $newDetailCopper->save();

        $requesCutting = RequestCutting::find($id);
        $requesCutting->status = "Pengajuan Supervisor";
        $requesCutting->save();

        return redirect()->route('request.edit', $id)->with('success', 'Detail potong tembaga berhasil ditambahkan.');
    }

    public function detail($id)
    {
        $request = RequestCutting::find($id);
        $detail = RequestCuttingDetail::where('copper_cutting_id', $id)->get();

        return view('request.detail', compact('request', 'detail'));
    }

    public function delete($id)
    {
        $request = RequestCutting::find($id);
        $request->delete();
        return redirect()->route('request', $id)->with('success', 'Detail potong tembaga berhasil dihapus!');
    }

    public function printBon($id)
    {
        $request = RequestCutting::findOrFail($id);
        $detail = RequestCuttingDetail::where('copper_cutting_id', $id)->get();
        $username = Auth::user()->name;
        
        $pdf = PDF::loadView('template.printbon', compact('request', 'detail', 'username'));
        return $pdf->stream('bon_' . $request->id . '.pdf');
    }
}
