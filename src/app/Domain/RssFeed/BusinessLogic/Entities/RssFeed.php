<?php

namespace App\Domain\RssFeed\BusinessLogic\Entities;

use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    protected $fillable = [
        'name',
        'url'
    ];
}
