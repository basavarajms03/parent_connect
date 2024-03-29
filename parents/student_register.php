<?php

session_start();
include('./header.php');
include('../db/dbcon.php');

$departments_query = "SELECT * FROM `departments`";
$result = mysqli_query($con, $departments_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents - Students Registration</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Students Registration</p>
            </div>
        </div>
        <form method="POST" action="" autocomplete="off">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rollNo">Student Register Number</label>
                        <input type="text" class="form-control" name="rollNo" id="rollNo" placeholder="Register Number" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="LastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="studentEmail">Student Email Id</label>
                        <input type="email" class="form-control" name="studentEmail" id="studentEmail" placeholder="Email Id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="studentMobile">Student Mobile Number</label>
                        <input type="text" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" class="form-control" name="studentMobile" id="studentMobile" placeholder="Student Phone Number" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fatherName">Father Name</label>
                        <input type="text" class="form-control" name="fatherName" id="fatherName" placeholder="Father Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="motherName">Mother Name</label>
                        <input type="text" class="form-control" name="motherName" id="motherName" placeholder="Mother Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fatherMobile">Father Mobile Number</label>
                        <input type="text" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" class="form-control" name="fatherMobile" id="fatherMobile" placeholder="Student Phone Number" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="department">Select Department</label>
                        <select class="form-control" id="department" name="department" required>
                            <option value="">--Department--</option>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
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
                    <a href="./index.php" class="btn btn-outline-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>



<?php

if (isset($_POST['submit'])) {
    $rollNo = $_POST['rollNo'];

    $result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `roll_no`='$rollNo' and `semester`=$_POST[sem] and `dept_id` = $_POST[department]") or die(mysqli_error($con));
    $seminar_hall_count = mysqli_num_rows($result);
    if ($seminar_hall_count > 0) {
?>
        <script>
            alert('Student is already created!');
            document.location = './students_list.php';
        </script>
        <?php
    } else {
        $insert_query = "INSERT INTO `students_list` 
        (`id`, `roll_no`, `full_name`, `last_name`, `email_id`, `phone_number`, `father_name`, 
        `mother_name`, `dept_id`, `semester`, `password`, `father_mobile_number`) 
        VALUES (NULL, '$rollNo', '$_POST[firstName]', '$_POST[lastName]', '$_POST[studentEmail]', 
        '$_POST[studentMobile]', '$_POST[fatherName]', '$_POST[motherName]', 
        '$_POST[department]', '$_POST[sem]', 'Password@123', '$_POST[fatherMobile]')";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Student has been created successfully!');
                document.location = './index.php';
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
