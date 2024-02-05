<?php
  $conn = mysqli_connect('localhost','root','','mbk');
   if(isset($_POST['submit']))
   {      
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phno = mysqli_real_escape_string($conn, $_POST['phno']);
      $pass = md5($_POST['password']);
      $cpass = md5($_POST['confirmPassword']);

      $sql1 = " select * from user where email = '$email' and password = '$pass' ;";

      $result1 = mysqli_query($conn, $sql1);

      $num1 = mysqli_num_rows($result1);

      $sql2 = " select * from user where email = '$email' ;";

      $result2 = mysqli_query($conn, $sql2);

      $num2 = mysqli_num_rows($result2);

      if($num1 > 0)
      {
         mysqli_close($conn);
         $error = 'user already exist!';

      }
      elseif($num2 > 0 )
      {
         mysqli_close($conn);
         $error = 'user with this Email-ID is already exist , please enter proper Email-ID!';
         
      }
      else
      {

         if($pass != $cpass)
         {
            mysqli_close($conn);
            $error = 'Password is not matched!';

         }
         else
         {
            $insert = "insert into  user(email,password,Name,Ph_no) VALUES('$email','$pass','$name','$phno')";
            mysqli_query($conn, $insert);
            mysqli_close($conn);
            header('location:LoginPage.php',true);
         }
      }

   };


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
            <h3>Register For Free</h3>

            <?php
               if(isset($error))
               {
                  echo '<span class="error-msg">'.$error.'</span>';
               };
            ?>

            <input type="text" name="name"  placeholder="Enter your Name" required>
            <input type="email" name="email"  placeholder="Enter your Email-ID" required>
            <input type="text" name="phno"  placeholder="Enter your Phone Number" required>
            <input type="password" name="password"  placeholder="Enter your Password" required>
            <input type="password" name="confirmPassword"  placeholder="Confirm your Password" required>
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>already have an account? <a href="LoginPage.php">Login now</a></p>
         </form>

      </div>
      </div>
      <a href="index.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 3vw;font-size: 20px;color:white;">Home</div></a>
   </body>
</html>

