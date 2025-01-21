<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <?php
    if (file_exists("../include/header.php")) {
        include("../include/header.php");
    } else {
        echo "Header file not found.";
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php
                if (file_exists("sidenav.php")) {
                    include("sidenav.php");
                } else {
                    echo "Sidenav file not found.";
                }
                ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center">Job Request</h5>
                <div id="show"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
           
            show();
            function show() {
                $.ajax({
                    url: "ajax_job_request.php",
                    method: "POST",
                    success: function (data) {
                        $("#show").html(data);
                    }
                });
            }

           
            $(document).on('click', '.approve', function () {
                const id = $(this).attr('id'); 
                $.ajax({
                    url: "ajax_approve.php", 
                    method: "POST",
                    data: { id: id },
                    success: function (response) {
                        alert("Approved successfully!");
                        show(); 
                    },
                    error: function () {
                        alert("An error occurred while approving.");
                    }
                });
            });

            $(document).on('click', '.reject', function () {
                const id = $(this).attr('id'); 
                $.ajax({
                    url: "ajax_reject.php", 
                    method: "POST",
                    data: { id: id },
                    success: function (response) {
                        alert("Rejected successfully!");
                        show(); 
                    },
                    error: function () {
                        alert("An error occurred while rejecting.");
                    }
                });
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>