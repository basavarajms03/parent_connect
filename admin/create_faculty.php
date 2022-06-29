<?php

session_start();
include('.//admin_header.php');
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
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="studentEmail">Student Email Id</label>
                        <input type="text" class="form-control" name="studentEmail" id="studentEmail" placeholder="Email Id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sem">Select Semester</label>
                        <select class="form-control" id="sem" name="sem" required>
                            <option value="">--Semester--</option>
                            <option value="1">1st Sem</option>
                            <option value="2">2nd Sem</option>
                            <option value="3">3rd Sem</option>
                            <option value="4">4th Sem</option>
                            <option value="5">5th Sem</option>
                            <option value="6">6th Sem</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 text-right mb-5">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <a href="./students_list.php" class="btn btn-outline-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>



<?php

if (isset($_POST['submit'])) {
    $rollNo = $_POST['rollNo'];
    $studentName = $_POST['studentName'];
    $studentEmail = $_POST['studentEmail'];

    $result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `roll_no`='$rollNo' and `sem`=$_POST[sem]") or die(mysqli_error($con));
    $seminar_hall_count = mysqli_num_rows($result);
    if ($seminar_hall_count > 0) {
?>
        <script>
            alert('Student is already created!');
            document.location = './students_list.php';
        </script>
        <?php
    } else {
        $insert_query = "INSERT INTO `students_list` (`id`, `roll_no`, `student_name`, `student_email`, `deptId`, `sem`) VALUES (NULL, '$rollNo', '$studentName', '$studentEmail', '$_SESSION[deptId]', '$_POST[sem]')";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Student has been created successfully!');
                document.location = './students_list.php';
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
