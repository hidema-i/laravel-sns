<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    //==========ここから追加==========
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
    //==========ここまで追加==========
}
