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
        $validated = $request->validate([
            'title' => 'required|max:20',
            'content' => 'max:2000',
            'assignee' => 'required|max:20',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after:start_date',
        ]);

        $post = Post::create($validated);
        return back();

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'assignee' => $request->assignee,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            //'upload' => $request->upload,
        ]);
        return back()->with('message', '保存しました');
        //$request->session()->flash('message', '保存しました') //上記は簡易表記
    }
}
