<!DOCTYPE html>
<html>
<head>
	<title>App Menu</title>
	<meta charset="utf-8">
	<meta name="Author" content="Bruno Nicholas Sserunkuma">
	<meta name="email" content="sbnibro256@gmail.com">
	<link rel="stylesheet" type="text/css" href="public/asset/css/bootstrap.min.css">
    <link rel="shortcut icon" href="public/asset/img/logomi.png">
	<style type="text/css">
		body {
			background-image: url("public/asset/img/bg4.jpg"); 
			background-repeat: no-repeat;
			text-shadow: 1px 1px blue;
		}
		header, section, footer {
			min-height: 150px;
			text-align: center;
		}
		header {
			padding: 30px;
		}
		header > h2 {
			font-weight: bold;
			text-transform: uppercase;
		}
		a, small {
			padding: 5px 10px;
			border-radius: 3px;
			background-color: white;
			/* text-shadow: none; */
		}
		@media only screen and (max-width: 600px){
			.namer {
			 	visibility: hidden;
			}
			.body {
				margin-left: 15%;
				margin-right: 15%;
			}
		}
	</style>
</head>
<body class="text-white">
	<header>
		<h2><big>Welcome To The Open Home Software</big><br><small><i>A violence free community!</i></small></h2>
	</header>
	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row body">
					<div class="col-md-4" style="visibility: hidden;">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div class="row namer" style="text-align: center; padding: 5px;"> Proceed To </div>
								<div class="row" style="padding: 5px;">
									<a href="javascript:void(0)" class="btn btn-block btn-info disabled">#</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div class="row namer" style="text-align: center;padding: 5px;"> Proceed To </div>
								<div class="row" style="padding: 5px;">
									<a href="./public/" class="btn btn-block btn-primary">Apllication!</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4" style="visibility: hidden;">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div class="row namer" style="text-align: center;padding: 5px;"> Proceed To </div>
								<div class="row" style="padding: 5px;">
									<a href="javascript:void(0)" class="btn btn-block btn-info disabled">#</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer>
		
	</footer>
</body>
</html>