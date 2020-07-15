<?php
	session_start();
	include_once('includes/connection.php');
	static $var=0;

	if(isset($_POST['submit'])){
		
		$user_id1=mysqli_real_escape_string($conection,$_POST['user_id']);
		$password1=mysqli_real_escape_string($conection,$_POST['password']);

		

		if(empty($user_id1) || empty($password1)){
			header("location: sign_in_inc.php?singUp=Empty");
			exit();
		}else{
			$sql="SELECT * FROM sign_up WHERE user_id = ?";
			$stmt=mysqli_prepare($conection,$sql);

			if($stmt){
				mysqli_stmt_bind_param($stmt,'s',$user_id1);
				mysqli_stmt_execute($stmt);
            	mysqli_stmt_bind_result($stmt,$id,$name,$user_id,$email,$password,$status);
            	mysqli_stmt_fetch($stmt);
            	
            	

	            	if($user_id=='admin'){
	            			$hased_pwd=password_verify($password1, $password);
	            	
		            	if($hased_pwd==true){
	            			$_SESSION['u_id']=$user_id;
		            		$_SESSION['u_name']=$name;
		            		$_SESSION['u_email']=$email;
		            		$_SESSION['u_password']=$password;

		            		header("location: admin/admin.php?Admin_singUp=succes");
		            		}else{
		            		header("location: index.php?singUp=pwd_incorrect");
		            		static $var=1;
		            	}
	            		
	            	}else{
	            		$hased_pwd=password_verify($password1, $password);
	            	
		            	if($hased_pwd==true){
		            		if($status==1){
		            			$_SESSION['u_id']=$user_id;
			            		$_SESSION['u_name']=$name;
			            		$_SESSION['u_email']=$email;
			            		$_SESSION['u_password']=$password;

			            		header("location: index.php?singUp=succes");
		            		}else{

			            		echo "<script>alert('Your account has been blocked! contact Admin');
			            		document.location ='index.php';
			            		</script>";	
			            	}

		            		}else{
		            		header("location: index.php?singUp=pwd_incorrect");
		            		static $var=1;
		            	}
	            	}
            	
			}else{
				header("location: index.php?singUp=stmt_error");
				exit();
			}
		}
	}

?>