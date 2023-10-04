<?php
include('includes/firstpage.php');
?>

<div class="register-photo">
        <div class="form-container" style="background-color: #343a40 !important;">
            <div class="image-holder"></div>
            <form method="post" action='action_reserver.php'>
                <h2 class="text-center"><strong>رزرو رستوران</strong></h2>
                <div class="form-group"><input required class="form-control" type="text" name="fname" placeholder="نام"></div>
                <div class="form-group"><input required class="form-control" type="text" name="lname" placeholder="نام خانوادگی"></div>
                <div class="form-group"><input required class="form-control" type="tel" name="time_reserve" placeholder="زمان رزرو"></div>
                <div class="form-group"><input required class="form-control" type="tel" name="phone_number" placeholder="تلفن همراه"></div>
                <div class="form-group"><input required class="form-control" type="tel" name="explain_reserve" placeholder="توضیحات رزرو"></div>
                <div class="form-group"><input required class="form-control" type="number" name="n_client" placeholder="تعداد مهمانان"></div>
                <div style="text-align:center">
                  <button type="submit" class="btn btn-outline-success btn-sm center my-2"><i class="far fa-cart"></i>ثبت رزرو</button>
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
    elseif($status=='login'){
        ?>
<script>
        swal("خطا!", "برای رزرو ابتدا وارد سایت شوید", "error", {
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
        swal("موفق", "رزرو شما با موفقیت ثبت شد", "success", {
  button: "تایید",
});
    </script>
        <?php
    }

}
?>