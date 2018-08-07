<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
			if(!($_SESSION['user_login'])){
			header('location:login.php');
		}
		if(isset($_GET['logout'])){
			unset($_SESSION['user_login']);
			unset($_SESSION['user_name']);
			header('location:http:login.php');
		}
		

		$host = 'localhost';  
		$user = 'root';  
		$pass = '';  
		$db = 'ncpc_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
			
		$sql = "SELECT * FROM team_info";
		$result = mysqli_query($link,$sql);
		
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
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
				<!--<li style="background-color:#004d00;"><a href="index.html">Home</a></li>
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
				<li class="abc"><a href="contact.html">Contact Us</a></li>-->
				<li><a href= "admin.php?logout=logout" >Log Out</a></li>
			</ul>	
		</div>
	</div>
</nav>
<!--navigation bar-->

<br />
<br />
<br />
<br />
<br />
<br />
<!--body-->
<div class="container">

	<div class="row">
	

		
		</div>
		<div class="col-md-10">
		
			<div class="container-fluid">
		  <h2 style="text-align:center;">Team List</h2>            
		  <table class="table table-bordered">
			<thead>
			  <tr>
				<th>#</th>
				<th>Team Name</th>
				<th>Institution Name</th>
				<th><center>Edit</center></th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
			  <?php
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					$i = 1;
				while($row = mysqli_fetch_assoc($result)) {
								
				?>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['Team_name']; ?></td>
				<td><?php echo $row['Inst_name']; ?></td>
				<td><center><a class="btn btn-primary" href="edit.php?id=<?php echo $row['ID']; ?>" role="button">Edit</a></center></td>
				
				
			  </tr>
			  <?php
				
				$i++;
				}}
				?>
			</tbody>
		  </table>
		</div>
		
		</div>
	
	</div>

</div>
<!--body-->


 
 <!--javascript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/dscountdown.js"></script>
	<script type="text/javascript" src="js/count.js"></script>
	<script>
					function Own(){
						document.getElementById("w").innerHTML='inactive';
						//alert("sdasd");
					}
	</script>
 <!--javascript-->
 
</body>
</html>