<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Salero:Restaurant Admin Bootstrap 5 Template">
	<meta property="og:title" content="Salero:Restaurant Admin Bootstrap 5 Template">
	<meta property="og:description" content="Salero:Restaurant Admin Bootstrap 5 Template">
	<meta property="og:image" content="https://salero.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Salero Restaurant Admin Bootstrap 5 Template</title>
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	
	<link href="{{asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin/vendor/swiper/css/swiper-bundle.min.css')}}" rel="stylesheet">
	<link href="{{asset('admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	
	<link rel="stylesheet" href="{{asset('admin/vendor/swiper/css/swiper-bundle.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/vendor/dotted-map/css/contrib/jquery.smallipop-0.3.0.min.css')}}" type="text/css" media="all" />
	<link href="{{asset('admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
	
	<!-- tagify-css -->
	
	<!-- Style css -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('admin//vendor/toastr/css/toastr.min.css')}}">
	@yield('header')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-box">
				<div class="icon">
				  <i class="fas fa-utensils"></i>
				</div>
			</div>
		</div>
	</div>	 -->
	<div id="preloader">
		<div class="loader-wrapper">
			<div class="loader-box">
				<div class="icon">
				  <i class="fas fa-utensils"></i>
				</div>
			</div>
		</div>
	</div>	
	
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
       
        @include('admin.layout.partials.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
	
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
		@include('admin.layout.partials.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.layout.partials.sidebar')
		
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			@yield('content')
		</div>
		
        <!--**********************************
            Content body end
        ***********************************-->
		
        <!--**********************************
            Footer start
        ***********************************-->
        @include('admin.layout.partials.footer')
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('admin/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('admin/vendor/apexchart/apexchart.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('admin/js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{asset('admin/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
	
	
	<!-- JS for dotted map -->
    <script src="{{asset('admin/vendor/dotted-map/js/contrib/jquery.smallipop-0.3.0.min.js')}}"></script>
    <script src="{{asset('admin/vendor/dotted-map/js/contrib/suntimes.js')}}"></script>
    <script src="{{asset('admin/vendor/dotted-map/js/contrib/color-0.4.1.js')}}"></script>
	
	<script src="{{asset('admin/vendor/dotted-map/js/world.js')}}"></script>
    <script src="{{asset('admin/vendor/dotted-map/js/smallimap.js')}}"></script>
    <script src="{{asset('admin/js/dashboard/dotted-map-init.js')}}"></script>
   
	<!-- Apex Chart -->
	
	

	<!-- Vectormap -->
    <script src="{{asset('admin/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('admin/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('admin/js/custom.js')}}"></script>
	<script src="{{asset('admin/js/deznav-init.js')}}"></script>
	
	<script src="{{asset('admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins-init/datatables.init.js')}}"></script>
	<script src="{{asset('admin/vendor/toastr/js/toastr.min.js')}}"></script>
	  <script>
		var swiper = new Swiper(".mySwiper", {
		  slidesPerView: 5,
		  //spaceBetween: 30,
		  pagination: {
			el: ".swiper-pagination",
			clickable: true,
		  },
		  breakpoints: {
			
		  300: {
			slidesPerView: 1,
			spaceBetween: 20,
		  },
		  416: {
			slidesPerView: 2,
			spaceBetween: 20,
		  },
		   768: {
			slidesPerView: 3,
			spaceBetween: 20,
		  },
		   1280: {
			slidesPerView: 4,
			spaceBetween: 10,
		  },
		  1788: {
			slidesPerView: 5,
			spaceBetween: 20,
		  },
		},
		});
			@if(session()->has('success'))      
				toastr.success("{{session()->get('success')}}", "Top Right", {
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
			  		  
			@elseif(session()->has('error'))
			toastr.error("{{session()->get('error')}}", "Top Right", {
                    timeOut: 500000000,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    positionClass: "toast-top-right",
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
			@endif              
           

      
  </script>
   
	
	@yield('scripts')
	
</body>
</html>