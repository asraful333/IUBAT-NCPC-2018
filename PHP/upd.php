<?php
		$host = 'localhost';  
		$user = 'root';  
		$pass = '';  
		$db = 'NCPC_db';
		
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		//echo $_GET['id'];
		$val2 = $_POST['id'];
		echo $val2;
		
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
		
		$sql = '
				UPDATE team_info
				set Inst_name = '.$Inst_name.',Team_name='.$Team_name.' ,Conts1_Name='.$conts1_name.',
				Conts1_Gender='.$conts1_gender.',Conts1_TShirtSize='.$conts1_tsize.',Conts1_Email='.$conts1_email.',
				Conts1_Phone='.$conts1_mobile.',Conts2_Name='.$conts2_name.',Conts2_Gender='.$conts2_gender.',
				Conts2_TShirtSize='.$conts2_tsize.',Conts2_Email='.$conts2_email.',Conts2_Phone='.$conts2_mobile.',
				Conts3_Name='.$conts3_name.',Conts3_Gender='.$conts3_gender.',Conts3_TShirtSize='.$conts3_tsize.',Conts3_Email='.$conts3_email.',
				Conts3_Phone='.$conts3_mobile.',Coach_Name='.$coach_name.',Coach_Gender='.$coach_gender.',Coach_TShirtSize='.$coach_tsize.',Coach_Email='.$coach_email.',
				Coach_Phone='.$coach_mobile.';
				WHERE ID = '.$val2.'
		';
		$exec_Q = mysqli_query($link,$sql);
		if($exec_Q)
		{
			echo '<script> alert("Successfull");</script>';
			
			
		}
		
?>