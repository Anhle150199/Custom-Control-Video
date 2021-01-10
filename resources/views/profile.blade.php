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
                            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                        </div>
                        <div class="card-body">

                            <form name="myForm" method="POST" action="{{route('edit.profile')}}" onsubmit="return validateForm()" style="margin: auto; color: black;">
                                @csrf
                                <div class="form-group">
                                    <strong for="name" class="col-md-0 col-form-label">{{ __('Name :') }}</strong>
                                    <input id="name " type="text" class="form-control" name="name" value="{{$user->name}}" require>
                                </div>

                                <div class="form-group">
                                    <strong for="email" class="col-md-0 col-form-label">{{ __('Email :') }}</strong>
                                    <input id="email" class="form-control " name="email" value="{{$user->email}}"></input>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Upload') }}</button>
                            </form>
                            <form name="myPass" method="POST" action="{{route('change.password')}}" onsubmit="return validatePass()" style="margin: auto; color: black;">
                                @csrf
                                <div class="form-group">
                                    <strong for="password" class="col-md-0 col-form-label">{{ __('New Password :') }}</strong>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <strong for="password_confirm" class="col-md-0 col-form-label">{{ __('Re-password :') }}</strong>
                                    <input id="password_confirm" type="password" class="form-control" name="password_confirm" placeholder="Confirm Password" required autocomplete="new-password">
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Change Password') }}</button>
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
            var name = document.forms["myForm"]["name"].value;
            if (name == "") {
                alert("Name invalid");
                return false;
            }
            var email = document.forms["myForm"]["email"].value;
            if (email == "") {
                alert("Email Invalid");
                return false;
            }
            if (email.length > 500) {
                alert("Email must not exceed 500 characters");
                return false;
            }
            if (name.length > 100) {
                alert("Name must not exceed 100 characters");
                return false;
            }
            var users = <?php echo json_encode($users); ?>;
            var userEmail = <?php echo json_encode($user->email); ?>;
            var check = 0;
            if (email != userEmail) {
                users.forEach(element => {
                    if (element['email'] == email) {
                        alert("Email have been duplicated");
                        check = 1;
                    }
                });
            }
            if (check == 1) {
                return false;
            }
        }

        function validatePass(){
            var password = document.forms["myPass"]["password"].value;
            var rePassword = document.forms["myPass"]["password_confirm"].value;
            if(password != rePassword){
                alert("Re-Password does not match Password");
                return false;
            }
        }
    </script>
</body>

</html>