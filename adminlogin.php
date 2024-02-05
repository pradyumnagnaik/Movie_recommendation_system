
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/appp.css" />
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
</head>
<body>
<div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
    <br> 
  <div class="superparent" style=" justify-content: flex-end; margin-top: 60px;">
    
<div class="parent"  >
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" autocomplete="off"> 
 
  <label for="email"><b style="font-size: larger; color: rgb(0, 246, 0);">ADMIN EMAIL ID:</b></label><br>
    <input type="text"  name="email" required><br>
    <label for="password"><b style="font-size: larger; color: rgb(0, 246, 0);">PASSWORD:</b></label><br>
    <input type="password"  name="password1" required><br><br>
    <input type="submit" name="save" id="button" value="Login">
  </form> 
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['save'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mbk";

$conn=mysqli_connect($servername,$username,$password,$dbname);

$usernm=$_POST['email'];
$psswd=$_POST['password1'];
$query="select * from user where email='$usernm' and password='$psswd'and userid=143";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
    echo "Login Succesful";
    
    header('LOCATION:adminpage.php');
    exit();

}
else
{
  echo '<span class="error-msg">Invalid email or password!!</span>';
}
}
?>