<?php

namespace App\Http\Controllers;

use App\User;
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
    $downhill_alert = new Carbon('+120 minutes');
        echo $downhill_alert->format('Y-m-d');
    $distress_alert = new Carbon('+240 minutes');
        echo $distress_alert->format('Y-m-d');
    
        $param = ['id' => $request->id];
    // 名前取得
        // $users = User::where('id',$param)->get();
        // echo $users;

    // 投稿記事表示
        $posts = Post::where('id',$param)->get();
        echo $posts;

    // コメント表示
        $comments = Comment::where('post_id',$param)->get();

        return view('/show', ['posts' => $posts,
        'comments' => $comments,
        'cb' => $cb,
        'downhill_alert' => $downhill_alert,
        'distress_alert' => $distress_alert
        ]);
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
        $comment->user_id = 1; //&request->user_idに変更する
        $comment->post_id = $request->id;
        $comment->comment = $request->comment;
        $comment->save();
        // dd($comment);
        return redirect()->back();
    }
}
