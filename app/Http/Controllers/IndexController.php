<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Mountain;

class IndexController extends Controller
{
    public function index() {
      $posts = Post::all();
      $mountains = Mountain::orderBy('id', 'desc')->paginate(15);
    return view('index', compact('posts','mountains'));
  }
}