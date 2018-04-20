<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GoySpace</title>

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
                <div id="form">
                    <form action="" method="POST">
                        <input type="text" name="login" value="{{ $login }}" required>
                        <input type="password" name="pass" value="{{ $pass }}" required>
                        <button>Login</button>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
