<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Friendship\StatusRequest;

class FriendshipController extends Controller
{
    public function check(StatusRequest $request, User $user)
    {
        return $request->check($user);
    }
    
    public function request(StatusRequest $request, User $user)
    {
        return $request->request($user);
    }
    
    public function accept(StatusRequest $request, User $user)
    {
        return $request->accept($user);
    }
    
    public function remove(StatusRequest $request, User $user)
    {
        return $request->remove($user);
    }
}
