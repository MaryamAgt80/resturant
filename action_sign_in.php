<?php

$status='';
include('includes/firstpage.php');
if($_GET['action']=='register')
{

if ( isset($_POST['username']) && !empty($_POST['username']) && 
isset($_POST['password']) && !empty($_POST['password']) &&
isset($_POST['password_again']) && !empty($_POST['password_again']) &&
isset($_POST['phone']) && !empty($_POST['phone']))
{
    if($_POST['password_again']==$_POST['password'])
    {
$username=$_POST['username'];
$phone=$_POST['phone'];
$passwordd=$_POST['password'];
$password_again=$_POST['password_again'];


    $query = "INSERT INTO account (username,phone,password)
    VALUES ('$username', '$phone', '$passwordd')";

if (mysqli_query($link, $query)===true) {
    ?>
    <script>
     location.replace('sign_in.php?status=ok')
    </script>
     <?php
    }
    else{ ?>
        <script>
         location.replace('sign_in.php?status=username')
        </script>
         <?php
         }
    }
    else{
        ?>
   <script>
    location.replace('sign_in.php?status=password')
   </script>
    <?php
    }

}
else{
    ?>
    <script>
     location.replace('sign_in.php?status=fields')
    </script>
     <?php
}

}
else{#####login action

    if ( isset($_POST['username']) && !empty($_POST['username']) && 
    isset($_POST['password']) && !empty($_POST['password']) )
    {  $username=$_POST['username'];
    $passwordd=$_POST['password'];
    
    


$query = "SELECT * FROM account WHERE username='$username' AND password='$passwordd'";
$result = mysqli_query($link, $query);   //اجراي پرس و جو $query

$row = mysqli_fetch_array($result);   //ذخيره اطلاعات ركورد كاربر در آرايه $row

if ($row) {
    $_SESSION["state_login"] = true;
  
    $_SESSION["username"] = $row['username'];
   
    ?>
    <script>
     location.replace('index.php')
    </script>
     <?php
    }
    else{
       
         ?>
         
        <script>
         location.replace('login_in.php?status=info')
        </script>
         <?php
         }






    
    }
    else{
        ?>
        <script>
         location.replace('login_in.php?status=fields')
        </script>
         <?php
    }


}
?>

