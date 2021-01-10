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
                            <h6 class="m-0 font-weight-bold text-primary">My Album</h6>
                        </div>
                        <div class="card-body">
                            @if(session('session'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="font-size:20px">×</span>
                                </button>
                                <p>{{session('session')}}</p>
                            </div>
                            @endif
                            <div class="md-form mt-0 search">
                                <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" placeholder="Search ...." aria-label="Search">
                            </div>

                            <div class=" select-div">
                                Count:
                                <select class="form-control select" name="state" id="maxRows">
                                    <option value="5" selected="selected">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div style="clear:both"></div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover" id="table-id" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th width="5%">STT</th> -->
                                            <th width="30%">Name</th>
                                            <th width="10%">Files</th>
                                            <th width="10%">Size</th>
                                            <th width="20%">Created At</th>
                                            <th width="20%">Updated At</th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @foreach($albums as $album)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <a href="{{route('video.album', ['id'=>$album->id])}}">
                                                        <div class="col">
                                                            <h6>{{$album->name}}</h6>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{$album->count_file}}</td>
                                            <td>{{$album->size}} MB</td>
                                            <td>{{$album->created_at}}</td>
                                            <td>{{$album->updated_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{route('edit.album', ['id'=>$album->id])}}" class="col-6">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{route('delete.album', ['id'=>$album->id])}}" class="col-6">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class='pagination-container '>
                                    <nav>
                                        <ul class="pagination">
                                            <li data-page="prev" class="page-item">
                                                <span class="page-link"> 
                                                    < <span class="sr-only">(current)
                                                </span></span>
                                            </li>
                                            <!--	Here the JS Function Will Add the Rows -->
                                            <li data-page="next" id="prev" class="page-item">
                                                <span class="page-link"> > <span class="sr-only">(current)</span></span>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
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
    <script src="<?php echo url('/'); ?>/js/custom-table.js"></script>
</body>

</html>