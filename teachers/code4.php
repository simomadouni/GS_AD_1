<?php
session_start();
include('../students/dbcon5.php');

if (isset($_POST['add_teacher_button'])) {
    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $HireDate = $_POST['HireDate'];
    $Specialization = $_POST['Specialization'];
    $Department = $_POST['Department'];


    $cate_query = "INSERT INTO teachers 
    (id,FirstName,LastName,DateOfBirth,Gender,Address,PhoneNumber,Email,HireDate,Specialization,Department)
    VALUES ('$id','$FirstName','$LastName','$DateOfBirth','$Gender','$Address','$PhoneNumber','$Email','$HireDate','$Specialization','$Department')";

    $cate_query_run = mysqli_query($con, $cate_query);
    if ($cate_query_run) {
        $_SESSION['message'] = "Teacher Added Successfully";
        header("Location: index4.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: add-teacher.php");
        exit(0);
    }
} else if (isset($_POST["update_teacher_button"])) {
    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $HireDate = $_POST['HireDate'];
    $Specialization = $_POST['Specialization'];
    $Department = $_POST['Department'];

    $update_query = "UPDATE teachers SET FirstName ='$FirstName',LastName ='$LastName', DateOfBirth= '$DateOfBirth',
     Gender='$Gender', Address='$Address',PhoneNumber ='$PhoneNumber', Email='$Email',HireDate='$HireDate', Specialization='$Specialization' , Department='$Department'  WHERE id='$id'  ";


    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {
        $_SESSION['message'] = "Teacher Edite Success";
        header("Location: index4.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location:teacher-edit.php");
        exit(0);
    }
} else if (isset($_POST["delete_teacher_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM teachers WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Teacher Deleted Success";
        header("Location: index4.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index4.php");
        exit(0);
    }
}
