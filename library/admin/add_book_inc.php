<?php

	include('includes/connection.php');

	if(isset($_POST['b_submit'])){
		$b_name=mysqli_real_escape_string($conection,$_POST['b_name']);
		$b_arthor=mysqli_real_escape_string($conection,$_POST['b_arthor']);
		$b_type=mysqli_real_escape_string($conection,$_POST['b_type']);
		$b_isbn=mysqli_real_escape_string($conection,$_POST['b_isbn']);
		$b_price=mysqli_real_escape_string($conection,$_POST['b_price']);
		$status=1;
		$file=$_FILES['file'];
		$file_name=$_FILES['file']['name'];
		$file_tmp_name=$_FILES['file']['tmp_name'];
		$file_size=$_FILES['file']['size'];
		$file_error=$_FILES['file']['error'];
		$file_type=$_FILES['file']['type'];

		$file_ext=explode('.', $file_name);
		$file_actual_ext=strtolower(end($file_ext));
		$allowed_type=array('jpg','jpeg','png');
	
		if(empty($b_name)|| empty($b_arthor)  || empty($b_type) || empty($b_price) || empty($b_isbn)){
			header("location: add_book.php?add_book=empty");
			exit();
		}else{
					$sql="INSERT INTO books(name,author,type,status,price,isbn)
						VALUES (?,?,?,?,?,?);";
					$stmt=mysqli_prepare($conection,$sql);

					if($stmt){
						mysqli_stmt_bind_param($stmt,'sssiis',$b_name,$b_arthor,$b_type,$status,$b_price,$b_isbn);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_close($stmt);
						if(in_array($file_actual_ext, $allowed_type)){
							if ($file_error === 0) {
								if ($file_size < 50000) {
									$file_dest='../img/book/'.$b_isbn.'.'.$file_actual_ext;
									move_uploaded_file($file_tmp_name,$file_dest);
									header("location: add_book.php?add_book=sucess");
									exit();
								}else{
									header("location: add_book.php?add_book=img_size_exceed");
								}

							}else{
								header("location: add_book.php?add_book=img_error");	
							}
						}else{

							header("location: add_book.php?add_book=img_error");
							exit();
						}
							
					}else{
						header("location: add_book.php?add_book=Error");
						exit();
					}
				}										
			
		}

	
?>
