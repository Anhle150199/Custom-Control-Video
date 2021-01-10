@include('layouts.head')

<body>
     @include('layouts.header')
     <div class="container" style="width:1000px;">
          <br><br><br><br>
          <h1>My Video</h1>
          <br><br>
          <div class="md-form mt-0 search">
               <input id="myInput" onkeyup="myFunction()" class="form-control" type="text" placeholder="Tìm kiếm ...." aria-label="Search">
          </div>

          <div class=" select-div">
               Số lượng:
               <select class="form-control select" name="state" id="maxRows">
                    <option value="5" selected="selected">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
               </select>
          </div>
          <div style="clear:both"></div>
          <br />
          <div id="order_table">
               <table class="table  myTable" id="table-id">
                    <tr class="header">
                         <th width="30%" style="">Tiêu đề</th>
                         <th width="43%">Mô tả</th>
                         <th width="22%">Ngày đăng</th>
                    </tr>
                    <tbody id="myTable">
                         @foreach($video as $row)
                         <tr>
                              <td><?php echo $row["title"]; ?></td>
                              <td>
                                   <p class="p"><?php echo $row["summary"]; ?></p>
                              </td>
                              <td> <?php echo $row["created_at"]; ?></td>
                         </tr>
                         @endforeach
                    </tbody>
               </table>
               <div class='pagination-container '>
                    <nav>
                         <ul class="pagination">

                              <li data-page="prev" class="page-item">
                                   <span>
                                        < <span class="sr-only">(current)
                                   </span></span>
                              </li>
                              <!--	Here the JS Function Will Add the Rows -->
                              <li data-page="next" id="prev" class="page-item">
                                   <span> > <span class="sr-only">(current)</span></span>
                              </li>
                         </ul>
                    </nav>
               </div>
          </div>
     </div>
</body>

</html>
<style>
     h1 {
          text-align: center;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          color: blue;
          font-size: 60px;
     }

     .search {
          width: 40%;
          float: left;
     }

     .select-div {
          width: 20%;
          float: right;
     }

     .select {
          width: 40%;
          float: right;
     }

     .p {
          width: 100%;
          height: 4em;
          overflow: hidden;
          text-overflow: ellipsis;
     }

     .pagination li:hover {
          cursor: pointer;
     }

     #myInput {
          /* background-image: url('/images/back.g'); */

          background-position: 10px 12px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
     }

     .myTable {
          border-collapse: collapse;
          width: 100%;
          border: 1px solid #ddd;
          font-size: 16px;
     }

     .myTable th,
     #myTable td {
          /* text-align: left; */
          padding: 10px;
     }

     .myTable tr {
          border-bottom: 1px solid #ddd;
     }

     .myTable tr.header,
     #myTable tr:hover {
          background-color: #f1f1f1;
     }
</style>
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
</script>

<script>
     $(document).ready(function() {
          $.datepicker.setDefaults({
               dateFormat: 'yy-mm-dd'
          });
          $(function() {
               $("#from_date").datepicker();
               $("#to_date").datepicker();
          });
          $('#filter').click(function() {
               var from_date = $('#from_date').val();
               var to_date = $('#to_date').val();
               if (from_date != '' && to_date != '') {
                    $.ajax({
                         url: "filter.php",
                         method: "POST",
                         data: {
                              from_date: from_date,
                              to_date: to_date
                         },
                         success: function(data) {
                              $('#order_table').html(data);
                         }
                    });
               } else {
                    alert("Please Select Date");
               }
          });
     });
</script>