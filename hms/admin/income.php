<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Total Income</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
        
                <div class="col-md-2" style="margin-left: -30px">
                    <?php 
                    include("sidenav.php"); 
                    ?>
                </div>

                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Income</h5>

                    <?php

                    $query = "SELECT * FROM income";
                    $res = mysqli_query($connect, $query);

                    $output = "";

                    $output .= "
                    <table class='table table-bordered'>
                        <tr>
                            <td>ID</td>
                            <td>Doctor</td>
                            <td>Patient</td>
                            <td>Date_Discharge</td>
                            <td>Fee</td>
                        </tr>
                    ";

                    if (mysqli_num_rows($res) < 1) {
                        $output .= "
                        <tr>
                            <td class='text-center' colspan='5'>No Patient Discharge Yet.</td>
                        </tr>
                        ";
                    }

                    $total_income = 0;
                    while ($row = mysqli_fetch_array($res)) {
                        $total_income += $row['amount_paid'];
                        $output .= "
                        <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['doctor'] . "</td>
                            <td>" . $row['patient'] . "</td>
                            <td>" . $row['date_dischage'] . "</td>
                            <td>" . $row['amount_paid'] . "</td>
                        </tr>
                        ";
                    }

                    $output .= "</table>";

                    echo $output;
                    ?>

                    <div class="text-center">
                        <h3>Total Income: $<?php echo number_format($total_income, 2); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
