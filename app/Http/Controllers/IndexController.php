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
    public function search(Request $request) {
      $posts = Post::all();
      if(isset($request->search)){
        $search = Mountain::where('mountain_name', 'like', "%$request->search%")->get();
        $search_result = $request->search.'の結果'. count($search).'件見つかりました。';
      }else{
        $search = 0;
        $search_result = '一致する検索結果はありませんでした。';
      }
      return view('index', compact('posts','search','search_result'));
  }

}