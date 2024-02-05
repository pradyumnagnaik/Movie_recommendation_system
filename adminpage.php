<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminpage.css">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
  $(".child").hide();
 
  $(".p0").click(function(){
    $(".c0").toggle();
  });
  $(".p1").click(function(){
    $(".c1").toggle();
  });
  $(".p2").click(function(){
    $(".c2").toggle();
  });
  $(".p3").click(function(){
    $(".c3").toggle();
  });
  $(".p4").click(function(){
    $(".c4").toggle();
  });
});
</script>
<?php

$conn = mysqli_connect("localhost","root","","mbk");
session_start();
    if(isset($_POST['save1']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['movie']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $duration = mysqli_real_escape_string($conn, $_POST['duration']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $lang = mysqli_real_escape_string($conn, $_POST['lang']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $sql = "select * from movie;";
        $res = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($res);
           while ($row = mysqli_fetch_assoc($res))
           {
                $Mid = $row['Mid'];
            }
            if( $num==0)
                $Mid=0;
        
            $insert = "insert into movie VALUES($Mid+1,'$name','$image','$link','$desc','$duration','$category','$lang','$price','$date','show')";
            mysqli_query($conn, $insert);
            mysqli_close($conn);
        
    }
    if(isset($_POST['save3']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['movie']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $sql = "select * from snacks;";
        $res = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($res);
           while ($row = mysqli_fetch_assoc($res))
           {
                $Sid = $row['Sid'];
            }
            if( $num==0)
                $Sid=0;
            $qty=0;
            $insert = "insert into snacks VALUES($Sid+1,'$name','$image','$price','$qty','use')";
            mysqli_query($conn, $insert);
            mysqli_close($conn);
        }
?>
</head>
<body>
<div class="nav"  style="height: 10vh">
    <img src="webimg/mlogo.png" class="image">
    <img src="webimg/cine.png" class="image">
    </div>
    <br> 
    <div class="parent p0">Total Collection</div>
    <div class="child c0">
        <table id="movie">
        <caption>Movie Collection</caption>
          <tr>
          <th>Movie id</th>
          <th>Movie image</th>
          <th>Movie name</th>
          <th>Ticket price</th>
          <th>Tickets sold</th>
          <th>Net collection</th>
        </tr>
        <?php
         $conn = mysqli_connect("localhost","root","","mbk");
         $query = "SELECT * FROM movie";
         $query = "SELECT * FROM movie_view";
         $result=mysqli_query($conn,$query);
         while($r=mysqli_fetch_array($result))
         {
          $mid=$r['Mid'];
          $mname=$r['Mname'];
          $mimg=$r['M_image'];
          $price=$r['Mprice'];
          $count = $r['count'];
          $coll=$r['collection'];
        ?>
          <tr>
          <td><?php echo "$mid";?></td>
          <td><img src="<?php echo "$mimg";?>" alt="error" width=100 height=100></td>
          <td><?php echo "$mname";?></td>
          <td><?php echo "$price";?></td>
          <td><?php echo "$count";?></td>
          <td>&#8377;<?php echo "$coll";?></td>
          </tr>
          <?php
         }
         ?>  
  </table>
  <br>
        <table id="movie">
        <caption>Snacks Collection</caption>
          <tr>
          <th>Snacks id</th>
          <th>Snacks image</th>
          <th>Snacks name</th>
          <th>Snack Price</th>
          <th>Quantity sold</th>
          <th>Net collection</th>
        </tr>
        <?php
         $conn = mysqli_connect("localhost","root","","mbk");
         $query = "SELECT * FROM snack_view";
         $result=mysqli_query($conn,$query);
         while($r=mysqli_fetch_array($result))
         {
          $sid=$r['Sid'];
          $sname=$r['Sname'];
          $simg=$r['Simg'];
          $price=$r['Sprice'];
          $count = $r['count'];
          $coll=$r['collection'];
        ?>
          <tr>
          <td><?php echo "$sid";?></td>
          <td><img src="<?php echo "$simg";?>" alt="error" width=100 height=100></td>
          <td><?php echo "$sname";?></td>
          <td><?php echo "$price";?></td>
          <td><?php echo "$count";?></td>
          <td>&#8377;<?php echo "$coll";?></td>
          </tr>
          <?php
         }
?>
    </table>
    </div>

    <div class="parent p1">Insert new movie</div>
    <div class="child c1">
    <form action="" method="POST" autocomplete="off">
      
      <input style="margin-top: 30px;" type="text" name="movie" placeholder="Enter the Movie Name" size="50"/>
      <br/><br/>
      <input type="text" name="image" placeholder="Movie Image" size="50"/>
      <br/><br/>
      <input type="text" name="link" placeholder="Movie Trailer Link" size="50"/>
      <br/><br/>
      <textarea name="desc" rows="2" cols="46" placeholder="Enter description"></textarea>
      <br/><br/>
      <input type="text" name="duration" placeholder="Enter the Movie Duration" size="50"/>
      <br/><br/>
      <input type="text" name="category" placeholder="Enter the Movie Category" size="50"/>
      <br/><br/>
      <input type="text" name="lang" placeholder="Enter the Language of the Movie" size="50"/>
      <br/><br/>
      <input type="text" name="price" placeholder="Enter the Movie show Price" size="50"/>
      <br/><br/>
      <input type="text" name="date" placeholder="Enter the Movie Realease Date" size="50"/>
      <br/><br/>
      <input type="submit" name="save1" value="submit">
  </form>
  </div>
    <div class="parent p2">Delete movie</div>
    <div class="child c2">
      <form action="" method="post">
    <?php
    $conn = mysqli_connect("localhost","root","","mbk");
    $query = "SELECT * FROM movie where status='show'";
    $result=mysqli_query($conn,$query);
    ?>
    <select name="delelement" style="margin-top: 30px;">
    </br></br>
    <option>-SELECT A MOVIE TO DELETE-</option>
    <?php

    while($r=mysqli_fetch_array($result))
    {
    ?>
    <option><?php echo $r['Mname'];?></option>
    <?php
    }
    ?>  
    </select>
    <input type="submit" name="save2" value="proceed">
    </form>
    <?php
    if(isset($_POST['save2'])){
    $delmov=$_POST["delelement"];
    $query="update movie set status='block' where Mname='$delmov'";
    mysqli_query($conn,$query);
    }
    ?>       
    </div>
    <div class="parent p3">Insert new snack</div>
    <div class="child c3"><form action="" method="POST" autocomplete="off">
      
      <input style="margin-top: 30px;" type="text" name="movie" placeholder="Enter the Snack Name" size="50"/>
      <br/><br/>
      <input type="text" name="image" placeholder="Snack Image" size="50"/>
      <br/><br/>
      <input type="text" name="price" placeholder="Enter Snack Price" size="50"/>
      <br/><br/>
      <input type="submit" name="save3" value="submit">
  </form></div>
    <div class="parent p4">Delete snack</div>
    <div class="child c4">
    <form action="" method="post">
    <?php
    $conn = mysqli_connect("localhost","root","","mbk");
    $query = "SELECT * FROM snacks where status='use'";
    $result=mysqli_query($conn,$query);
    ?>
    <select name="delelement" style="margin-top: 30px;">
    </br></br>
    <option>-SELECT A SNACK TO DELETE-</option>
    <?php

    while($r=mysqli_fetch_array($result))
    {
    ?>
    <option><?php echo $r['Sname'];?></option>
    <?php
    }
    ?>  
    </select>
    <input type="submit" name="save4" value="proceed">
    </form>
    <?php
    if(isset($_POST['save4'])){
    $delmov=$_POST["delelement"];
    $query="update snacks set status='block' where Sname='$delmov'";
    mysqli_query($conn,$query);
    }
    ?> 
    </div>
    <a href="index.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 3vw;font-size: 20px;color:white;">Home</div></a>
</body>
</html>