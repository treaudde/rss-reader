<?php

namespace App\Domain\RssFeed\Entities;

use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    protected $fillable = [
        'name',
        'url'
    ];
}
