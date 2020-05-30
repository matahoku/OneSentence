<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
