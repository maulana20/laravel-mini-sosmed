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
        $user = auth()->user();
        $userIds = $user->friends()->pluck('id');
        $userIds[] = $user->id;

        return Post::whereIn('user_id', $userIds)->latest()->get();
    }
    
    public function store(StoreRequest $request)
    {
        $post = auth()->user()->posts()->save($request->getPost());
        
        $post->load('user');
        
        return response()->json($post->toArray(), 201);
    }
}
