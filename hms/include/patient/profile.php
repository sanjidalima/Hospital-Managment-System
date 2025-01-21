<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient Profile</title>
</head>
<body>
<?php
    include(__DIR__ . "/../header.php");
    include(__DIR__ . "/../connection.php");
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                include(__DIR__ . "/sidevav.php");
                $Spatient = $_SESSION['patient'];

                $query = "SELECT * FROM patient WHERE username='$Spatient'"; 
                $res = mysqli_query($connect, $query); 
                $row = mysqli_fetch_array($res);
                ?>
            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            // Profile Picture Upload
                            if (isset($_POST['upload'])) {
                                $img = $_FILES['img']['name']; 

                                if (!empty($img)) { 
                                    $target_dir = __DIR__ . "/img/";
                                    if (!is_dir($target_dir)) {
                                        mkdir($target_dir, 0777, true);
                                    }

                                    $query = "UPDATE patient SET profile='$img' WHERE username='$Spatient'";
                                    $res = mysqli_query($connect, $query);

                                    if ($res) {
                                        move_uploaded_file($_FILES['img']['tmp_name'], $target_dir . $img); 
                                        echo "<script>alert('Profile image updated successfully!');</script>";
                                    } else {
                                        echo "<script>alert('Failed to upload image.');</script>";
                                    }
                                }
                            }

                            // Update Name
                            if (isset($_POST['update_name'])) {
                                $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
                                $surname = mysqli_real_escape_string($connect, $_POST['surname']);

                                if (!empty($firstname) && !empty($surname)) {
                                    $query = "UPDATE patient SET firstname='$firstname', surname='$surname' WHERE username='$Spatient'";
                                    $res = mysqli_query($connect, $query);

                                    if ($res) {
                                        echo "<script>alert('Profile updated successfully!');</script>";
                                    } else {
                                        echo "<script>alert('Failed to update profile.');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Firstname and surname are required.');</script>";
                                }
                            }
                            ?>

                            <h5>My Profile</h5>
                            <form method="post" enctype="multipart/form-data">
                                <?php
                                echo "<img src='img/" . $row['profile'] . "' class='col-md-12' style='height:250px;'>";
                                ?>
                                <input type="file" name="img" class="form-control my-2">
                                <input type="submit" name="upload" class="btn btn-info" value="Update Profile">
                            </form>

                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">My Details</th>
                                </tr>
                                <tr><td>Firstname</td><td><?php echo $row['firstname']; ?></td></tr>
                                <tr><td>Surname</td><td><?php echo $row['surname']; ?></td></tr>
                                <tr><td>Username</td><td><?php echo $row['username']; ?></td></tr>
                                <tr><td>Email</td><td><?php echo $row['email']; ?></td></tr>
                                <tr><td>Phone</td><td><?php echo $row['phone']; ?></td></tr>
                                <tr><td>Gender</td><td><?php echo $row['gender']; ?></td></tr>
                                <tr><td>Country</td><td><?php echo $row['location']; ?></td></tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center">Change Username</h5>
                            <?php
                            if (isset($_POST['update'])) {
                                $uname = mysqli_real_escape_string($connect, $_POST['username']);

                                if (!empty($uname)) {
                                    $query = "UPDATE patient SET username='$uname' WHERE username='$Spatient'";
                                    $res = mysqli_query($connect, $query);
                                    if ($res) {
                                        $_SESSION['patient'] = $uname;
                                        echo "<script>
                                                alert('Username updated successfully!');
                                                window.location.href = window.location.href;
                                              </script>";
                                    } else {
                                        echo "<script>alert('Failed to update username');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Username cannot be empty');</script>";
                                }
                            }
                            ?>
                            <form method="post">
                                <label>Enter Username</label>
                                <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
                                <input type="submit" name="update" class="btn btn-info" value="Update Username">
                            </form>

                            <h5 class="my-4 text-center">Change Password</h5>
                            <?php
                            if (isset($_POST['change'])) {
                                $old = $_POST['old_pass'];
                                $new = $_POST['new_pass'];
                                $con = $_POST['con_pass'];

                                $q = "SELECT * FROM patient WHERE username='$Spatient'";
                                $re = mysqli_query($connect, $q);
                                $row = mysqli_fetch_array($re);

                                if (empty($old) || empty($new) || empty($con)) {
                                    echo "<script>alert('All fields are required');</script>";
                                } elseif ($new !== $con) {
                                    echo "<script>alert('New passwords do not match');</script>";
                                } elseif (!password_verify($old, $row['password'])) {
                                    echo "<script>alert('Old password is incorrect');</script>";
                                } else {
                                    $hashedPassword = password_hash($new, PASSWORD_DEFAULT);
                                    $query = "UPDATE patient SET password='$hashedPassword' WHERE username='$Spatient'";
                                    $res = mysqli_query($connect, $query);

                                    echo $res ? "<script>alert('Password updated successfully');</script>" 
                                              : "<script>alert('Failed to update password');</script>";
                                }
                            }
                            ?>

                            <form method="post">
                                <label>Old Password</label>
                                <input type="password" name="old_pass" class="form-control">
                                <label>New Password</label>
                                <input type="password" name="new_pass" class="form-control">
                                <label>Confirm Password</label>
                                <input type="password" name="con_pass" class="form-control">
                                <input type="submit" name="change" class="btn btn-info my-2" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
