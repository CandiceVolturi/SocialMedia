<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
   public function index(Request $request)
    {
        $query = Http::get('https://jsonplaceholder.typicode.com/posts');
        $posts = collect($query->json());

        if ($request->has('search')) {
            $posts = $posts->filter(fn($post) => str_contains(strtolower($post['title']), strtolower($request->search)));
        }

        if ($request->has('user_id')) {
            $posts = $posts->where('userId', $request->user_id);
        }

        $page = $request->get('page', 1);
        $perPage = 10;
        $paginated = $posts->forPage($page, $perPage);

        return view('home', [
            'posts' => $paginated,
            'total' => $posts->count(),
            'page' => $page,
            'search' => $request->search,
            'user_id' => $request->user_id
        ]);
    }

    public function show($id)
    {
        $post = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}")->json();
        $comments = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}/comments")->json();
        return view('post-detail', compact('post', 'comments'));
    }

    public function create()
    {
        return view('create-edit-post');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10'
        ]);

        $saved = Session::get('posts', []);
        $data['id'] = count($saved) + 101;
        $data['userId'] = 1;
        $saved[] = $data;
        Session::put('posts', $saved);

        return redirect()->route('home')->with('success', 'Post created successfully (simulated)');
    }

    public function edit($id)
    {
        $posts = Session::get('posts', []);
        $post = collect($posts)->firstWhere('id', $id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10'
        ]);

        $posts = Session::get('posts', []);
        foreach ($posts as &$post) {
            if ($post['id'] == $id) {
                $post['title'] = $data['title'];
                $post['body'] = $data['body'];
            }
        }
        Session::put('posts', $posts);

        return redirect()->route('home')->with('success', 'Post updated successfully (simulated)');
    }
}
