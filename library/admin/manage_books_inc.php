<?php
	include('includes/connection.php');
	if(isset($_GET['book'])){
		$books=$_GET['book'];
		$select=mysqli_query($conection,"DELETE FROM books WHERE id='$books';");
		header("location: manage_books.php?delete=sucess");	
	}
?>