<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowMontainController extends Controller
{
    public function showMontain()
    {
        return view('show_mountain');
    }
}
