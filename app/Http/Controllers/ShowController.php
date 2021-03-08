<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Request $request)
    {
    // 現在時間取得
        $cb = new Carbon();
        // echo $cb;
        echo $cb->format('Y-m-d');

    // 投稿記事表示
        $param = ['id' => $request->id];
        $posts = Post::where('id',$param)->get();

    // コメント表示
        $comments = Comment::where('post_id',$param)->get();
        return view('/show', ['posts' => $posts, 'comments' => $comments, 'cb' => $cb]);
    }

    // コメント投稿
    public function store(Request $request) {
        $this->validate(
            $request,
            [
                'comment' => 'required|string',
            ],
            [
                'comment.required' => 'コメントは必須です。',
                'comment.string' => 'コメントには文字列を入力してください。',
            ]
        );

        $comment = new Comment;
        $comment->user_id = 1;
        $comment->post_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();
        // dd($comment);
        return redirect()->back();
    }
}
