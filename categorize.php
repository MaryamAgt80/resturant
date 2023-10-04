
<?php
include('includes/firstpage.php');
$type=$_GET['type'];
$query = "SELECT * FROM food WHERE categorize='$type'";             // پرس و جوي نمايش همه محصولات فروشگاه

$result = mysqli_query($link, $query);            //  اجراي پرس و جو


?>

 
  <br>
  <br>
        <div class="container">
          <div class="row">
          <?php

while ($row = mysqli_fetch_array($result)) {
  
?> 
          <div class="col-lg-4 mb-4">
          <div class="card" style='text-align:right'>
            <img src="images/<?php echo ($row['imagefood']) ?>" height="236px" alt="" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo ($row['name']) ?></h5>
              <p class="card-text overflow100 breakstr" ><?php echo ($row['explainfood']) ?></p>
             <div style="text-align:center">
              <a href="detail.php?name=<?php echo ($row['name']) ?>" class="btn btn-outline-danger btn-sm center"><i class="far fa-cart"></i>مشاهده و افزودن به سبد خرید</a>
             </div>
            </div>
           </div>
          </div>
          <?php
             }
          ?>
        </div>
      </div>
      </section>
      <script>
        cascadin=document.getElementsByClassName('breakstr')
        for(var i=0;i<cascadin.length;i++)
        {
          mytext=cascadin[i].textContent;
         
          cascadin[i].innerHTML='...'+mytext.substring(0,50);
        }
      </script>
<?php
include('includes/endpage.php');
if (isset($_GET['status']) && !empty($_GET['status'])){
  $status=$_GET['status'];
  if($status=='ok'){
      ?>
      <script>
          swal("موفق","سفارش شما پرداخت شد", "success", {
    button: "تایید",
  });
      </script>
  
      <?php
  }

  }
?>  
