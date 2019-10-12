<?php
$articleSample = <<<ARTICLE
<article class="article-preview p-2">

        <h2>Article Title</h2>
        <img src="https://picsum.photos/150" class="img-rounded float-left img-responsive p-2">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua...
        </p>
    <div style="clear:both"></div>
</article>
ARTICLE;
?>

<!doctype html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="<?php echo asset('css/app.css'); ?>" rel="stylesheet">

        <title>RSS Frontend Mockups</title>

        <style type="text/css">
            #list-feed .article-row:nth-child(even) {
                background-color: #f2f2f0
            }

            #view-all-feeds .article-row:nth-child(even) {
                background-color: #f2f2f0
            }

            #view-feed LI:nth-child(even) {
                background-color: #f2f2f0
            }

            #view-all-feeds LI {
                list-style-type: none;
            }

            #view-all-feeds UL {
                margin:0;
                padding:0;
            }

            #view-all-feeds LI:nth-child(even) {
                background-color: #f2f2f0
            }
        </style>
    </head>
    <body>

        <div class="container" id="list-feed">
            <div class="row">
                <div class="col-12">
                    <h1>Random Articles from all Feeds</h1>
                    <p>Display a random list of articles from all the feeds.
                        Base the top news on what is read the most.</p>
                    <div class="row">
                        <div class="d-flex flex-row article-row p-2">
                            {!! $articleSample !!}
                        </div>

                        <div class="d-flex flex-row article-row p-2">
                            @for($x=0; $x<2; $x++)
                            {!! $articleSample !!}
                            @endfor
                        </div>

                        <div class="d-flex flex-row article-row p-2">
                            @for($x=0; $x<3; $x++)
                                {!! $articleSample !!}
                            @endfor
                        </div>

                        <div class="d-flex flex-row article-row p-2">
                            @for($x=0; $x<4; $x++)
                                {!! $articleSample !!}
                            @endfor
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="container" id="view-all-feeds">
            <div class="row">
                <div class="col-12">
                    <h1>View All Feeds</h1>
                    <p>View a list of feeds.</p>
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                @for($x=0; $x<10; $x++)
                                <li class="p-2">
                                    <h3>Feed {{ $x + 1 }}</h3>
                                    <p>
                                        <strong>{{ rand(15, 30) }} Articles</strong>
                                    </p>
                                    <p>
                                        <a href="#">Edit</a> | <a href="#">Delete</a>
                                    </p>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr />

        <div class="container" id="view-feed">
            <div class="row">
                <div class="col-12">
                    <h1>View Feed: La Repubblica</h1>
                    <p>Display a list of articles from a feed.</p>
                    <div class="row">
                        <div class="col-12>
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                            {!! $articleSample !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </body>
</html>