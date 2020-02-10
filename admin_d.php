<?php

  include "includes/db_connect.inc.php";
    $pId=$err="" ;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['p_id'])){
      $pId = mysqli_real_escape_string($conn, $_POST['p_id']);
    }
    
    $sqlUserCheck = "SELECT p_id FROM product WHERE p_id = '$pId'";
    $result = mysqli_query($conn, $sqlUserCheck);
    while($row = mysqli_fetch_assoc($result) ){
      $pIdInDB = $row['p_id'];
     
    }
     if( $pIdInDB == $pId){
        $sql = "Update product set delete_id='1' WHERE p_id= '$pId' ";

      mysqli_query($conn, $sql);
     
    }

    else{
      
    
       $err = "Product Id already exists!";
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
    <link rel="stylesheet" href="./cssa/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body >
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Online</span> Shopping</h1>
        </div>
        <nav>
          <ul>
            <li ><a href="admin.php">Home</a></li>
            <li><a href="admin_d.php">Delete</a></li>
          </ul>
        </nav>
      </div>

    </header>



  


 <section class="navi">
<ul>

    <li><a href="">Option</a>
          <ul>
            <li><a href="admin_a.php">Add Product</a></li>
            <li><a href="admin_u.php">Update Product</a></li>
            <li><a href="admin_d.php">Delete Product</a></li>
          </ul>

    </li>

</ul>
</section>  <br> 

<center> <h1 >Administrator</h1></center>



 <section id="login">
      <div class="container">
         
        <form method="post">
           
       <h1>Delete Product:</h1>

        <input type="text" name="p_id" placeholder="Product Id"><br>
      
          <button type="submit" class="button_2">Delete</button>
          <span style="color:red;"><?php echo $err; ?></span>
       
        </form>
      </div>
    </section>










    <footer>
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
