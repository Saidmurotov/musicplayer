<div class="ranked-list">
    @foreach($musics as $index => $music)
        <div class="ranked-list__item">
            <div class="ranked-list__rank">#{{ $index + 1 }}</div>
            <div class="ranked_item-img">
                <div class="img">
                    <img src="{{ $music->file ? asset('storage/' . $music->file) : 'https://via.placeholder.com/150' }}"
                         alt="{{ $music->name }}"
                         class="ranked-list__avatar">
                </div>
                <div class="ranked-list__title">{{ $music->name }}</div>
            </div>
            <div class="ranked-list__content">
                <div class="ranked-list__artist">{{ $music->artist }}</div>
            </div>
            <span class="ranked-list__duration">3:45</span>
            <div class="ranked-list__meta">
                @if(auth()->user()->likedMusicItems->contains($music->id))
                    <!-- Dislike Button -->
                    <form action="{{ route('music.unlike', $music->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ranked-list__dislike">
                            <i class="fa-solid fa-heart-broken"></i> 
                        </button>
                    </form>
                @else
                    <!-- Like Button -->
                    <form action="{{ route('music.like', $music->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="ranked-list__like">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </form>
                @endif
            </div>
            @if($music->user_id === auth()->id())
                <div class="menu_ranked">
                    <form action="{{ route('music.destroy', $music->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ranked-list__delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            @endif
            @role('admin')
                <div class="menu_ranked">
                    <form action="{{ route('music.destroy', $music->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ranked-list__delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            @endrole
        </div>
    @endforeach
</div>
