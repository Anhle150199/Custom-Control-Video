
    $(document).ready(function() {
        $("#my_video").allofthelights();
    });

    const skipButtons = document.querySelectorAll('[data-skip]');
    var vid, playbtn, seekslider, cur_time_text, dur_time_text, mutebtn, volumeslider, btnfullscreen, speed, value_speed;

    function intializePlayer() {
        vid = document.getElementById("my_video");
        playbtn = document.getElementById("btn-play-pause");
        seekslider = document.getElementById("seekslider");
        cur_time_text = document.getElementById("cur_time_text");
        dur_time_text = document.getElementById("dur_time_text");
        mutebtn = document.getElementById("btn-mute");
        volumeslider = document.getElementById("volume-slider");
        btnfullscreen = document.getElementById("btn-full-screen");
        value_speed = document.getElementById("value_speed")

        // add event
        vid.addEventListener("click", playPause, false);
        playbtn.addEventListener("click", playPause, false);
        seekslider.addEventListener("change", vidSeek, false);
        vid.addEventListener("timeupdate", seekTimeUpdate, false);
        mutebtn.addEventListener("click", vidMute, false);
        volumeslider.addEventListener("change", volume, false);
        btnfullscreen.addEventListener("click", fullScreen, false);
    }
    window.onload = intializePlayer;

    function playPause() {
        if (vid.paused) {
            vid.play();
            playbtn.innerHTML = '<i class="fas fa-pause-circle text-white icon" ></i>'
        } else {
            vid.pause();
            playbtn.innerHTML = '<i class="fas fa-play-circle text-white icon" ></i>'
        }
    }

    function vidSeek() {
        var seekto = vid.duration * (seekslider.value / 100);
        vid.currentTime = seekto;
    }

    function seekTimeUpdate() {
        var time = vid.currentTime * (100 / vid.duration);
        seekslider.value = time;
        var curmins = Math.floor(vid.currentTime / 60);
        var cursecs = Math.floor(vid.currentTime - curmins * 60);
        var durmins = Math.floor(vid.duration / 60);
        var dursecs = Math.floor(vid.duration - durmins * 60);
        if (cursecs < 10) {
            cursecs = "0" + cursecs;
        }
        if (dursecs < 10) {
            dursecs = "0" + dursecs;
        }
        if (curmins < 10) {
            curmins = "0" + curmins;
        }
        if (durmins < 10) {
            durmins = "0" + durmins;
        }
        cur_time_text.innerHTML = curmins + ":" + cursecs;
        dur_time_text.innerHTML = durmins + ":" + dursecs;
        if (vid.currentTime == vid.duration) {
            playbtn.innerHTML = '<i class="fas fa-play-circle text-white icon" ></i>'
        }
    }

    function vidMute() {
        if (vid.muted) {
            vid.muted = false;
            mutebtn.innerHTML = '<i class="fas fa-volume-up text-white icon" ></i>'
        } else {
            vid.muted = true;
            mutebtn.innerHTML = '<i class="fas fa-volume-mute text-white icon" ></i>'
        }
    }

    function volume() {
        vid.volume = volumeslider.value / 100;
    }

    function fullScreen() {
        if (vid.requestFullScreen) {
            vid.requestFullScreen();
        } else if (vid.webkitRequestFullScreen) {
            vid.webkitRequestFullScreen();
        } else if (vid.mozRequestFullScreen) {
            vid.mozRequestFullScreen();
        } else if (elem.msRequestFullscreen) {
            vid.msRequestFullscreen();
        }
    }

    function setPlaySpeed(val) {
        vid.playbackRate = val;
        value_speed.innerHTML = val + "x"
    }

    skipButtons.forEach(button => button.addEventListener('click', skip));

    function skip() {
        vid.currentTime += parseFloat(this.dataset.skip);
    }