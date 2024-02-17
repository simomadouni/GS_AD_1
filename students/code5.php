<?php
session_start();
require 'dbcon5.php';






if (isset($_POST['add_student_button'])) {
    $id =  $_POST['id'];
    $FirstName =  $_POST['FirstName'];
    $LastName =  $_POST['LastName'];
    $DateOfBirth =  $_POST['DateOfBirth'];
    $Gender =  $_POST['Gender'];
    $Address =  $_POST['Address'];
    $PhoneNumber =  $_POST['PhoneNumber'];
    $Email =  $_POST['Email'];
    $GuardianName =  $_POST['GuardianName'];
    $GuardianPhoneNumber =  $_POST['GuardianPhoneNumber'];
    $AdmissionDate =  $_POST['AdmissionDate'];
    // ... (sanitize and validate other inputs)

    $cate_query = "INSERT INTO students 
    (id,FirstName,LastName,DateOfBirth,Gender,Address,PhoneNumber,Email,GuardianName,GuardianPhoneNumber,AdmissionDate)
    VALUES ('$id','$FirstName','$LastName','$DateOfBirth','$Gender','$Address','$PhoneNumber','$Email','$GuardianName','$GuardianPhoneNumber','$AdmissionDate')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if ($cate_query_run) {
        $_SESSION['message'] = "Student Added Successfully";
        header("Location: index5.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong: " . mysqli_error($con);
        header("Location: student-create.php");
        exit(0);
    }


} else if (isset($_POST["update_student_button"])) {
    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $GuardianName = $_POST['GuardianName'];
    $GuardianPhoneNumber = $_POST['GuardianPhoneNumber'];
    $AdmissionDate = $_POST['AdmissionDate'];

    $update_query = "UPDATE students SET FirstName ='$FirstName',LastName ='$LastName', DateOfBirth= '$DateOfBirth',
     Gender='$Gender', Address='$Address',PhoneNumber ='$PhoneNumber', Email='$Email',GuardianName='$GuardianName', GuardianPhoneNumber='$GuardianPhoneNumber' , AdmissionDate='$AdmissionDate'  WHERE id='$id'  ";


    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {
        $_SESSION['message'] = "Student Edite Success";
        header("Location: index5.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: student-edit.php");
        exit(0);
    }
} else if (isset($_POST["delete_student_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM students WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Student Deleted Success";
        header("Location: index5.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index5.php");
        exit(0);
    }
}

