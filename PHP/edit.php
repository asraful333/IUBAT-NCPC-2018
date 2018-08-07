<?php

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
			if(!($_SESSION['user_login'])){
			header('location:login.php');
		}
		

		$host = 'localhost';  
		$user = 'root';  
		$pass = '';  
		$db = 'ncpc_db';
		if(isset($_GET['id'])){
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
			$val = $_GET['id'];
			//$_POST['id'] = $val;
		$sql = "SELECT * FROM team_info where ID='$val'";
		$result = mysqli_query($link,$sql);
		}
		if(isset($_POST['btnSubmit'])){
			$link = mysqli_connect($host,$user,$pass,$db);
			$val = $_GET['id'];
			$Inst_name = $_POST['institute'];
		$Team_name = $_POST['team'];
		$conts1_name = $_POST['1st'];
		$conts1_gender = $_POST['g1'];
		$conts1_tsize = $_POST['t1'];
		$conts1_email = $_POST['email1'];
		$conts1_mobile = $_POST['mbl1'];
		$conts2_name = $_POST['2nd'];
		$conts2_gender = $_POST['g2'];
		$conts2_tsize = $_POST['t2'];
		$conts2_email = $_POST['email2'];
		$conts2_mobile = $_POST['mbl2'];
		$conts3_name = $_POST['3rd'];
		$conts3_gender = $_POST['g3'];
		$conts3_tsize = $_POST['t3'];
		
		$conts3_email = $_POST['email3'];
		$conts3_mobile = $_POST['mbl3'];
		$coach_name = $_POST['coach'];
		$coach_gender = $_POST['g4'];
		$coach_tsize = $_POST['t4'];
	
		$coach_email = $_POST['email4'];
		$coach_mobile = $_POST['mbl4'];
		
		$ps = $_POST['ps'];
	
		$sql = "UPDATE team_info
				SET Inst_name = '$Inst_name',Team_name = '$Team_name' ,Conts1_Name='$conts1_name',
				Conts1_Gender='$conts1_gender',Conts1_TShirtSize='$conts1_tsize',Conts1_Email='$conts1_email',
				Conts1_Phone='$conts1_mobile',Conts2_Name='$conts2_name',Conts2_Gender='$conts2_gender',
				Conts2_TShirtSize='$conts2_tsize',Conts2_Email='$conts2_email',Conts2_Phone='$conts2_mobile',
				Conts3_Name='$conts3_name',Conts3_Gender='$conts3_gender',Conts3_TShirtSize='$conts3_tsize',Conts3_Email='$conts3_email',
				Conts3_Phone='$conts3_mobile',Coach_Name='$coach_name',Coach_Gender='$coach_gender',Coach_TShirtSize='$coach_tsize',Coach_Email='$coach_email',
				Coach_Phone='$coach_mobile',p_sts='$ps'
				WHERE ID = '$val'
		";
		$exec_Q = mysqli_query($link,$sql);
		if($exec_Q)
		{
			//echo $sql;
			echo '<script> alert("Successfull");</script>';
			header('location:login.php');
		}
		else
			echo '<script> alert("SomethingWrong");</script>';
		mysqli_close($link);
			
		}
		
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
<!--body-->

