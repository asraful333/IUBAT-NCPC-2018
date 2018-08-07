<?php
		$host = 'localhost';  
		$user = 'root';  
		$pass = '';  
		$db = 'NCPC_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		
		
		$Inst_name = $_POST['institute'];
		$Team_name = $_POST['team'];
		$conts1_name = $_POST['1st'];
		$conts1_gender = $_POST['g1'];
		$conts1_tsize = $_POST['t1'];
		$conts1_img = "path";
		$conts1_email = $_POST['email1'];
		$conts1_mobile = $_POST['mbl1'];
		$conts2_name = $_POST['2nd'];
		$conts2_gender = $_POST['g2'];
		$conts2_tsize = $_POST['t2'];
		$conts2_img = "path";
		$conts2_email = $_POST['email2'];
		$conts2_mobile = $_POST['mbl2'];
		$conts3_name = $_POST['3rd'];
		$conts3_gender = $_POST['g3'];
		$conts3_tsize = $_POST['t3'];
		$conts3_img = "path";
		$conts3_email = $_POST['email3'];
		$conts3_mobile = $_POST['mbl3'];
		$coach_name = $_POST['coach'];
		$coach_gender = $_POST['cg'];
		$coach_tsize = $_POST['ct'];
		$coach_img = "path";
		$coach_email = $_POST['email4'];
		$coach_mobile = $_POST['mbl4'];
		
		
		
	if(isset($_FILES['pic1']) && isset($_FILES['pic2']) && isset($_FILES['pic3']) && isset($_FILES['pic4'])){
		$extension = explode('.', $_FILES['pic1']['name']);
		$uploaddir = "img/teamImg" . "/";
		$filename = $_FILES['pic1']['name'];
		$newname = $Team_name."conts1".".".$extension[1];
		$uploadfile = $uploaddir . basename($newname);
		$conts1_img = $newname;
		
		$extension2 = explode('.', $_FILES['pic2']['name']);
		$uploaddir2 = "img/teamImg" . "/";
		$filename2 = $_FILES['pic1']['name'];
		$newname2 = $Team_name."conts2".".".$extension2[1];
		$uploadfile2 = $uploaddir . basename($newname2);
		$conts2_img = $newname2;
		
		$extension3 = explode('.', $_FILES['pic3']['name']);
		$uploaddir3 = "img/teamImg" . "/";
		$filename3 = $_FILES['pic1']['name'];
		$newname3 = $Team_name."conts3".".".$extension3[1];
		$uploadfile3 = $uploaddir . basename($newname3);
		$conts3_img = $newname3;
		
		$extension4 = explode('.', $_FILES['pic4']['name']);
		$uploaddir4 = "img/teamImg" . "/";
		$filename4 = $_FILES['pic4']['name'];
		$newname4 = $Team_name."coach".".".$extension[1];
		$uploadfile4 = $uploaddir . basename($newname4);
		$coach_img = $newname4;
		
	}

		
 //print_r($_FILES);
		
		$inQ = "INSERT INTO team_info(Inst_name,Team_name,Conts1_Name,Conts1_Gender,Conts1_TShirtSize,Conts1_Img,Conts1_Email,Conts1_Phone,Conts2_Name,Conts2_Gender,Conts2_TShirtSize,Conts2_Img,Conts2_Email,Conts2_Phone,Conts3_Name,Conts3_Gender,Conts3_TShirtSize,Conts3_Img,Conts3_Email,Conts3_Phone,Coach_Name,Coach_Gender,Coach_TShirtSize,Coach_img,Coach_Email,Coach_Phone,p_sts) 
					VALUES('$Inst_name','$Team_name','$conts1_name','$conts1_gender','$conts1_tsize','$conts1_img','$conts1_email','$conts1_mobile','$conts2_name','$conts2_gender','$conts2_tsize' ,'$conts2_img' ,'$conts2_email','$conts2_mobile','$conts3_name' ,'$conts3_gender' ,'$conts3_tsize','$conts3_img','$conts3_email','$conts3_mobile','$coach_name' ,'$coach_gender','$coach_tsize','$coach_img','$coach_email','$coach_mobile','Pending')";
		$Q = "select * from team_info where Team_name='$Team_name'";
		$exQ = mysqli_query($link,$Q);
		$cnt = mysqli_num_rows($exQ);
		if($cnt==1)
		{
			
			header('location:reg.html');
		}
		else{
		$one = move_uploaded_file($_FILES['pic1']['tmp_name'], $uploadfile);
		$two = move_uploaded_file($_FILES['pic2']['tmp_name'], $uploadfile2);
		$three = move_uploaded_file($_FILES['pic3']['tmp_name'], $uploadfile3);
		$four = move_uploaded_file($_FILES['pic4']['tmp_name'], $uploadfile4);
	
		if($one && $two && $three && $four)
			echo "File uploaded successfully";
		else {
		echo "Possible file upload attack!\n";
		}
		$exec_Q = mysqli_query($link,$inQ);
		if(!$exec_Q){
			echo "OOppss!!! Something went wrong in insertion. Please try again....";
			echo mysqli_error();
		}
		else
		{
			
			//echo '<script> alert("Successfull");</script>';
			echo "<script type=\"text/javascript\">window.alert('Registration Successfull.');
			window.location.href = 'team.php';</script>"; 	
			
		}
		}
	
		
?>