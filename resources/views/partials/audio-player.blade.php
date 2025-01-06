<div class="audio-player">
    <div class="controls">
        <button class="control-btn" id="like-btn" title="Лайк"><i class="fa fa-heart"></i></button>
        <button class="control-btn" id="volume-btn" title="Звук"><i class="fa fa-volume-up"></i></button>
        <button class="control-btn" id="prev-btn" title="Предыдущий"><i class="fa fa-step-backward"></i></button>
        <button class="control-btn" id="play-pause-btn" title="Плей/Пауза"><i class="fa fa-play"></i></button>
        <button class="control-btn" id="next-btn" title="Следующий"><i class="fa fa-step-forward"></i></button>
        <button class="control-btn" id="repeat-btn" title="Повтор"><i class="fa fa-redo"></i></button>
        <button class="control-btn" id="shuffle-btn" title="Перемешать"><i class="fa fa-random"></i></button>
    </div>
    <div class="progress-bar">
        <span id="current-time">0:00</span>
        <input type="range" id="progress" value="0" max="100">
        <span id="duration">0:00</span>
    </div>
    <audio id="audio" src="" preload="metadata"></audio>
</div>
