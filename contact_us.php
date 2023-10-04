<link rel="stylesheet" href='stylechat.css'>
<?php
include('includes/firstpage.php');
// پرس و جوي نمايش همه محصولات فروشگاه
$query_about="SELECT * FROM about_us WHERE  	is_active='1'"; 

if($result_about=mysqli_query($link,$query_about)){
    if($row_about=mysqli_fetch_array($result_about)){

?>
<link rel="stylesheet" href='stylecard.css'>
<section class="dark" style="margin: 0;">
    <div class="container py-4">
        
  
        <article class="postcard dark red">
            <a class="postcard__img_link" href="reserve_resturant.php">
                <img class="postcard__img" src="mainimages/<?php echo($row_about['image_resturant']) ?>" alt="Image Title" />
            </a>
            <div class="postcard__text">
                <h1 class="postcard__title blue"><a href="#"><?php echo($row_about['name']) ?></a></h1>
                
                <div class="postcard__bar"></div>
                <div style="text-align: right;" class="postcard__preview-txt">
                <?php echo($row_about['explain_us']) ?>
                <p>

                   آدرس : <?php echo($row_about['addres']) ?></p>
              <p>  تلفن تماس: <?php echo($row_about['phone_number']) ?>
              <i class="fa fa-phone" aria-hidden="true"></i>
</p>
            </div>
          
        </article>    
        <article class='p-3' style="background-color:#343a40;border-radius:20px">
        <img src="mainimages/<?php echo($row_about['loc_image']) ?>" height="200px" width="100%">
        </article>

    </div>
</section>
<?php
    }}
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
  $username = $_SESSION["username"];
  $querycontact = "SELECT * FROM contact_us WHERE username='$username'";
  $resultcontact = mysqli_query($link, $querycontact);

?>
<!-- start about us -->




<!-- 
start chat -->
  <section style="background-color: #110f16;">
    <div class="container py-5">

      <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-8">

          <div class="card" id="chat1" style="border-radius: 15px;background-color:#495057 !important;">
            <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;background:#18151f !important;border:#495057 solid 2px">
              <i class="fas fa-angle-leftt"></i>
              <p class="mb-0 fw-bold">گفت و گوی آنلاین با پشتیبانی</p>
              <i class="fas fa-angle-leftt"></i>
            </div>
            <div class="card-body">

              <?php
              while ($row = mysqli_fetch_array($resultcontact)) {
                if ($row['admin_user'] == 1) {
              ?>

                  <!-- #region 

       user
      -->
                  <div class="d-flex flex-row justify-content-start mb-4">
                    <img src="mainimages/posh.webp" alt="avatar 1" style="width: 45px; height: 100%;">
                    <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                      <p class="small mb-0" style='color:#fbfbfb'><?php echo ($row['content_message']) ?></p>
                    </div>
                  </div>

                  <!-- #r 

       admin
      -->
                <?php
                } else {
                ?>

                  <div class="d-flex flex-row justify-content-end mb-4">
                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                      <p class="small mb-0"><?php echo ($row['content_message']) ?></p>
                    </div>
                    <img src="mainimages/karbar.jpg" alt="avatar 1" style="width: 45px; height: 100%;">
                  </div>




              <?php
                }
              }
              ?>

               <form method='post' action="action_contact.php">
              <div class="form-outline">
                <textarea required class="form-control" name="content_message" id="textAreaExample" rows="3"></textarea>
                <button type="submit" class="btn m-2" style="color:white" for="textAreaExample">فرستادن پیام <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </button>
              </div>
            </form>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>







<?php
}
else{
  ?>
  <h1 style="color:white;text-align:center;margin:10px">برای ارتباط با پشتیبانی ابتدا وارد سایت شوید</h1>
  <?php
}

include('includes/endpage.php');
?>