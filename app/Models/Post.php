<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $with = [
        'user'
    ];
    
    protected $fillable = [
        'content'
    ];
    
    protected $appends = [
        'published'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
