<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create() {
        //post/create.blade.phpを表示
        return view('post.create');
    }
}
