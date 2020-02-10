<?php
  session_start();
  include "includes/db_connect.inc.php";
  $pname=$_SESSION["name"] ;;
   $sqlUserCheck1 = "SELECT p_id,p_price,p_picture,p_catagory FROM product where p_name='$pname'";
    $result1 = mysqli_query($conn, $sqlUserCheck1);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
 
    if(isset($_POST['buy']))
    {
      if(isset($_POST['p_qty']))
    {
      $pCatagory = mysqli_real_escape_string($conn, $_POST['p_qty']);
      while ($row=mysqli_fetch_assoc($result1)) { 
    $p_select2= $row["p_id"];
    $p_select3= $_SESSION['username'];
    $p_select4= $_SESSION['name'];
    $p_select5= $pCatagory;
    $p_select6= $row["p_price"];
  
       
       $sqlUserCheck6 = "INSERT INTO buy(product_id,user_name,product_name,product_qty,product_price) VALUES('$p_select2','$p_select3','$p_select4','$p_select5','$p_select6')";
       mysqli_query($conn, $sqlUserCheck6);
       header("Location: index.php");
     }
    }
    }

    if(isset($_POST['cart']))
    {
      if(isset($_POST['p_qty']))
    {
      $pCatagory = mysqli_real_escape_string($conn, $_POST['p_qty']);
      while ($row=mysqli_fetch_assoc($result1)) { 
    $p_select2= $row["p_id"];
    $p_select3= $_SESSION['username'];
    $p_select4= $_SESSION['name'];
    $p_select5= $pCatagory;
    $p_select6= $row["p_price"];
  
       
       $sqlUserCheck6 = "INSERT INTO cart(product_id,user_name,product_name,product_qty,product_price) VALUES('$p_select2','$p_select3','$p_select4','$p_select5','$p_select6')";
       mysqli_query($conn, $sqlUserCheck6);
       header("Location: index.php");
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
    <title>Product Details</title>
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
            <li ><a href="index.php">Home</a></li>
            
            <li><a href="profile.php">Profile</a></li>
            
          </ul>
        </nav>
      </div>

    </header>



  


   <br> 

<center> <h1 >Details</h1></center>
 <div class="responsive">
            <div class="gallery">
              <center>
<?php
      while ($row=mysqli_fetch_assoc($result1)) { 
           


        ?>
<img src="<?php echo $row["p_picture"] ?>">
<center>
 Name:<?php echo $_SESSION["name"] ;?><br>
 Price:<?php echo $row["p_price"] ;?><br>
 Catagory:<?php echo $row["p_catagory"] ;?><br>

  <?php
 }

?>
<form method="post">
Quantity:  <select name="p_qty" required="" >
         
         <option> 1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
      </select><br><br>


<button type="submit" name="buy" class="buy">Buy</button>
<button type="submit" name="cart"class="cart">Add to cart</button>

</center>
</form>



    <footer>
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
