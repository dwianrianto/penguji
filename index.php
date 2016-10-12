<?php
		session_start();
		include_once("config/koneksi.php");
		if(isset($_POST['login']) ? $_POST['login']: ''){
			$username= isset($_POST['username']) ? $_POST['username']: '';
			$password= isset($_POST['password']) ? $_POST['password']: '';
			$passmd5=$password;
			if(empty($username) || empty($username)){
				?>
                	<div class="alert bg-danger" role="alert">
                    	<center>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Silahkan Isi Username dan Password Anda ...
                    	</center>
				</div>
                <?php
                }else {
                $query=mysql_query("select * from login where username ='$username' and password ='$passmd5'");
                $data=mysql_fetch_array($query);
                if($username==$data['username'] && $passmd5==$data ['password'] && $data ['level'] == 'admin' OR $data ['level'] == 'kasie' OR $data ['level'] == 'kabid'){
                $_SESSION['username']=$data['username'];
                $_SESSION['level']=$data['level'];
                $_SESSION['authorized']=1;
                header('Location:admin/');
				$q=mysql_query("select  * from login where username='$username'");
                }
				if($username==$data['username'] && $passmd5==$data ['password'] && $data ['level'] == 'penguji'){
                $_SESSION['username']=$data['username'];
                $_SESSION['level']=$data['level'];
                $_SESSION['authorized']=1;
                header('Location:penguji/');
				$q=mysql_query("select  * from login where username='$username'");
                }
				
				else{
					?>
                    	<div class="alert bg-danger" role="alert">
                        	<center>
					<span class="glyphicon glyphicon-exclamation-sign"></span> Username atau Password Anda Salah ...
                    		</center>
				</div>
                    <?php
				}
                }
                }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Uji Kelayakan</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<img src="2.png" width="35px" />
									<span class="black" id="id-text2">Dinas Perhubungan</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h6 class="header blue lighter bigger">
												Masukkan Username dan Password Anda
											</h6>

											<div class="space-6"></div>

											<form action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">

															<i class="ace-icon fa fa-key"></i>
																<input type="submit" name="login" value="Login" class="width-35 pull-right btn btn-sm btn-primary" />
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110">Uji Kelayakan Kendaraan</span>
											</div>

											<div class="space-6"></div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
														DISHUB DKI JAKARTA
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<!-- <![endif]-->
	</body>
</html>
