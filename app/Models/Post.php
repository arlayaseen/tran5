<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    //
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image'
    ];

    // Scope
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
