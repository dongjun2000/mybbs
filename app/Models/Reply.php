<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    // 从属关系：一条回复属于一个作者所有
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 从属关系：一条回复属于一个话题
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
