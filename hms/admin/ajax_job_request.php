<?php
include("../include/connection.php");
$status = 'Pending';
$stmt = $connect->prepare("SELECT * FROM doctors WHERE status = ? ORDER BY date_reg ASC");
$stmt->bind_param("s", $status);
$stmt->execute();
$res = $stmt->get_result();

$output = "
<table class='table table-bordered'>
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
";

if ($res->num_rows < 1) {
    $output .= "
    <tr>
        <td colspan='10'>No job Request Yet.</td>
    </tr>
    ";
} else {
    while ($row = $res->fetch_assoc()) {
        $output .= "
        <tr>
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
                <div class='d-flex justify-content-around'>
                    <button id='{$row['id']}' class='btn btn-success approve'>Approve</button>
                    <button id='{$row['id']}' class='btn btn-danger reject'>Reject</button>
                </div>
            </td>
        </tr>
        ";
    }
}

$output .= "</table>";
echo $output;
?>
