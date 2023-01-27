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
                <h2 class="body">
                    <a href="/oyapps/{{$oyapp->id}}">{{$oyapp->body}}</a>
                </h2>
                <p class="image">{{$oyapp->image_path}}</p>
                <p class="date">{{$oyapp->date}}</p>
                <form action="/oyapps/{{$oyapp->id}}" id="form_{{$oyapp->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="button" onclick="deeltePost({{$oyapp->id}})">delete</button>
                </form>
            </div>
            @endforeach
        </div>
        
        {{Auth::user()->name }}
        
        <script>
            function deletePost(id){
                "use strict"
                
                if(confirm("本当にいいですか？")){
                    document.getElementById("form_${id}").submit();
                }
            }
        </script>
        </x-app-layout>
    </body>
</html>
