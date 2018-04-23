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
            
            a {
                text-decoration: none;
                text-align: center;
            }

            a:hover {
                font-weight: bold;
                color: #ba9400;
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
    
            table {
                width: 100%;
            }
            table tr {
                background-color: #dddddd;
            }

            table td {
                background-color: #efefef;
                padding-right: 5px;
            }

            #userList, #textList {
                text-align: left;
                margin-top: 30px;
                padding: 10px;

            }

        </style>
    </head>

    <body>