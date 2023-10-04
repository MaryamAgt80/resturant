
<?php
include('includes/firstpage.php');
$query = "SELECT * FROM food";             // پرس و جوي نمايش همه محصولات فروشگاه

$result = mysqli_query($link, $query);            //  اجراي پرس و جو


?>
<link rel="stylesheet" href='stylecard.css'>
<br>
<br>
<!-- start categori  -->
<div class="container border_red b_dark" style="border: 2px white solid">
 <p style="text-align: center;"> <h3 style="color: white;text-align:center">دسته بندی ها</h3> <p>
  <div class="row mb-4">
    <div class="col-md-3 ">
   <a href='categorize.php?type=0'> <img src="categorize/beforfood.jpg" height="200px" alt="" class="card-img-top"></a>
    </div>
    <div class="col-md-3 ">
   <a href='categorize.php?type=3'> <img src="categorize/drinks.jpg" height="200px" alt="" class="card-img-top"></a>
    </div>
 
    <div class="col-md-3 ">
   <a href='categorize.php?type=2'> <img src="categorize/fastfood.jpg" height="200px" alt="" class="card-img-top"></a>
    </div>
    <div class="col-md-3 ">
    <a href='categorize.php?type=1'><img src="categorize/mainfood.jpg" height="200px" alt="" class="card-img-top"></a>
    </div>
   
  </div>
</div>
<br>
<br>
<br>
<!-- end category
  -->



<!-- start images -->

<?php
$queryimages = "SELECT * FROM resturant_images";             // پرس و جوي نمايش همه محصولات فروشگاه

$resultimages = mysqli_query($link, $queryimages);  
?>
<div class="container border_red b_dark" style="border: 2px white solid">
 <p style="text-align: center;"><a style="text-decoration:none;color:white" href="show_resturant.php"> <h3 style="color: white;text-align:center">مشاهده رستوران</h3></a> <p>
  <div class="row mb-4">

<?php
for($i=0;$i<4;$i++){
  $imges_row=mysqli_fetch_array($resultimages);
?>
    <div class="col-md-3 ">
   <a> <img src="resturant_images/<?php echo($imges_row['image']) ?>" height="200px" alt="" class="card-img-top"></a>
    </div>

<?php

}
?>
   

 
  </div>
</div>
<br>
<br>
<br>
<!-- end images
  -->





<section class="dark" style="margin: 0;">
    <div class="container py-4">
        
  
        <article class="postcard dark red">
            <a class="postcard__img_link" href="reserve_resturant.php">
                <img class="postcard__img" src="resturant_images/image6.jpg" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title blue"><a href="#">رزرو رستوران پالیزستان</a></h1>
                
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">
                اصالت یکی از مواردی است که ما در مجموعه رستوران‌های ارکیده آن را ارج می‌نهیم. علاقمندان رستوران‌های ارکیده می‌دانند که اولین شعبه مجموعه رستوران‌های ارکیده، شعبه جاده چالوس بود که در سال ۱۳۳۶ تاسیس گردید.

جالب است بدانید که فلسفه انتخاب نام ارکیده از سبد گل هدیه‌ای که به مرحوم اژدری داده شده بود باز می‌گردد. چراکه در آن زمان گل ارکیده از جمله گل‌های نایاب و نادر در ایران بوده و سبد گل ارکیده که توسط یکی از عاملان کشاورزی وقت ایران به مرحوم اژدری هدیه داده شده بود.

تمامی استانداردهای کیفی جدید و نوآوری‌های غذایی از این شعبه آغاز می‌گردند و بعد از بررسی و دریافت بازخورد مناسب توسط مشتریان، به تمامی شعب مجموعه رستوران‌های ارکیده ابلاغ می‌شوند.
            </div>
            <a  style="color: antiquewhite" href="reserve_resturant.php"><span style="border: 1px red solid;">برای رزرو کلیک کنید</span></a>
        </article>    

    </div>
</section>



<!-- ads for resturant --> 
<?php
$queryads = "SELECT * FROM ads";             // پرس و جوي نمايش همه محصولات فروشگاه

$resultads = mysqli_query($link, $queryads);  
?>
<div class="container b_dark">
 <p style="text-align: center;"><a style="text-decoration:none;color:white" href="show_resturant.php"> <span class='subject_text'></span></a> <p>
  <div class="row mb-4">

<?php
for($i=0;$i<4;$i++){
  $ads_row=mysqli_fetch_array($resultads);
?>
    <div class="col-md-3" style="border: 2px white solid">
   <a> <img src="mainimages/<?php echo($ads_row['image']) ?>" width="150px" height="180px" alt="" class="card-img-top"></a>
    <p style="text-align:center">
      <span style="color:white"><?php echo($ads_row['titr']) ?></span>
    </p>
  </div>

<?php

}
?>
   

 
  </div>
</div>
<br>
<br>
<br>

















  

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
