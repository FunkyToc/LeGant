<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LeGant</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

        <!-- Styles -->
        <style>

            html, body {
                background-color: {{ $bgcolor }};
                color: #636b6f;
                font-family: 'Poiret One', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                padding: 0;
            }

            .full-page {
                height: 100vh;
                width: 100vw;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .title {
                font-size: 50px;
                color: #636b6f;
                font-style: italic; 
                text-decoration: none !important;
            }

            a:hover, a:focus {
                color: {{ $bgcolor }};
                text-decoration: none !important;
            }

            a:onclick {
                color : black;
            }

        </style>
    </head>

    <body>
        <a href="#">
            <div class="full-page">
                <div class="">
                    <div class="title top-left">
                        Le Gant Rouge
                    </div>
                </div>
            </div>
        </a>
    </body>

</html>
