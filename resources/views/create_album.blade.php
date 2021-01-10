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
                            <h6 class="m-0 font-weight-bold text-primary">Create Album</h6>
                        </div>
                        <div class="card-body">
                            <form name="myForm" method="POST" action="{{route('create.album')}}" onsubmit="return validateForm()" enctype="multipart/form-data" style="margin: auto; color: black;">
                                @csrf
                                <div class="form-group">
                                    <strong for="name" class="col-md-0 col-form-label">{{ __('Name :') }}</strong>
                                    <input id="name " type="text" class="form-control" name="name">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Create Album') }}</button>
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
    <script>
        function validateForm() {
            var title = document.forms["myForm"]["name"].value;
            var check = 0;
            if (title == "") {
                alert("Name Invalid");
                check = 1;
            }

            var albums = <?php echo json_encode($albums); ?>;

            albums.forEach(element => {
                if (element['name'] == title) {
                    alert("Name Names have been duplicated");
                    check = 1;
                }
            });
            if (check == 1) {
                return false;
            }
        }
    </script>
</body>

</html>