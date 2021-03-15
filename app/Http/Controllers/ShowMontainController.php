<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mountain;

class ShowMontainController extends Controller
{
    public function showMontain(Mountain $mt)
    {
        $prefecture = $mt->prefectire()->first();
        $user_id = Auth::id();
        return view('show_mountain', compact('prefecture','mt','user_id'));
    }
}
