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
                            <h6 class="m-0 font-weight-bold text-primary">Album: {{$album->name}}</h6>
                        </div>
                        <div class="card-body">
                            <div class="md-form mt-0 search">
                                <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" placeholder="Search ...." aria-label="Search">
                            </div>

                            <div class=" select-div row">
                                <div class="col-6">
                                    <span style="float: right;">Count:</span>
                                </div>
                                <div class="col-6">
                                    <select class="form-control " name="state" id="maxRows">
                                        <option value="5" selected="selected">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-hover" id="table-id" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th width="5%">STT</th> -->
                                            <th width="60%">Video</th>
                                            <th width="20%">Created At</th>
                                            <th width="10%">Size</th>
                                            <th width="10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        @foreach($video as $row)

                                        <tr>
                                            <!-- <td></td> -->
                                            <td>
                                                <div class="row ">
                                                    <a href="{{route('show.video', ['id'=>$row->id])}}">
                                                        <div class=" col-6">
                                                            <div class="">
                                                                <video src="<?php echo url("/"); ?>/videos/{{$row->video}}" alt="" width="200px"></video>
                                                            </div>
                                                        </div>
                                                        <div class=" col-6">
                                                            <div class=" mt-0">
                                                                <h5 class="post-title mb-2">{{$row["title"]}}</h5>
                                                                <p class="mb-2 p text-body">{{$row->summary}}</p>
                                                            </div>

                                                    </a>
                                                </div>
                            </div>
                            </td>
                            <td> <?php echo $row["created_at"]; ?></td>
                            <td>{{$row->size}}MB</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('edit.video', ['id'=>$row->id])}}" class="col-6">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('delete.video', ['id'=>$row->id])}}" class="col-6">
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

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span></span>
                </div>
            </div>
        </footer>
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
    <!-- 
    <script>
        $(document).ready(function() {
            $('#myInput').on('keyup', function(event) {
                event.preventDefault();
                var tukhoa = $(this).val().toLowerCase();
                $('#myTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa) > -1);
                });
            });
        });

        getPagination('#table-id');

        function getPagination(table) {
            var lastPage = 1;
            $('#maxRows')
                .on('change', function(evt) {

                    lastPage = 1;
                    $('.pagination')
                        .find('li')
                        .slice(1, -1)
                        .remove();
                    var trnum = 0; // reset tr counter
                    var maxRows = parseInt($(this).val()); // get Max Rows from select option

                    if (maxRows == 5000) {
                        $('.pagination').hide();
                    } else {
                        $('.pagination').show();
                    }

                    var totalRows = $(table + ' tbody tr').length;
                    $(table + ' tr:gt(0)').each(function() {
                        trnum++;
                        if (trnum > maxRows) {
                            $(this).hide();
                        }
                        if (trnum <= maxRows) {
                            $(this).show();
                        }
                    });
                    if (totalRows > maxRows) {
                        var pagenum = Math.ceil(totalRows / maxRows);
                        for (var i = 1; i <= pagenum;) {
                            $('.pagination #prev')
                                .before(
                                    '<li data-page="' +
                                    i +
                                    '">\
								  <span>' +
                                    i++ +
                                    '<span class="sr-only">(current)</span></span>\
								</li>'
                                )
                                .show();
                        }
                    }
                    $('.pagination [data-page="1"]').addClass('active');
                    $('.pagination li').on('click', function(evt) {
                        evt.stopImmediatePropagation();
                        evt.preventDefault();
                        var pageNum = $(this).attr('data-page');

                        var maxRows = parseInt($('#maxRows').val());

                        if (pageNum == 'prev') {
                            if (lastPage == 1) {
                                return;
                            }
                            pageNum = --lastPage;
                        }
                        if (pageNum == 'next') {
                            if (lastPage == $('.pagination li').length - 2) {
                                return;
                            }
                            pageNum = ++lastPage;
                        }

                        lastPage = pageNum;
                        var trIndex = 0;
                        $('.pagination li').removeClass('active');
                        $('.pagination [data-page="' + lastPage + '"]').addClass('active');
                        limitPagging();
                        $(table + ' tr:gt(0)').each(function() {
                            trIndex++;
                            if (
                                trIndex > maxRows * pageNum ||
                                trIndex <= maxRows * pageNum - maxRows
                            ) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    });
                    limitPagging();
                })
                .val(5)
                .change();
        }

        function limitPagging() {
            // alert($('.pagination li').length)

            if ($('.pagination li').length > 7) {
                if ($('.pagination li.active').attr('data-page') <= 3) {
                    $('.pagination li:gt(5)').hide();
                    $('.pagination li:lt(5)').show();
                    $('.pagination [data-page="next"]').show();
                }
                if ($('.pagination li.active').attr('data-page') > 3) {
                    $('.pagination li:gt(0)').hide();
                    $('.pagination [data-page="next"]').show();
                    for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
                        $('.pagination [data-page="' + i + '"]').show();
                    }
                }
            }
        }

        $(function() {
            // Just to append id number for each row
            $('table tr:eq(0)').prepend('<th> STT </th>');

            var id = 0;

            $('table tr:gt(0)').each(function() {
                id++;
                $(this).prepend('<td>' + id + '</td>');
            });
        });
    </script> -->
</body>

</html>