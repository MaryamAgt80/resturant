<?php
include('includes/firstpage.php');
?>

<div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" action='action_sign_in.php?action=register'>
                <h2 class="text-center"><strong>ساخت حساب جدید</strong></h2>
                <div class="form-group"><input required class="form-control" type="text" name="username" placeholder="نام کاربری"></div>
                <div class="form-group"><input required class="form-control" type="text" name="phone" placeholder="شماره همراه"></div>
                <div class="form-group"><input required class="form-control" type="password" name="password" placeholder="رمز"></div>
                <div class="form-group"><input required class="form-control" type="password" name="password_again" placeholder="رمز(دوباره)"></div>
                <div style="text-align:center">
                  <button type="submit" class="btn btn-outline-success btn-sm center my-2"><i class="far fa-cart"></i>ثبت نام</button>
                 </div>

                <!-- <div class="form-group"><button class="btn btn-primary btn-block" type="submit">ورود</button></div><a href="#" class="already">شما قبلا حساب دارید؟</a></form> -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

<?php
include('includes/endpage.php');
if (isset($_GET['status']) && !empty($_GET['status'])){
$status=$_GET['status'];
if($status=='password'){
    ?>
    <script>
        swal("خطا!", "عدم مشابهت رمز عبور با یکدیگر", "error", {
  button: "تایید",
});
    </script>

    <?php
}
    elseif($status=='username'){
        ?>
<script>
        swal("خطا!", "نام کاربری دیگری وارد کنید", "error", {
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
    else{
        ?>
        <script>
        swal("موفق", "حساب کاربری شما با موفقیت ثبت شد", "success", {
  button: "تایید",
});
    </script>
        <?php
    }

}
?>