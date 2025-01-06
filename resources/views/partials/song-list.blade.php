<div class="ranked-list">
    @foreach($musics as $index => $music)
        <div class="ranked-list__item" onclick="playMusic('{{ $music->file ? asset('storage/' . $music->file) : '' }}')">
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
                            <i class="fa-solid fa-heart-broken"></i> Dislike
                        </button>
                    </form>
                @else
                    <!-- Like Button -->
                    <form action="{{ route('music.like', $music->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="ranked-list__like">
                            <i class="fa-solid fa-heart"></i> Like
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

<!-- Аудиоплеер -->
<audio id="audioPlayer" controls style="display: none;"></audio>

<script>
    const audioPlayer = document.getElementById('audioPlayer');

    function playMusic(fileUrl) {
        if (!fileUrl) {
            alert('Музыкальный файл не найден!');
            return;
        }

        // Устанавливаем источник аудио
        audioPlayer.src = fileUrl;

        // Воспроизводим аудио
        audioPlayer.play();

        // Отображаем плеер (опционально)
        audioPlayer.style.display = 'block';
    }

    const audio = document.getElementById("audio");
    const playPauseButton = document.getElementById("play-pause");
    const progressBar = document.getElementById("progress");
    const currentTimeSpan = document.getElementById("current-time");
    const durationSpan = document.getElementById("duration");

    playPauseButton.addEventListener("click", () => {
        if (audio.paused) {
            audio.play();
            playPauseButton.innerHTML = '<i class="fa fa-pause"></i>';
        } else {
            audio.pause();
            playPauseButton.innerHTML = '<i class="fa fa-play"></i>';
        }
    });

    audio.addEventListener("loadeddata", () => {
        durationSpan.textContent = formatTime(audio.duration);
    });

    audio.addEventListener("timeupdate", () => {
        const currentTime = audio.currentTime;
        progressBar.value = (currentTime / audio.duration) * 100;
        currentTimeSpan.textContent = formatTime(currentTime);
    });

    progressBar.addEventListener("input", () => {
        const duration = audio.duration;
        audio.currentTime = (progressBar.value / 100) * duration;
    });

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? "0" : ""}${secs}`;
    }

</script>
