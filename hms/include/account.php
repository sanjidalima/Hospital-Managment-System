user<?php
session_start();
include("connection.php");

if (isset($_POST['create'])) {
    $uname = $_POST['username'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $password = $_POST['password'];

    $error = array();

    if (empty($uname)) {
        $error['ac'] = "Enter Username";
    } else if (empty($email)) {
        $error['ac'] = "Enter Email";
    } else if (empty($phone)) {
        $error['ac'] = "Enter Phone Number";
    } else if ($gender == "") {
        $error['ac'] = "Select Your Gender";
    } else if ($location == "") {
        $error['ac'] = "Enter Your Location";
    } else if (empty($password) || strlen($password) < 8) {
        $error['ac'] = "Enter a Password with at least 8 characters";
    }

    if (count($error) == 0) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $connect->prepare("INSERT INTO patient (username,firstname,surname,email, phone, gender, location, password, date_reg, profile) VALUES (? ,? ,?, ?, ?, ?, ?, ?, NOW(), 'patient.jpg')");
        $stmt->bind_param("ssssssss", $uname, $firstname,$surname,$email, $phone, $gender, $location, $hashed_password);

        if ($stmt->execute()) {
            header("Location: patientlogin.php");
        } else {
            echo "<script>alert('Registration failed: " . $stmt->error . "')</script>";
        }
        $stmt->close();
    } else {
        foreach ($error as $err) {
            echo $err . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            background-image: url('../image/third.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        h2 {
            text-align: center;
            color: #17a2b8; 
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        .form-control,
        .form-select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            background: white;
        }
        .btn {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            background-color: #17a2b8;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #138496;
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
    <div class="container">
        <h2>Create Account</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="username">Firstname</label>
                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter your firstname" required>
            </div>
            <div class="form-group">
                <label for="username">Surname</label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter your surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" class="form-control" placeholder="Enter your location" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="create" class="btn btn-success btn-submit">Create Account</button>
            </div>
            <p>Already have an account? <a href="patientlogin.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
