<!DOCTYPE html>
<html>
    <head>
        <title>HMS Home page</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/ libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
        <?php
        include("include/header.php");
        ?>

        <div style="margin-top: 50px"></div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 mx-1 shadow">
                        <img src="image/more info.webp" style="width: 100%;" alt="More Info">
                        <h5 class="text-center">Click on the button for more information</h5>
                
                <a href="include/moreinfo.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">More Information</button>

                </a>
                    </div>
                    <div class="col-md-3 mx-1 shadow">
                        <img src="image/patient.jpg" style="width: 100%;"  alt="Patient">
                        <h5 class="text-center">Create Account so that we can take good care of good care of you.</h5>
                
                <a href="include/account.php">
                    <button class="btn btn-success my-3" style="margin-left: 30%;">Create Account!!!</button>

                </a>
                    </div>
                    <div class="col-md-3 mx-1 shadow">
                        <img src="image/doctor.jpg" style="width: 100%;" alt="Doctor">
                    <h5 class="text-center">We are employing for doctors</h5>
                
                    <a href="include/apply.php">
                        <button class="btn btn-success my-3" style="margin-left: 30%;">Apply Now!!!</button>

                    </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

