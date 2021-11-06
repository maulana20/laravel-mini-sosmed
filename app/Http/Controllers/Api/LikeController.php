<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Notifications\Post\PostGotLiked;

class LikeController extends Controller
{
    public function send(Post $post)
    {
        $user = auth()->user();
        
        if ($user->hasLiked($post)) {
            $user->unlike($post);
        } else {
            $user->like($post);
            $post->user->notify(new PostGotLiked($post, $user));
        }
        
        $post->load('user');
        
        return response()->json($post->toArray(), 201);
    }
}
