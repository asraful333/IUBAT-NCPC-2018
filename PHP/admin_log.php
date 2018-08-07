<?php
		session_start();
		
		if($_SESSION['user_login']){
			header('location:http://localhost/NCPC/admin.php');
		}
		$host = 'localhost';  
		$user = 'root';  
		$pass = '';  
		$db = 'NCPC_db';
		$link = mysqli_connect($host,$user,$pass,$db);
		if(!$link)
			echo "OOppss!!! Something went wrong. Please try again....";
		
		$uname = $_POST['name'];
		$pass = $_POST['pwd'];
		
		$sql = "SELECT * from admin where u_name='$uname' and pwd='$pass'";
		
		$result = mysqli_query($link,$sql);
		//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		//$active = $row['active'];
		$cnt = mysqli_num_rows($result);
		
		if($cnt==1)
		{
				$_SESSION['user_name'] = $row['u_name'];
				$_SESSION['user_login'] = true;
			header('location:admin.php');
		}
		else
		{
			
			echo "<script type=\"text/javascript\">window.alert('Wrong username or password.');
			window.location.href = 'login.php';</script>"; 	
		}
		
?>