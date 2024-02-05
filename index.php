<?php
session_start();
if(isset($_POST['flag']) && !isset($_SESSION['alert_displayed']))
{
    echo '<script>alert("Payment successful");</script>';
    $_SESSION['alert_displayed'] = true;
}

if(isset($_POST['Logout']))
   {
    $_SESSION['log']="logout";
    session_destroy(); 
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Cine Verse</title>
    <script>
$(document).ready(function(){
    $(".log").hide();
  $(".logname").click(function(){
    $(".log").toggle();
  });
});
</script>
</head>
<body>
    <div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
    <div class="webimg"></div>
    <div class="optn">
        <form action="Demo.php" method="post">
            <input type="submit" name="name" value="Book Tickets" >
        </form></div>
    <div class="optn">
        <form action="Demo.php" method="post">
            <input type="submit" name="name" value="Ticket status">
        </form>
    </div>
    <div class="optn">
        <form action="Demo.php" method="post">
            <input type="submit" name="name" value="Cancel Tickets">
        </form>
    </div>
    
    <div class="about">
        <h1>Cine Verse</h1>
        <p style="font-size: 15px;">Welcome to CINE VERSE, your one-stop destination for all your movie needs. Whether you're looking to buy tickets, view showtimes, or read reviews, we've got you covered. With a wide selection of the latest releases, as well as classic favorites, there's something for everyone at CINE VERSE. Our easy-to-use website makes it simple to find the perfect movie for you, and our secure ticket purchasing system ensures that your transaction is safe and secure. So come and explore the exciting world of cinema at CINE VERSE today!<br> Our mission is to make the process of buying movie tickets as simple as possible. We strive to provide our customers with the most up-to-date information on movies and showtimes, as well as the best prices and deals. With CINE VERSE, you can be sure that you're getting the best value for your money. We're committed to providing an enjoyable and convenient movie-going experience, so come and see us today!</p>
    </div>
    <div class="contact">
        <div class="c1"><h3>Cine Verse</h3>
        <ul>
            <li>About Us</li>
            <li>In News</li>
            <li>Privacy Policy</li>
            <li>Terms and Conditions</li>

        </ul></div>
        <div class="c1"><h3>Help</h3>
            <ul>
                <li>Contact Us</li>
                <li>FAQ's</li>
                <li>Support</li>
            </ul></div>
            <div class="c1"><h3>Download Our App</h3><br>
                <img src="webimg/dwnld1.webp" alt="error" width="150px"><br><img src="webimg/dwnld2.png" alt="error" width="150px"></div>
            <div class="c1"><h3>Get Social With Us</h3>
            <div class="social">
                <img src="webimg/soc1.webp" alt="error" width="50px">
                <img src="webimg/soc3.png" alt="error" width="50px">
                <img src="webimg/soc4.webp" alt="error" width="50px">
                <img src="webimg/soc2.png" alt="error" width="50px">
            </div>
            </div>
    </div> 
    <footer>
        <p>Copyright © 2021-2023 Movie bookking Pvt Ltd</p>
    </footer>
    <form action="">
        <input type="button" value="Admin" onclick="window.location='adminlogin.php';" style="border: none;border-radius: 10px;font-weight: bold;color:white; background-color: blue;
    padding: 16px 32px;text-decoration: none;margin: 4px 2px;cursor: pointer;position: absolute;
    top: 6px;right: 3vw;">
    </form>
    <?php
    
    if (isset($_SESSION['log']) && $_SESSION['log']=="login") {
        ?>
        <div class="logname">Hi, <?php echo   $_SESSION['uname']; ?></div>
         <form action="" method="post" class="log">
        <input type="submit" value="Logout" name="Logout">
    </form>
    <?php
    }
    ?>
</body>

</html>