<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo asset('css/app.css'); ?>" rel="stylesheet">

    <title>Rss Feed Reader</title>

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

<div id="app">
<view-feeds></view-feeds>
    <hr />
</div>

<script src="<?php echo asset('js/app.js'); ?>"></script>
</body>
</html>
