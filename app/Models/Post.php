<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //$fillableはホワイトリスト、$guardedはブロックリスト
    protected $fillable = [
        'title',
        'content',
        'assignee',
        'start_date',
        'finish_date',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
