<?php

$status='';
include('includes/firstpage.php');
if(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)
{

if ( isset($_POST['fname']) && !empty($_POST['fname']) && 
isset($_POST['lname']) && !empty($_POST['lname']) &&
isset($_POST['phone_number']) && !empty($_POST['phone_number']) &&
isset($_POST['time_reserve']) && !empty($_POST['time_reserve'])&&
isset($_POST['explain_reserve']) && !empty($_POST['explain_reserve'])&&
isset($_POST['n_client']) && !empty($_POST['n_client']))
{
   
$username=$_SESSION['username'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone_numbern=$_POST['phone_number'];
$time_reserve=$_POST['time_reserve'];
$explain_reserve=$_POST['explain_reserve'];
$n_client=$_POST['n_client'];

    $query_reserve = "INSERT INTO reserve_resturant (username,fname,lname,phone_number,time_reserve,explain_reserve,n_client)
    VALUES ('$username', '$fname', '$lname','$phone','$time_reserve','$explain_reserve','$n_client')";

if (mysqli_query($link, $query_reserve)===true) {
    ?>
    <script>
     location.replace('reserve_resturant.php?status=ok')
    </script>
     <?php
    }
   
    
  

}
else{ ?>
    <script>
     location.replace('reserve_resturant.php?status=fields')
    </script>
     <?php
     }

}
else{ ?>
    <script>
     location.replace('reserve_resturant.php?status=login')
    </script>
     <?php
     }
