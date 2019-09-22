<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>RKAS BOS - Dinas Pendidikan Provinsi Kepulauan Riau 2019</title>
   
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('public/images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('public/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('public/images/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{url('public/images/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('public/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/plugins/JqueryConfirm/JqueryConfirm.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{url('public/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{url('public/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{url('public/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{url('public/global_assets/js/plugins/ui/headroom.min.js')}}"></script>
	<script src="{{url('public/global_assets/js/plugins/ui/prism.min.js')}}"></script>
    <script src="{{url('public/global_assets/js/plugins/ui/sticky.min.js')}}"></script>

	<script src="{{url('public/assets/js/app.js')}}"></script>
	<script src="{{url('public/global_assets/js/demo_pages/navbar_hideable.js')}}"></script>
	
	<script src="{{url('public/global_assets/js/demo_pages/components_collapsible.js')}}"></script>
	<!-- /theme JS files -->
    <script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
</head>

<body class="navbar-top navbar-bottom sidebar-right-visible">
   <div id="app">
        @include('limitless/template/header_main')
        
        
         <router-view></router-view>
         <vue-progress-bar></vue-progress-bar>
	    <div class="navbar navbar-expand-lg navbar-light navbar-slide-bottom fixed-bottom">
		<div class="text-center d-lg-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
				<i class="icon-unfold mr-2"></i>
				Footer
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-footer">
			<span class="navbar-text">
				&copy;2019. <a href="#">Dinas Pendidikan Provinsi Kepulauan Riau</a>
			</span>

			<ul class="navbar-nav ml-lg-auto">
				<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
				<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
			</ul>
		</div>
	</div>
    </div>
    <script src="{{url('public/js/app.js')}}"></script>
    <script src="{{url('public/assets/plugins/JqueryConfirm/JqueryConfirm.js')}}"></script>
    <script type="text/javascript">
        $(function(){
           $(document).on("click",".Logout", function(e){
              e.preventDefault();
                   $.confirm({
                        title: '',
                        content: 'Keluar Aplikasi RKAS ?',
                        theme: 'supervan'
                    });
           }); 
        });
    </script>
</body>
</html>
