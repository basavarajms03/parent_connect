<?php

session_start();
include('./department_header.php');
include('../db/dbcon.php');

$result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `roll_no` = '$_GET[id]'") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department - Booking Deatils</title>
    <style>
        .avatar {
            width: 50px;
            border-radius: 50%;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Student Details</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Roll Number</p>
                        <p class="text-muted m-0"><?php echo $row[1]; ?></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">First Name</p>
                        <p class="text-warning m-0 font-weight-bold"><?php echo $row[2]; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Last Name</p>
                        <p class="text-muted m-0"><?php echo $row[3]; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Semester</p>
                        <p class="text-muted m-0"><?php echo $row[9]; ?></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-danger">Email Id</p>
                        <p class="m-0 text-success"><?php echo $row[4]; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Student Phone Number</p>
                        <p class="text-muted m-0"><?php echo $row[5]; ?></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Father Name</p>
                        <p class="text-muted m-0"><?php echo $row[6]; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Mother Name</p>
                        <p class="text-muted m-0"><?php echo $row[7]; ?></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <p class="text-title mb-1 font-weight-bold text-secondary">Father Phone Numebr</p>
                        <p class="text-muted m-0"><?php echo $row[11]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>