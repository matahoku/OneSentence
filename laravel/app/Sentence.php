<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sentence extends Model
{
    protected $fillable = [
        'title', 'body' , 'rating'
    ];

    public function user(): BelongsTo
    {
      return $this->belongsTo('App\User');
    }
}
