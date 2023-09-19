<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create() {
        //post/create.blade.phpを表示
        return view('post.create');
    }

    public function store(Request $request) {

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'assignee' => $request->assignee,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            //'upload' => $request->upload,
        ]);
        
        //$request->session()->flash('message', '保存しました') //下記は簡易表記
        $request->with('message', '保存しました');
        return back();
    }
}
