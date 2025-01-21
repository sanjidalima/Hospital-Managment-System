<?php
session_start();
include("connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (empty($uname)) {
        echo "<script>alert('Enter Username')</script>";
    } else if (empty($pass)) {
        echo "<script>alert('Enter Password')</script>";
    } else {
       
        $stmt = $connect->prepare("SELECT * FROM patient WHERE username=?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $patient = $result->fetch_assoc();
           
            if (password_verify($pass, $patient['password'])) {
                echo "<script>alert('You have logged in as a patient')</script>";

                $_SESSION['patient'] = $uname;
                header("Location: /HospitalManagmentProject/hms/include/patient/index.php");
                exit();
            } else {
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        } else {
            echo "<script>alert('Invalid Username or Password')</script>";
        }
        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
    <style>
        body {
            background-image: url('../image/third.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .jumbotron {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .jumbotron h5 {
            font-weight: bold;
            font-size: 1.5rem;
            color: #333;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        p {
            margin-top: 15px;
            text-align: center;
        }
        p a {
            color: #17a2b8;
            text-decoration: none;
            font-weight: bold;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php 
    $header_path = "../include/header.php";
    if (file_exists($header_path)) {
        include($header_path);
    } else {
        echo "<p style='color:red; text-align:center;'>Header file not found!</p>";
    }
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Patient Login</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="button-group">
                            <input type="submit" name="login" class="btn btn-info" value="Login">
                            <input type="button" name="signup" class="btn btn-info" value="Cancel" onclick="window.location.href='/hms'">
                        </div>
                        <p>Don't have an account? <a href="account.php">Click here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
