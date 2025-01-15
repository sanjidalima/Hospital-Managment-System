<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/ libs/font-awesome/5.13.0/css/all.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-info bg-info">
    <h5 class="text-white">Hospital Management System</h5>
    <div class="mr-auto"></div>
    <ul class="navbar-nav">
        <?php
        if (isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            echo '
            <li class="nav-item"><a href="#" class="nav-link text-white"> ' . $user . '</a></li>
            <li class="nav-item"><a href="../include/patient/logout.php" class="nav-link text-white">Logout</a></li>';
        } else if(isset($_SESSION['patient'])){
            $user = $_SESSION['patient'];
            echo '
            <li class="nav-item"><a href="#" class="nav-link text-white"> ' . $user . '</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
        }else if(isset($_SESSION['doctor'])){
             $user = $_SESSION['doctor'];
            echo '
            <li class="nav-item"><a href="#" class="nav-link text-white"> ' . $user . '</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
        } else {
            echo '
            <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
            <li class="nav-item"><a href="include/adminlogin.php" class="nav-link text-white">Admin</a></li>
            <li class="nav-item"><a href="include/doctorlogin.php" class="nav-link text-white">Doctor</a></li>
            <li class="nav-item"><a href="include/patientlogin.php" class="nav-link text-white">Patient</a></li>';
           
         
        }
        ?>
    </ul>
</nav>
</body>
</html>

