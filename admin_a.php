<?php

  include "includes/db_connect.inc.php";
    $pName=$pPrice=$err=$pNameInDB=$pCatagory=$pic="" ;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['p_name'])){
      $pName = mysqli_real_escape_string($conn, $_POST['p_name']);
    }
     if(!empty($_POST['p_price'])){
      $pPrice = mysqli_real_escape_string($conn, $_POST['p_price']);
    }
    if(isset($_POST['p_catagory']))
    {
       $pCatagory = mysqli_real_escape_string($conn, $_POST['p_catagory']);
    }
    $sqlUserCheck = "SELECT p_name FROM product WHERE p_name = '$pName'";
    $result = mysqli_query($conn, $sqlUserCheck);

    while($row = mysqli_fetch_assoc($result) ){
      $pNameInDB = $row['p_name'];
     
    }
     

    if(isset($_POST['submit'])){

    $target_dir = "image/";
    $p = "./image/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $pic=$p.(basename($_FILES["fileToUpload"]["name"])) ;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $uploadOk = 1;
            $sql = "INSERT INTO product (p_name,p_catagory,p_price,p_picture)
              VALUES ('$pName','$pCatagory','$pPrice','$pic');";

               mysqli_query($conn, $sql);
        } 
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
}
if(isset($_POST['submit'])){
    if($pNameInDB == $pName){
            $err = "Product Name already exists!";
            
         }
       }

    else{
      
      $sql = "INSERT INTO product (p_name,p_catagory,p_price,p_picture)
              VALUES ('$pName','$pCatagory','$pPrice','$pic');";

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
            
            <li><a href="logout.php">LogOut</a></li>
            
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
         
        <form method="post" enctype="multipart/form-data">
           
       <h1>Add Product:</h1>

        <input type="text" name="p_name" placeholder="Product Name" required=""><br>
      <select name="p_catagory" required="" >
         
         <option> Mobile</option>
         <option>watch</option>
      </select><br>

      
        <input type="text" name="p_price" placeholder="Product Price" required=""><br>
        <h4 align="center">Picture:<input type="file" name="fileToUpload" id="fileToUpload"></h4><br>
          
          <button type="submit" name="submit" class="button_2">Add</button>
       <span style="color:red;"><?php echo $err; ?></span>
        </form>
      </div>
    </section>










    <footer>
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
