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
                color: #636b6f;
                font-family: 'Poiret One', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                padding: 10px;
            }

            .full-page {
                height: 100vh;
                width: 100vw;
            }

            .title {
                font-size: 50px;
                color: #636b6f;
                font-style: italic; 
                text-decoration: none !important;
            }

            a:hover, a:focus {
                text-decoration: none !important;
            }

            a:onclick {
                color : black;
            }

        </style>
    </head>

    <body>
        <div class="full-page">

            <div class="">
                <div class="title">
                    Espace Goy
                </div>
                @include('admin/admin-menu')
            </div>

            <div id="userList">
                <ul>
                    <li>User1</li>
                    <li>User2</li>
                </ul>
            </div>

            <div id="textList">
                <div id="hello">
                    <ul>
                        <li>Hello1</li>
                        <li>Hello2</li>
                    </ul>
                </div>
                <div id="text">
                    <ul>
                        <li>text1</li>
                        <li>text2</li>
                    </ul>
                </div>
                <div id="bye">
                    <ul>
                        <li>bye1</li>
                        <li>bye2</li>
                    </ul>
                </div>
            </div>

        </div>
    </body>

</html>
