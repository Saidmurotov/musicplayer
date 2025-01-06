<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<div class="wrapper">

    <div class="content">
        @yield('content')
    </div>
    @include('partials.navigation')

    @auth
        @include('partials.audio-player')
        @include('partials.popup')
        @include('partials.delete-popup')
    @endauth
    @include('partials.messages')
</div>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>
