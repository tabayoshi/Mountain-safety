<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mountain;

class ShowMontainController extends Controller
{
    public function showMontain(Mountain $mt)
    {
        $prefecture = $mt->prefectire()->first();
        return view('show_mountain', compact('prefecture','mt'));
    }
}
