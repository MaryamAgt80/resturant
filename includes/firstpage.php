<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href='style.css'>
  <!-- <link rel='stylesheet' href=''> -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <title>PALIZESTAN</title>



  <style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 12px 16px;
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    * {
      font-family: serif;
    }

    #header {
      background: url(mainimages/GAZA.png) center center / cover no-repeat;
    }
  </style>
</head>

<body style="background-color:#110f16;">

  <nav class="bg-dark navbar-dark rtl" style="height: 30px; text-align: right;">
    <div class="container rtl">
      <div class="dropdown">
        <span style="color: #f9f9f9;">
          دسته بندی ها
          <i class="fa fa-bars" aria-hidden="true"></i>
          </i>
        </span>
        <div class="dropdown-content">
          <p>
            <a href="categorize.php?type=0" class="nav-link">پیش غذا</a>

          </p>
          <p>
            <a href="categorize.php?type=1" class="nav-link">غذای اصلی</a>

          </p>
          <p>
            <a href="categorize.php?type=2" class="nav-link">فست فود</a>

          </p>
        </div>
      </div>
      <span style="margin: 10px;" href="index.php" class="navbar-brand"> <a style="text-decoration:none;color:white" href="index.php">
        خانه
     </a>
      </span>


      <span style="margin: 10px;" href="show_resturant.php" class="navbar-brand mx-3">
        <a style="text-decoration:none;color:white" href="show_resturant.php"> <i class="fa fa-camera-retro" aria-hidden="true"></i>
          مشاهده رستوران
        </a></span>
      <span style="margin: 10px;" href="show.php" class="navbar-brand mx-3"> <a style="text-decoration:none;color:white" href="reserve_resturant.php"> <i class="fa fa-clone" aria-hidden="true"></i>

          رزرو رستوران
        </a>
      </span>
      <span style="margin: 10px;" class="navbar-brand">
        <a style="text-decoration:none;color:white" href="contact_us.php"> <i class="fa fa-comment" aria-hidden="true"></i>

          ارتباط با ما
        </a></span>




    </div>

  </nav>
  <section id="header" class="jumbotron text-center">
    <h1 class="display-3" style="text-shadow: 4px 4px 4px black;color:white">PALIZESTAN</h1>
    <p class="lead display-5" style="text-shadow: 2px 2px 2px black;color:white;">به رستوران پالیزستان خوش آمدید</p>
    <?php
    if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
    ?>
      <a href="logout.php" class="btn btn-secondary btn-outline-dark my-2" style="background: #343a40 ;color:white;">خروج</a>
      <a href="cart.php" class="btn btn-secondary btn-outline-dark" style="background: #343a40 ;color:white;">سفارش</a>
    <?php
    } else {
    ?>
      <a href="login_in.php" class="btn btn-secondary btn-outline-dark my-2" style="background: #343a40 ;color:white;">ورود</a>
      <a href="sign_in.php" class="btn btn-secondary btn-outline-dark" style="background: #343a40 ;color:white;">ثبت نام</a>
    <?php
    }
    ?>
  </section>
  <!-- #region 
          remove div height 10px
          
          -->
  <section id="gallery my-1">
    <?php




    $link = mysqli_connect("localhost", "root", "", "resturant");

    if (mysqli_connect_errno())
      exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
    $link->set_charset("utf8");
    ?>