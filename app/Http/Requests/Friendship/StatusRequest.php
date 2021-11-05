<?php

namespace App\Http\Requests\Friendship;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Notifications\Friendship\NewRequest;
use App\Notifications\Friendship\AcceptRequest;

class StatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
    
    public function check(User $friendUser)
    {
        $currentUser = auth()->user();
        
        if ($currentUser->isFriendWith($friendUser)) return response()->json(['status' => 'friend'], 200);
        
        if ($currentUser->hasRequestedAsFriend($friendUser)) return response()->json(['status' => 'waiting'], 200);
        
        if ($friendUser->hasRequestedAsFriend($currentUser)) return response()->json(['status' => 'pending'], 200);
        
        return response()->json(['status' => 'none'], 200);
    }
    
    public function request(User $friendUser)
    {
        $currentUser = auth()->user();
        
        if ($friendUser->hasRequestedAsFriend($currentUser)) {
            
            $currentUser->accept($friendUser);
            
            $friendUser->notify(new AcceptRequest($currentUser));
            
            return ['status' => 'friend'];
            
        }

        $currentUser->request($friendUser);

        $friendUser->notify(new NewRequest($currentUser));

        return response()->json(['status' => 'waiting'], 201);
    }
    
    public function accept(User $friendUser)
    {
        $currentUser = auth()->user();
        
        $currentUser->accept($friendUser);
        
        $friendUser->notify(new AcceptRequest($currentUser));
        
        return ['status' => 'friend'];
    }
    
    public function remove(User $friendUser)
    {
        $currentUser = auth()->user();
        
        $currentUser->remove($friendUser);
        
        return ['status' => 'none'];
    }
}
