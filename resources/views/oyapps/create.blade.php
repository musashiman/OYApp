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
            <h1>Create</h1>
        
            <form class="form" action="/oyapps" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="body">
                    <h2>body</h2>
                    <input name="oyapp[body]" type="text" placeholder="モデルのbodyカラム部分" value="{{old('oyapp.body')}}"/><br>
                    <p class="title_error" style="color:red">{{$errors->first("oyapp.body")}}</p>
                </div>
                <div class="image_path">
                    <h2>image_path</h2>
                    <input name="image_path" type="file" >
                    <p class="body_error" style="color:red">{{$errors->first("oyapp.image_path")}}</p>
                </div>
                
                <input type="submit" value="作成"/>
            </form>
            
            <div class="footer">
                [<a href="/">戻る</a>]
            </div>
        
        </div>
        
        <p>ログインユーザー：{{Auth::user()->name }}</p>
        
      
        </x-app-layout>
    </body>
</html>
