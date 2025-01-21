<?php

$shortInfo = "Welcome to HelthCare Hospital. We provide top-notch healthcare services to all our patients. Learn more about our hospital, and explore the opportunities available for employment.";


$fullInfo = "
HelthCare Hospital is not only committed to providing excellent healthcare services but also believes in growing a community of dedicated professionals. We are excited to offer job opportunities for doctors and healthcare professionals to join our team.

### Job Application for Doctors:
At HelthCare Hospital, doctors can apply for open positions through our online application system. Once hired, doctors can create their profiles, manage patient appointments, and provide high-quality care to our patients. 

### Admin Management:
The hospital's admin has full control over the system, from managing user accounts (both doctors and patients) to overseeing appointments and invoices. The admin ensures everything runs smoothly, maintaining the hospital's operation with ease.

### Doctor's Profile:
Doctors can create and manage their profiles, including adding their qualifications, specialization, and working hours. They can also view and manage patient appointments, helping to provide the best care for our patients.

### Patient Account:
Patients can create an account to manage their health records, view appointment schedules, and interact with their doctors. Patients can track their appointments, receive prescriptions, and even view invoices for their visits to the hospital.

### Features:
- **Doctor’s Dashboard**: Doctors can view and manage their appointments, patient history, and track their work schedules.
- **Patient Dashboard**: Patients can track their health status, access their medical records, and stay updated on their upcoming appointments.
- **Admin Panel**: The admin manages the whole system, overseeing doctor and patient profiles, appointments, and invoicing processes.

HelthCare Hospital is committed to providing not only the best care but also a seamless experience for all users within our system.
";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        .info {
            font-size: 18px;
            color: #333;
            line-height: 1.6;
        }
        .more-info-button {
            display: inline-block;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .more-info-button:hover {
            background-color: #45a049;
        }
        .full-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none; 
        }
        .full-info h3 {
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to HelthCare Hospital</h1>
    <div class="info">
        <p><?php echo $shortInfo; ?></p>
        <a href="#" class="more-info-button" id="moreInfoButton">Click for More Information</a>
    </div>

    <div class="full-info" id="fullInfoContainer">
        <p><?php echo $fullInfo; ?></p>
    </div>
</div>

<script>
    document.getElementById('moreInfoButton').addEventListener('click', function(event) {
        event.preventDefault();
        
       
        var fullInfoContainer = document.getElementById('fullInfoContainer');
        if (fullInfoContainer.style.display === 'none' || fullInfoContainer.style.display === '') {
            fullInfoContainer.style.display = 'block';
        } else {
            fullInfoContainer.style.display = 'none';
        }
    });
</script>

</body>
</html>
