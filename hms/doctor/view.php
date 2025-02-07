<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patient Details</title>
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
                <h5 class="text-center my-3">View Patient Details</h5>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                
                    $query = "SELECT * FROM patient WHERE id='$id'";
                    $res = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($res);
                }
                ?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php
            echo "<img src='../include/patient/img/".$row['profile']."' class='col-md-12 my-2' height='250px;'>";
            ?>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center" colspan="2">Details</th>
                </tr>
                
                <tr>
                    <td>UserName</td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
               
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $row['gender']; ?></td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td><?php echo $row['location']; ?></td>
                </tr>
                <tr>
                    <td>Date Registered</td>
                    <td><?php echo $row['date_reg']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
