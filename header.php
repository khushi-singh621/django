<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/all.min.css">
	<link rel="stylesheet" href="../css/adminstyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Prociono&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">


</head>
<body>
	<!--top navabar-->
	<nav class="navbar navbar-dark fixed-top p-0 shadow" style="background: #225470;">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php">E-Learning<small class="text-white">Admin Area</small></a>
	</nav>
	<!--sidebar bar-->
		<div class="container-fluid mb-5" style="margin-top: 40px;">
			<div class="row">
				<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
					<div class="slidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-item" href="adminDashboard.php">
									<i class="fas fa-tachometer-alt"></i>Dashboard</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="courses.php">
									<i class="fas fa-accessible-icon"></i>Courses</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="lessons.php">
									<i class="fab fa-accessible-icon"></i>Lessons</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="students.php">
									<i class="fas fa-users"></i>Students</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="fas fa-table"></i>Self Report</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="fas fa-table"></i>Payment Status</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="fab fa-accessible-icon"></i>Feedback</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="adminChangePass.php">
									<i class="fas fa-key"></i>Change Password</a>
								</li>
								<li class="nav-item">
								<a class="nav-link" href="../logout.php">
									<i class="fas fa-sign-out-alt"></i>Logout</a>
								</li>
							</ul>
						</div>
					</nav>