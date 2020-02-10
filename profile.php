
<?php
$name=$p_select1=$p_select2=$message="";
  include "includes/db_connect.inc.php";
  session_start();
  
  if ($_SESSION['username']!="") {
  $name=$_SESSION['username'];
  $sqlUserCheck1 = "SELECT id,first_name,last_name,address FROM user where user_name='$name'";
    $result1 = mysqli_query($conn, $sqlUserCheck1);
  $sqlUserCheck2 = "SELECT product_id, product_name,product_qty,product_price FROM cart where user_name='$name'";
    $result2 = mysqli_query($conn, $sqlUserCheck2);

     $sqlUserCheck5 = "SELECT product_id, user_name,product_name,product_qty,product_price FROM buy where user_name='$name'";
    $result5 = mysqli_query($conn, $sqlUserCheck5);
    }
    else
    {
      
      $message = "Please,Sign In First";
      echo "<script >alert('$message');</script>";
      header("Location: index.php");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
  while ($row=mysqli_fetch_assoc($result2)) { 
    $p_select2= $row["product_id"];
    $p_select3= $_SESSION['username'];
    $p_select4= $row["product_name"];
    $p_select5= $row["product_qty"];
    $p_select6= $row["product_price"];
    if(isset($_POST[$p_select2]))
    {
       $sqlUserCheck3 = "DELETE FROM cart where product_id='$p_select2'";
       mysqli_query($conn, $sqlUserCheck3);
       header("Location: profile.php");
    }
    if(isset($_POST['b_now']))
    {
      
      $sqlUserCheck6 = "INSERT INTO buy(product_id,user_name,product_name,product_qty,product_price) VALUES('$p_select2','$p_select3','$p_select4','$p_select5','$p_select6')";
       mysqli_query($conn, $sqlUserCheck6);
       $sqlUserCheck3 = "DELETE FROM cart where product_id='$p_select2'";
       mysqli_query($conn, $sqlUserCheck3);
       header("Location: profile.php");
       
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
    
            <li class="current"><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>
        </nav>
      </div>



    </header>

    <h3>User_Name: <?php echo $_SESSION['username'] ;?></h3>
    <?php
      while ($row=mysqli_fetch_assoc($result1)) { ?>
      <h3>User_ID: <?php echo $row["id"] ;?></h3>
      <h3>First_Name: <?php echo $row["first_name"] ;?></h3>
      <h3>Last_Name: <?php echo $row["last_name"] ;?></h3>
      <h3>Address: <?php echo $row["address"] ;?></h3>
      <?php
      }
    ?>


    <center>
<h1>All Cart Product :</h1>
    <section >
      <div class="container">
         
        <form method="post">
           
      
<table>
  <tr>
    <th>Product_Name</th>
    <th>Product_Price</th>
    <th>Product_Qty</th>
    <th>Total_Price</th>
    <th>Remove</th>

  </tr>
  <?php
  $count=0;
  while ($row=mysqli_fetch_assoc($result2)){
    echo "<tr><td>".$row["product_name"]."</td><td>".$row["product_price"]."</td><td>".$row["product_qty"]."</td><td>".$row["product_price"]*$row["product_qty"]."</td><td>"?><button name="<?php echo $row["product_id"]; ?>">Remove</button><?php echo "</td></tr>";
   $count=$count+($row["product_price"]*$row["product_qty"]);
  }
  echo "</table>";
  ?>
  Total Price=<?php echo $count?>
<br>
</center>
  <center><button name="b_now" class="b_now">Buy Now !</button></center>
 
</form>
      </div>
    </section>


<br>
<center>
<h1>Alreday Bought Product :</h1> 
<section >
      <div class="container">
         
        <form method="post">
<table>
  <tr>
    <th>Product_Name</th>
    <th>Product_Price</th>
    <th>Product_Qty</th>
    <th>Total_Price</th>

  </tr>
  <?php
  $count1=0;
  while ($row=mysqli_fetch_assoc($result5)){
    echo "<tr><td>".$row["product_name"]."</td><td>".$row["product_price"]."</td><td>".$row["product_qty"]."</td><td>".$row["product_price"]*$row["product_qty"]."</td></tr>";
   $count1=$count1+($row["product_price"]*$row["product_qty"]);
  }
  echo "</table>";
  ?>
  Total Price=<?php echo $count1?>
<br>
</center>
       
        
       
        </form>
      </div>
    </section>


  </body>
  </html>
