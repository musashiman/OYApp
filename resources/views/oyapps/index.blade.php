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
            <a href="/oyapps/create">create</a>
            
            @foreach ($oyapps as $oyapp)
            <div class='oyapp'>
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
            @endforeach
        </div>
        
        <div class="d-flex justify-content-end flex-grow-1">
           @if (Auth::user()->isFollowing($user->id))
               <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}

                   <button type="submit" class="btn btn-danger">フォロー解除</button>
               </form>
            @else
               <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                   {{ csrf_field() }}

                   <button type="submit" class="btn btn-primary">フォローする</button>
               </form>
            @endif
        </div>
        
        <p>ログインユーザー：{{Auth::user()->name }}</p>
        
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
