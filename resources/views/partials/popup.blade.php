<div class="popup" id="popup" style="display: none;">
    <div class="popup-content">
        <h2 class="popup-title">Add Music</h2>
        <form id="music-form" class="music-form song-form" action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="music-name" class="form-label">Music Name</label>
                <input type="text" name="name" id="music-name" class="form-input" placeholder="Enter music name" required>
            </div>
            <div class="form-group">
                <label for="music-artist" class="form-label">Artist</label>
                <input type="text" name="artist" id="music-artist" class="form-input" placeholder="Enter artist name" required>
            </div>
            <div class="form-group">
                <label for="music-file" class="form-label">Upload File</label>
                <input type="file" name="file" id="music-file" class="form-input" required>
            </div>
            <button type="submit" class="submit-btn">Add</button>
            <button type="button" id="close-popup" class="close-popup-btn" onclick="hidePopup()">Close</button>
        </form>
    </div>
</div>
