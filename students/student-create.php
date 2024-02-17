<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../home/style.css">

	<title>Student Create</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-CRY'></i>
			<span class="text">GESTION SCHOOLER</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../home/index.php">
				<i class='bx bx-home'></i>
				<span class="text">DASHBOARD</span>
				</a>
			</li>
			<li class="active">
				<a href="../students/index5.php">
					<i class='bx bxs-group'></i>
					<span class="text">STUDENTS</span>
				</a>
			</li>
			<li>
				<a href="../teachers/index4.php">
					<i class='bx bxs-group'></i>
					<span class="text">TEACHERS</span>
				</a>
			</li>
			<li >
				<a href="../payements/index3.php">
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">PAYEMENTS</span>
				</a>
			</li>
			<li >
				<a href="../courses/index2.php">
					<i class='bx bxs-book-alt'></i> 
					<span class="text">COURSES</span>
				</a>
			</li>
			<li >
				<a href="../grades/index.php">

				<i class='bx bx-note'></i>
					<span class="text">GRADES</span>
				</a>
			</li>
			<li>
				<a href="../attendance/index6.php">
					<i class='bx bxs-calendar'></i> <span class="text">ATTENDANCE</span>
				</a>
			</li>
			<li >
				<a href="../enrollment/index1.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">ENROLLMENT</span>
				</a>
			</li>

		</ul>
		<ul class="side-menu">

			<li>
				<a href="../login.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>STUDENTS</h1>
					<ul class="breadcrumb">


					</ul>
				</div>

			</div>


			<div class="container mt-5">

				<?php include('message5.php'); ?>

				<div class="row">
					<div class="col-md-12">
						<div class="card">
						
							<div class="card-body">
							<div class="order">
							<h4>ADD STUDENTS :</h4>
								<form action="code5.php" method="POST">
									<div class="row">
										<div class="col-md-6">
											<label for="">First Name :</label>
											<input type="text" name="FirstName" placeholder="Entre Your First Name" class="form-control">
											<label for="">Date Of Birth :</label>
											<input type="date" name="DateOfBirth" placeholder="Entre Your Date Of Birth" class="form-control">
											<label for="">Address :</label>
											<input type="text" name="Address" placeholder="Entre Your Address" class="form-control">
											<label for="">Guardian Name :</label>
											<input type="text" name="GuardianName" placeholder="Entre Your Guardian Name" class="form-control">
											<label for="">Gender :</label></br>
											<label for="male">Male</label>
											<input type="radio" name="Gender" id="male" value="male" required>
											<label for="female">Female</label>
											<input type="radio" name="Gender" id="female" value="female" required>

										</div>
										<div class="col-md-6">
											<label for="">Email :</label>
											<input type="text" name="Email" placeholder="Entre Your Email" class="form-control">
											<label for="">Last Name :</label>
											<input type="text" name="LastName" placeholder="Entre Your Last Name" class="form-control">
											<label for="">Phone Number :</label>
											<input type="tel" name="PhoneNumber" placeholder="(XXX) XXX-XXXX" class="form-control" required>
											<label for="">Guar Phone Number :</label>
											<input type="tel" name="GuardianPhoneNumber" placeholder="(XXX) XXX-XXXX" class="form-control" required>
											<label for="">Admission Date :</label>
											<input type="date" name="AdmissionDate" class="form-control">
										</div>
										<div class="col-md-12 ">
											<button type="submit" class="btn btn-primary align-items-center" name="add_student_button">Save</button>


										</div>


									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>