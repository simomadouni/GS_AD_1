<?php
session_start();
include('../students/dbcon5.php');

if (isset($_POST['add_attendance_button'])) {
    $id =  $_POST['id'];
    $AttendanceDate = $_POST['AttendanceDate'];
    $LsPresent = $_POST['LsPresent']; // Corrected variable name

    // Check if enrollment_id is set in the form
    if (isset($_POST['enrollment_id'])) {
        $enrollment_id = $_POST['enrollment_id'];

        $attendance_query = "INSERT INTO attendance (id,enrollment_id, AttendanceDate, LsPresent) 
                             VALUES ('$id','$enrollment_id', '$AttendanceDate', '$LsPresent')";

        $attendance_query_run = mysqli_query($con, $attendance_query);

        if ($attendance_query_run) {
            $_SESSION['message'] = "Attendance Added Successfully";
            header("Location: index6.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Something is Wrong with Attendance";
            header("Location: attendance-create.php");
            exit(0);
        }
    } else {
        // Handle the case where enrollment_id is not set in the form
        $_SESSION['message'] = "Error: Enrollment ID is not set in the form.";
        header("Location: attendance-create.php");
        exit(0);
    }
}



else if (isset($_POST["update_attendance_button"])) {
    $id = $_POST['id'] ?? null;
    $AttendanceDate = $_POST['AttendanceDate'];
    $LsPresent = $_POST['LsPresent'];

    $update_query = "UPDATE attendance SET  AttendanceDate='$AttendanceDate', LsPresent='$LsPresent' WHERE id='$id' ";
    
    $update_query_run = mysqli_query($con, $update_query);
  


    // Check for query success and handle errors
    if ($update_query_run) {
        $_SESSION['message'] = "Attendance Edit Success";
        header("Location: index6.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong: " . mysqli_error($con);
        echo "Error: " . mysqli_error($con); // Print the error message for debugging
        header("Location: attendance-edit.php");
        exit(0);
    }
}



else if (isset($_POST["delete_attendance_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM attendances WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Payement Deleted Success";
        header("Location: index6.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index6.php");
        exit(0);
    }
}