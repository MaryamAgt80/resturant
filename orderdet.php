<?php
include('includes/firstpage.php');
    if (isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true) 
    {$username=$_SESSION["username"];
        $action=$_GET['action'];
        if($action=='pay'){
        $username=$_SESSION["username"];
        $selsaf="SELECT * FROM mainorder WHERE username='$username' AND order_status='0' AND addres IS NOT NULL ";
            $result=mysqli_query($link,$selsaf);
            if($row=mysqli_fetch_array($result))
            {
                $up="UPDATE mainorder SET order_status='1'  WHERE username='$username' AND order_status='0' AND addres IS NOT NULL";
                mysqli_query($link,$up);
                ?>
                <script>
                
             location.replace('index.php?&status=ok')
            </script>
            <?php
            }
            else{
                
                ?>
                <script>
                    
             location.replace('cart.php?&status=noaddress')
            </script>
            <?php
            }

        }
        elseif($action=='changeaddress'){
            $addres=$_POST['address'] ;
            echo $addres;
            $query="UPDATE mainorder SET addres='$addres'  WHERE username='$username' AND order_status='0'";
            
            if(mysqli_query($link,$query)===true)
            {
                ?>
                <script>
             location.replace('cart.php?&status=ok')
            </script>
            <?php
            }
            else{
                ?>
                <script>
                var name=document.getElementById('foodname').value;
             location.replace('cart.php?&status=no')
            </script>
            <?php
            }

        }
        elseif($action=='delete'){
            $id=$_GET['id'];
            $query="DELETE FROM detailorder WHERE id='$id'";
            if(mysqli_query($link,$query)===true)
            {
                ?>
                <script>
                var name=document.getElementById('foodname').value;
             location.replace('cart.php?status=ok')
            </script>
            <?php
            }
            else{
                ?>
                <script>
                var name=document.getElementById('foodname').value;
             location.replace('cart.php?status=no')
            </script>
            <?php


        }
    }
    else{
        ############### check main order 
        $act=$_GET['act'];
      
        
        $query='';
        $query_mean="SELECT * FROM mainorder WHERE username='$username' AND order_status='0'";
        if($result=mysqli_query($link,$query_mean))
        {
            if($row=mysqli_fetch_array($result))
            {$id_m=$row['id'];
                $id=$_GET['id'];
               
        if($act=='p'){
          
            $query="UPDATE detailorder SET count_food=count_food+1 WHERE id='$id' AND order_m='$id_m'";
        }
        else{
            $query="UPDATE detailorder SET count_food=count_food-1 WHERE id='$id' AND order_m='$id_m' AND count_food > 1";
        }
        if(mysqli_query($link,$query)===true)
        {
            ?>
            <script>
          location.replace('cart.php?status=ok')
        </script>
        <?php
        }
        }}
    }

    }



    else{

    }




?>