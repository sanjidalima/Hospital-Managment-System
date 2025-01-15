<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                ?>
            </div>
            <div class="col-md-10">
                <h5 class="my-3">Patient Dashboard</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Profile</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="profile.php">
                                            <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">Book Appointment</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="appointment.php">
                                            <i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="text-white my-4">My Invoice</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="invoice.php">
                                            <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_POST['send'])) {
                    $title = $_POST['title'];
                    $message = $_POST['message'];

                    if (empty($title)) {
                        echo "<script>alert('Title is required');</script>";
                    } else if (empty($message)) {
                        echo "<script>alert('Message is required');</script>";
                    } else {
                        $user = $_SESSION['patient'];
                        $query = "INSERT INTO report (title, message, username, date_send) VALUES ('$title', '$message', '$user', NOW())";

                        $res = mysqli_query($connect, $query);

                        if ($res) {
                            echo "<script>alert('You have sent your report');</script>";
                        } else {
                            echo "<script>alert('Failed to send the report');</script>";
                        }
                    }
                }
                ?>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 jumbotron bg-info my-5">
                            <h5 class="text-center my-2">Send A Report</h5>
                            <form method="post">
                                <label>Title</label>
                                <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">

                                <label>Message</label>
                                <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">

                                <input type="submit" name="send" value="Send Report" class="btn btn-success my-2">
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