<div class="container" >
	<div class="row">

		<div class="panel panel-default">
			<div class="panel-body">
				
				<!--Edit Team Info-->
					
						<h2 style="text-align:center;">Edit Team Info</h2>
					
					<div class="row">
					  <form action="" method="post">
							<!--Institution & team name-->
							<?php
								if (mysqli_num_rows($result) > 0) {
									// output data of each row
									$i = 1;
									while($row = mysqli_fetch_assoc($result)) {
								
				?>
							<div class="form-group">
								<div class="container-fluid">
								<div class="row">
									<div class="col-md-6">
										<label for="institute">Institution Name:</label>
										<?php
										echo "<input type=\"text\" class=\"form-control\" id=\"institute\" name=\"institute\" value=\"".$row['Inst_name']."\"  >";
										
										?>
									</div>
								
									<div class="col-md-6">						
										<label for="team">Team Name:</label>
										<?php
										echo "<input type=\"text\" class=\"form-control\" id=\"team\" name=\"team\" value=\"".$row['Team_name']."\"><br />";
										
										?>
									</div>
								</div>
								</div>
							</div>
							
								
								
							<!--1st costestant name-->
							
							<div class="form-group">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-3">
											<label for="1st">1st Contestant Name:</label>
											<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"1st\" name=\"1st\"  value=\"".$row['Conts1_Name']."\" ><br />";
											?>
										</div>
										
										<div class="col-md-3">
											<label for="email1">Email:</label>
											<?php
											echo "<input type=\"email\" class=\"form-control\" id=\"email1\" name=\"email1\"  value=\"".$row['Conts1_Email']."\" ><br />";
											?>
											
										</div>
										
										<div class="col-md-2">
											<label for="mbl1">Mobile No.:</label>
											<?php
											echo "<input type=\"number\" class=\"form-control\" id=\"mbl1\" name=\"mbl1\"  value=\"".$row['Conts1_Phone']."\" ><br />";
											?>
	
										</div>
									
										<div class="col-md-2">						
											<label for="gender1">Gender:</label>
										
												<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"g1\" name=\"g1\"  value=\"".$row['Conts1_Gender']."\" ><br />";
											?>
								
										</div>
										
										<div class="col-md-2">						
											<label for="t-shirt1"> T-Shirt Size:</label>
											 <?php
											echo "<input type=\"text\" class=\"form-control\" id=\"t1\" name=\"t1\"  value=\"".$row['Conts1_TShirtSize']."\" ><br />";
											?>
										</div>
										
									</div>
								</div>
							</div>
								
								
							<!--2nd costestant name-->
							
							<div class="form-group">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-3">
											<label for="1st">2nd Contestant Name:</label>
											<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"2nd\" name=\"2nd\"  value=\"".$row['Conts2_Name']."\" ><br />";
											?>
										</div>
										
										<div class="col-md-3">
											<label for="email1">Email:</label>
											<?php
											echo "<input type=\"email\" class=\"form-control\" id=\"email1\" name=\"email2\"  value=\"".$row['Conts2_Email']."\" ><br />";
											?>
											
										</div>
										
										<div class="col-md-2">
											<label for="mbl1">Mobile No.:</label>
											<?php
											echo "<input type=\"number\" class=\"form-control\" id=\"mbl2\" name=\"mbl2\"  value=\"".$row['Conts2_Phone']."\" ><br />";
											?>
	
										</div>
									
										<div class="col-md-2">						
											<label for="gender1">Gender:</label>
										
												<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"g2\" name=\"g2\"  value=\"".$row['Conts2_Gender']."\" ><br />";
											?>
								
										</div>
										
										<div class="col-md-2">						
											<label for="t-shirt1"> T-Shirt Size:</label>
											 <?php
											echo "<input type=\"text\" class=\"form-control\" id=\"t2\" name=\"t2\"  value=\"".$row['Conts2_TShirtSize']."\" ><br />";
											?>
										</div>
										
									</div>
								</div>
							</div>
							
								
							<!--3rd costestant name-->
							
							<div class="form-group">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-3">
											<label for="1st">3rd Contestant Name:</label>
											<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"3rd\" name=\"3rd\"  value=\"".$row['Conts3_Name']."\" ><br />";
											?>
										</div>
										
										<div class="col-md-3">
											<label for="email1">Email:</label>
											<?php
											echo "<input type=\"email\" class=\"form-control\" id=\"email3\" name=\"email3\"  value=\"".$row['Conts3_Email']."\" ><br />";
											?>
											
										</div>
										
										<div class="col-md-2">
											<label for="mbl1">Mobile No.:</label>
											<?php
											echo "<input type=\"number\" class=\"form-control\" id=\"mbl3\" name=\"mbl3\"  value=\"".$row['Conts3_Phone']."\" ><br />";
											?>
	
										</div>
									
										<div class="col-md-2">						
											<label for="gender1">Gender:</label>
										
												<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"g3\" name=\"g3\"  value=\"".$row['Conts3_Gender']."\" ><br />";
											?>
								
										</div>
										
										<div class="col-md-2">						
											<label for="t-shirt1"> T-Shirt Size:</label>
											 <?php
											echo "<input type=\"text\" class=\"form-control\" id=\"t3\" name=\"t3\"  value=\"".$row['Conts2_TShirtSize']."\" ><br />";
											?>
										</div>
										
									</div>
								</div>
							</div>
								
							<!--coach name-->
							
							<div class="form-group">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-3">
											<label for="1st">Coach Name:</label>
											<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"coach\" name=\"coach\"  value=\"".$row['Coach_Name']."\" ><br />";
											?>
										</div>
										
										<div class="col-md-3">
											<label for="email1">Email:</label>
											<?php
											echo "<input type=\"email\" class=\"form-control\" id=\"email4\" name=\"email4\"  value=\"".$row['Coach_Email']."\" ><br />";
											?>
											
										</div>
										
										<div class="col-md-2">
											<label for="mbl1">Mobile No.:</label>
											<?php
											echo "<input type=\"number\" class=\"form-control\" id=\"mbl4\" name=\"mbl4\"  value=\"".$row['Coach_Phone']."\" ><br />";
											?>
	
										</div>
									
										<div class="col-md-2">						
											<label for="gender1">Gender:</label>
										
												<?php
											echo "<input type=\"text\" class=\"form-control\" id=\"g4\" name=\"g4\"  value=\"".$row['Coach_Gender']."\" ><br />";
											?>
								
										</div>
										
										<div class="col-md-2">						
											<label for="t-shirt1"> T-Shirt Size:</label>
											 <?php
											echo "<input type=\"text\" class=\"form-control\" id=\"t4\" name=\"t4\"  value=\"".$row['Coach_TShirtSize']."\" ><br />";
											?>
										</div>
										
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="container-fluid">
									<div class="row">									
										<div class="col-md-12">						
											<label for="p_sts"> Payment Status:</label>
											 <?php
											echo "<input type=\"text\" class=\"form-control\" id=\"ps\" name=\"ps\"  value=\"".$row['p_sts']."\" ><br />";
											?>
										</div>								
									</div>
								</div>
							</div>
							
							<center><button value="submit" id="btnSubmit" name="btnSubmit" type="submit" class="btn btn-success">Save</button></center><br />
					  </form>
					</div>
					<?php }}?>
				
				<!--Edit Team Info-->
				
			</div>
		</div>

	
	</div>
 </div>

<!--body-->


</body>

<!--javascript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--javascript-->

</html>