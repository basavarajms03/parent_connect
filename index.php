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
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./departments/index.php">Admin Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./faculty/">Faculty Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./parents/">Student/Parent Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact </a>
                </li>
            </ul>
        </div>
    </nav>
</body>
<div class="container mt-3 mb-5">
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
    <div class="mt-5">
        <h3 class="text-danger mb-5 text-center font-weight-bold" id="about">About Us</h3>
        <div class="row">
            <div class="col-md-7">
                <img src="./images/about-college.jpg" alt="About College" width="100%" height="100%">
            </div>
            <div class="col-md-5">
                <p>The Institute T.M.A.E'S Polytechnic which is dedicated to the achievement
                    of excellence in the technical field was established in the year 1983.
                    The institution is situated in a lush green campus which is spread over
                    an area of 5 acres on the out skirts of Hospet in Karnataka state.</p>
                <p class="font-weight-bold">Vision</p>
                <p>“Empowering youth by imparting quality technical education and strive to
                    prepare students with excellent technical skills"</p>
                <p class="font-weight-bold">Mission</p>
                <ul class="style-none">
                    <li>To offer value added quality technical education &
                        excellent academic training to our students.</li>
                    <li>To provide state of art infrastructure with latest facilities.</li>
                    <li>To strengthen industry institute interaction.</li>
                    <li>To make continual improvement in all institutional activities.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h3 class="text-danger mb-5 text-center font-weight-bold" id="contact">Contact Us</h3>
        <div class="row">
            <div class="col-md-3">
                <p class="text-success font-weight-bold">T.M.A.E.Society’s Polytechnic</p>
                <p class="mt-0 mb-0">Ballari Road, Hosapete - 583 201.</p>
                <p class="mt-0 mb-0">Ballari Dist, Karnataka, India</p>
                <p class="text-danger mt-0 mb-0">info@tmaespolytechnichpt.com</p>
                <p class="text-danger mt-0 mb-0">tmaespoly316@gmail.com</p>
            </div>
            <div class="col-md-9">
                <iframe style="border: 1px solid #e4e4e4; padding: 4px; background: #fff;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3849.1091511419245!2d76.39841481438579!3d15.261842264622096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bb9d6848890f269%3A0xec569f9deb6420b6!2sT.M.A.E.S+Diploma+Polytechnic+College!5e0!3m2!1sen!2sin!4v1508153383152" width="95%" height="300px" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>

</html>