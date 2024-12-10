@extends('layouts.app')

@section('content')
    <div class="content-start">
        <div class="content_header">
            <div class="content_header-start">
                <div class="content_header-left">
                    <div class="content_header-verify">
                        <img src="{{ asset('img/verify.png') }}" alt="verify">
                        <p>Sevimli musiqa</p>
                    </div>
                    <p><span>{{ $sum }}</span> ta sevimli musiqalar</p>
                </div>
                <div class="content_header-right">
                    <button>Play</button>
                </div>
            </div>
        </div>
        <div class="content_playlist">
            <div class="content_playlist-songs" id="song-list">
                @include('partials.song-list')
            </div>
        </div>
    </div>

@endsection
