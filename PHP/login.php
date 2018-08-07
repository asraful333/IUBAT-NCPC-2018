
<?php
				if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if(isset($_SESSION['user_login'])){
			header('location:admin.php');
		}
		
?>

<!DOCTYPE html>
<html>
<head>
  <title>IUBAT_NCPC_2018</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--title logo-->
  <link rel="icon" type="image/jpg" href="img/CSE.jpg" />
  <!--bootstrap 3.3.7.css-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--timer-->
  <link rel="stylesheet" href="css/dscountdown.css" type="text/css" />
  <!--css style-->
  <link rel="stylesheet" href="css/style.css" type="text/css" />

</head>

<body>

<!--navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#006600;">
	<div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
			<a href="http://iubat.edu/web1/" target="_blank" class="navbar-brand" style="font-weight:bold;">IUBAT-NCPC 2018</a>
		</div>
		
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">   
				<li style="background-color:#004d00;"><a href="index.html">Home</a></li>
				<li class="abc"><a href="gallery.html" >Gallery</a></li>
				<li class="abc"><a href="team.php" >Team List</a></li>
				<li class="abc"><a href="reg.html">Registration</a></li>
				<li class="abc"><a href="payment.html">Payment</a></li>
				<li class="dropdown abc">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Contest Info <span class="caret"></span></a>
						<ul class="dropdown-menu abc">
							<li><a href="date_venue.html">Date and Venue</a></li>
							<li><a href="Committee/ProgramSchedule.pdf" target="_blank">Program Schedule</a></li>
							<li><a href="Committee/rules.pdf" target="_blank">NCPC Regional Rules for 2018</a></li>
						</ul>
				</li>
				<li class="dropdown abc">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Committee <span class="caret"></span></a>
						<ul class="dropdown-menu abc">
							<li><a href="Committee\advisory_Committee.pdf" target="_blank">Advisory Committee</a></li>
							<li><a href="Committee\Steering Committee.pdf" target="_blank">Steering Committee</a></li>
							<li><a href="Committee\JudgePanel.pdf"  target="_blank">Judge Panel</a></li>
							<li><a href="Committee\Sub-Committee.pdf" target="_blank">Sub-Committee</a></li>
						</ul>
				</li>	
				<li class="abc"><a href="contact.html">Contact Us</a></li>
				<li class="abc"><a href="login.php">Login</a></li>
			</ul>	
		</div>
	</div>
</nav>
<!--navigation bar-->

<!--logo-->
<div class="container-fluid" style="margin-top:50px">
	<div class="col-md-1">
		<div class="row">
				<img src="img/lg/ncpc.PNG" alt="iubat" style="width:55%; padding:10px 0 10px 0;">
		</div>
	</div>
	<div class="col-md-8">
		<div class="row">
				<img src="img/lg/bnr.PNG" alt="iubat" style="width:100%; padding-right:15px;">
		</div>
	</div>	
	<div class="col-md-3">
		<div class="row">
				<img src="img/lg/iasw.PNG" alt="iubat" style="width:100%; padding:17px 0 0 0;">
		</div>
	</div>
</div>
<!--logo-->

<br />
<br />
<br />
<br />
<br />
<br />
<!--login-->
<div class="container">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
			<br />
			<h2 style="text-align:center;">Login</h2>
			  <form action="admin_log.php" method="post">
				<div class="form-group">
				  <label for="name">Name:</label>
				  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required="true">
				</div>
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="true">
				</div>
				<center><button type="submit" class="btn btn-success">Submit</button></center>
				<br />
				<br />
				<br />
			  </form>
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>
<!--login-->

 
</body>

 <!--javascript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!--javascript-->

</html>