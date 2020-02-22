<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRssFeedContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_feed_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rss_feed_id')->unsigned();
            $table->string('link', 1024);
            $table->string('title', 512);
            $table->dateTime('pubDate');
            $table->text('description');
            $table->timestamps();

            $table->index(['rss_feed_id']);

            $table->foreign('rss_feed_id')->references('id')
                ->on('rss_feeds')
                ->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rss_feed_contents');
    }
}
