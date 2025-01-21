<?php
session_start();
include("../include/header.php");
include("../include/connection.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$row = null;

if ($id) {
    $query = "SELECT * FROM appointment WHERE id='$id'";
    $res = mysqli_query($connect, $query);

    if (!$res) {
        die("Error in query: " . mysqli_error($connect)); // Debug SQL errors
    }

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res); // Fetch the row if available
    } else {
        echo "<script>alert('No appointment found with the provided ID');</script>";
    }
} else {
    echo "<script>alert('No ID provided in the URL');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Check Patient Appointment</title>
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-2">Total Appointment</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <?php if ($row): ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2" class="text-center">Appointment Details</td>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo htmlspecialchars($row['surname']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone No.</td>
                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo htmlspecialchars($row['symptoms']); ?></td>
                                    </tr>
                                </table>
                            <?php else: ?>
                                <p>No appointment details available.</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-center my-1">Invoice</h5>
                            <?php
                            if (isset($_POST['send'])) {
                                $fee = $_POST['fee'];
                                $des = $_POST['des'];

                                if (empty($fee)) {
                                    echo "<script>alert('Fee is required');</script>";
                                } elseif (empty($des)) {
                                    echo "<script>alert('Description is required');</script>";
                                } else {
                                    $doc = $_SESSION['doctor'];
                                    $fname = $row['firstname'];
                                    $query = "INSERT INTO income (doctor, patient, date_dischage, amount_paid, description) 
                                              VALUES ('$doc', '$fname', NOW(), '$fee', '$des')";

                                    $res = mysqli_query($connect, $query);

                                    if ($res) {
                                        echo "<script>alert('You have sent Invoice');</script>";

                                        mysqli_query($connect, "UPDATE appointment SET status = 'Discharge' WHERE id='$id'");

                                    }
                                }
                            }
                            ?>
                            <form method="post">
                                <label>Fee</label>
                                <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter patient Fee">
                                <label for="des">Description</label>
                                <input type="text" id="des" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
                                <input type="submit" name="send" class="btn btn-info my-2" value="Send">
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