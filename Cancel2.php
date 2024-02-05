
<?php
session_start();
$conn = mysqli_connect("localhost","root","","mbk");
$bid=$_POST['bid'];

$sql1="delete from payment where Bid='$bid'";
$sql2="delete from snack_book where Bid='$bid'";
$sql5="delete from booking where Bid='$bid'";

mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);

$sql3="select * from seat_book where Bid='$bid'";
$result=mysqli_query($conn, $sql3);
        
          while ($row = mysqli_fetch_assoc($result)){  
            $st=$row['Stno'];
            $sql6="update seat set status='available',bid=NULL where Stno='$st'";
            mysqli_query($conn, $sql6);
          }
$sql4="delete from seat_book where Bid='$bid'";
mysqli_query($conn,$sql4);
mysqli_query($conn,$sql5);
header("location: Cancel.php", true);

?>
