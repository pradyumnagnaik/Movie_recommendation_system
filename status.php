<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
    <link rel="stylesheet" href="css/status.css">
</head>
<body>
<div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
    <br>
 <h1 style=" color: white;font-size: 28px;">Your ticket status</h1>
 
 <?php
session_start();
$conn = mysqli_connect("localhost","root","","mbk");
$sql1="select * from payment where Userid='{$_SESSION['Userid']}'";
$result=mysqli_query($conn, $sql1);
        
while ($row = mysqli_fetch_assoc($result)){ 
    $bid=$row['Bid'];
    $sql2="select * from seat_book where Userid='{$_SESSION['Userid']}' and Bid='$bid'";
    $result1=mysqli_query($conn, $sql2);
            while ($row1 = mysqli_fetch_assoc($result1)){ 
                $mid=$row1['Mid'];
                $sql3="select * from movie where mid='$mid'";
                $result2=mysqli_query($conn, $sql3);
                while ($row2 = mysqli_fetch_assoc($result2)){
                    $_SESSION['mimg']=$row2["M_image"];
                    $_SESSION['mname']=$row2["Mname"];
                }
                $_SESSION['theatre']=$row1["Btheatre"];
                $_SESSION['time']=$row1["Btime"];
                $_SESSION['date']=$row1["Bdate"];
                break;
            }

?>
<div class="ticket">
 <div class="timg"><img src="<?php echo $_SESSION['mimg']; ?>" alt="error" style=" width: 100%;height: 100%;border-radius: 15px;
}"></div>
        <div class="tcont">
            <div class="tinfo">
                <ul>
                    <li><?php echo   $_SESSION['mname']; ?></li>
                    <li><?php echo   $_SESSION['theatre'];?></li>
                    <li><?php echo  $_SESSION['date']?></li>
                    <li><?php echo $_SESSION['time'] ?></li>
                </ul>
            </div>     
            <div class="price">Tickets: &#8377; <?php echo $row['Movie_price']; ?><br>
            <?php
             $sql4="select * from seat_book where Userid='{$_SESSION['Userid']}' and Bid='$bid'";
             $result3=mysqli_query($conn, $sql4);
                     while ($row3 = mysqli_fetch_assoc($result3)){ 
                         $st=$row3['Stno'];
            echo $st;
            echo " ";
                     }
            ?> 
            </div>
            <div class="price">Snacks: &#8377; <?php echo $row['snack_price']; ?></div>
            <div class="price">Total: &#8377; <?php echo $row['tot_price']; ?></div>
        </div>
        <div class="qr">
        <div class="QR"></div>
            <div class="idd">Booking id: <?php echo $row['Bid']; ?></div>
            <div class="idd">payment id: <?php echo $row['Pid']; ?></div>
        </div>
        </div>
        
<?php
}
?>

<div class="welcome" style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 10vw;font-size: 20px;color:white;">Hi, <?php echo   $_SESSION['uname']; ?> </div>
        <a href="index.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 3vw;font-size: 20px;color:white;">Home</div></a>


</body>
</html>