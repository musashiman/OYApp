<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       
    </head>
    <body class="antialiased">
        <x-app-layout>
            <x-slot name="header">
                <h1>Header</h1>
            </x-slot>
        <div class='oyapps'>
            @foreach ($oyapps as $oyapp)
            <div class='oyapp'>
                <p class='body'>{{$oyapp->body}}</p>
                <p class="image">{{$oyapp->image}}</p>
            </div>
            @endforeach
        </div>
        
        {{Auth::user()->name }}
        </x-app-layout>
    </body>
</html>
