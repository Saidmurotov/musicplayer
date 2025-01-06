@extends('layouts.app')

@section('content')
    <div class="content-start">
        <div class="content_header">
            <div class="content_header-start">
                <div class="content_header-left">
                    <div class="content_header-verify">

                    </div>
                    <h1>Sulaymon ohanglari</h1>
{{--                    <p>Jami <span>{{ $sum }}</span> ta musiqalar</p>--}}
                </div>
                <div class="content_header-right">
                    <button>
                        Play
{{--                        {{ $musics->first()->name }}--}}
                    </button>
                </div>
            </div>
        </div>
        <div class="content_playlist">
            <div class="content_playlist-list">

            </div>
            <div class="content_playlist-songs" id="song-list">
                @include('partials.song-list')
            </div>
        </div>
    </div>

@endsection
