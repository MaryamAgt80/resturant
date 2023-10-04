<link rel="stylesheet" href='stylecard.css'>
<?php
include('includes/firstpage.php');
     // پرس و جوي نمايش همه محصولات فروشگاه

$queryimages = "SELECT * FROM resturant_images"; 
$resultres= mysqli_query($link,$queryimages);             //  اجراي پرس و جو
?>
<section class="dark" style="margin: 0;">
    <div class="container py-4">
        <h1 class="h1 text-center" style="color:white;" id="pageHeaderTitle">رستوران پالیزستان</h1>
          <?php 
          while($rowsrest = mysqli_fetch_array($resultres)){
          ?>
        <article class="postcard dark red">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="resturant_images/<?php echo($rowsrest['image']) ?>" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title blue"><a href="#"><?php echo($rowsrest['titr']) ?></a></h1>
                
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">
                <?php echo($rowsrest['explain_image']) ?>
            </div>
        </article>
        <?php
          }
        ?>

      
      
       
    </div>
</section>







<?php
include('includes/endpage.php');
?>