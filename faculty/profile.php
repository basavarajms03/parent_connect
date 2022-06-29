<?php

session_start();
include('./faculty_header.php');
include('../db/dbcon.php');

$facultyId = $_SESSION['userData'][4];
$result = mysqli_query($con, "SELECT * FROM `faculties` WHERE `faculty_id`='$facultyId'") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents - Profile</title>
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
                                        <label for="facultyId">faculty Id</label>
                                        <input type="text" readonly class="form-control" name="facultyId" value="<?php echo $row[4]; ?>" id="facultyId" placeholder="Enter Faculty Id" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="fname" value="<?php echo $row[1]; ?>" id="fname" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lname" value="<?php echo $row[2]; ?>" id="lname" placeholder="Enter Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Id</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $row[5]; ?>" id="email" placeholder="Email Id" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile" value="<?php echo $row[6]; ?>" id="mobile" placeholder="Enter Mobile Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0 text-right">
                                <button type="submit" name="submit" class="btn btn-outline-success">Submit</button>
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
    $insert_query = "UPDATE `faculties` SET 
    `first_name` = '$_POST[fname]', 
    `last_name` = '$_POST[lname]', 
    `faculty_id` = '$_POST[facultyId]', 
    `email` = '$_POST[email]', 
    `mobile` = '$_POST[mobile]' WHERE `faculties`.`id` = $id";
    if (mysqli_query($con, $insert_query)) {
?>
        <script>
            alert('Faculty has been updated successfully!');
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
    $insert_query = "UPDATE `faculties` SET `password` = '$_POST[password]' WHERE `faculties`.`id` = $id";
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