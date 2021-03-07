<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Request $request)
    {
    // 投稿記事表示
        $param = ['id' => $request->id];
        $posts = Post::where('id',$param)->get();

    // コメント表示
        $comments = Comment::where('post_id',$param)->get();
        return view('/show', ['posts' => $posts, 'comments' => $comments]);
    }

    // コメント投稿
    public function store(Request $request) {
$this->validate(
            $request,
            [
                // 'post_id' => 'required|numeric|exists:posts,id',
                'comment'    => 'required|string',
            ],
            [
                // 'post_id.required' => '入力値が不正です',
                // 'post_id.numeric'  => '入力値が不正です',
                // 'post_id.exists'   => '入力値が不正です',
                'comment.required'    => 'コメントは必須です。',
                'comment.string'      => 'コメントには文字列を入力してください。',
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
