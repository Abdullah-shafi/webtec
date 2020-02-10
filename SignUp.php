<?php

  include "includes/db_connect.inc.php";
    $fName = $lName = $uName = $uPass=$uPass1 = $uEmail = $err=$err2 = $uNameInDB = $uEmailInDB=$uadd=$done="" ;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['first_name'])){
      $fName = mysqli_real_escape_string($conn, $_POST['first_name']);
    }
    if(!empty($_POST['last_name'])){
      $lName = mysqli_real_escape_string($conn, $_POST['last_name']);
    }
    if(!empty($_POST['user_name'])){
      $uName = mysqli_real_escape_string($conn, $_POST['user_name']);
    }
    if(!empty($_POST['user_epass'])){
      $uPass1 = mysqli_real_escape_string($conn, $_POST['user_epass']);
      
    }
     if(!empty($_POST['user_pass'])){
      $uPass = mysqli_real_escape_string($conn, $_POST['user_pass']);
      $uPassToDB = password_hash($uPass, PASSWORD_DEFAULT);
    }
    if(!empty($_POST['user_email'])){
      $uEmail = mysqli_real_escape_string($conn, $_POST['user_email']);
    }
    if(!empty($_POST['add'])){
      $uadd = mysqli_real_escape_string($conn, $_POST['add']);
    }


    $sqlUserCheck = "SELECT user_name FROM user WHERE user_name = '$uName'";
    $sqlUserCheck2 = "SELECT email FROM user WHERE email = '$uEmail'";
    $result = mysqli_query($conn, $sqlUserCheck);
     $result2 = mysqli_query($conn, $sqlUserCheck2);

    while($row = mysqli_fetch_assoc($result) ){
      $uNameInDB = $row['user_name'];
     
    }

     while($row2 = mysqli_fetch_assoc($result2)){
      $uEmailInDB = $row2['email'];
    }

    if($uNameInDB == $uName){
      $err = "UserName already exists!";
    }
    elseif ($uEmailInDB == $uEmail) {
       $err = "Email already exists!";
      
    }
    elseif ($uPass != $uPass1) {
       $err = "Password doesn't match!";
      
    }
    else{
      $done = "Sign Up Successfully !!!!!!";
      $sql = "INSERT INTO user (first_name, last_name, user_name, email, password,address)
              VALUES ('$fName','$lName','$uName','$uEmail', '$uPassToDB','$uadd');";

      mysqli_query($conn, $sql);
    }
  }


  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Online Shopping">
	  <meta name="keywords" content="online shop center, buy,sell">
    <title>Online Shopping | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Online</span> Shopping</h1>
        </div>
        <nav>
          <ul>
            <li ><a href="index.php">Home</a></li>
            <li><a href="Signin.php">SignIn</a></li>
            <li class="current"><a href="SignUp.php">SignUp</a></li>
          </ul>
        </nav>
      </div>

    </header>



  





 <section id="login">
      <div class="container">
         
        <form method="post">
            <h1 >SignUp,Please</h1>
       
        <input type="text" placeholder="First Name..." name="first_name" required><br>
        <input type="text" placeholder="Last Name..." name="last_name"required><br>
          <input type="text" placeholder="User Name...(Unique one)..." name="user_name"required><br>
         <input type="email" placeholder="Enter Email..." name="user_email"required><br>

          <input type="text" placeholder="Enter Password..." name="user_epass"required><br>
          <input type="text" placeholder="Confirm Password..." name="user_pass"required><br>
          <textarea placeholder="Enter Address" name="add"required></textarea> <br>

          <button type="submit" class="button_2">SignUp</button>
          <span style="color:red;"><?php echo $err; ?></span>
        </form>
      </div>
    </section>










    <footer>
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
