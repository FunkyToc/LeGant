<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('image/gant_icon.png') }}">

        <title>LeGant</title>

        <!-- Styles -->
        <link href="{{ asset('css/public_style.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: {{ $bgcolor }};
            }
        </style>

    </head>

    <body>
        <a href="{{ route('redglove') }}">
            <div class="full-page">
                <div class="">
                    <div class="title top-left">
                        Le Gant Rouge
                    </div>
                </div>
            </div>
        </a>

        <audio id="gant" hidden>
            <source src="{{ asset('sound/gant.mp3') }}" type="audio/mpeg">
        </audio>

        <script src="{{ asset('js/public_script.js') }}"></script>

    </body>

</html>
