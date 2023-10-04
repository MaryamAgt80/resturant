<?php
include('includes/firstpage.php');
$namefood=$_GET['name'];
$query = "SELECT * FROM food WHERE name='$namefood'";             // پرس و جوي نمايش همه محصولات فروشگاه

$result = mysqli_query($link, $query);    
$row = mysqli_fetch_array($result)   //  اجراي پرس و جو
?>


<div class="container my-3" style="text-align: center;">
  <div class="row justify-content-center" style="text-align: right;">

<div class="card d-flex justify-content-center col-md-8">
  <div class="card-body">
    <h4 class="card-title"><?php echo ($row['name']) ?></h5>
    
  </div>
  <img class="card-img-bottom mb-2" src="images/<?php echo ($row['imagefood']) ?>" height="300px" width="736px" alt="Card image cap">
  <div class="card-body">
  <p class="card-text"><?php echo ($row['explainfood']) ?></p>
    <p class="card-text"><h5 class="">قیمت غذا:<?php echo ($row['price']) ?>تومان </h5></p>
  </div>
 <hr>
  <div class="card-body">
    <h5 class="card-title">مواد لازم</h5>
    <table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">مقدار</th>
      <th scope="col">نام</th>
    </tr>
   
  </thead>
  <tbody>
  <?php
    $query = "SELECT * FROM ingredients WHERE food_name='$namefood'";             // پرس و جوي نمايش همه محصولات فروشگاه

    $resultlearn= mysqli_query($link, $query);    
    while($learnitem = mysqli_fetch_array( $resultlearn)) 
    {
    ?>
 
    <tr>
    <td><?php echo($learnitem['amount']) ?></td>
      <td><?php echo($learnitem['name']) ?></td>
    
      
    </tr>

<?php
    }
    ?>
    <tbody>
      </table>
        
  </div>



  <?php
    $query = "SELECT * FROM learn WHERE food_name='$namefood'";             // پرس و جوي نمايش همه محصولات فروشگاه

    $resultsteps= mysqli_query($link, $query);    
    while($rowstep = mysqli_fetch_array( $resultsteps)) 
    {
    ?>
    <hr>
<div class="card-body">
  <p class="card-text"><?php echo 'مرحله'.$rowstep['steplearn'].':'.$rowstep['titr'] ?></p>
  
  </div>
  <img class="card-img-bottom mb-2" src="imagelearn/<?php echo ($rowstep['imagelearn']) ?>" height="300px" width="736px" alt="Card image cap">
  <div class="card-body">
  <p class="card-text"><?php echo ($rowstep['explainlearn']) ?></p>
  
  </div>
<?php
    }
    ?>

<hr>
<form action="action_order.php" method="post">
<div class='row justify-content-center'>
<div class='col-md-3'>
      <input type="hidden" name="name" value="<?php echo ($row['name']) ?>">
      <input type="number" name='number'  value="1" maxlength="20" minlength="1" class="form-control mb-2" id="inputPassword4" placeholder="تعداد">
</div>
<div class='col-md-3'>
<button class="btn btn-outline-success btn-sm center mb-1 mt-1 form-control"><i class="far fa-cart"></i>افزودن به سبد خرید</button>
</div>
</div>

</form>

</div>


</div>

</div>
<?php

include('includes/endpage.php');
if (isset($_GET['status']) && !empty($_GET['status'])){
  $status=$_GET['status'];
  if($status=='info'){
      ?>
      <script>
          swal("خطا!","خطا در اتصال به سرور", "error", {
    button: "تایید",
  });
      </script>
  
      <?php
  }
elseif($status=='login'){
?>
   <script>
          swal("خطا!","برای سفارش وارد سایت شوید", "error", {
    button: "تایید",
  });
      </script>
<?php


}

      elseif($status=='fields'){
  
      ?>
      <script>
          swal("خطا!", "تمامی فیلد ها مقدار دهی نشده اند", "error", {
    button: "تایید",
  });
      </script>
      <?php
      }
      elseif($status=='ok'){
        ?>
           <script>
                  swal("موفق","غذای مورد نظر به سبد خرید شما افزوده شد", "success", {
            button: "تایید",
          });
              </script>
        <?php
        
        
        }
        else{
          ?>
           <script>
                  swal("خطا","خطا در اتصال به سرور", "error", {
            button: "تایید",
          });
              </script>
          <?php
        }
  
  }
?>  

