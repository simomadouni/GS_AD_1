<?php
session_start();
include('../students/dbcon5.php');

if (isset($_POST['add_payment_button'])) {
    $AmountPaid = $_POST['AmountPaid'];
    $PaymentDate = $_POST['PaymentDate'];
    $PaymentMethod = $_POST['PaymentMethod'];

    // Check if students_id is set in the form
    if (isset($_POST['students_id'])) {
        $students_id = $_POST['students_id'];

        $payment_query = "INSERT INTO payments (students_id, AmountPaid, PaymentDate, PaymentMethod)
                          VALUES ('$students_id', '$AmountPaid', '$PaymentDate', '$PaymentMethod')";

        $payment_query_run = mysqli_query($con, $payment_query);

        if ($payment_query_run) {
            $_SESSION['message'] = "Payment Added Successfully";
            header("Location: index3.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Something is Wrong with Payment";
            header("Location: payment-create.php");
            exit(0);
        }
    } else {
        // Handle the case where students_id is not set in the form
        $_SESSION['message'] = "Error: Student ID is not set in the form.";
        header("Location: payment-create.php");
        exit(0);
    }
}


else if (isset($_POST["update_payment_button"])) {
    $id = $_POST['id'] ?? null;
    $AmountPaid = $_POST['AmountPaid'];
    $PaymentDate = $_POST['PaymentDate'];
    $PaymentMethod = $_POST['PaymentMethod'];

    $update_query = "UPDATE payments SET AmountPaid='$AmountPaid', PaymentDate='$PaymentDate', PaymentMethod='$PaymentMethod' WHERE id='$id' ";
    
    $update_query_run = mysqli_query($con, $update_query);
  


    // Check for query success and handle errors
    if ($update_query_run) {
        $_SESSION['message'] = "Payment Edit Success";
        header("Location: index3.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong: " . mysqli_error($con);
        echo "Error: " . mysqli_error($con); // Print the error message for debugging
        header("Location: payment-edit.php");
        exit(0);
    }
}



else if (isset($_POST["delete_payement_button"])) {
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    $delete_query = "DELETE FROM payments WHERE id='$id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        $_SESSION['message'] = "Payement Deleted Success";
        header("Location: index3.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something is Wrong";
        header("Location: index3.php");
        exit(0);
    }
}