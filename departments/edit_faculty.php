<?php

session_start();
include('./department_header.php');
include('../db/dbcon.php');

$result = mysqli_query($con, "SELECT * FROM `faculties` WHERE `id`='$_GET[id]'") or die(mysqli_error($con));
$faculty_row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Students List</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Update Faculty</p>
            </div>
        </div>
        <form method="POST" action="" autocomplete="off">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="facultyId">Faculty Id</label>
                        <input type="text" class="form-control" value="<?php echo $faculty_row[4] ?>" name="facultyId" id="facultyId" placeholder="Faculty Id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $faculty_row[1] ?>" name="fname" id="fname" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $faculty_row[2] ?>" name="lname" id="lastName" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="facultyEmail">Faculty Email</label>
                        <input type="text" class="form-control" value="<?php echo $faculty_row[5] ?>" name="email" id="facultyEmail" placeholder="Email Id" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="number">Mobile Number</label>
                        <input type="text" maxlength="10" pattern="\d{10}" value="<?php echo $faculty_row[6] ?>" title="Please enter exactly 10 digits" class="form-control" name="number" id="number" placeholder="Mobile Number" required>
                        <small class="text-muted">Please enter only digits</small>
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
    $count = mysqli_num_rows($result);
    if ($count > 0 && $faculty_row[4] != $_POST['facultyId']) {
?>
        <script>
            alert('Faculty is already exist in the entered Register Number!');
            document.location = './faculty.php';
        </script>
        <?php
    } else {
        $insert_query = "UPDATE `faculties` SET `first_name` = '$_POST[fname]', `last_name` = '$_POST[lname]', 
        `faculty_id` = '$_POST[facultyId]', `email` = '$_POST[email]', `mobile` = '$_POST[number]' WHERE `faculties`.`id` = $_GET[id]";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Faculty has been updated successfully!');
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
