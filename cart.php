
<?php
include('includes/firstpage.php');
            // پرس و جوي نمايش همه محصولات فروشگاه
$username=$_SESSION['username'];
 
$query="SELECT * FROM mainorder WHERE username='$username' AND order_status='0'"; 
$row='';
if($result=mysqli_query($link,$query)){
    if($row=mysqli_fetch_array($result)){

$id=$row['id'];
$queryorders="SELECT * FROM detailorder WHERE order_m='$id'";
if($result=mysqli_query($link,$queryorders)){
    ?>
    <div class="container mt-5 mb-5" style="border:2x solid black;">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2 bg-white">
                        <h4 class='text-grey' style='text-align:center;'>سبد سفارشات شما</h4>
                       
                    </div>
                 
    <?php
 
    $priceall=0;
    while($detail=mysqli_fetch_array($result)){
        $name=$detail['food_name'];
       $foodquery="SELECT * FROM food WHERE name='$name'";
       $foodres=mysqli_query($link,$foodquery);
       $food=mysqli_fetch_array($foodres);
       $priceall=$priceall+$food['price']*$detail['count_food'];
       ?>
          
          <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="images/<?php echo($food['imagefood']) ?>" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?php echo($food['name']) ?></span>
                    
                        </div>
                        <div class="d-flex flex-row align-items-center qty"><a class='mx-2' href="orderdet.php?action=change&act=n&id=<?php echo($detail['id']) ?>"><i class="fa fa-minus text-danger"></i></a>
                            <h5 class="text-grey mt-1 mr-1 ml-1"><?php echo($detail['count_food']) ?></h5><a class='mx-2' href="orderdet.php?action=change&act=p&id=<?php echo($detail['id']) ?>"><i class="fa fa-plus text-success"></i></a></div>
                        <div>
                            <h5 class="text-grey"><?php echo($food['price']*$detail['count_food']) ?></h5>
                        </div>
                        <div class="d-flex align-items-center"><a href='orderdet.php?action=delete&id=<?php echo($detail['id']) ?>'><i class="fa fa-trash mb-1 text-danger"></i></a></div>
                    </div>
                    
                  
       <?php
    }
}

?>
<form method="post" action='orderdet.php?action=changeaddress'>
<?php if(empty($row['addres'])){
    ?>
         <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" name='address' class="form-control border-0 gift-card"  placeholder="آدرس" required><button  class="btn btn-outline-warning btn-sm ml-2"  type="submit">اعمال آدرس</button></div>
         <?php
         }
         else
         {?>
         <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded" style="text-align: right;"><input type="text" class="form-control border-0 gift-card" name='address' value="<?php echo($row['addres']) ?>" placeholder="آدرس"><button class="btn btn-outline-warning btn-sm mx-4" type="submit" style="width: 28%;">تغییر ادرس</button></div>
       <?php
}

?>
</form>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded text-align-center" style=''><input type="text" readonly value="<?php echo("قیمت کل سفارش: ".$priceall) ?>" class="form-control border-0 gift-card mx-4" placeholder="آدرس"><a class="btn btn-warning btn-block btn-lg ml-2 pay-button mx-4" href='orderdet.php?action=pay' style="width: 30%;" type="button">پرداخت</a></div>

                </div>
            </div>
        </div>
     
<?php
}  
else{
?>
<div class="container my-3" style="text-align: center;">
  <div class="row justify-content-center" style="text-align: right;">
  <div class="card d-flex justify-content-center col-md-8">
<div class="card-body">
  <p class="card-text">سبد سفارش شما خالی است</p>
  
  </div>
  <img class="card-img-bottom mb-2" src="mainimages/cart.jpg" height="300px" width="300px" alt="Card image cap">
  <div class="card-body">
  
  
  </div>
  </div></div></div>
<?php
}   }  //  اجراي پرس و جو
?>

                   
           


<?php
include('includes/endpage.php');
if (isset($_GET['status']) && !empty($_GET['status'])){
  $status=$_GET['status'];
  if($status=='no'){
      ?>
      <script>
          swal("خطا!","عملیت با شکست مواجه شد", "error", {
    button: "تایید",
  });
      </script>
  
      <?php
  }
elseif($status=='noaddress'){
?>
   <script>
          swal("خطا!","برای پرداخت ابتدا ادزس خود را وارد کنید", "error", {
    button: "تایید",
  });
      </script>
<?php


}


      elseif($status=='ok'){
        ?>
           <script>
                  swal("موفق","عملیات با موفقیت انجام شد", "success", {
            button: "تایید",
          });
              </script>
        <?php
        
        
        }
     
  
  }
?>  

