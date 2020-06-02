<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
      'name',
    ];

    public function getHashtagAttribute(): string
    {
      return '#' . $this->name;
    }

    public function sentences(): BelongsToMany
    {
      return $this->belongsToMany('App\Sentence')->withTimestamps();
    }
}
