<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPasien = Pasien::count();
        $totalKunjungan = Kunjungan::count();
        $labels = ['Pasien', 'Kunjungan'];
        $data = [$totalPasien, $totalKunjungan];
        return view('dashboard', compact('labels', 'data'));
    }
} 