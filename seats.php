<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats</title>
   <link rel="stylesheet" href="css/seats.css">
   <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>

</head>
<body>
    <div class="seatspace">
        <div class="cont">
        <div class="screen"><center>SCREEN THIS SIDE</center></div>
        <div class="sts">
        <table>
        <?php

        $conn = mysqli_connect("localhost","root","","mbk");
        session_start(); 
        $_SESSION['theatre']=$_POST['theatre'];
        $_SESSION['date']=$_POST['date'];
        $_SESSION['time']=$_POST['time'];
  
        $theatre=$_SESSION['theatre'];
        $date=$_SESSION['date'];
        $time=$_SESSION['time'];
        $userid=$_SESSION['Userid'];
        $mid=$_SESSION['Mid'];
        
        $q2="insert into booking(userid,mid,btime,bdate,btheatre) values('$userid','$mid','$time','$date','$theatre')";

        mysqli_query($conn,$q2);
        $_SESSION['Bid']=mysqli_insert_id($conn);

        $sql4= "update seat set status='available',bid=NULL";
        mysqli_query($conn, $sql4);

        $sql5="select * from seat_book where Mid='{$_SESSION['Mid']}' and Bdate='{$_SESSION['date']}' and Btheatre='{$_SESSION['theatre']}' and Btime='{$_SESSION['time']}'";
        $result=mysqli_query($conn, $sql5);
        
          while ($row = mysqli_fetch_assoc($result)){  
            $st=$row['Stno'];
            $sql6="update seat set status='not_available',bid='{$_SESSION['Bid']}' where Stno='$st'";
            mysqli_query($conn, $sql6);
          }

        $query="select * from seat";
        $result= mysqli_query($conn,$query);
       
      ?> 
        <?php
         for($i=0;$i<56;$i+=8)
        {
        ?>
            <tr>
            <?php
            for($j=$i;$j<$i+8;$j+=1)
              {
                $row[$j]=mysqli_fetch_assoc($result)
              ?>
              
                <td><div id="<?php echo $row[$j]["Stno"]; ?>" class="seat <?php echo $row[$j]["status"]; ?>"><?php echo $row[$j]["Stno"]; ?></div></td>
                <?php
             }
            ?>
            </tr>

            <?php
            }
            mysqli_close($conn);
            ?>
        </table>
        </div>
        <div class="btkbtn">
    <form action="snacks.php" method="post">
    <input type="hidden" name="selectedDivs" id="selectedDivs" value="">
     <input type="submit" name="submit" value="Book seats"
     style=" background-color: red;border-radius: 5px;border-style: none;color: white;
     padding: 16px 32px;text-decoration: none;margin-top: 4vh;cursor: pointer;width: 100%;    font-size: 22px;">
    </form>
    </div>
    </div>
    </div>
    <a href="book.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;left: 3vw;font-size: 20px;color:white;">&#8592;Reselect</div></a>
    <script>
    const seats = document.querySelectorAll('.seat');

    seats.forEach(function(seat) {
  seat.addEventListener('click', function() {
    if (!seat.classList.contains('not_available')) {
      seat.classList.toggle('selected');
    } 
        const selectedSeats = document.querySelectorAll('.selected');
        const selectedSeatsIds = Array.from(selectedSeats).map(seat => seat.id);
        document.getElementById('selectedDivs').value = selectedSeatsIds.join(',');
      });
    });
  </script>

</body>
</html>

