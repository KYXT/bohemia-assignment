<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'user_id',
        'reply_id',
        'is_in_trash',
        'text',
    ];
    
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function reply()
    {
        return $this->hasMany(PostComment::class, 'reply_id', 'id');
    }
    
    public function replies()
    {
        return $this->reply()->with('replies', 'user:id,name,email,role');
    }
    
    public function replyNotInTrash()
    {
        return $this->hasMany(PostComment::class, 'reply_id', 'id')->where('is_in_trash', false);
    }
    
    public function repliesNotInTrash()
    {
        return $this->replyNotInTrash()->with('repliesNotInTrash', 'user:id,name,email,role');
    }
}
