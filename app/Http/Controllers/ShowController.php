<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
// 投稿表示/コメント表示
    public function show(Request $request)
    {
        $posts = Post::where('id',$request->id)->get(); // 投稿記事表示
        User::with('posts:user_id')->get(['name']); // リレーション：名前の取得
        
        $comments = Comment::where('post_id',$request->id)->get(); // コメント表示
        User::with('comments:user_id')->get(['name']); // リレーション：名前の取得

// 時間取得/今登ってる人・過去に登った人
        // 今登ってる人 過去に登った人
        $people = Post::where('mountain_id', $request->id)->get();
                // echo $people;

        // $people = Post::pluck('mountain_id', 'id');
        // $people = User::with('posts:user_id')->get(['name']);
        // echo $people;
        // $person = Post::where('id', $request->id)->get();
        // foreach ($people as $person) {
        // }
        // dd($peron);
        
        $today = Carbon::now();; // 現在時間取得
        // dd($today);
        
        $down = new Carbon(); // 下山アラート時間(現時刻-下山時間＝２時間以上)
        $down->addHour(2);
        // dd($down);
         
        $distress = new Carbon(); // 遭難アラート時間(現時刻-下山時間＝４時間以上)
        $distress->addHour(4);
        // dd($distress);

        
        

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

        return view('show', 
        // compact('today', 'down', 'distress', 'people')); 
        [
        'posts' => $posts,
        'comments' => $comments,
        'people' => $people,
        // 'person' => $person,
        'today' => $today,
        'down' => $down,
        'distress' => $distress,
        ]);
    }

// コメント投稿
    public function store(Request $request) {
        $this->validate(
            $request,[
                'comment' => 'required|string'
            ],
            [
                'comment.required' => 'コメントは必須です。',
                'comment.string' => 'コメントには文字列を入力してください。'
            ]
        );

            $comment = new Comment;
            $comment->user_id = 1; //$request->user_idに変更する
            $comment->post_id = 4; //$request->post_id?に変更する
            $comment->comment = $request->comment;
            $comment->save();
            // dd($comment);
        return redirect()->back();
    }
}