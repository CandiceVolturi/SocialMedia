<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
        public function show($id)
    {
        $user = Http::get("https://jsonplaceholder.typicode.com/users/{$id}")->json();
        $posts = Http::get("https://jsonplaceholder.typicode.com/posts", ['userId' => $id])->json();
        return view('users.show', compact('user', 'posts'));
    }
}
