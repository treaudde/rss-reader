<?php

namespace App\Domain\RssFeed\Application\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\RssFeed\BusinessLogic\Entities\RssFeed;
use App\Domain\RssFeed\BusinessLogic\Services\RetrieveRssFeedService;
use App\Domain\RssFeed\Application\Http\Requests\EditRssFeedRequest;
use App\Domain\RssFeed\Application\Http\Requests\CreateRssFeedRequest;
use App\Domain\RssFeed\BusinessLogic\Entities\RssFeedContent;

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
     * @param  RetrieveRssFeedService $rssFeedService
     * @return \Illuminate\Http\Response
     */
    public function show(RssFeed $rssFeed)
    {
        if($rssFeed->rssFeedContent->count() == 0) {
            $rssFeedData = $this->retrieveRssFeedContent($rssFeed->url);
            $this->storeRssFeedContent($rssFeed, $rssFeedData);
        }

        return response()->json([
            $rssFeed,
            'articles' => $rssFeed->refresh()->rssFeedContent
        ]);
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
     * @param \App\Domain\RssFeed\Entities\RssFeed $rssFeed
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(RssFeed $rssFeed)
    {
        return response()->json($rssFeed->delete());
    }


    private function retrieveRssFeedContent($rssFeedUrl)
    {
        $rssFeedService = app()->make(RetrieveRssFeedService::class);
        return  json_decode(
            $rssFeedService->getRssFeedData($rssFeedUrl)
        );
    }

    private function storeRssFeedContent($rssFeed, $rssFeedData) {
        foreach ($rssFeedData as $rssFeedDatum) {
            RssFeedContent::create(
                [
                    'rss_feed_id' => $rssFeed->id,
                    'link' => $rssFeedDatum->link,
                    'title' =>  $rssFeedDatum->title,
                    'pubDate' =>  Carbon::createFromDate($rssFeedDatum->pubDate)->format('Y-m-d H:i:s'),
                    'description' =>  $rssFeedDatum->description
                ]
            );
        }
    }
}
