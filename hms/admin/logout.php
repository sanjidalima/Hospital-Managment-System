

<?php
session_start();

if (headers_sent()) {
    die("Redirect failed. Please ensure no output before this script.");
}


if (isset($_SESSION['admin'])) {
    
    unset($_SESSION['admin']);



session_destroy();


header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");


header("Location: ../index.php");
exit();
}
?>

