<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Alumni;
use App\Models\Datadiri;

class DashboardAlumniController extends Controller
{
    //
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $alumni = Alumni::where('user_id', $user_id)->get();
        $data_diri = Datadiri::where('user_id', $user_id)->get();

        return view('alumni.beranda', [
            "alumni" => $alumni[0],
            "data_diri" => $data_diri[0],
        ]);
    }
}
