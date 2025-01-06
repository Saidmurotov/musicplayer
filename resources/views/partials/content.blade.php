<div class="content-start">
    <div class="content_header">
        <div class="content_header-start">
            <div class="content_header-left">
                <div class="content_header-verify">
                    <img src="{{ asset('img/verify.png') }}" alt="verify">
                    <p>Qo'shiqchi</p>
                </div>
                <h1>Miyagi & Andy Panda</h1>
                <p><span>1,200,000</span> Monthly listeners </p>
            </div>
            <div class="content_header-right">
                <button>Play</button>
                <button class="save">Save</button>
            </div>
        </div>
    </div>
    <div class="content_playlist">
        <div class="content_playlist-songs" id="song-list">
            @include('partials.song-list')
        </div>
    </div>
</div>
