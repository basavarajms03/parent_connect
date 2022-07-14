<?php

session_start();
include('./parents_header.php');
include('../db/dbcon.php');

$facultyId = $_SESSION['userData'][1];
$result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `roll_no`='$facultyId'") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent - Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Profile</p>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="" autocomplete="off">
                    <div class="card border-success">
                        <p class="card-header text-success font-weight-bold">Update Information</p>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rollNo">Student Register Number</label>
                                        <input type="text" value="<?php echo $row[1]; ?>" class="form-control" name="rollNo" id="rollNo" placeholder="Register Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" value="<?php echo $row[2]; ?>" class="form-control" name="firstName" id="firstName" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="LastName">Last Name</label>
                                        <input type="text" value="<?php echo $row[3]; ?>" class="form-control" name="lastName" id="LastName" placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="studentEmail">Student Email Id</label>
                                        <input type="email" value="<?php echo $row[4]; ?>" class="form-control" name="studentEmail" id="studentEmail" placeholder="Email Id" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="studentMobile">Student Mobile Number</label>
                                        <input type="number" value="<?php echo $row[5]; ?>" class="form-control" name="studentMobile" id="studentMobile" placeholder="Student Phone Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fatherName">Father Name</label>
                                        <input type="text" value="<?php echo $row[6]; ?>" class="form-control" name="fatherName" id="fatherName" placeholder="Father Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="motherName">Mother Name</label>
                                        <input type="text" value="<?php echo $row[7]; ?>" class="form-control" name="motherName" id="motherName" placeholder="Mother Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fatherMobile">Father Mobile Number</label>
                                        <input type="number" value="<?php echo $row[11]; ?>" class="form-control" name="fatherMobile" id="fatherMobile" placeholder="Student Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sem">Select Semester</label>
                                        <select class="form-control" id="sem" name="sem" required>
                                            <option value="">--Semester--</option>
                                            <option value="1" <?php echo $row[9] === '1' ? "selected" : "" ?>>1st Sem</option>
                                            <option value="2" <?php echo $row[9] === '2' ? "selected" : "" ?>>2nd Sem</option>
                                            <option value="3" <?php echo $row[9] === '3' ? "selected" : "" ?>>3rd Sem</option>
                                            <option value="4" <?php echo $row[9] === '4' ? "selected" : "" ?>>4th Sem</option>
                                            <option value="5" <?php echo $row[9] === '5' ? "selected" : "" ?>>5th Sem</option>
                                            <option value="6" <?php echo $row[9] === '6' ? "selected" : "" ?>>6th Sem</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right mb-5">
                                    <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card border-danger">
                    <p class="text-danger card-header font-weight-bold">Update Passsword</p>
                    <div class="card-body">
                        <form method="POST" action="" autocomplete="off">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter New Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confPassword">Confirm Password</label>
                                        <input type="password" class="form-control" name="confPassword" id="confPassword" placeholder="Enter Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0 text-right">
                                <button type="submit" name="update" class="btn btn-outline-danger">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $id = $_SESSION['userData'][0];
    $insert_query = "UPDATE `students_list` 
    SET `roll_no` = '$_POST[rollNo]', 
    `full_name` = '$_POST[firstName]', 
    `last_name` = '$_POST[lastName]', 
    `email_id` = '$_POST[studentEmail]', 
    `phone_number` = '$_POST[studentMobile]', 
    `father_name` = '$_POST[fatherName]', 
    `mother_name` = '$_POST[motherName]', 
    `semester` = '$_POST[sem]', 
    `father_mobile_number` = '$_POST[fatherMobile]' 
    WHERE `students_list`.`id` = '$id'";
    if (mysqli_query($con, $insert_query)) {
?>
        <script>
            alert('Student has been updated successfully!');
            document.location = './profile.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Something went wrong!');
            document.location = './profile.php';
        </script>
<?php
    }
}

?>

<?php

if (isset($_POST['update'])) {
    $id = $_SESSION['userData'][0];
    $insert_query = "UPDATE `students_list` SET `password` = '$_POST[password]' WHERE `students_list`.`id` = '$id'";
    if (mysqli_query($con, $insert_query)) {
?>
        <script>
            alert('Password has been updated successfully!');
            document.location = './profile.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Something went wrong!');
            document.location = './profile.php';
        </script>
<?php
    }
}

?>