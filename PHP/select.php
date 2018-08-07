<?php  
 if(isset($_POST["team_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "ncpc_db");  
      $query = "SELECT * FROM team_info WHERE Team_name = '".$_POST["team_id"]."'";  
      $result = mysqli_query($connect, $query);  
	  $path = "img//teamImg//";
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  	$path1 = $path . $row['Conts1_Img'];
			$path2 = $path . $row['Conts2_Img'];
			$path3 = $path . $row['Conts3_Img'];
			$path4 = $path . $row['Coach_img'];
           $output .= '
								
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>#</th>
									<th>Image</th>
									<th>Name</th>
									<th>Type</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>1</td>
									<td><img src='.$path1.' width="65px" height="60px"></td>
									<td>'.$row['Conts1_Name'].'</td>
									<td>Contestant</td>
								  </tr>
								  <tr>
									<td>2</td>
									<td><img src='.$path2.' width="65px" height="60px"></td>
									<td>'.$row['Conts2_Name'].'</td>
									<td>Contestant</td>
								  </tr>
								  <tr>
									<td>3</td>
									<td><img src='.$path3.' width="65px" height="60px"></td>
									<td>'.$row['Conts3_Name'].'</td>
									<td>Contestant</td>
								  </tr>
								  <tr>
									<td>4</td>
									<td><img src='.$path4.' width="65px" height="60px"></td>
									<td>'.$row['Coach_Name'].'</td>
									<td>Coach</td>
								  </tr>
								</tbody>
							  </table>
							
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>