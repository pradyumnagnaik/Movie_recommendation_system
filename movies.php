<?php

$conn = mysqli_connect("localhost","root","","mbk");
// deleting from summary 
if(isset($_POST['cancel'])){
    $pid=$_POST["pid"];
    $sql="delete from payment where pid='$pid'";
    mysqli_query($conn,$sql);
}

$query="select * from movie where status='show'";
$result= mysqli_query($conn,$query);

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="css/movies.css">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
</head>
<body>
<div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
    <br> 

<h2 style="color:white;font-size:30px;"><span style="color:red;">Movies</span> showing now <span style="color:red;">!!</span></h2>    
<div class="flow">
<?php
    while($row=mysqli_fetch_assoc($result))
    {
        
?>
 <div class="ab">
    <div class="im">
    <a href="LoginPage.php?id=<?php echo $row['Mid']?>"><img src="<?php echo $row["M_image"]; ?>" alt="error" ></a></div>
    <div class="nme"><?php echo $row["Mname"]; ?></div>
    <div class="text"><?php echo $row["M_category"]; ?></div>
    <div class="text"><?php echo $row["M_language"]; ?></div>
 </div>
<?php
    }
?>
</div>
<a href="index.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 3vw;font-size: 20px;color:white;">Home</div></a>
</body>
</html>