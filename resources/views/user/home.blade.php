@extends('layouts.app')

@section('content')
    <div class="content-start">
        <div class="content_header">
            <div class="content_header-start">
                <div class="content_header-left">
                    <div class="content_header-verify">
                        <img src="{{ asset('img/verify.png') }}" alt="verify">
                        <p>Qo'shiqchi</p>
                    </div>
                    <h1>Jalol ohanglari</h1>
                    <p>Jami <span>{{ $sum }}</span> ta musiqalar</p>
                </div>
                <div class="content_header-right">
                    <button>
                        Play
                        {{ $musics->first()->name }}
                    </button>
                </div>
            </div>
        </div>
        <div class="content_playlist">
            <div class="content_playlist-list">
                <ul>
                    <li class="active">All Songs</li>
                    <li>Popular</li>
                    <li>Albums</li>
                    <li>Singles</li>
                </ul>
            </div>
            <div class="content_playlist-songs" id="song-list">
                @include('partials.song-list')
            </div>
        </div>
    </div>

@endsection
