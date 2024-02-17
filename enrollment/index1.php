<?php
session_start();

require '../students/dbcon5.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
				<a href="../teachers/index4.php">
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
			<li>
				<a href="../attendance/index6.php">
					<i class='bx bxs-calendar'></i> <span class="text">ATTENDANCE</span>
				</a>
			</li>
			<li class="active">
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
            <form method="POST">
                <div class="form-input">
                    <input type="text" name="search" placeholder="Search by First Name...">
                    <button type="submit" name="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <?php
            // Assuming $conn is your database connection

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                // Modify the SQL query to search for students with a specific first name
                $sql = "SELECT * FROM enrollment WHERE id LIKE '%$search%'";
                $result = mysqli_query($con, $sql);
            }
            ?>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num"></span>
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>ENROLLMENTS</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#"></a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="../home/index.php">DASHBOARD</a>
                        </li>
                    </ul>
                </div>

            </div>



            <div class="container md-5 p-4 m-12">

                <?php include('../students/message5.php'); ?>

                <div class="row">
                    <div class="col-ms-4 p-4 ">

                        <div class="card-header">

                        </div>
                        <div class="card-body">


                            <div class="table-data">
                                <div class="order">
                                    <div class="head">
                                        <h3>LISTE</h3>
                                        <h4>
                                            <a href="enrollment-create.php" class="btn btn-primary float-end">Add Enrollment</a>
                                        </h4>

                                    </div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Enrollment ID</th>
                                                <th>Student ID</th>
                                                <th> Course ID</th>
                                                <th> Teacher ID</th>
                                                <th> Enrollment Date</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch enrollment records and student data efficiently using JOIN
                                            $query = "SELECT e.id, e.students_id, e.courses_id, e.teachers_id, e.EnrollmentDate, s.FirstName, c.CourseName, t.FirstName
                                                FROM enrollment e
                                                INNER JOIN students s ON e.students_id = s.id
                                                INNER JOIN courses c ON e.courses_id = c.id
                                                INNER JOIN teachers t ON e.teachers_id  = t.id";

                                            // Check if the form is submitted and a search term is provided
                                            if (isset($_POST['submit']) && !empty($_POST['search'])) {
                                                $search = mysqli_real_escape_string($con, $_POST['search']); // Sanitize the input
                                                $query .= " WHERE e.id LIKE '%$search%' OR s.FirstName LIKE '%$search%' OR c.CourseName LIKE '%$search%' OR t.FirstName LIKE '%$search%'";
                                            }

                                            $query_run = mysqli_query($con, $query);

                                            if ($query_run) {
                                                while ($enrollment = mysqli_fetch_assoc($query_run)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $enrollment['id']; ?></td>
                                                        <td><?= $enrollment['FirstName']; ?></td>
                                                        <td><?= $enrollment['CourseName']; ?></td>
                                                        <td><?= $enrollment['FirstName']; ?></td>
                                                        <td><?= $enrollment['EnrollmentDate']; ?></td>
                                                        <td>
                                                            <a href="enrollment-edit.php?id=<?= $enrollment['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <form action="code1.php" method="POST" class="d-inline">
                                                                <input type="hidden" name="id" value="<?= $enrollment['id']; ?>">
                                                                <button type="submit" class="btn btn-danger btn-sm" name="delete_enrollment_button">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "Query execution failed: " . mysqli_error($con);
                                            }
                                            ?>
                                        </tbody>



                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../home/script.js"></script>


</body>

</html>