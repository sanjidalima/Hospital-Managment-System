<?php
session_start();
include("connection.php");

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array(); 

$q = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";

$qq = mysqli_query($connect, $q);

$row = mysqli_fetch_array($qq);

if (empty($uname)) {
    $error['login'] = "Enter Username";
} else if (empty($password)) {
    $error['login'] = "Enter Password";
} else if (!$row) {
    $error['login'] = "Invalid login credentials";
} else if (isset($row['status']) && $row['status'] == "Pending") { 
    $error['login'] = "Please Wait For the admin to confirm"; 
} else if (isset($row['status']) && $row['status'] == "Rejected") {
    $error['login'] = "Try again Later";
}

if (count($error) == 0) {
    $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'"; 
    $res = mysqli_query($connect, $query); 

    if (mysqli_num_rows($res)) {
        $_SESSION['doctor'] = $uname;
        echo "<script>alert('done')</script>";
        header("Location: /HospitalManagmentProject/hms/doctor/index.php");
           exit();
       
    } else {
        echo "<script>alert('Invalid Account')</script>"; 
    }
}
}
    
    if (isset($error['login'])) {
        $l = $error['login']; 
        $show = "<h5 class='text-center alert alert-danger'>$l</h5>"; 
    } else {
        $show = "";
    }
    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
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
                    <h5 class="text-center my-3">Doctors Login</h5>
                    <div>
                        <?php echo $show; ?>
                    </div>
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
                        <p> I Don't have an account? <a href="apply.php">Apply Now</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>
