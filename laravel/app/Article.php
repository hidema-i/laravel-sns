<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    //追加
    protected $fillable = [
        'title',
        'body',
    ];
    //ここまで追加

    //追加
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    //ここまで追加

    //追加
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
    //ここまで追加

    //追加
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }
    //追加
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
    //ここまで追加
    
    //tags
    public function tags():BelongsToMany
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
