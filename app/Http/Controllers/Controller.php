<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function cekLogin()
    {
        $user = Auth::user();

        if (!$user || $user->role != "admin") {
            echo "<script>";
            echo "
                location.href = ' " . url("/dashboard/signin") . "';
                ";
            echo "</script>";
            die;
        }
    }
}
