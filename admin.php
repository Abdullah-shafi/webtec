<?php
  session_start();
  include "includes/db_connect.inc.php";
  $name="";
   $sqlUserCheck1 = "SELECT p_id,p_name,p_price,p_picture,p_catagory FROM product where  Delete_id='0'";
    $result1 = mysqli_query($conn, $sqlUserCheck1);
    $sqlUserCheck2 = "SELECT * FROM cart";
    $result2 = mysqli_query($conn, $sqlUserCheck2);
 $sqlUserCheck5 = "SELECT * from buy";
    $result5 = mysqli_query($conn, $sqlUserCheck5);
 
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


 

<center> <h1>Administrator[Welcome,<span class="highlights"><?php echo $_SESSION['username']?></span>]</h1></center>



 <section >
      <div class="container">
         
        <form>
           <h1>All Product Details:</h1>
       
<table>
  <tr>
    <th>Product_Id</th>
    <th>Product_Name</th>
    <th>Product_Price</th>
    <th>Product_Catagory</th>
  </tr>
  <?php
  while ($row=mysqli_fetch_assoc($result1)){
    echo "<tr><td>".$row["p_id"]."</td><td>".$row["p_name"]."</td><td>".$row["p_price"]."</td><td>".$row["p_catagory"]."</td></tr>";
   
  }
  echo "</table>";
  ?>
  

       
        
       
        </form>
      </div>
    </section>


<center>
      <h1>All Cart Product :</h1>
    <section >
      <div class="container">
         
        <form method="post">
           
      
<table>
  <tr>
    <th>Customer_Name</th>
    <th>Product_Name</th>
    <th>Product_Price</th>
    <th>Product_Qty</th>
    <th>Total_Price</th>
    

  </tr>
  <?php
  $count=0;
  while ($row=mysqli_fetch_assoc($result2)){
    echo "<tr><td>".$row["user_name"]."</td><td>".$row["product_name"]."</td><td>".$row["product_price"]."</td><td>".$row["product_qty"]."</td><td>".$row["product_price"]*$row["product_qty"]."</td><td></tr>";
   $count=$count+($row["product_price"]*$row["product_qty"]);
  }
  echo "</table>";
  ?>
  Total Cart Price=<?php echo $count?>
<br>
</center>
  
</form>
      </div>
    </section>


<br>
<br>
<center>
<h1>Alreday Bought Product :</h1> 
<section >
      <div class="container">
         
        <form method="post">
<table>
  <tr>
    <th>Customer_Name</th>
    <th>Product_Name</th>
    <th>Product_Price</th>
    <th>Product_Qty</th>
    <th>Total_Price</th>

  </tr>
  <?php
  $count1=0;
  while ($row=mysqli_fetch_assoc($result5)){
    echo "<tr><td>".$row["user_name"]."</td><td>".$row["product_name"]."</td><td>".$row["product_price"]."</td><td>".$row["product_qty"]."</td><td>".$row["product_price"]*$row["product_qty"]."</td></tr>";
   $count1=$count1+($row["product_price"]*$row["product_qty"]);
  }
  echo "</table>";
  ?>
  Total Sell Price=<?php echo $count1?>
<br>
</center>
       
        
       
        </form>
      </div>
    </section>











    <footer>
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
