<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        session_start();
        $name = $_POST['name'];
        $_SESSION['name'] = $name;
        if($name=='Book Tickets')
        {
            header("location: movies.php", true);
        }
        else
        {     
            header("location: LoginPage.php", true);
        }
    }
?>