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

        $validated['user_id'] = auth()->id();
        
        $post = Post::create($validated);

        return $this->index()->with('message', '保存しました');
        //$request->session()->flash('message', '保存しました') //上記は簡易表記
    }

    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
}
