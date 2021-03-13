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
        $today = Carbon::now();;
        echo '今：';
        echo $today;
        echo '<br>';

    // 下山アラート時間
    // 現時刻-下山時間＝２時間以上
        $down = new Carbon();
        $down->addHour(2);
        echo '２時間後：';
        echo $down;
        echo '<br>';
    // 
    // 遭難アラート時間
    // 現時刻-下山時間＝４時間以上
        $distress = new Carbon();
        $distress->addHour(4);
        echo '４時間後：';
        echo $distress;
        echo '<br>';
        
        $param = ['id' => $request->id];
        
        // 投稿記事表示
        $posts = Post::where('id',$param)->get();
        // echo $posts;
        // リレーション：名前の取得
        User::with('posts:user_id')->get(['name']);
        
        // コメント表示
        $comments = Comment::where('post_id',$param)->get();
        // echo $comments;
        // リレーション：名前の取得
        User::with('comments:user_id')->get(['name']);
        
        
        // 今登ってる人 過去に登った人
        $times = Post::where('mountain_id', $param)->get(['user_id', 'mountain_id', 'downhill_time']);
        echo $times;
        echo '<br>';

        // $posts = Post::all();
        // $users = [];
        // foreach ($posts as $post) {
        //     $users[] = $posts->user_id;
        // }
        // dd($users);

        // $collection = collect($posts);
        // $unique = $collection->unique();
            // return $mountain_id['mountain_id'];
        // });
        // echo $unique;
        // echo '<br>';

        return view('/show', 
        [
        'posts' => $posts,
        'comments' => $comments,
        'today' => $today,
        'down' => $down,
        'distress' => $distress,
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
