<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            
            .oyapps{
                display:flex;
                
            }
            .oyapp{
                border: 1px solid #333;
                margin:10px 5px;
            }
        </style>
       
    </head>
    <body class="antialiased">
        <x-app-layout>
            <x-slot name="header">
                <h1>Header</h1>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </x-slot>
            
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="/oyapps/create" >日記作成</a>
            </h2>
            </br>
            <div class='oyapps'>
                @foreach ($oyapps as $oyapp)
                    @if( $oyapp->user_id == Auth::id())
                        <div class='oyapp ' >
                            <h1 class="body">
                                <a href="/oyapps/{{$oyapp->id}}">{{$oyapp->body}}</a>
                            </h1>
                            @if($oyapp->image_path== true)
                                <img src="{{$oyapp->image_path}}" width="200" height="200" alt="写真がないよ。"/>
                            @endif
                            <p class="date">{{$oyapp->date}}</p>
                            <form action="/oyapps/{{$oyapp->id}}" id="form_{{$oyapp->id}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="button" onclick="deletePost({{$oyapp->id}})">delete</button>
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>
        
        
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/follows/follow">誰かをフォローする</a>
        </h2>
      
        
        <h2>ログインユーザー：{{Auth::user()->name }}</h2>
        
        </x-app-layout>
        <script>
            function deletePost(id){
                "use strict"
                
                if(confirm("本当にいいですか？\n本当に削除する？")){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
