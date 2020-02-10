
<?php
$name=$p_select1=$p_select2="";
  include "includes/db_connect.inc.php";
  session_start();
  $sqlUserCheck1 = "SELECT p_name,p_price,p_picture FROM product where p_catagory='mobile' ";
    $result1 = mysqli_query($conn, $sqlUserCheck1);
  $sqlUserCheck2 = "SELECT p_name,p_price,p_picture FROM product where p_catagory='watch' ";
    $result2 = mysqli_query($conn, $sqlUserCheck2);

if($_SERVER["REQUEST_METHOD"]=="POST"){
  while ($row=mysqli_fetch_assoc($result2)) { 
    $p_select2= $row["p_name"];
    if(isset($_POST[$p_select2]))
    {
       echo $p_select2;
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
            <li class="current"><a href="ab.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="Signin.php">SignIn</a></li>
            <li><a href="SignUp.php">SignUp</a></li>
          </ul>
        </nav>
      </div>

    </header>

<marquee behavior="scroll" direction="left"><h2>Welcome to our online shopping, Here you will find all kind of product</h2></marquee>

  
<section id="search">
      <div class="container">
        
        <form>
          <input type="text" placeholder="what product you want...">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </section>



<section id="Mobile">
      <div class="container">
        
        
        <h1>Mobile:</h1>
<form method="post" >
      <?php
      while ($row=mysqli_fetch_assoc($result2)) { 
           


        ?>

         <div class="responsive" >
            <div class="gallery">
        
            <button id="close-image" name=<?php echo $row["p_name"]; ?> ><img src="<?php echo $row["p_picture"] ?>"></button>
            <div class="desc"><?php echo $row["p_name"]; ?><h3 >Tk. <?php echo $row["p_price"] ?></h3> </div>
            </div>
            </div>


            

    <?php
 }
        ?>
        <div class="responsive">
            <div class="gallery">
           
            <button id="close-image" name="p"><img src="./image/More.png"></button>
            <div class="desc">For<h3 >More</h3> </div>
            </div>
            </div>
        </form>
          
           
        
      </div>


    </section>










    <footer>
      <p> Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
