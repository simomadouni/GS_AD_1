<?php
session_start();
include('../students/dbcon5.php');

if (isset($_POST['add_enrollment_button'])) {

    $EnrollmentDate = $_POST['EnrollmentDate'];
    $teachers_id = $_POST['teachers_id'];
    $courses_id = $_POST['courses_id'];
    $students_id = $_POST['students_id'];

    echo "EnrollmentDate: $EnrollmentDate, teachers_id: $teachers_id, courses_id: $courses_id, students_id: $students_id";




    $enrollment_query = "INSERT INTO enrollment (EnrollmentDate, teachers_id, courses_id, students_id) VALUES ('$EnrollmentDate', '$teachers_id', '$courses_id', '$students_id')";
    echo $enrollment_query;



    $enrollment_query_run = mysqli_query($con, $enrollment_query);

    if ($enrollment_query_run) {
        $_SESSION['message'] = "Enrollment Added Successfully";
        header("Location: index1.php"); // Redirect to enrollments page or any other page
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong with Enrollment";
        header("Location: enrollment-create.php"); // Redirect to add-enrollment page or any other page
        exit(0);
    }
} else if (isset($_POST["update_enrollment_button"])) {
    $id = $_POST['id'] ?? null;
    
    $EnrollmentDate = $_POST['EnrollmentDate'];

    $update_query = "UPDATE enrollment SET  EnrollmentDate='$EnrollmentDate' WHERE id='$id';    ";

    $update_query_run = mysqli_query($con, $update_query);




    if ($update_query_run) {
        $_SESSION['message'] = "Enrollment Edit Success";
        header("Location: index1.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong: " . mysqli_error($con);
        echo "Error: " . mysqli_error($con); // Print the error message for debugging
        header("Location: enrollment-edit.php");
        exit(0);
    }
} else if (isset($_POST["delete_enrollment_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM enrollment WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Payement Deleted Success";
        header("Location: index1.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index1.php");
        exit(0);
    }
}
