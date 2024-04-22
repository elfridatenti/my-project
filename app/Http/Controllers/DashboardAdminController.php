<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Datadiri;

class DashboardAdminController extends Controller
{
    //
    public function alumni(Request $request)
    {
        $data = User::where("role", "alumni")->get();

        return view('admin.alumni.index', [
            "data" => $data,
        ]);
        
    }
}
