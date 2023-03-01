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
                    <form action="/oyapps/{{ $oyapp->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='body'>
                            <h2>Body</h2>
                            <input type='text' name='oyapp[body]'  value="{{$oyapp->body}}">
                            <p class="title_error" style="color:red">{{$errors->first("oyapp.body")}}</p>
                        </div>
                        <div class='image_path'>
                            <h2>Image</h2>
                            <input name="oyapp[image_path]" type="file"　value="{{$oyapp->image_path}}" />
                            <p class="body_error" style="color:red">{{$errors->first("oyapp.image_path")}}</p>
                        </div>
                        <input type="submit" value="保存">
                    </form>
                </div>
            
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        
        </div>
        <br/>
        <p>ログインユーザー：{{Auth::user()->name }}</p>
        
      
        </x-app-layout>
    </body>
</html>
