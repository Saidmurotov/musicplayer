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


const uploadBtn = document.getElementById('upload-btn');
const popup = document.getElementById('popup');
const closePopupBtn = document.getElementById('close-popup');
const songForm = document.getElementById('song-form');

uploadBtn.addEventListener('click', () => {
    popup.style.display = 'flex';
});

closePopupBtn.addEventListener('click', () => {
    popup.style.display = 'none';
});

songForm.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log('Название песни:', document.getElementById('song-name').value);
    console.log('Исполнитель:', document.getElementById('song-artist').value);
    popup.style.display = 'none';
});

function showDeletePopup(actionUrl) {
    const deleteForm = document.getElementById('delete-form');
    deleteForm.action = actionUrl; // Set the form's action attribute
    document.getElementById('delete-popup').style.display = 'block'; // Show the popup
}

// Function to hide the delete popup
function hideDeletePopup() {
    document.getElementById('delete-popup').style.display = 'none'; // Hide the popup
}
