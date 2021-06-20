<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    //追記
    protected $fillable = [
        'name',
    ];

    //追記
    public function getHashtagAttribute(): string
    {
        return '#' . $this->name;
    }

    //追記
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }
}
