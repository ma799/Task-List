<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11</title>
    <style>
    /* .form-error{
    color: #8b0000;
    font-size: .8rem;
    margin-top: 5px;
    }
    a {
        color: #4CAF50;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 10px;
    }
    .flash-message {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #4caf50;
        color: white;
        text-align: center;
        padding: 0px;
        z-index: 1000;
    } */

    </style>
        @yield('style')
          @vite('resources/css/app.css')
        <nav style="background-color: #333; padding: 10px; color: white;margin-bottom: 20px;border-bottom: 3px solid #ccc;">
        <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
            <li><a href="{{ route('tasks.index') }}" style="color: white; text-decoration: none;">Tasks</a></li>
            <li><a href="{{ route('tasks.create') }}" style="color: white; text-decoration: none;">Create Task</a></li>
        </ul>
    </nav>
</head>
<body >
<section class="max-w-2xl mx-auto">
    @if(session('success'))
    <div  style=" top: 0; left: 0;
        width: 100%; background-color: #4caf50; color: white;
        text-align: center; padding: 5px; z-index: 1000;">
            <p>{{ session('success') }}</p>
    </div>
    @endif
<h1 class="text-2xl mb-4 ">@yield('title')</h1>


@yield('content')
</section>
</body>
</html>
