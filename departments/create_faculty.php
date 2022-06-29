<?php

session_start();
include('./department_header.php');
include('../db/dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - create Faculty</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Create Faculty</p>
            </div>
        </div>
        <form method="POST" action="" autocomplete="off">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="facultyId">Faculty Id</label>
                        <input type="text" class="form-control" name="facultyId" id="facultyId" placeholder="Faculty Id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="facultyEmail">Faculty Email</label>
                        <input type="text" class="form-control" name="email" id="facultyEmail" placeholder="Email Id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number">Mobile Number</label>
                        <input type="number" class="form-control" name="number" id="number" placeholder="Mobile Number" required>
                    </div>
                </div>
                <div class="col-md-12 text-right mb-5">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <a href="./faculty.php" class="btn btn-outline-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>



<?php

if (isset($_POST['submit'])) {
    $result = mysqli_query($con, "SELECT * FROM `faculties` WHERE `faculty_id`='$_POST[facultyId]'") or die(mysqli_error($con));
    $seminar_hall_count = mysqli_num_rows($result);
    if ($seminar_hall_count > 0) {
?>
        <script>
            alert('Faculty is already created!');
            document.location = './faculty.php';
        </script>
        <?php
    } else {
        $insert_query = "INSERT INTO `faculties` 
        (`id`, `first_name`, `last_name`, `deptId`, `faculty_id`, `email`, `mobile`, `password`) 
        VALUES (NULL, '$_POST[fname]', '$_POST[lname]', '$_SESSION[deptId]', '$_POST[facultyId]', '$_POST[email]', '$_POST[number]', 'Password@123')";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Faculty has been created successfully!');
                document.location = './faculty.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Something went wrong!');
                // document.location = './seminar_hall.php';
            </script>
<?php
        }
    }
}
