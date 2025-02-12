<!-- strat including header-->
<?php
include('./mainInclude/header.php');
?>
<!-- end including header-->

<!--start video background-->
<div class="container-fluid remove-vid-marg">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/copy1.MP4">
        </video>
        <div class="vid-overlay">
            
        </div>
    </div>
    <div class="vid-content">
        <h1 class="my-content" style="font-family: initial; font-size: 45px;">Welcome to Kmggp College</h1>
        <small class="my-content" style="font-family: initial; font-size: 20px;">Learn and Implement</small><br><br>

      <?php
      if(isset($_SESSION['is_login'])){
        echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">Get Started</a>';
      } else {
        echo '<a href="Student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>';
      }
    ?>
        
        <!-- Button trigger modal -->


        
    </div>
</div>

<!--end video background-->
<!--strat text bannner-->
<div class="container-fluid bg-secondary txt-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-books-open mr-3"></i>100+ Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee</h5>
        </div></div></div>
<!--end text bannner-->
<!--start most popular courses-->
<div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    <div class="card-deck mt-4">
        <a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/se.jpeg" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Guitar Easy Way</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
<a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/python.webp" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Guitar Easy Way</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
<a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/php.png" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Guitar Easy Way</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
</div>
<!--end most popular courses-->
<!--start most popular courses2-->
 <div class="card-deck mt-4">
        <a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/java.webp" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Pytthon</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
<a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/iot.webp" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Pytthon</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
<a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/cloud.jpg" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Python</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
</div>
<!--end the deck2-->
<div class="card-deck mt-4">
        <a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/de.jpeg" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Pytthon</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
<a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/ml.jpg" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Pytthon</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
<a href="#" class="btn" style="text-align-left; padding: 0px; margin: 0px;">
  <div class="card">
    <img src="images/ai.jpg" class="card-img-top" alt="Guitar" height="250px">
    <div class="card-body">
      <h5 class="card-title">Learn Python</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
     </div>
  <div class="card-footer">
    <p class ="card-text d-inline">Price: <small><del>& #8377 2000 </del></small><span class="font-weight-bolder">& #8377 2000</span></p>
    <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
</div>
</div>
</a>
</div>
<div class="text-center mt-2">
    <a class="btn btn-danger btn-sm" href="#">View All Courses</a>
</div>
</div>
<!--end most popular courses-->
<!--Start contact us-->
<?php
include('./contact.php');
?>
<!--end contact us-->
<!--start student testiominals-->
<div class="row" style="margin-top: 200px;">
    <div class="col-sm-3" style="margin-left:300px;"><img src="images/girl.jpg" class="card-img-top" alt="Guitar">
      <h2 class="text-center" style="font-family: initial; font-size: 60px; color: yellow;">Suman Singh</h2>
      <p class="text-center" style="font-family: initial; font-size: 20px; color: aqua;">Computer Science and Engineering Student</p>
    </div>
    <div class="col-sm-3" style="margin-left:190px;"><img src="images/boy.webp" class="card-img-top" alt="Guitar">
       <h2 class="text-center" style="font-family: initial; font-size: 60px; color: yellow;">Sahil Singh</h2>
      <p class="text-center" style="font-family: initial; font-size: 20px; color: aqua;">Information Tecnology Student</p>
    </div>
    
</div>
<!--end student testiominals-->
<!--strat text bannner-->
<div class="container-fluid bg-danger" style="margin-top:100px;">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-twitter"></i>Twitter</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i>Whatsapp</a>
        </div>
        <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i>Instagram</a>
        </div></div></div>
<!--end text bannner-->
<!--start about session-->
<div class="container-fluid p-4" style="background-color: #E9ECEF;">
  <div class="container" style="background-color:#E9ECEF;">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p> kmggp school provides universal human development protocol access the world bigest problem and encoding within the self bought and onorganization part of the self</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a class="text-dark" href="#">Web Development</a><br>
        <a class="text-dark" href="#">Web Designing</a><br>
        <a class="text-dark" href="#">Android App Dev</a><br>
        <a class="text-dark" href="#">IOS Development</a><br>
        <a class="text-dark" href="#">Data Analytics</a><br>
      </div>
      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>the bigest problrm of the home</br>dir the nandani suraoji market pooja by itself and they does<br>by the self motivated person<br>Phoneno: 00768798</p>
      </div>
    </div>
  </div>
</div>
<!--end about session-->
<!-- strat including footer-->
<?php
include('./mainInclude/footer.php');
?>
<!-- end including footer-->
