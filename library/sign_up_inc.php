						<?php
	
							include('connection.php');

							if(isset($_POST['submit'])){
								$name=mysqli_real_escape_string($conection,$_POST['name']);
								$user_id=mysqli_real_escape_string($conection,$_POST['id']);
								$email=mysqli_real_escape_string($conection,$_POST['email']);
								$password=mysqli_real_escape_string($conection,$_POST['password']);
								$status=1;

								if(empty($name)|| empty($user_id)  || empty($email) || empty($password)){
									header("location: sign_up_index.php?singUp=empty");
									exit();
								}else{
									
										if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
											header("location: sign_up_index.php?singUp=invalid_email");
											exit();
										}else{
											$hased_password=password_hash($password, PASSWORD_DEFAULT);

											$sql="INSERT INTO sign_up(name,user_id,email,pwd,status)
												VALUES (?,?,?,?,?);";
											$stmt=mysqli_prepare($conection,$sql);

											if($stmt){
												mysqli_stmt_bind_param($stmt,'ssssi',$name,$user_id,$email,$hased_password,$status);
												mysqli_stmt_execute($stmt);
												mysqli_stmt_close($stmt);
												header("location: sign_up_index.php?singUp=sucess");	
											}else{
												header("location: sign_up_index.php?singUp=Error");
												exit();
											}
										}										
									
								}

							}
						?>
