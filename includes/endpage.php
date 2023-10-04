<!-- Footer -->

<hr style="color:white">
<footer class="page-footer font-small cyan darken-3">
<?php
$query_about="SELECT * FROM about_us WHERE  	is_active='1'"; 

if($result_about=mysqli_query($link,$query_about)){
    if($row_about=mysqli_fetch_array($result_about)){

?>
  <!-- Footer Elements -->
  <div class="container">
 
  <p  style="color: white;text-align:center" class="fb-ic mx-2">
        <h4 style="color: white;text-align:center;" style="color:white !important"><?php echo($row_about['name']) ?></h4>
</p>
<p class="fb-ic mx-2" style="color:white;text-align:center">
    <h5 style="color: white;text-align:center;">   آدرس : <?php echo($row_about['addres']) ?></h5>
</p>
<p class="fb-ic mx-2" style="text-align:center" style="color:white !important">
<h5 style="color: white;text-align:center;">
تلفن تماس: <?php echo($row_about['phone_number']) ?></h5>
</p>
  
    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center" style="text-align: center;">

          <!-- Facebook -->
          <a class="fb-ic mx-2">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x" style="color:white"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic mx-2">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x" style="color:white"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic  mx-2">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x" style="color:white"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic mx-2">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x" style="color:white"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic  mx-2">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x" style="color:white"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic  mx-2">
            <i class="fab fa-pinterest fa-lg white-text fa-2x" style="color:white"> </i>
          </a>
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white>© 2020 Copyright:
    <a href="/" style="color:white"> MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
<?php
    }}
?>
</footer>
<!-- Footer -->

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>