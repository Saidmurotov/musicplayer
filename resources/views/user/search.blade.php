@extends('layouts.app')

@section('title', 'Search Music')

@section('content')
    <div class="content-start">
        <div class="content_header">
            <div class="content_header-start">
                <div class="search-container">
                    <form action="{{ route('music.search') }}" method="GET">
                        <input type="text" name="query" id="search" placeholder="Search..." value="{{ request('query') }}">
                        <button type="submit" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content_playlist">
            <div class="content_playlist-songs" id="song-list">
                <div class="ranked-list">
                    @if($musics->isEmpty())
                        <p>No results found for "{{ request('query') }}".</p>
                    @else
                        @foreach($musics as $music)
                            <div class="ranked-list__item">
                                <div class="ranked-list__title">{{ $music->name }}</div>
                                <div class="ranked-list__artist">{{ $music->artist }}</div>
                                <audio controls>
                                    <source src="{{ asset('storage/' . $music->file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
