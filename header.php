<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Prociono&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Library Managment</title>
</head>
<body>
<!--start navigation-->
<nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
  <a class="navbar-brand" href="index.php">Kmggp College</a>
  <span class="navbar-text">Learn and Implement</span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav custom-nav pl-5">
     
     <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
     <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
     <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
     <?php
      session_start();
      if(isset($_SESSION['is_login'])){
        echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
     <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
      } else {
        echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li>
     <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">Signup</a></li>';
      }
     ?>
     
     
     <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Feedback</a></li>
     <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
      </ul>
  </div>
</nav>
<!--end navigation-->