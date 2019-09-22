<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link href="{{url('public/assets/css/core.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('public/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	
	<!-- /theme JS files -->

</head>
<body>
    <!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="{{url('public/global_assets/images/logo_light.png')}}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			

			<span class="ml-md-3 mr-md-auto">&nbsp;</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Users online</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/demo/users/face18.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
										<span class="d-block text-muted font-size-sm">Lead web developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/demo/users/face24.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Will Brason</a>
										<span class="d-block text-muted font-size-sm">Marketing manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/demo/users/face17.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
										<span class="d-block text-muted font-size-sm">Project manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/demo/users/face19.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
										<span class="d-block text-muted font-size-sm">Business developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="../../../../global_assets/images/demo/users/face16.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
										<span class="d-block text-muted font-size-sm">UX expert</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All users</a>
							<a href="#" class="text-grey"><i class="icon-gear"></i></a>
						</div>
					</div>
				</li>

				
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" action="index.html" method="post" id="login" >
				
				 {{ csrf_field() }}
				
					<div class="card-body">
						<div class="text-center mb-3">
						    <img src="{{url('public/images/logo.png')}}" class="img-responsive" width="100">
							<h5 class="mb-0 font-weight-bold">Rencana Kegiatan Dan Anggaran Sekolah</h5>
							<span class="d-block text-muted">RKAS</span>
						</div>

                    
						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
							<span class="text-left text-danger"></span>
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
							
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
							<span class="text-left text-danger"></span>
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>
                        <span class="text-danger alertData"></span>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Login <i class="icon-circle-right2 ml-2"></i></button>
						</div>

					
						<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->


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
		<!-- /main content -->

	</div>
	<!-- /page content -->   
	<script type="text/javascript" src="{{ url('public/assets/js/jquery.min.224.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/assets/js/jquery.validate.min.js')}}"></script>

    <script type="text/javascript">
        $(function () {

            $("#login").validate({
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.appendTo(element.next(" span "));
                },
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: "Username Tidak Boleh Kosong",
                    },
                    password: {
                        required: "Password Tidak Boleh Kosong",
                    }
                },
                submitHandler: function (form) {
                   var form = $("#login").serialize();
                    
                    $.ajax({
                        url     : '{{ route("login.submit") }}',
                        method  : "POST",
                        data    : form,
                        error   : function(data){
                             alert(JSON.stringify(data));
                        },
                        success: function(data) {
                            if(data.check == '0'){
                                $('.alertData').html('Username & password tidak Sesuai, Login gagal');
                            }
                            else{
                                alert(data.check);
                                $(".alertData").html("");
                                window.location.href = data.return;
                            }
                            
                        },
                    });
                }
            });
        });
    </script>	 
	   
</body>
</html>
