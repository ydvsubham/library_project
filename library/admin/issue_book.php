<?php
  session_start();
  if(isset($_SESSION['u_id'])){
    if($_SESSION['u_id']=='admin'){
       $temp=0;
    }else{
      header("location: ../index.php?sign_in=invalid");
      exit();
    } 
  }else {
    header("location: ../index.php?sign_in=invalid");
    exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dev liberary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" style=""  href="img/head_icon.png" sizes="16x16"/>
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="stylesheet" type="text/css" href="css\hover.css">
  <link rel="stylesheet" type="text/css" href="css\add_book.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
  <div class="welcome_cont">
    <?php
      include_once('includes/header.php');
    ?>
          
    <div class="member_cont">
      <div class="member_head">
        <h3>Issues Books</h3>
      </div>
      <div class="add_books_cont">
          <div class="add_books_head"><h3>Book Info</h3></div>
          <div class="add_books_info">
            <form action="issue_book_inc.php" method="get" id="form_submit_page">
              <label for="username">Student Username:</label>
              <input type="text" name="username" id="username" required="">
              <label for="isbn">Book ISBN Number:</label>
              <input type="text" name="isbn" id="isbn" required="">
              <input type="submit" name="b_submit" value="Issue Book">
            </form>
          </div>
      </div>      
  <?php include_once('includes/footer.php'); ?>

<script src="js/java.js"></script>

</body>
</html>