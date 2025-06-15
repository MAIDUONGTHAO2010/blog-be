<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tag';

    protected $fillable = [
        'post_id',
        'tab_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tab()
    {
        return $this->belongsTo(Tag::class);
    }
}
