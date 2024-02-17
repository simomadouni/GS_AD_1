<?php
session_start();
include('../students/dbcon5.php')

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
                    <h1>ENROLLMENTS</h1>
                    <ul class="breadcrumb">


                    </ul>
                </div>

            </div>


            <div class="container mt-5">

                <?php include('../students/message5.php'); 
               $sql = "SELECT id, FirstName FROM students";
               $result = $con->query($sql);
               
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       $studentIDs[] = $row;
                   }
               }
               $sql = "SELECT id, CourseName FROM courses";
               $result = $con->query($sql);
               
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       $courseIDs[] = $row;
                   }
               }
               $sql = "SELECT id, FirstName FROM teachers";
               $result = $con->query($sql);
               
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       $teacherIDs[] = $row;
                   }
               }
                
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                           
                            <div class="card-body">
                            <div class="order">
                            <h4>ADD TEACHERS :</h4>
                                <form action="code1.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <label for="StudentID">Student ID:</label>
                                            <select class="form-select" aria-label="Default select example" name="students_id" id="students_id">
                                                <option selected disabled>Student</option>
                                                <?php
                                                foreach ($studentIDs as $student) {
                                                    echo "<option value=\"{$student['id']}\">{$student['FirstName']}</option>";
                                                }
                                                
                                                ?>
                                            </select><br>
                                            <label for="StudentID">Teacher ID:</label>
                                            <select class="form-select" aria-label="Default select example" name="teachers_id" id="teachers_id">
                                                <option selected disabled>Teacher</option>
                                                <?php
                                                foreach ($teacherIDs as $teacher) {
                                                    echo "<option value=\"{$teacher['id']}\">{$teacher['FirstName']}</option>";
                                                }
                                                
                                                ?>
                                            </select><br>
                                           
                                         
                                     

                                        </div>
                                        <div class="col-md-6">
                                        <label for="StudentID">Course ID:</label>
                                            <select class="form-select" aria-label="Default select example" name="courses_id" id="courses_id">
                                                <option selected disabled>Course</option>
                                                <?php
                                                foreach ($courseIDs as $course) {
                                                    echo "<option value=\"{$course['id']}\">{$course['CourseName']}</option>";
                                                }
                                                
                                                ?>
                                            </select><br>
                                      
                                          
                                            <label for="">Enrollment Date:</label>
                                            <input type="date" name="EnrollmentDate" placeholder="Entre Your Amount Paid" class="form-control"></br>
                                          

                                        </div>
                                        <div class="col-md-12 ">
                                            <button type="submit" class="btn btn-primary align-items-center" name="add_enrollment_button">Save</button>


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