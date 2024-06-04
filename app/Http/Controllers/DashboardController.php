<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $count_layanan = DB::table('layanan')->count();
        $count_pengajuan = DB::table('pengajuan')->count();
        $count_user = DB::table('users')->count();
        // $username = Auth::user()->username; , 'username'

        return view('dashboard', compact('count_layanan', 'count_pengajuan', 'count_user'));
    }
}
