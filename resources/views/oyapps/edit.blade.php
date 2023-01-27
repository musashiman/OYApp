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
           <h1 class="title">編集画面</h1>
                <div class="content">
                    <form action="/oyapps/{{ $oyapp->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class='content__body'>
                            <h2>タイトル</h2>
                            <input type='text' name='oyapp[body]' value="{{old( 'oyapp->body') }}">
                        </div>
                        <div class='content__image_path'>
                            <h2>本文</h2>
                            <input type='text' name='oyapp[image_path]' value="{{old ('oyapp->image_path') }}">
                        </div>
                        <input type="submit" value="保存">
                    </form>
                </div>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        
        </div>
        
        {{Auth::user()->name }}
        
      
        </x-app-layout>
    </body>
</html>
