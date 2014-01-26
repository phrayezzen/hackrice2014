<?php
	require_once 'lib/firebaseLib.php';
	
	/* get from firebase */
	$url = 'https://ymn.firebaseio.com/';
	$token = null;

	$place = $_GET["place"];
	$date = $_GET["date"];

	$path = "/hackrice/" . $date . "/" . $place;

	$fb = new fireBase($url, $token);
	
	$arrangements = json_decode($fb->get($path));
?>
<!DOCTYPE HTML5>
<html>
    <head>

		<!-- jquery and jquery cookie -->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/jquery.cookie.js"></script>

		<!-- bootstrap -->
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

		<!-- custom -->
		<link rel="stylesheet" href="css/style.css" />

		<title>Results</title>
    </head>
    <body>
	 	<div class="navbar navbar-inverse navbar-fixed-top">
		   	<div class="container">
		     	<div class="navbar-header">
		       		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
		           		<span class="icon-bar"></span>
  		  	    	</button>
 		       		<a class="navbar-brand" href="#"><img height="30" src="assets/logo.png" alt="Logo"/> </a>
		      	</div>
		      	<div class="rcollapse navbar-collapse">
		        	<ul class="nav navbar-nav navbar-right">
		          		<li><a href="./logout.php">Logout</a></li>
   		        	</ul>
           	    </div><!--/.nav-collapse -->
 		   	</div>
	  	</div>

		<div id="content" class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Departure Time</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
<?php
	foreach($arrangements as $netid => $val){
?>
	<tr>
		<td><? echo($val->{"name"}); ?></td>
		<td><? echo($val->{"time"}); ?></td>
		<td><button class="btn">Message</button></td>
	</tr>
<?php
	}
?>
				</tbody>
			</table>
		</div>
    </body>
</html>
