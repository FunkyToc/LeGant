<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LeGant</title>

        <!-- Styles -->
        <style>

            html, body {
                color: {{ $bgcolor }};
            }

        </style>
    </head>

    <body>
        <div>
            {{ $hello }},
            <p>{{ $text }}</p>
            <p>{{ $bye }}</p>
        </div>
    </body>

</html>
