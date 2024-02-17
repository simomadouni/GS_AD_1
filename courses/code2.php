<?php
session_start();
include('../students/dbcon5.php');

if (isset($_POST['add_course_button'])) {
    $CourseName = $_POST['CourseName'];
    $Description = $_POST['Description'];
    $CreditHours = $_POST['CreditHours'];
    $Department = $_POST['Department'];

    $course_query = "INSERT INTO courses 
    ( CourseName, Description, CreditHours, Department)
    VALUES ('$CourseName', '$Description', '$CreditHours', '$Department')";

    $course_query_run = mysqli_query($con, $course_query);

    if ($course_query_run) {
        $_SESSION['message'] = "Course Added Successfully";
        header("Location: index2.php"); // Redirect to courses page or any other page
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong with Course";
        header("Location: course-create.php"); // Redirect to add-course page or any other page
        exit(0);
    }
}

else if (isset($_POST["update_course_button"])) {
    $id = $_POST['id'] ?? null;
    $CourseName = $_POST['CourseName'];
    $Description = $_POST['Description'];
    $CreditHours = $_POST['CreditHours'];
    $Department = $_POST['Department'];

    $update_query = "UPDATE courses SET  Department='$Department', CourseName='$CourseName', Description='$Description', CreditHours='$CreditHours' WHERE id='$id' ";
    
    $update_query_run = mysqli_query($con, $update_query);
  


    // Check for query success and handle errors
    if ($update_query_run) {
        $_SESSION['message'] = "Course Edit Success";
        header("Location: index2.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong: " . mysqli_error($con);
        echo "Error: " . mysqli_error($con); // Print the error message for debugging
        header("Location: course-edit.php");
        exit(0);
    }
}



else if (isset($_POST["update_course_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM courses WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Payement Deleted Success";
        header("Location: index2.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index2.php");
        exit(0);
    }
}