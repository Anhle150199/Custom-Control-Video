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
                            <i class="fas fa-lightbulb text-primary icon btn-custom"></i>
                        </li>
                    </ul>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <form name="myForm" method="POST" action="{{route('post.edit.video')}}" onsubmit="return validateForm()" style="margin: auto; color: black;">
                                @csrf
                                <input type="text" id="id" name="id" value="{{$video->id}}" hidden>
                                <div class="form-group">
                                    <strong for="title" class="col-md-0 col-form-label">{{ __('Title :') }}</strong>
                                    <input id="title " type="text" class="form-control" name="title" value ="{{$video['title']}}">
                                </div>

                                <div class="form-group">
                                    <strong for="summary" class="col-md-0 col-form-label">{{ __('Summary :') }}</strong>
                                    <textarea id="summary" class="form-control " name="summary" >{{$video->summary}}</textarea>
                                </div>

                                <div class="form-group">
                                    <strong for="album" class="col-md-0 col-form-label ">{{ __('Album :') }}</strong>
                                    <select class="browser-default custom-select" id="album" name="album">
                                        <option value="1">Select Album</option>
                                        @foreach($albums as $album)
                                        @if($album->id == $video->album_id)
                                        <option value="{{$album->id}}" selected>{{$album->name}}</option>
                                        @else
                                        <option value="{{$album->id}}">{{$album->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Update') }}</button>
                            </form>
                        </div>
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
    <script>
        function validateForm() {
            var title = document.forms["myForm"]["title"].value;
            if (title == "") {
                alert("Title invalid");
                return false;
            }
            var video = document.forms["myForm"]["video"].value;
            if (video == "") {
                alert("Video Invalid");
                return false;
            }
            if (summary.length > 1000) {
                alert("summary must not exceed 1000 characters");
                return false;
            }
            if (title.length > 200) {
                alert("title must not exceed 200 characters");
                return false;
            }
        }

    </script>
</body>

</html>