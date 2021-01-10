@include('layouts.elements.head')

<body id="page-top">
    <div id="wrapper">

        @include('layouts.elements.slidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('layouts.elements.topbar')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">

                        <div class="player bg" id="video">

                            <video class="video player__video viewer" id="my_video">
                                <source src="<?php echo url("/"); ?>/videos/{{$video->video}}">
                            </video>

                            <div class="player__controls">
                                <!-- time -->
                                <div class="progress text-white" style="background: white;">
                                    <input type="range" id="seekslider" class="text-white" min="0" max="100" value="0" step="0.1" style=" width: 100%;">
                                </div>
                                <!-- playPause -->
                                <button class="player__button toggle rounded-circle border-0" title="Toggle Play" id="btn-play-pause"><i class="fas fa-play-circle text-white  icon "></i></button>
                                <!-- volume -->
                                <button id="btn-mute" class="player__button" href="#"><i class="fas fa-volume-up text-white  icon "></i></button>
                                <div class=" text-white" style="max-width: 12%">
                                    <input type="range" id="volume-slider" class="player__slider" min="0" max="100" value="100" step="1" style="color: white;width: 85%;">
                                </div>
                                <!-- time/time -->
                                <div class="tur" style="max-width: 8%;">
                                    <span id="cur_time_text">00:00</span> /
                                    <span id="dur_time_text">00:00</span>
                                </div>
                                <!-- tua -->
                                <div class="tur">
                                    <button data-skip="-10" class="player__button">«10s</button>
                                    <button data-skip="10" class="player__button">10s»</button>
                                </div>
                                <!-- changeSpeed -->
                                <div class="dropdown-custom">
                                    <span class="text_control"> <i class="fas fa-fw fa-cog text_control"></i>Speed:</span>
                                    <span id="value_speed">1x</span>
                                    <div class="dropdown-content">
                                        <button class="speed_button" onclick="setPlaySpeed(0.25)">0.25</button>
                                        <button class="speed_button" onclick="setPlaySpeed(0.5)">0.5</button>
                                        <button class="speed_button" onclick="setPlaySpeed(0.75)">0.75</button>
                                        <button class="speed_button" onclick="setPlaySpeed(1)">1</button>
                                        <button class="speed_button" onclick="setPlaySpeed(1.5)">1.5</button>
                                        <button class="speed_button" onclick="setPlaySpeed(2)"> 2</button>
                                    </div>
                                </div>
                                <!-- fullScreen -->
                                <button id="btn-full-screen" class="player__button"><i class="fas fa-expand-arrows-alt text-white icon"></i></button>
                            </div>
                        </div>
                    </div>
                    <ul class="nav justify-content-center margin">
                        <li class="nav-item" id="switch">
                            <span>Tắt đèn: </span>
                            <i  class="fas fa-lightbulb text-primary icon btn-custom"></i>
                        </li>
                    </ul>
                    <div class="card shadow mb-4 content_text">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">{{$video->title}}</h6>
                        </div>
                        <p>{{$video->summary}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo url('/'); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo url('/'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo url('/'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/sb-admin-2.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/jquery.allofthelights.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/showVideo.js"></script>
</body>

</html>