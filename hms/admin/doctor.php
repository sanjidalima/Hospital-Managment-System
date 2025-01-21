<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Total Doctors</title>
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
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <h3 class="text-center my-4">Approved Doctors</h3>
                    <?php
                    // Query to fetch doctors with status "Approved"
                    $status = 'Approved';
                    $query = "SELECT * FROM doctors WHERE status = ? ORDER BY date_reg ASC";
                    $stmt = $connect->prepare($query);
                    $stmt->bind_param("s", $status);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Surname</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Date Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['firstname']}</td>
                                <td>{$row['surname']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['country']}</td>
                                <td>{$row['date_reg']}</td>
                                <td>
                                <a href='view_doctor.php?id=" . $row['id'] . "'>
                                    <button class='btn btn-info'>View</button>
                                </a>
                            </td>
                              </tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<p class='text-center'>No approved doctors found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>