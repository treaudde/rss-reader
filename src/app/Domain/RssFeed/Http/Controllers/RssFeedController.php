<?php

namespace App\Domain\RssFeed\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\RssFeed\Entities\RssFeed;

class RssFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\RssFeed\Entities\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function show(RssFeed $rssFeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domain\RssFeed\Entities\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RssFeed $rssFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\RssFeed\Entities\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(RssFeed $rssFeed)
    {
        //
    }
}
