<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // マスアサインメントで代入を許可するカラムの設定
    protected $fillable = [
        'title',
        'content',
        'published_at',
    ];

    // 属性の型変換の設定
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
