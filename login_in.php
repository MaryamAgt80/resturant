<?php
include('includes/firstpage.php');
?>

<div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" action='action_sign_in.php?action=login'>
                <h2 class="text-center"><strong>ورود به حساب</strong></h2>
                <div class="form-group"><input class="form-control" required type="text" name="username" placeholder="نام کاربری"></div>
                <div class="form-group"><input class="form-control" required type="password" name="password" placeholder="رمز"></div>
                <div style="text-align:center">
                  <button type="submit" class="btn btn-outline-success btn-sm center my-2"><i class="far fa-cart"></i>ورود به حساب</button>
                 </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

<?php
include('includes/endpage.php');
if (isset($_GET['status']) && !empty($_GET['status'])){
$status=$_GET['status'];
if($status=='info'){
    ?>
    <script>
        swal("خطا!", "اطلاعات حساب وارد شده اشتباه است", "error", {
  button: "تایید",
});
    </script>

    <?php
}
  
    else{

    ?>
    <script>
        swal("خطا!", "تمامی فیلد ها مقدار دهی نشده اند", "error", {
  button: "تایید",
});
    </script>
    <?php
    }
 

}
?>