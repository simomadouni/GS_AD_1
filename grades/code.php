<?php
session_start();
include('../students/dbcon5.php');

if (isset($_POST['add_grade_button'])) {
    $Grade = $_POST['Grade'];
    $GradeDate = $_POST['GradeDate'];
    $Comments = $_POST['Comments'];

    // Check if enrollment_id is set in the form
    if (isset($_POST['enrollment_id'])) {
        $enrollment_id = $_POST['enrollment_id'];

        $grade_query = "INSERT INTO grades (enrollment_id, Grade, GradeDate, Comments)
                          VALUES ('$enrollment_id', '$Grade', '$GradeDate', '$Comments')";

        $grade_query_run = mysqli_query($con, $grade_query);

        if ($grade_query_run) {
            $_SESSION['message'] = "Grade Added Successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Something is Wrong with Grade";
            header("Location: grade-create.php");
            exit(0);
        }
    } else {
        // Handle the case where enrollment_id is not set in the form
        $_SESSION['message'] = "Error: Enrollment ID is not set in the form.";
        header("Location: grade-create.php");
        exit(0);
    }
}


else if (isset($_POST["update_grade_button"])) {
    $id = $_POST['id'] ?? null;
    $Grade = $_POST['Grade'];
    $GradeDate = $_POST['GradeDate'];
    $Comments = $_POST['Comments'];

    $update_query = "UPDATE grades SET Grade='$Grade', GradeDate='$GradeDate', Comments='$Comments' WHERE id='$id' ";
    
    $update_query_run = mysqli_query($con, $update_query);
  


    // Check for query success and handle errors
    if ($update_query_run) {
        $_SESSION['message'] = "Grade Edit Success";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong: " . mysqli_error($con);
        echo "Error: " . mysqli_error($con); // Print the error message for debugging
        header("Location: grade-edit.php");
        exit(0);
    }
}



else if (isset($_POST["delete_grade_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM grades WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Payement Deleted Success";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index.php");
        exit(0);
    }
}