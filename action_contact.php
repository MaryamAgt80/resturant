<?php

session_start();
$link = mysqli_connect("localhost", "root", "", "resturant");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
$link->set_charset("utf8");
$status='error';

if (isset($_POST['content_message']))
{
    if (isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true) {
        $username=$_SESSION['username'];
    $content_message=htmlentities($_POST['content_message']);
   echo $content_message;
   $query_contact = "INSERT INTO contact_us (username,content_message)
   VALUES ('$username', '$content_message')";

   if (mysqli_query($link, $query_contact)===true) {
    ?>
    <script>
     location.replace('contact_us.php?status=ok')
    </script>
     <?php
    }
    else{ 
    echo 'no';
      
        
         }
   
    }
}

    ?>
    <?php
    
    ?>


