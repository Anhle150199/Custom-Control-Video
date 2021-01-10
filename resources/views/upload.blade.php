@include('layouts.elements.head')

<body id="page-top">
    <div id="wrapper">

        @include('layouts.elements.slidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('layouts.elements.topbar')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Up load</h6>
                        </div>
                        <div class="card-body">
                            <form name="myForm" method="POST" action="{{route('upload')}}" onsubmit="return validateForm()" enctype="multipart/form-data" style="margin: auto; color: black;">
                                @csrf
                                <div class="form-group">
                                    <strong for="title" class="col-md-0 col-form-label">{{ __('Title :') }}</strong>
                                    <input id="title " type="text" class="form-control" name="title" require>
                                </div>

                                <div class="form-group">
                                    <strong for="summary" class="col-md-0 col-form-label">{{ __('Summary :') }}</strong>
                                    <textarea id="summary" class="form-control " name="summary"></textarea>
                                </div>

                                <div class="form-group">
                                    <strong for="album" class="col-md-0 col-form-label ">{{ __('Album :') }}</strong>
                                    <select class="browser-default custom-select" id="album" name="album">
                                        <option value="1">Select Album</option>
                                        @foreach($albums as $album)
                                        <option value="{{$album->id}}">{{$album->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <strong for="video" class="col-md-0 col-form-label">{{ __('Video') }}</strong>
                                    <input id="video" type="file" name="video" onchange="return fileValidation()" style="margin-left: 5%;" require/>
                                    <div id="imagePreview"></div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Upload') }}</button>
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo url('/'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/sb-admin-2.min.js"></script>
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

        function fileValidation() {
            var fileInput = document.getElementById('video');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.MP4|\.WebM|\.Ogg)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Your file must have a .MP4 / .WebM / .Ogg extension.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var fileSize = fileInput.files[0].size;
                    if (fileSize > 41943040) {
                        alert('Your file size should not be larger than 40MB');
                        fileInput.value = '';
                        return false;
                    }
                }
            }
        }
    </script>
</body>

</html>