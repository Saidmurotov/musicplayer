<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
<div class="wrapper">
    @include('partials.navigation')

    <div class="content">
        @yield('content')
    </div>

    @include('partials.audio-player')

    @include('partials.popup')
    @include('partials.delete-popup')
    @include('partials.messages')
</div>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>
