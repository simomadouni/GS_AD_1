<?php
session_start();
include './students/dbcon5.php';

function login($username, $password, $con) {
    if ($stmt = $con->prepare('SELECT id, password FROM users WHERE name = ?')) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();

            if ($password === $password) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $username;
                $_SESSION['id'] = $id;
                return true;
            }
        }
    }
    return false;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login($username, $password, $con)) {
        // Redirect to home page on successful login
        header("Location: ./home/index.php");
        exit();
    } else {
        // Handle login failure, you can set an error message or redirect to login page
        echo "Login failed. Please check your credentials.";
        // Alternatively, you can redirect to the login page
        // header("Location: login.php");
        // exit();
    }
}
?>
