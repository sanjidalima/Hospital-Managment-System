<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">

                    <h5 class="text-center my-2">Total Appointment</h5>

                    <?php
                    $query = "SELECT * FROM appointment WHERE status='Pending'";  

                    $res = mysqli_query($connect, $query);

                    $output = "<table class='table table-bordered'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Surname</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Appointment Date</th>
                                        <th>Symptoms</th>
                                        <th>Date Booked</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";

                    if (mysqli_num_rows($res) < 1) {  
                        $output .= "<tr>
                                        <td class='text-center' colspan='9'>No Appointment Yet.</td>
                                      </tr>";
                    } else {
                        while ($row = mysqli_fetch_array($res)) {
                            $output .= "<tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['firstname'] . "</td>
                                            <td>" . $row['surname'] . "</td>
                                            <td>" . $row['gender'] . "</td>
                                            <td>" . $row['phone'] . "</td>
                                            <td>" . $row['appointment_date'] . "</td>
                                            <td>" . $row['symptoms'] . "</td>
                                            <td>" . $row['date_booked'] . "</td>
                                            <td>
                                                <a href='discharge.php?id=" . $row['id'] . "' class='btn btn-info'>Check</a>
                                            </td>
                                          </tr>";
                        }
                    }

                    $output .= "</tr></table>";

                    echo $output;
                    ?>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
