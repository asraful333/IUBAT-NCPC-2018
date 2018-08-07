<?php
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
 
 <!--body part-->
 <div class="container">
 	
	<div class="col-md-12">	
		<div class="container-fluid">
			<h2 style="text-align:center;">Team List</h2>            
			<table class="table table-hover">
				<thead>
				  <tr>
					<th>#</th>
					<th>Team Name</th>
					<th></th>
					<th>Institution Name</th>
					<th><center>Payment Status</center></th>
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
					<td><?php echo $row["Team_name"];?></td>
					<td><input type="button" name="view" value="view" id="<?php echo $row["Team_name"]; ?>" class="btn btn-info btn-xs view_data" />
						<!-- Modal -->
						<div id="dataModal" class="modal fade">  
							<div class="modal-dialog">  
								<div class="modal-content">  
									<div class="modal-header">  
										<button type="button" class="close" data-dismiss="modal">&times;</button>  
										<h4 class="modal-title"><?php echo $row['Team_name']; ?></h4>  
									</div>  
									<div class="modal-body" id="details"></div>  
									<div class="modal-footer">  
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
									</div>  
								</div>  
							</div>  
						</div>  
					
					</td>
					<td><?php echo $row['Inst_name']; ?></td>
					<td><center><?php echo $row['p_sts']; ?></center></td>
					 
				  </tr>
				</tbody>
				<?php
					
					$i++;
					}}
					?>
		  </table>
		</div>	
	</div>
	
 </div>
 <!--body part-->
 <br />
 <br />
 <br />
 <br />
 <br />
 
 
<!--footer-->
 <div class="container-fluid footer">
	<div class="container">
		<!--1st column-->
		<div class="col-md-6">
			<div class="row"><br />				
				<img src="img/lg/logo-white.PNG" alt="logo" />
			</div>
			<div class="row"><br />
				<div class="col-md-6">
				
					<p style="text-align:justify;">				
						4 Embankment Drive Road, Sector-10 (Off Dhaka-Ashulia Road) Uttara Model Town, Dhaka-1230.Bangladesh					
					</p>
					<p>Phone: 55091801, 55091802, 55091803 <br />
						Email : info@iubat.edu,<br />
					</p>			
				</div>
				<div class="col-md-6">				
					<p>Mobile : +88 01714014933, 016164014933, 01974014933 <br />
						Fax: (880-2) 5895 2625 <br />						
						Web : <a href="https://www.iubat.edu/" target="_blank" style="color:white;">www.iubat.edu</a></p>			
				</div>
			</div>
		</div>
		<!--2nd column-->
		<div class="col-md-3 follow">
			<div class="row">
				<h2>Follow Us<hr /></h2>
			</div>
			<div class="row">
				<ul>			
					<li><a href="https://www.facebook.com/events/2061691704093146/" target="_blank" style="color:white;">Facebook</a></li>
					<li><a href="#" style="color:white;">Twitter</a></li>			
				</ul>
			</div>
		</div>
		<!--3rd column-->
		<div class="col-md-3">
			<div class="row">
				<h2>Developed By <hr /></h2>
			</div>
			<div class="row">
				Department of Computer Science and Engineering, IUBAT
			</div>
		</div>		
	</div>
 </div>
 
 <!--last row-->
 <div class="container-fluid footer-2">
	<div class="container">	
		&copy; Copyright | IUBAT | All Rights Reserved
	</div>
 </div>
 <!--footer-->
 
</body>

<!--javascript-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--for team details-->
	<script>  
		 $(document).ready(function(){  
			  $('.view_data').click(function(){  
				   var team_id = $(this).attr("id");  
				   $.ajax({  
						url:"select.php",  
						method:"post",  
						data:{team_id:team_id},  
						success:function(data){  
							 $('#details').html(data);  
							 $('#dataModal').modal("show");  
						}  
				   });  
			  });  
		 });  
	 </script>
 <!--javascript-->

</html>