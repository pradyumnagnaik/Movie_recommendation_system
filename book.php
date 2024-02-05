<?php
session_start();
$conn = mysqli_connect("localhost","root","","mbk");

$id=$_SESSION['Mid'];

$query="select * from movie where Mid='$id'";
$result= mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/book.css">
    <link rel="icon" type="image/png" href="webimg/mlogo.png">
    <title>Cine Verse</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>$(document).ready(function() {
      $(".tbtn").click(function() {
        $(".trailer").toggle();
      });
    });</script>
    
</head>
<body>
    <?php
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
        <div class="top">
          <div class="box">
            <div class="mimg"><img src="<?php echo $row["M_image"]; ?>" alt="error" ></div>
            <div class="mcontent">
              <div class="mhedng">
                <?php echo $row["Mname"]; ?></div>
              <div class="desc">
                <ul>
                <li><div class="a"><?php echo $row["M_category"]; ?></div></li>
                <li><div class="a"><?php echo $row["M_duration"]; ?></div></li>
                <li><div class="a"><?php echo $row["M_release"]; ?></div></li>
                </ul>
                <div class="tbttn">
                  <button class="tbtn">Watch Trailer</button>
                </div>
              </div>
              </div>
            </div>
          <div class="trailer">
        <?php echo $row["M_trailer"]; ?>
        </div>
    </div>
    <div class="about" style="border-bottom: 1px solid black; margin-bottom:3vh;"><span style=" font-size: 28px; font-weight: bolder; color: white;">About the movie</span><br><br>
    <p style=" font-size: 18px; color: white;"><?php echo $row["M_desc"]; ?></p>
    </div>
    <?php
    }
    ?>
    
    <form action="seats.php" method="post">
    <div class="bk">
    <div class="space" >
      
      <label for="theatre">Select a Theatre:</label><br>
        <select name="theatre" required>
        <option value>select theatre</option>
        <option value="PVR">PVR</option>
        <option value="INOX">INOX</option>
        <option value="DRC">DRC</option>
        <option value="Cinepolis">Cinepolis</option>
        </select>
     </div>
    <div class="space" >
    
    <label for="date">Select a Date:</label><br>
      <select id="date" name="date" required>
        <option >select date</option>
        <option id="today">Today</option>
        <option id="tomorrow">Tomorrow</option>
        <option id="Dayaftertomorrow">Day after tomorrow</option>
      </select>
   
      </div>
    <div class="space" >
  
  <label for="time">Select a Time:</label><br>
        <select name="time" required>
        <option>select time</option>
        <option value="10:30 AM">10:30 AM</option>
        <option value="01:30 PM">01:30 PM</option>
        <option value="04:30 PM">04:30 PM</option>
        <option value="07:30 PM">07:30 PM</option>
        </select>
    
  </div>
    </div>
  
    <div class="btkbtn">
    
     <input type="submit" name="submit" value="Select seats" style=" background-color: red;border-radius: 5px;border-style: none;color: white;padding: 16px 32px;text-decoration: none;margin-left:10vw;cursor: pointer;width: 80%;font-size: 22px;">
     </div>
    </form>
    <a href="movies.php"><div style="font-weight: bold;padding: 16px 32px;margin: 4px 2px;position: absolute;top: 6px;right: 3vw;font-size: 20px;color:white;">&#8592;Back to movies</div></a>
  
  <script>
      var yesterday= new Date();
      var yesterdayFormatted = yesterday.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
      });
      // Get today's date
      var today = new Date(yesterday.getTime()+(24 * 60 * 60 * 1000));
      // Format the date as a string in the form "Month Day, Year"
      var todayFormatted = today.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
      });
      // Set the text for the "Today" option to the formatted date string
      document.getElementById("today").textContent = todayFormatted;

      // Get tomorrow's date by adding one day to the current date
      var tomorrow = new Date(today.getTime() +(24 * 60 * 60 * 1000));
      // Format the date as a string in the form "Month Day, Year"
      var tomorrowFormatted = tomorrow.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
      });
      // Set the text for the "Tomorrow" option to the formatted date string
      document.getElementById("tomorrow").textContent = tomorrowFormatted;

      var datomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000)+(24 * 60 * 60 * 1000));
      // Format the date as a string in the form "Month Day, Year"
      var datomorrowFormatted = datomorrow.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
      });
      // Set the text for the "Tomorrow" option to the formatted date string
      document.getElementById("Dayaftertomorrow").textContent = datomorrowFormatted;
    </script>
    
</body>
</html>