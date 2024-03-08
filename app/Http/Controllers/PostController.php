<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{   
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        //post/create.blade.phpを表示
        return view('post.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'content' => 'max:2000',
            'assignee' => 'required|max:20',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after:start_date',
        ]);

        // 'title'が提供されなかった場合、デフォルト値を設定
        // if (!isset($validated['title'])) {
        //     $validated['title'] = 'タイトル未定';
        // }

        $validated['user_id'] = auth()->id();
        
        $post = Post::create($validated);

        // return back()->with('message', '保存しました');
        return response()->json('message' => '保存しました');
        //$request->session()->flash('message', '保存しました');
        //return $this->index();
        //$this->index(); //上記は簡易表記
    }

    public function index() {
        //$posts = Post::all(); //条件なし select * from postsと同じ
        $posts = Post::orderBy('created_at', 'desc')->with('user')->get(); //作成日順で取得
        //Post::whereDate('created_at', '>=', '2023-09-26')->get(); //9/23以降に作成されたデータの取得 の場合
        return view('post.index', compact('posts'));
    }
}
