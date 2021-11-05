<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::friend()->withCount('likers')->latest()->get();
    }
    
    public function store(StoreRequest $request)
    {
        $post = auth()->user()->posts()->save($request->getPost());
        
        $post->load('user');
        
        return response()->json($post->toArray(), 201);
    }
}
