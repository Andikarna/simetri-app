<?php

namespace App\Http\Controllers;

use App\Models\RequestCutting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalPermintaan = RequestCutting::count();
        $totalDiproses = RequestCutting::where('status', 'Pengajuan Supervisor')->count();
        $totalSelesai = RequestCutting::where('status', 'Sudah disetujui')->count();
        return view('dashboard.dashboard', compact('totalPermintaan', 'totalDiproses', 'totalSelesai'));
    }
}
