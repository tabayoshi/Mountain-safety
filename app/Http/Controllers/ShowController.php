<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use App\Mountain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
// 投稿表示/コメント表示 -------------------------------------------------------------
    public function show(Request $request)
    {
        $posts = Post::where('id',$request->id)->get(); // 投稿記事表示
        User::with('posts:user_id')->get(['name']); // リレーション：名前の取得
        
        $comments = Comment::where('post_id',$request->id)->get(); // コメント表示
        User::with('comments:user_id')->get(['name']); // リレーション：名前の取得
// ------------------------------------------------------------------------------------        
        
// 下山アート・遭難アラート //---------------------------------------------------------
        $today = Carbon::now();; // 現在時間取得
        // echo $today;
        // echo '<br>';
        $times = Post::where('id',$request->id)->get(); 
        // dd($times);
        $down = new Carbon(); // 下山アラート時間(現時刻-下山時間＝２時間以上)
        $down->addHour(2);
        // echo $down;
        // echo '<br>';
        // dd($down);
        $distress = new Carbon(); // 遭難アラート時間(現時刻-下山時間＝４時間以上)
        $distress->addHour(4);
        // echo $distress;
        // dd($distress);
        // -------------------------------------------------------------------------------------
        
// 今登ってる人・過去に登った人 --------------------------------------------------------
        $people = post::find($request->id,['mountain_id']);
        $people = post::whereIn('mountain_id', $people)->get();
        // dd($people);

        $flag = post::find($request->id,['alert_flag']);
        // dd($flag);

        return view('show', 
        [
        'posts' => $posts,
        'comments' => $comments,
        'people' => $people,
        'times' => $times,
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
            $comment->user_id = Auth::id(); //ログインしないと取得できない
            $comment->post_id = $request->id;
            $comment->comment = $request->comment;
            $comment->save();
        return redirect()->back();
    }

//アラート消去(フラグ)
    public function flag(Request $request) {
        $flag = post::find($request->id,['alert_flag']);
        dd($flag);
    return redirect()->back();
    }
}

