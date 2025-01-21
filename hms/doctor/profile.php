<?php
session_start();

error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctors Profile Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include("../include/header.php");
include("../include/connection.php");
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
        
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                include("sidenav.php");
                ?>
            </div>
            
            <div class="col-md-10">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $doc = $_SESSION['doctor']; 

                                $query = "SELECT * FROM doctors WHERE username='$doc'";
                                $res = mysqli_query($connect, $query); 
                                $row = mysqli_fetch_array($res); 

                                if (isset($_POST['upload'])) {
                                    $img = $_FILES['img']['name']; 
                                    $unique_name = time() . "_" . $img; // Add a unique prefix to the image name

                                    if (!empty($img)) {
                                        $query = "UPDATE doctors SET profile='$unique_name' WHERE username='$doc'";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$unique_name"); 
                                        }
                                    }
                                }
                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <?php
                                    echo "<img src='./img/" . $row['profile'] . "?t=" . time() . "' style='height: 250px;' class='col-md-12 my-3'>";
                                    ?>
                                    <input type="file" name="img" class="form-control my-1"> 
                                    <input type="submit" name="upload" class="btn btn-success" value="Update Profile"> 
                                </form>

                                <div class="my-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2" class="text-center">Details</th>
                                        </tr>
                                        <tr>
                                            <td>Firstname</td>
                                            <td><?php echo $row['firstname']; ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td><?php echo $row['surname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><?php echo $row['username']; ?></td> 
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone No.</td>
                                            <td><?php echo $row['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $row['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>County</td>
                                            <td><?php echo $row['country']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Salary</td>
                                            <td><?php echo "$" . $row['salary']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-center my-2">Change Username</h5>
                                <?php
                                if (isset($_POST['change_uname'])) {
                                    $uname = $_POST['uname']; 

                                    if (!empty($uname)) {
                                        $query = "UPDATE doctors SET username='$uname' WHERE username='$doc'";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            $_SESSION['doctor'] = $uname;
                                        }
                                    }
                                }
                                ?>

                                <form method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                    <br>
                                    <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                </form>

                                <br><br>

                                <h5 class="text-center my-2">Change Password</h5>
                                <?php
                                if (isset($_POST['change_pass'])) { 
                                    $old = $_POST['old_pass'];
                                    $new = $_POST['new_pass'];
                                    $con = $_POST['con_pass'];

                                    $ol = "SELECT * FROM doctors WHERE username='$doc'";
                                    $ols = mysqli_query($connect, $ol); 
                                    $row = mysqli_fetch_array($ols);

                                    if ($old != $row['password']) { 
                                        echo "<div class='alert alert-danger'>Old password is incorrect.</div>";
                                    } else if (empty($new)) {
                                        echo "<div class='alert alert-warning'>New password cannot be empty.</div>";
                                    } else if ($con != $new) { 
                                        echo "<div class='alert alert-warning'>Passwords do not match.</div>";
                                    } else {
                                        $query = "UPDATE doctors SET password='$new' WHERE username='$doc'";
                                        mysqli_query($connect, $query);
                                        echo "<div class='alert alert-success'>Password updated successfully.</div>";
                                    }
                                }
                                ?>

                                <form method="post">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm New Password">
                                    </div>
                                    
                                    <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>

</body>
</html>