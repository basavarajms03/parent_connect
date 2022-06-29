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
                    <a class="nav-link" href="./admin/index.php">Faculty Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./parents/index.php">Student/Parent Login</a>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>