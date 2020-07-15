<?php

	include_once('includes/connection.php');
	if(isset($_GET['b_submit'])){
		$username=mysqli_real_escape_string($conection,$_GET['username']);
		$isbn=mysqli_real_escape_string($conection,$_GET['isbn']);

		if(empty($username)|| empty($isbn) ){
			header("location: return_book.php?issue_book=empty");
			exit();
		}else{

			$sql_check="SELECT * FROM dashboard WHERE u_id='$username';";
			$result_check=mysqli_query($conection, $sql_check);
			if(mysqli_num_rows($result_check)>0){
				$sql_book="UPDATE dashboard
					SET return_status=0,return_date=now()
					WHERE u_id='$username' AND isbn='$isbn';";
				$result_book=mysqli_query($conection, $sql_book);
				header("location: return_book.php?issue_book=return_sucess");
				
			}else{
				header("location: return_book.php?issue_book=Invalid_username");
				exit();	
			}

			
		}		
	}

	

?>