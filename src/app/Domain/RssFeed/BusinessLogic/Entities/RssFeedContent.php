<?php

namespace App\Domain\RssFeed\BusinessLogic\Entities;

use Illuminate\Database\Eloquent\Model;

class RssFeedContent extends Model
{
    public $fillable = [
        'rss_feed_id',
        'link',
        'title',
        'pubDate',
        'description'
    ];

    public function rssFeed()
    {
        return $this->belongsTo(RssFeed::class);
    }
}
