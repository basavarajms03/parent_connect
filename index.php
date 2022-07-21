<?php

include('./db/dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./css/bootstrap.js"></script>
    <title>Home</title>

    <style>
        * {
            scroll-behavior: smooth;
        }

        .card-text {
            height: 100px;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand font-weight-bold" href="#">Parent Connect</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./departments/index.php">Department Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./faculty/">Faculty Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./parents/">Student/Parent Login</a>
                </li>
            </ul>
        </div>
    </nav>
</body>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-2">
            <img src="./images/1568389948615.jpg" width="100%" />
        </div>
        <div class="col-md-10 mt-3 text-center">
            <h1 class="font-weight-bold text-success">T.M.A.E.S Polytechnic College</h1>
            <h2 class="font-weight-bold text-danger">Hospet, Karnataka-583201</h2>
        </div>
    </div>
    <div class="mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header font-weight-bold text-danger">Student Information</div>
                    <div class="card-body text-center">
                        <p>Get your student information like
                            attendance information, Marks information by registering the student information
                            and login using the student register number.</p>
                        <p class="text-center">
                            <a href="./parents" class="btn btn-danger">Read More</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header font-weight-bold text-danger">Teachers</div>
                    <div class="card-body text-center">
                        <p>
                            Teachers can login using the teachers id. They can create students information
                            like attendance, marks data. and also they can create subjects.
                        </p>
                        <p class="text-center">
                            <a href="./faculty/" class="btn btn-danger">Read More</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>