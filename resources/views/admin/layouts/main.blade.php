<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Orbiter is a bootstrap minimal & clean admin template">
   <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
   <meta name="author" content="Themesbox">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Favicon icon -->
   <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/assets/images/favicon.png') }}">
   <title>@yield('title')</title>
   <!-- This page CSS -->
   <!-- chartist CSS -->
   <link href="{{ asset('assets/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
   <!--Toaster Popup message CSS -->
   <link href="{{ asset('assets/assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
   <!-- Custom CSS -->
   <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet">
   <!-- Dashboard 1 Page CSS -->
   <link href="{{ asset('assets/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Datatable -->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
   <![endif]-->
      <style>
         .error{
            color: red;
         }
      </style>
      @yield('style')
   </head>
   <body class="skin-blue fixed-layout">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
         <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Techgeering admin</p>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div id="main-wrapper">
         <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
         <!-- ============================================================== -->
         <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
               <!-- ============================================================== -->
               <!-- Logo -->
               <!-- ============================================================== -->
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.html">
                     <!-- Logo icon -->
                     <b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('assets/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{ asset('assets/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                     </b>
                     <!--End Logo icon -->
                     <!-- Logo text -->
                     <span>
                        <!-- dark Logo text -->
                        <img src="{{ asset('assets/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->    
                        <img src="{{ asset('assets/assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                     </span>
                  </a>
               </div>
               <!-- ============================================================== -->
               <!-- End Logo -->
               <!-- ============================================================== -->
               <div class="navbar-collapse">
                  <!-- ============================================================== -->
                  <!-- toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav me-auto">
                     <!-- This is  -->
                     <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                     <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                     <!-- ============================================================== -->
                     <!-- Search -->
                     <!-- ============================================================== -->
                     <!-- @include('admin.layouts.search') -->
                  </ul>
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav my-lg-0">
                     <!-- ============================================================== -->
                     <!-- Comment -->
                     <!-- ============================================================== -->
                     
                     <!-- ============================================================== -->
                     <!-- End Comment -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- Messages -->
                     <!-- ============================================================== -->
                     <!-- @include('admin.layouts.navdropdown') -->
                     <!-- ============================================================== -->
                     <!-- End Messages -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- mega menu -->
                     <!-- ============================================================== -->
                     <!-- @include('admin.layouts.navbarmegamenu') -->
                     <!-- ============================================================== -->
                     <!-- End mega menu -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- User Profile -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/assets/images/users/1.jpg') }}" alt="user" class=""> <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-end animated flipInY">
                           <!-- text-->
                           <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                           <!-- text-->
                           <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                           <!-- text-->
                           <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                           <!-- text-->
                           <div class="dropdown-divider"></div>
                           <!-- text-->
                           <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                           <!-- text-->
                           <div class="dropdown-divider"></div>
                           <!-- text-->
                           <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                           </form>
                           <!-- text-->
                        </div>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End User Profile -->
                     <!-- ============================================================== -->
                     <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- ============================================================== -->
         <!-- End Topbar header -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Left Sidebar - style you can find in sidebar.scss  -->
         <!-- ============================================================== -->
         @include('admin.layouts.leftbar')
         <!-- ============================================================== -->
         <!-- End Left Sidebar - style you can find in sidebar.scss  -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Page wrapper  -->
         <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            @yield('content')
            @include('admin.layouts.servicepanel')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
         </div>
         <!-- ============================================================== -->
         <!-- End Page wrapper  -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- footer -->
         <!-- ============================================================== -->
         @include('admin.layouts.footer')
         <!-- ============================================================== -->
         <!-- End footer -->
         <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Wrapper -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->
      <script src="{{ asset('assets/assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="{{ asset('assets/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="{{ asset('assets/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
      <!--Wave Effects -->
      <script src="{{ asset('assets/dist/js/waves.js') }}"></script>
      <!--Menu sidebar -->
      <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
      <!--Custom JavaScript -->
      <script src="{{ asset('assets/dist/js/custom.min.js') }}"></script>
      <!-- ============================================================== -->
      <!-- This page plugins -->
      <!-- ============================================================== -->
      <!--morris JavaScript -->
      <script src="{{ asset('assets/assets/node_modules/raphael/raphael-min.js') }}"></script>
      <script src="{{ asset('assets/assets/node_modules/morrisjs/morris.min.js') }}"></script>
      <script src="{{ asset('assets/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
      <script src="{{ asset('assets/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
      <!-- Popup message jquery -->
      <script src="{{ asset('assets/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
      <!-- Chart JS -->
      <script src="{{ asset('assets/dist/js/dashboard1.js') }}"></script>
      <script src="{{ asset('assets/assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
      <!-- This is data table -->
      <script src="{{ asset('assets/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
      <!-- start - This is for export functionality only -->
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
      <!-- end - This is for export functionality only -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
      (function(){
         $('.from-prevent-multiple-submits').on('submit', function(){
            $('.from-prevent-multiple-submits').attr('disabled','true');
         })
      })();
   </script>
      <script>
         @if(Session::has('message'))
         toastr.options =
         {
          "closeButton" : true,
          "progressBar" : true
       }
       toastr.success("{{ session('message') }}");
       @endif

       @if(Session::has('error'))
       toastr.options =
       {
          "closeButton" : true,
          "progressBar" : true
       }
       toastr.error("{{ session('error') }}");
       @endif

       @if(Session::has('info'))
       toastr.options =
       {
          "closeButton" : true,
          "progressBar" : true
       }
       toastr.info("{{ session('info') }}");
       @endif

       @if(Session::has('warning'))
       toastr.options =
       {
          "closeButton" : true,
          "progressBar" : true
       }
       toastr.warning("{{ session('warning') }}");
       @endif
    </script>
    <!-- For SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
     $(function(){
       $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
         if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
           'Deleted!',
           'Your file has been deleted.',
           'success'
           )
       }
    })
   });
    });
 </script>
 @yield('script')
 <script>
    $(function () {
      $('#myTable').DataTable();
      var table = $('#example').DataTable({
        "columnDefs": [{
          "visible": false,
          "targets": 2
       }],
       "order": [
       [2, 'asc']
       ],
       "displayLength": 25,
       "drawCallback": function (settings) {
          var api = this.api();
          var rows = api.rows({
            page: 'current'
         }).nodes();
          var last = null;
          api.column(2, {
            page: 'current'
         }).data().each(function (group, i) {
            if (last !== group) {
              $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
              last = group;
           }
        });
      }
   });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
              var currentOrder = table.order()[0];
              if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
             } else {
                table.order([2, 'asc']).draw();
             }
          });
            // responsive table
            $('#config-table').DataTable({
              responsive: true
           });
            /*$('#example23').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
             });*/
             $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
          });

       </script>
    </body>
    </html>