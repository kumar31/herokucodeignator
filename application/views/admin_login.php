<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OUTFIT - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/popstyle.css?<?php echo time(); ?>" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>      
    <!-- Custom CSS -->
    <style>
		.entry:not(:first-of-type) {
			margin-top: 10px;
		}
		body {
			padding-top: 80px;
		}
		.pac-container:after {  
			background-image: none !important;
			height: 0px;
		}
		.form-signin input[type="text"] {
			margin-bottom: 5px;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
		.form-signin .form-control {
			position: relative;
			font-size: 16px;
			font-family: 'Open Sans', Arial, Helvetica, sans-serif;
			height: auto;
			padding: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		.vertical-offset-100 {
			padding-top: 100px;
		}		
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container nav-menu-style" style="width:100%;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a href="<?php echo site_url();?>/admin_login"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo2"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li class="pull-left">
                        <a href="<?php echo site_url();?>/admin_login" style="padding:0px 15px;"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo"></a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
		<div class="row vertical-offset-100">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">                                
							<div class="row-fluid user-row">
								<h4 class="text-center"><b>ADMIN LOGIN</b></h4>
							</div>
						</div>
						<div class="panel-body">
							<form role="form" target="_top" enctype="multipart/form-data" class="form-signin" method="POST" action="">
								<fieldset>
									<label class="panel-login">
										<div class="login_result"></div>
									</label>
									<p id="alertmsg" class="text-danger"></p>
									<input class="form-control" placeholder="Username" id="username" type="text">
									<input class="form-control" placeholder="Password" id="password" type="password">
									<br>
									<button class="btn btn-danger btn-lg largeHeight center-block btn-block" type="button" id="submit">Login</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
	<form id="adminlogin" action="<?php echo base_url();?>index.php/admin_dashboard" method="POST">
		<input type="hidden" name="my_userid" id="adminid"> 
	  </form>
	<script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.2.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
    </script>
	<script src="<?php echo base_url(); ?>js/validator.js"></script>
	
	<script>
  $( "#submit" ).click(function() {
	  signin();
	});
  function signin(){
		var username = $("#username").val();
		var password = $("#password").val();
		
			var url = '<?php echo $webserviceurl; ?>index.php/admin_login';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'username':username,'password':password},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					
					if(message == "1") {						
						var adminid = JSON.stringify(data['result']['admin_id']);
						var adminid = adminid.replace(/\"/g, ""); 
						$('#adminid').val(adminid);
						$( "#adminlogin" ).submit();
						/*session(id);*/
						//window.location.assign("<?php echo base_url();?>index.php/admin_dashboard/"+adminid );												
					}
					else {
						var alertmessage = JSON.stringify(data['message']);
						var alertmessage = alertmessage.replace(/\"/g, "");
						$("#alertmsg").text(alertmessage);
					}
				}
			
			});

	}
	
	
  </script>
  </body>
</html>