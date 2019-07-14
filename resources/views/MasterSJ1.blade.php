<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Dinas Penanaman Modal Dan pelayan Terpadu Satu Pintu - Kepri</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="public/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="public/global_assets/js/main/jquery.min.js"></script>
	<script src="public/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="public/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="public/global_assets/js/plugins/ui/headroom.min.js"></script>
	<script src="public/global_assets/js/plugins/ui/prism.min.js"></script>
    <script src="public/global_assets/js/plugins/ui/sticky.min.js"></script>

	<script src="public/assets/js/app.js"></script>
	<script src="public/global_assets/js/demo_pages/navbar_hideable.js"></script>
	<script src="public/global_assets/js/demo_pages/navbar_multiple_sticky.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top navbar-bottom">
   @include('limitless/template/header_main')
   <div id="app">
        <router-view></router-view>
	    <div class="navbar navbar-expand-lg navbar-light navbar-slide-bottom fixed-bottom">
		<div class="text-center d-lg-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
				<i class="icon-unfold mr-2"></i>
				Footer
			</button>
		</div>

		<div class="navbar-collapse collapse" id="navbar-footer">
			<span class="navbar-text">
				&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
			</span>

			<ul class="navbar-nav ml-lg-auto">
				<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
				<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
				<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
			</ul>
		</div>
	</div>
    </div>
    <script src="public/js/app.js"></script>
</body>
</html>
