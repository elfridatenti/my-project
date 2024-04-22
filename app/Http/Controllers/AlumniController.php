<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AlumniProfile;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $data = AlumniProfile::get();

         return view('alumni-index', [
            "data" => $data,
        ]);
        
    }

    public function view(Request $request, $id)
    {
        $item = AlumniProfile::find($id);

         return view('alumni-detail', [
            "item" => $item,
        ]);
        
    }
}
