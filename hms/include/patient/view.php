<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Invoice</title>
</head>
<body>
<?php

if (file_exists("../../include/header.php")) {
    include("../../include/header.php");
} else {
    echo "<p>Error: header.php not found.</p>";
}

if (file_exists("../../include/connection.php")) {
    include("../../include/connection.php");
} else {
    echo "<p>Error: connection.php not found.</p>";
}
?>

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                if (file_exists(__DIR__ . "/sidevav.php")) {
                    include(__DIR__ . "/sidevav.php");
                } else {
                    echo "<p>Side navigation not available.</p>";
                }
                ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-2">View Invoice</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                if (isset($connect) && $connect instanceof mysqli) {
                                    $query = "SELECT * FROM income WHERE id='$id'";
                                    $res = mysqli_query($connect, $query);

                                    if ($res && mysqli_num_rows($res) > 0) {
                                        $row = mysqli_fetch_array($res);
                                    } else {
                                        echo "<p>No record found for the given ID.</p>";
                                        $row = [];
                                    }
                                } else {
                                    echo "<p>Database connection error.</p>";
                                    $row = [];
                                }
                            } else {
                                echo "<p>No invoice ID provided.</p>";
                                $row = [];
                            }
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="text-center">Invoice Details</th>
                                </tr>
                                <tr>
                                    <td>Doctor</td>
                                    <td><?php echo isset($row['doctor']) ? $row['doctor'] : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Patient</td>
                                    <td><?php echo isset($row['patient']) ? $row['patient'] : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Date Discharge</td>
                                    <td><?php echo isset($row['date_dischage']) ? $row['date_dischage'] : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Amount Paid</td>
                                    <td>$<?php echo isset($row['amount_paid']) ? $row['amount_paid'] : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><?php echo isset($row['description']) ? $row['description'] : 'N/A'; ?></td>
                                </tr>
                            </table>
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
