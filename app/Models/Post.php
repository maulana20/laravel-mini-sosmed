<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelLike\Traits\Likeable;

class Post extends Model
{
    use HasFactory, Likeable;
    
    protected $with = [
        'user'
    ];
    
    protected $fillable = [
        'content'
    ];
    
    protected $appends = [
        'published', 'has_like', 'likers_count'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    
    public function getHasLikeAttribute()
    {
        return $this->isLikedBy(auth()->user());
    }
    
    public function getLikersCountAttribute()
    {
        return $this->likers()->count();
    }
    
    public function scopeFriend($query)
    {
        $user = auth()->user();
        
        $userIds = $user->friends()->pluck('id');
        $userIds[] = $user->id;
        
        $query->whereIn('user_id', $userIds);
    }
}
