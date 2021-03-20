<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Mountain;


class IndexController extends Controller
{
    public function index() {
      $posts = Post::orderBy('id', 'desc')->paginate(6, ["*"], 'posts');
      $mountains = Mountain::paginate(15, ["*"], 'mountains');
      return view('index', compact('posts','mountains'));
    }
    public function search(Request $request) {
      $posts = Post::orderBy('id', 'desc')->paginate(6, ["*"], 'posts');
      if(isset($request->search)){
        // 検索されたら表示
        $search = Mountain::where('mountain_name', 'like', "%$request->search%")->get();
        $search_result = $request->search.'の結果'. count($search).'件見つかりました。';
      }else{
        // 検索されなかったら表示
        $search = 0;
        $search_result = '一致する検索結果はありませんでした。';
      }
      return view('index', compact('posts','search','search_result'));
    }

}