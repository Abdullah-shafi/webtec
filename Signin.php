<?php
include "includes/db_connect.inc.php";

session_start();
$uPass = $uName = $message =$uTypeInDB= "";

/* mysqli_real_escape_string() helps prevent sql injection */
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  if(!empty($_POST['u_name'])){
    $uName = mysqli_real_escape_string($conn, $_POST['u_name']);
  }
  if(!empty($_POST['u_pass'])){
    $uPass = mysqli_real_escape_string($conn, $_POST['u_pass']);
  }

  $sqlUserCheck = "SELECT user_name, password, u_catagory FROM user WHERE user_name = '$uName'";
  $result = mysqli_query($conn, $sqlUserCheck);
  $rowCount = mysqli_num_rows($result);
  if($rowCount < 1){
    $message = "User does not exist!";
  }
  else{
    while($row = mysqli_fetch_assoc($result)){
      
      $uPassInDB = $row['password'];
      $uTypeInDB = $row['u_catagory'];


      if(password_verify($uPass, $uPassInDB)){
        if($uTypeInDB=='manager'){
          $_SESSION['username'] = $uName;
        header("Location: admin.php");
        }
        else{
          $_SESSION['username'] = $uName;
        header("Location: index.php");
        }
        

      }
      else{
        $message = "Wrong Password!";
      }
    }
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
    <title>Sign In | Welcome</title>
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
            <li class="current"><a href="Signin.php">Signin</a></li>
            <li ><a href="SignUp.php">SignUp</a></li>
          </ul>
        </nav>
      </div>

    </header>





 <section id="login">
      <div class="container">
        
        <form method="post"action="">
        <fieldset >
        <legend>Sign In:</legend>
         <input type="text" placeholder="Enter User Name..." name="u_name"><br>

         
          <input type="password" placeholder="Enter Password..." name="u_pass"><br>
          

          <button type="submit" class="button_2">SignIn</button>
          <span style="color:red"><?php echo $message; ?></span><br>
          </fieldset>
        </form>
      </div>
    </section>










    <footer >
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
