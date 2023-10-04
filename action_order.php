
<input type="hidden" id='foodname' value='<?php echo($_POST['name']) ?>'>
<?php
$link = mysqli_connect("localhost", "root", "", "resturant");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
$link->set_charset("utf8");
$status='error';
include('includes/firstpage.php');
if ( isset($_POST['number']) && !empty($_POST['number']) && 
isset($_POST['name']) && !empty($_POST['name']) )
{
    if (isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true) {
$name=$_POST['name'];
$number=$_POST['number'];
$username=$_SESSION["username"];
?>
<input type="hidden" id='foodname' value='<?php echo($name) ?>'>
<?php
$id_m=0;
$exist_order="SELECT * FROM mainorder WHERE username='$username' AND order_status='0'";
$result = mysqli_query($link,$exist_order);   //اجراي پرس و جو $query

if($row=mysqli_fetch_array($result))  
{# add code
    $id_m=$row['id'];

    
    $queryexist="SELECT * FROM detailorder WHERE food_name='$name' AND order_m='$id_m'";
    $result=mysqli_query($link,$queryexist);
    $row=mysqli_fetch_array($result);
    $updatequery="UPDATE detailorder SET count_food=count_food + '$number' WHERE food_name='$name' AND order_m='$id_m'";
    $insertdetail="INSERT INTO detailorder (count_food,food_name,order_m)
    VALUES('$number','$name','$id_m')";
   
    if(mysqli_query($link,$updatequery)===true && $row)
    {
        ?>
        <script>
        var name=document.getElementById('foodname').value;
     location.replace('detail.php?name='+name+'&status=ok')
    </script>
     <?php
    }
    elseif(mysqli_query($link,$insertdetail)===true){
       
        ?>
        <script>
        var name=document.getElementById('foodname').value;
     location.replace('detail.php?name='+name+'&status=ok')
    </script>
     <?php 
    }
}
else{
    $insertmain="INSERT INTO mainorder (username, order_status)
    VALUES ('$username', '0')";
    if(mysqli_query($link, $insertmain)===true){
        $exist_order="SELECT * FROM mainorder WHERE username='$username' AND order_status='0'";
         $result = mysqli_query($link,$exist_order); 
         $row=mysqli_fetch_array($result);
         $id_m=$row['id'];
        $insertdetail="INSERT INTO detailorder (count_food,food_name,order_m)
        VALUES('$number','$name','$id_m')";

        
        if(mysqli_query($link,$insertdetail))
        {
            ?>
            <script>
            var name=document.getElementById('foodname').value;
         location.replace('detail.php?name='+name+'&status=ok')
        </script>
         <?php
        }
    }
}



?>
<script>
var name=document.getElementById('foodname').value;
location.replace('detail.php?name='+name+'&status=no')
</script>
<?php
    }
    else{
   
        ?>

   <script>
    var name=document.getElementById('foodname').value;
   
    location.replace('detail.php?name='+name+'&status=login')
   </script>
    <?php
    }

}
else{

    ?>
    <script>
        var name=document.getElementById('foodname').value;
     location.replace('detail.php?name='+name+'&status=fields')
    </script>
     <?php
}



?>

