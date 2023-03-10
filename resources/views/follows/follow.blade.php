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
        <h1>フォローするならこちら</h1>
        @foreach($users as $user)
            <div>
                <p>{{$user->name}}</p>
                <form action="{{route('follow',$user->id)}}" method="POST">
                    @csrf
                    <button type="submit">フォローする</button>
                </form><!--ここにweb.phpを通じたルーティングとデリート部分の作成を行う。-->
            </div>
        @endforeach
        <div class="follow_function">
            
        </div>
            
        <h1>フォローしている人</h1><br>
        <div class="followers">
            <p>ここにフォロワーのリストを作る</p>
            <ul style="list-style: none;">
                @foreach($followers as $follower)
                  <li>{{$follower->name}}</li>
                @endforeach
            </ul>
        </div>
        
        
       </x-app-layout>
    </body>
</html>
