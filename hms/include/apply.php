<?php
include("connection.php");
include("header.php");

if (isset($_POST['apply'])) {
    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];

    $error = array();

    if (empty($firstname)) {
        $error['apply'] = "Enter Firstname";
    } else if (empty($surname)) {
        $error['apply'] = "Enter Surname";
    } else if (empty($username)) {
        $error['apply'] = "Enter Username";
    } else if (empty($email)) {
        $error['apply'] = "Enter Email Address";
    } else if ($gender == "") {
        $error['apply'] = "Select Your Gender";
    } else if (empty($phone)) {
        $error['apply'] = "Enter Phone Number";
    } else if ($country == "") {
        $error['apply'] = "Select Country";
    } else if (empty($password)) {
        $error['apply'] = "Enter Password";
    } else if ($confirm_password != $password) {
        $error['apply'] = "Both Passwords do not match";
    }

    if (count($error) == 0) {
        $query = "INSERT INTO doctors(firstname, surname, username, email, gender, phone, country, password, salary, date_reg, status, profile) 
                  VALUES ('$firstname', '$surname', '$username', '$email', '$gender', '$phone', '$country', '$password', '0', NOW(), 'Pending', 'doctor.jpg')";
        
        $result = mysqli_query($connect, $query);

        if ($result) {
            echo "<script>alert('Application successful!');</script>";
            header("Location: doctorlogin.php");
        } else {
            echo "<script>alert('Error: " . mysqli_error($connect) . "');</script>";
        }
    }
}

if (isset($error['apply'])) {
    $s = $error['apply'];
    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
} else {
    $show = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now!!!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../image/third.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
         
            min-height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 500px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        h5 {
            text-align: center;
            color: #17a2b8;
            font-weight: bold;
        }
        .btn-submit {
            width: 100%;
            margin-top: 10px;
            background-color: #28a745; /* Bootstrap success green */
            color: white;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #218838; /* Darker green on hover */
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
    <h5>Apply Now!!!</h5>
    <div>
        <?php echo $show; ?>
    </div>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Firstname</label>
            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Surname</label>
            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email Address"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Select Gender</label>
            <select name="gender" class="form-select" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="tel" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number"  value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Select Country</label>
            <select name="country" class="form-select" required>
                <option value="">Select Country</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="China">China</option>
                <option value="Japan">Japan</option>
                <option value="Italy">Italy</option>
                <option value="Africa">Africa</option>
                <option value="Russia">Russia</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password" required>
        </div>

        <button type="submit" name="apply" class="btn btn-success btn-submit">Apply Now</button>

        <p>I already have an account <a href="doctorlogin.php">Click here</a></p>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
