<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>DelSolved</title>

  <!-- Bootstrap CSS -->

  <!-- Bootstrap CSS -->
  <link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
/>
  <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/98f0cdd253.js" crossorigin="anonymous"></script>


  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <!-- bootstrap theme -->
  <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{asset('admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.css')}}" type="text/css">
  <link href="{{asset('admin/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('admin/css/fullcalendar.css')}}">
  <link href="{{asset('admin/css/widgets.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/css/xcharts.min.css')}}" rel=" stylesheet">
  <link href="{{asset('admin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">

  @toastr_css
  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    @include('admin.header')
    <!--header end-->

    <!--sidebar start-->
    <!-- <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <!-- <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="/dashboard/home">
              <i class="icon_house_alt"></i>
              <span>Dashboard</span>
            </a>
          </li>

          <li>
            <a class="" href="{{route('settings.form')}}">
              <i class="fa fa-cog"></i>
              <span>Forum Settings</span>
            </a>
          </li>
              <li>
                <a class="" href="{{route('category.new')}}">
                    <i class="fa fa-plus"></i>
                    <span>Create Category</span>
                </a>
              </li>
              <li>
                <a class="" href="{{route('forum.new')}}">
                    <i class="fa fa-plus"></i>
                    <span>Create Forum</span>
                </a>
              </li>
         <li>
            <a class="" href="/dashboard/users">
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
          </li>

          <li>
            <a class="" href="{{route('categories')}}">
                <i class="fa fa-list-alt"></i>
                <span>Categories</span>
            </a>
          </li>

          <li>
            <a class="" href="{{route('forums')}}">
                <i class="fa fa-users"></i>
                <span>Forums</span>
            </a>
          </li>

            <li>
                <a class="" href="{{ route('request') }}">
                    <i class="fa fa-users"></i>
                    <span>Request</span>
                </a>
            </li>
       </ul>

        <!-- sidebar menu end-->
      <!-- </div>
    </aside> --> -->

    <!--sidebar end-->
    <div id="app">
      @yield('content')
    </div>
  </section>
  <!-- container section start -->

  <!-- javascripts -->

{{-- ckeditor --}}
<script>
  CKEDITOR.replace( 'editor1' );
</script>


  <!-- Vue App.js -->
  <script src="{{asset('js/app.js')}}"></script>
  <!-- End -->
  <script src="{{asset('admin/js/jquery.js')}}"></script>
  <script src="{{asset('admin/js/jquery-ui-1.10.4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->

  <link href="{{asset('admin/js/bootstrap.min.js')}}" rel="stylesheet">
  {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
  <!-- nice scroll -->
  <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{asset('admin/assets/jquery-knob/js/jquery.knob.js')}}"></script>
  <script src="{{asset('admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
  <script src="{{asset('admin/js/owl.carousel.js')}}"></script>
  <!-- jQuery full calendar -->
  <<script src="{{asset('admin/js/fullcalendar.min.js')}}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <!--script for this page only-->
    <script src="{{asset('admin/js/calendar-custom.js')}}"></script>
    <script src="{{asset('admin/js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('admin/js/jquery.customSelect.min.js')}}"></script>
    <script src="{{asset('admin/assets/chart-master/Chart.js')}}"></script>

    <!--custome script for all page-->
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{asset('admin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('admin/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/js/xcharts.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('admin/js/gdp-data.js')}}"></script>
    <script src="{{asset('admin/js/morris.min.js')}}"></script>
    <script src="{{asset('admin/js/sparklines.js')}}"></script>
    <script src="{{asset('admin/js/charts.js')}}"></script>
    <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

     <!-- Script Alert Delete  -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
     </script>
     <!-- script js sweet alert -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

     <!-- script untuk konfirmasi hapus data dengan sweet alert  -->
     <script>
       $('.alert_notifuser').on('click',function(){
           var getLink = $(this).attr('href');
           Swal.fire({
               title: "Are You Sure?",
               text: 'Do you want delete this user?',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               confirmButtonText: 'Delete',
               cancelButtonColor: '#D3D3D3',
               cancelButtonText: "Cancel"

           }).then(result => {
               //jika klik ya maka Delete
               if(result.isConfirmed){
                   window.location.href = getLink
               }
           })
           return false;
       });
   </script>

<script>
    $('.alert_notifforum').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Are You Sure?",
            text: 'Do you want delete this forum?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonColor: '#D3D3D3',
            cancelButtonText: "Cancel"

        }).then(result => {
            //jika klik ya maka Delete
            if(result.isConfirmed){
                window.location.href = getLink
            }
        })
        return false;
    });
</script>

<script>
    $('.alert_notifcategory').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Are You Sure?",
            text: 'Do you want delete this category?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonColor: '#D3D3D3',
            cancelButtonText: "Cancel"

        }).then(result => {
            //jika klik ya maka Delete
            if(result.isConfirmed){
                window.location.href = getLink
            }
        })
        return false;
    });
</script>

<script>
    $('.alert_notifnotification').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Are You Sure?",
            text: 'Do you want delete this notification?',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonColor: '#D3D3D3',
            cancelButtonText: "Cancel"

        }).then(result => {
            //jika klik ya maka Delete
            if(result.isConfirmed){
                window.location.href = getLink
            }
        })
        return false;
    });
</script>

 @jquery
 @toastr_js
 @toastr_render
</body>

</html>
