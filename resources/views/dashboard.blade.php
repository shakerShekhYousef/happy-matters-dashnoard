<!DOCTYPE html>

<html dir="ltr">

<html>
<head>


	<title>Happy Matters</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{asset('assets/styles/style.min.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">
	<!-- <link rel="stylesheet" href="../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css"> -->

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('assets/plugin/waves/waves.min.css')}}">
	<!-- <link rel="stylesheet" href="../assets/plugin/waves/waves.min.css"> -->

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{asset('assets/plugin/sweet-alert/sweetalert.css')}}">
	<!-- <link rel="stylesheet" href="../assets/plugin/sweet-alert/sweetalert.css"> -->
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="{{asset('assets/plugin/percircle/css/percircle.css')}}">
	<!-- <link rel="stylesheet" href="../assets/plugin/percircle/css/percircle.css"> -->

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="{{asset('assets/plugin/chart/chartist/chartist.min.css')}}">
	<!-- <link rel="stylesheet" href="../assets/plugin/chart/chartist/chartist.min.css"> -->

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{asset('assets/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugin/fullcalendar/fullcalendar.print.css')}}"  media='print'>
	<!-- <link rel="stylesheet" href="../assets/plugin/fullcalendar/fullcalendar.min.css"> -->
	<!-- <link rel="stylesheet" href="../assets/plugin/fullcalendar/fullcalendar.print.css" media='print'> -->

	<!-- RTL -->
	<link rel="stylesheet" href="{{asset('assets/styles/style-rtl.min.css')}}">

	<!-- <link rel="stylesheet" href="../assets/styles/style-rtl.min.css"> -->
	<!-- Color Picker -->
	<link rel="stylesheet" href="{{asset('assets/color-switcher/color-switcher.min.css')}}">
	<!-- <link rel="stylesheet" href="../assets/color-switcher/color-switcher.min.css"> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" /> -->
	<style>
.dropbtn {
	margin-right :16px;
	margin-left :16px;
  background-color: #595880;
  color: black;
  border-left:2px;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
 
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
#arrow-down {
  width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  
  border-top: 5px solid black;
}


.dropdown-content a:hover {background-color:#D8BFC7;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #595880;
}
.marah:hover{
	background-color:RebeccaPurple;
}
.marah1:hover{
	background-color:#D8BFC7;
}
</style>
</head>

<body>
<div class="main-menu"style="background-color:#EAE7E7" >
	<header class="header" style="background-color:#EAE7E7" >
	<div>
		<a  class="logo" style="background-color:#EAE7E7;padding-top:10px">	
			<img class="avatar-img" src="/storage/img/logo.png" width="150px" height="auto">
</a>
</div>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user" style="background-color:#D8BFC7">
		
			<a href="#" class="avatar"><img class="avatar-img" src="/storage/cover_images/avater.jpg" width="150px" height="auto"><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">  </a></h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="/users"><i class="fa fa-user"></i> Profile</a></div>
					<!-- <div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div> -->
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<!-- /.title -->
			<ul class="menu js__accordion" > 
				<li>
				
					<a class="waves-effect parent-item js__control marah1" href="#"><i class="menu-icon fa fa-user" style="font-size:23px"></i><span>Properties</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content" >
					<li class="marah1" ><a href="/properties">Create Property</a></li>

					
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			

		
			<!-- /.menu js__accordion -->
		</div>
	
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar" style="background-color:RebeccaPurple">
	<div class="pull-left" style="background-color:RebeccaPurple">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger " style="background-color:#585880"></button>
		<h1 class="page-title">Home</h1>
	


		<!-- /.page-title -->
	</div>

	<!-- /.pull-left -->
	<div class="pull-right"  >

		<!-- /.ico-item -->
		<div class="ico-item fa fa-arrows-alt js__full_screen" style="color:white" ></div>
		<!-- /.ico-item fa fa-fa-arrows-alt -->
		
		<!-- <div  style="text-align:left"> -->
		<a href="{{ route('logout') }}" class="ico-item fa fa-power-off " style="color:white"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></a>
													  <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form>
	</div>	
	<!-- </div> -->
	
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
         
		
	
<!-- /#notification-popup -->



		
		
	

		<!-- .inside waves-effect waves-circle -->
	

	<!-- /.content -->

<!-- #color-switcher -->

 <div id="wrapper">

	<div class="main-content">
		<div class="row small-spacing">
			
	

					
		
				

	

	<!-- Placed at the end of the document so the pages load faster -->
	<!-- <link rel="stylesheet" href="{{asset('assets/color-switcher/color-switcher.min.css')}}"> -->
	<script src="{{asset('assets/scripts/jquery.min.js')}}"></script>

	<!-- <script src="../assets/scripts/jquery.min.js"></script> -->
	<script src="{{asset('assets/scripts/modernizr.min.js')}}"></script>

	<!-- <script src="../assets/scripts/modernizr.min.js"></script> -->
	<script src="{{asset('assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- <script src="../assets/plugin/bootstrap/js/bootstrap.min.js"></script> -->
	<script src="{{asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

	<!-- <script src="../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script> -->
	<script src="{{asset('assets/plugin/nprogress/nprogress.js')}}"></script>

	<!-- <script src="../assets/plugin/nprogress/nprogress.js"></script> -->
	<script src="{{asset('assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>

	<!-- <script src="../assets/plugin/sweet-alert/sweetalert.min.js"></script> -->
	<script src="{{asset('assets/plugin/waves/waves.min.js')}}"></script>
	<!-- <script src="../assets/plugin/waves/waves.min.js"></script> -->
	<!-- Full Screen Plugin -->
	<script src="{{asset('assets/plugin/fullscreen/jquery.fullscreen-min.js')}}"></script>

	<!-- <script src="../assets/plugin/fullscreen/jquery.fullscreen-min.js"></script> -->

	<!-- Percent Circle -->
	<script src="{{asset('assets/plugin/percircle/js/percircle.js')}}"></script>

	<!-- <script src="../assets/plugin/percircle/js/percircle.js"></script> -->

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="{{asset('assets/plugin/chart/chartist/chartist.min.js')}}"></script>

	<!-- <script src="../assets/plugin/chart/chartist/chartist.min.js"></script> -->
	<script src="{{asset('assets/scripts/chart.chartist.init.min.js')}}"></script>

	<!-- <script src="../assets/scripts/chart.chartist.init.min.js"></script> -->

	<!-- FullCalendar -->
	<script src="{{asset('assets/plugin/moment/moment.js')}}"></script>

	<!-- <script src="../assets/plugin/moment/moment.js"></script> -->
	<script src="{{asset('assets/plugin/fullcalendar/fullcalendar.min.js')}}"></script>

	<!-- <script src="../assets/plugin/fullcalendar/fullcalendar.min.js"></script> -->
	<script src="{{asset('assets/scripts/fullcalendar.init.js')}}"></script>

	<!-- <script src="../assets/scripts/fullcalendar.init.js"></script> -->
	<script src="{{asset('assets/scripts/main.min.js')}}"></script>


	<!-- <script src="../assets/scripts/main.min.js"></script> -->
	<script src="{{asset('assets/color-switcher/color-switcher.min.js')}}"></script>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>
	<!-- <script src="../assets/color-switcher/color-switcher.min.js"></script> -->
	@yield('scripts')
</body>
</html>