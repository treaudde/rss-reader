<?php

namespace App\Domain\RssFeed\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\RssFeed\Entities\RssFeed;
use App\Domain\RssFeed\Services\RssFeedService;
use App\Domain\RssFeed\Http\Requests\EditRssFeedRequest;
use App\Domain\RssFeed\Http\Requests\CreateRssFeedRequest;

class RssFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RssFeed::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRssFeedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRssFeedRequest $request)
    {
        $feedData = $request->only('url', 'name');
        return response()->json(RssFeed::create($feedData));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domain\RssFeed\Entities\RssFeed  $rssFeed
     * @param  RssFeedService $rssFeedService
     * @return \Illuminate\Http\Response
     */
    public function show(RssFeed $rssFeed, RssFeedService $rssFeedService)
    {
        //get the data
        //@TODO store in the database
        $rssFeedData = json_decode(
            $rssFeedService->getRssFeedData($rssFeed->url)
        );

        $response = array_merge(
            $rssFeed->toArray(),
            ['articles' => $rssFeedData]
        );

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRssFeedRequest $request
     * @param  \App\Domain\RssFeed\Entities\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function update(EditRssFeedRequest $request, RssFeed $rssFeed)
    {
        $feedData = $request->only('url', 'name');
        return response()->json($rssFeed->update($feedData));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domain\RssFeed\Entities\RssFeed  $rssFeed
     * @return \Illuminate\Http\Response
     */
    public function destroy(RssFeed $rssFeed)
    {
        return response()->json($rssFeed->delete());
    }
}
