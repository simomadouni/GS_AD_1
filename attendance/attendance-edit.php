<?php
session_start();
require '../students/dbcon5.php';
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

    <title>GESTION SCHOOLER</title>
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
			<li>
				<a href="../students/index5.php">
					<i class='bx bxs-group'></i>
					<span class="text">STUDENTS</span>
				</a>
			</li>
			<li>
				<a href="../Nos/index4.php">
					<i class='bx bxs-group'></i>
					<span class="text">TEACHERS</span>
				</a>
			</li>
			<li>
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
			<li>
				<a href="../grades/index.php">

				<i class='bx bx-note'></i>
					<span class="text">GRADES</span>
				</a>
			</li>
			<li  class="active">
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
                    <h1>ATTENDANCE</h1>
                    <ul class="breadcrumb">


                    </ul>
                </div>

            </div>


            <div class="container mt-5">

                <?php include('../students/message5.php'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET['id'])) {
                            $id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM attendance WHERE id='$id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $attendances = mysqli_fetch_array($query_run);
                        ?>
                                <div class="card">
                                   
                                    <div class="card-body">
                                    <div class="order">
                                    <h4>EDIT GRADE :</h4>
                                        <form action="code6.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                 <label for="">	Attendance Date:</label>
                                                    <input type="date" name="AttendanceDate" value="<?php echo $attendances['AttendanceDate']; ?>" class="form-control">


                                                </div>
                                                <div class="col-md-6">
                                                    <label for="Grade"> Present :</label>    </br>
                        

                                                    <label for="Yes">Yes</label>
                                                    <input type="radio" name="LsPresent" value="Yes" <?php echo ($attendances['LsPresent'] == 'Yes') ? 'checked' : ''; ?> id="Yes" required>
                                                    <label for="No">No</label>
                                                    <input type="radio" name="LsPresent" value="No" <?php echo ($attendances['LsPresent'] == 'No') ? 'checked' : ''; ?> id="No" required>
                                                </div>


                                                <div class="col-md-12 "></br>
                                                    <form action="code.php" method="POST">
                                                        <!-- Other form fields -->
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <button type="submit" class="btn btn-primary align-items-center" name="update_attendance_button">Update</button>
                                                    </form>
                                                </div>



                                            </div>
                                        </form>
                                    </div>
                                </div>

                        <?php
                            } else {
                                echo "Attendance Not Found";
                            }
                        } else {
                            echo "Student ID Missing From Url";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>