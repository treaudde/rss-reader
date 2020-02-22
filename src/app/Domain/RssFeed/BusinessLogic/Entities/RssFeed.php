<?php

namespace App\Domain\RssFeed\BusinessLogic\Entities;

use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    protected $fillable = [
        'name',
        'url'
    ];

    public function rssFeedContent()
    {
        return $this->hasMany(RssFeedContent::class);
    }
}
