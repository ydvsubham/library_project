<?php

	include_once('includes/connection.php');
	if(isset($_GET['b_submit'])){
		$username=mysqli_real_escape_string($conection,$_GET['username']);
		$isbn=mysqli_real_escape_string($conection,$_GET['isbn']);

		if(empty($username)|| empty($isbn) ){
			header("location: issue_book.php?issue_book=empty");
			exit();
		}else{

			$sql_check="SELECT * FROM sign_up WHERE user_id='$username';";
			$result_check=mysqli_query($conection, $sql_check);
			if(mysqli_num_rows($result_check)>0){
				$sql_book="SELECT * FROM books WHERE isbn='$isbn';";
				$result_book=mysqli_query($conection, $sql_book);
				$row_book1=mysqli_fetch_array($result_book);
				if(mysqli_num_rows($result_book)>0){

					if($row_book1['status']==1){
						$sql_book1="UPDATE books
						SET status=0
						WHERE isbn='$isbn';";
						$result_book1=mysqli_query($conection, $sql_book1);

						$row_book=mysqli_fetch_array($result_book1);
						$id=$row_book1['id'];
						$name=$row_book1['name'];
						$arthor=$row_book1['author'];
						$status=1;

						$sql_issue="INSERT INTO dashboard(u_id,book_no,reg_date,book_name,book_aurthor,return_status,isbn)
							VALUES(?,?,now(),?,?,?,?);";
						$stmt=mysqli_prepare($conection,$sql_issue);

						if($stmt){
							mysqli_stmt_bind_param($stmt,'sissii',$username,$id,$name,$arthor,$status,$isbn);
							mysqli_stmt_execute($stmt);
							mysqli_stmt_close($stmt);
							header("location: issue_book.php?issue_book=sucess");	
						}else{
							header("location: issue_book.php?issue_book=Error");
							exit();
						}
					}else{
						header("location: issue_book.php?issue_book=Book_not_avialable");
						exit();	
					}

					
				}else{
					header("location: issue_book.php?issue_book=Book_not_found");
					exit();	
				}
				
			}else{
				header("location: issue_book.php?issue_book=invalid_Username");
					exit();	
			}

			
		}		
	}

	

?>