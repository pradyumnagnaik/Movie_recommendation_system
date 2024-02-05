<?php
 $conn = mysqli_connect("localhost","root","","mbk");
session_start();
$q1='update snacks set sqty=0';
mysqli_query($conn,$q1);
 
$query="select * from snacks where status='use'";
$result= mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
    $i=$_POST[$row["Sid"]];

    if ($i!=0) {
        $id=$row['Sid'];
        $bid=$_SESSION['Bid'];
        $q2="insert into snack_book values('$bid','$id','$i')";
        mysqli_query($conn,$q2);
    }
}

$sql1="insert into payment(Userid,Bid) values({$_SESSION['Userid']},{$_SESSION['Bid']})";
mysqli_query($conn,$sql1);
$_SESSION['Pid']=mysqli_insert_id($conn);

$sql2="update payment SET snack_price=(SELECT SUM(S.Sprice * SB.qty) FROM Snacks S JOIN Snack_book SB ON S.Sid = SB.sid WHERE SB.Bid=payment.Bid);";
mysqli_query($conn,$sql2);
$sql3="update payment SET Movie_price=(SELECT SUM(M.Mprice * {$_SESSION['nos']}) FROM booking B JOIN movie M ON B.Mid = M.Mid WHERE B.Bid=payment.Bid);";
mysqli_query($conn,$sql3);
$sql4="update payment SET tot_price=Movie_price+snack_price where pid={$_SESSION['Pid']};";

mysqli_query($conn,$sql4);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sumry.css">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
</head>
<body>
    <div class="mname">
    <?php
    $qry="select * from movie where Mid='{$_SESSION['Mid']}'";
    $rest= mysqli_query($conn,$qry);
    $rowi=mysqli_fetch_assoc($rest);
    $reslt=mysqli_query($conn,$qry);
    ?>
    <div class="image"><img src="<?php echo $rowi["M_image"]; ?>" alt="error" width="100" height="100"></div>
   <div class="mcont">
   <?php
    while($row=mysqli_fetch_assoc($reslt))
    {
        $name=$row['Mname'];
        $duration=$row['M_duration'];
        $_SESSION['mprice']=$row['Mprice'];
        echo "$name";
        echo "<br>";
        echo "$duration";
        echo "<br>";
        echo "{$_SESSION['date']}";
        echo "<br>";
        echo "{$_SESSION['time']}";
        echo "<br>";
        echo "{$_SESSION['theatre']}";
        echo "<br>";

    }
    ?>
   </div>
    </div>
    <div class="summary">
        <div class="heading">Booking summary</div>
        <div class="heading cont">Movie seats</div>
        <div class="content" style="font-size: 20px;">
            <?php
            $query1="select * from seat_book where Bid='{$_SESSION['Bid']}'";
            $result= mysqli_query($conn,$query1);

            while($row=mysqli_fetch_assoc($result))
            {
                $no=$row['Stno'];
                echo "$no";
                echo "<br>";
            }
                $tot=$_SESSION['nos']*$_SESSION['mprice'];
                $_SESSION['mtot']=$tot;
                echo "Total :&#8377; $tot";
            ?>
        </div>
        <div class="heading cont">Food and Beverages</div>
        <div class="content" style="font-size: 20px;">
        <?php
            $query2="select * from snack_book where Bid='{$_SESSION['Bid']}'";
            $result= mysqli_query($conn,$query2);
            $stot=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $sid=$row['Sid'];
                $qty=$row['qty'];
                $query3="select * from snacks where Sid=$sid";
                $result1= mysqli_query($conn,$query3);
                $row1=mysqli_fetch_assoc($result1);
                $name=$row1['Sname'];
                $price=$row1['Sprice'] * $qty;
                $stot=$stot+$price;
                echo "$name ($qty) - &#8377; $price";
                echo "<br>";
            }
            echo "Total: &#8377;$stot";
            $_SESSION['stot']=$stot;
            $_SESSION['total']=$_SESSION['mtot']+$_SESSION['stot'];
            ?>
        </div>
        <div bttn>
            <form action="Payment.php">
            <input type="submit" name="submit" value="Pay &#8377;<?php echo $_SESSION['total']; ?>"
     style=" background-color: red;border-radius: 5px;border-style: none;color: white;
     padding: 16px 32px;text-decoration: none;margin-top: 4vh;cursor: pointer;width: 100%;    font-size: 22px;">
            </form>
            <form action="movies.php" method="post">
                <input type="hidden" name="pid" value="<?php echo "{$_SESSION['Pid']}";?>">
                <input type="submit" name="cancel" value="Cancel now" style=" background-color: red;border-radius: 5px;border-style: none;color: white;padding: 16px;text-decoration: none;margin-top: 2vh;cursor: pointer;width: 10%;font-size: 22px;position: absolute;top: 20px;right: 3vw;">
            </form>
        </div>
    </div>
</body>
</html>


