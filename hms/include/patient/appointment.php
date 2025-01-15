<?php
session_start();
error_reporting(E_ALL); 
ini_set('display_errors', 1);

include("../../include/header.php");
include("../../include/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php  include(__DIR__ . "/sidevav.php");  ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-white my-2">Book Appointment</h5>
                    <?php
                    $pat = $_SESSION['patient'];

                    $sel = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");

                    if (mysqli_num_rows($sel) > 0) {
                        $row = mysqli_fetch_array($sel);

                       
                        $firstname = $row['firstname'];
                        $surname = $row['surname'];
                        $gender = $row['gender'];
                        $phone = $row['phone'];

                        if (isset($_POST['book'])) {
                            $date = $_POST['date'];
                            $sym = $_POST['sym'];

                            if (!empty($sym)) {
                                $query = "INSERT INTO appointment (firstname, surname, gender, phone, appointment_date, symptoms, status, date_booked) 
                                          VALUES ('$firstname', '$surname', '$gender', '$phone', '$date', '$sym', 'Pending', NOW())";

                                $res = mysqli_query($connect, $query);

                                if ($res) {
                                    echo "<script>alert('You have booked an appointment.');</script>";
                                }
                            } else {
                                echo "<script>alert('Please enter symptoms.');</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('Patient data not found.');</script>";
                    }
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron">
                                <form method="post">
                                    <label>Appointment Date</label>
                                    <input type="date" name="date" class="form-control" required>

                                    <label>Symptoms</label>
                                    <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms" required>

                                    <input type="submit" name="book" class="btn btn-info my-2" value="Book Appointment">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
