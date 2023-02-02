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
            
            <div class="edit">
                <a href="/oyapps/{{$oyapp->id}}/edit">edit</a>
            </div>
 
            <h1 class="body">
                {{ $oyapp->body }}
            </h1>
          
            <div class="date__oyapp">
                <h3>本文</h3>
                <p>{{ $oyapp->date }}</p>    
            </div>
            
            @if($oyapp->image_path)
            <div class="image_path">
                <img src="{{$oyapp->image_path}}" alt="画像が読み取れません。"/>
            </div>
            @endif
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>
        
        <p>ログインユーザー：{{Auth::user()->name }}</p>
        
      
        </x-app-layout>
    </body>
</html>
