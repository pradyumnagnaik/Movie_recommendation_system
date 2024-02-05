
<?php
   session_start();
   $conn = mysqli_connect('localhost','root','','mbk');
   
   if(isset($_GET['id']))
      $_SESSION['Mid'] = $_GET['id'];

   if (isset($_SESSION['log'])) {
      if($_SESSION['log']=="login")
   {
      if($_SESSION['name'] == "Book Tickets")
            header('location:book.php',true);
         elseif ($_SESSION['name'] == "Cancel Tickets") {
            header('location:Cancel.php',true);
         }
         else
            header('location:status.php',true);
   }      
  }

?>

<?php
   if(isset($_POST['submit']))
   {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = md5($_POST['password']);
      $select = " select * from user where email = '$email' and password = '$pass' ";

      $result = mysqli_query($conn, $select);

      $num = mysqli_num_rows($result);
      if( $num > 0)
      {
         $row = mysqli_fetch_array($result);
         $_SESSION['Userid'] = $row['Userid'];
         $_SESSION['uname'] = $row['Name'];
         $_SESSION['log'] = "login";
         mysqli_close($conn);
         if($_SESSION['name'] == "Book Tickets")
            header('location:book.php',true);
         elseif ($_SESSION['name'] == "Cancel Tickets") {
            header('location:Cancel.php',true);
         }
         else
            header('location:status.php',true);
      }
      else
      {
         mysqli_close($conn);
         $error = 'incorrect email or password!';
      }

   }
?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css/login.css">
      <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
   </head>

   <body>
   <div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
      <div class="background-image">
         <div class="form-container">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
               <h3>Login Page</h3>

               <?php    
                  if(isset($error))
                  {
                     echo '<span class="error-msg">'.$error.'</span>';
                  };
               ?>

               <input type="email" name="email" placeholder="Enter Your Email" required >
               <input type="password" name="password" placeholder="Enter Your Password" required >
               <input type="submit" name="submit" value="Login now" class="form-btn">
               <p>don't have an account? <a href="RegisterPage.php">Register now</a></p>
            </form>

         </div>
      </div>
      <a href="index.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 3vw;font-size: 20px;color:white;">Home</div></a>
   </body>
</html>

