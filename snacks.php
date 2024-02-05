<?php

$conn = mysqli_connect("localhost","root","","mbk");

$query="select * from snacks where status='use'";
$result= mysqli_query($conn,$query);
session_start();

 $seatno = explode(",", $_POST['selectedDivs']);
 $_SESSION['nos']=count($seatno);
 
    foreach($seatno as $st):
      $sql1 = "UPDATE seat set status='not_available' where Stno='$st'";
      $sql2 = "update seat set bid='{$_SESSION['Bid']}' where Stno='$st'";
      $sql3 = "insert into seat_book(Bid,Mid,Bdate,Btheatre,Btime,Userid,Stno) values('{$_SESSION['Bid']}','{$_SESSION['Mid']}','{$_SESSION['date']}','{$_SESSION['theatre']}','{$_SESSION['time']}','{$_SESSION['Userid']}','$st')";
      mysqli_query($conn, $sql1);
      mysqli_query($conn, $sql2);
      mysqli_query($conn, $sql3);
  endforeach;  

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/snack.css">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
</head>
<body>
<div class="proc">
    <h1 style="color:white;">Grab a <span style="color:red;">bite !</span> </h1>
</div>
<form action="summary.php" method="post">
<div class="flow">

<?php
    while($row=mysqli_fetch_assoc($result))
    {
?>

 <div class="ab">
    <div class="im">
    <img src="<?php echo $row["Simg"]; ?>"></div>
    <div class="nme"><?php echo $row["Sname"]; ?></div>
    <div class="nme" style="color:red;font-size: 25px;">&#8377;<?php echo $row["Sprice"]; ?></div>
    <div class="drop">
    <label for="Snkqty">Add quantity:</label>
    <select name="<?php echo $row["Sid"]; ?>">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
    </div>
 </div>
<?php
    }
?>
</div>
<input type="submit" value="Proceed">
</form> 
</body>
</html>