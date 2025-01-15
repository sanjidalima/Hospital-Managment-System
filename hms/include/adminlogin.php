<?php
session_start();
include("connection.php");
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();
    if (empty($username)) {
        $error['admin'] = "Enter Username";
    } else if (empty($password)) {
        $error['admin'] = "Enter Password";
    }
    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username = '$username' AND password='$password'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('You have logged in as an admin')</script>";

            $_SESSION['admin'] = $username;
            header("Location: /HospitalManagmentProject/hms/admin/");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <style>
        body {
            background-image: url('../image/third.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .jumbotron {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }
        .jumbotron img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .alert {
            color: red;
            font-weight: bold;
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .button-group {
            text-align: center;
        }
        .button-group .btn {
            margin: 0 5px; 
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <img src="../image/admin.jpg" alt="Admin">
                    <form method="post" class="my-2">
                        <div class="alert">
                            <?php
                            if (isset($error['admin'])) {
                                $sh = $error['admin'];
                                $show = "<h4>$sh</h4>";
                            } else {
                                $show = "";
                            }
                            echo $show;
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group button-group">
                            <input type="submit" name="login" class="btn btn-info" value="Login">
                            <input type="button" name="cancel" class="btn btn-info" value="Cancel" onclick="window.location.href='../include/index.php'">
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
