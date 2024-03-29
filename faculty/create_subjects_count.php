<?php

session_start();
include('./faculty_header.php');
include('../db/dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Create Subject</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Create Subject</p>
            </div>
        </div>
        <form method="POST" action="" autocomplete="off">
            <div class="row mt-3">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subjectsCount">Total Number Of Subjects</label>
                        <input type="number" class="form-control" name="subjectsCount" id="subjectsCount" placeholder="Total Number Of Subjects" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12 p-0 text-right">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $deptId = $_SESSION['userData'][3];
    $subjectsCount = $_POST['subjectsCount'];
    $semester = $_POST['sem'];
    $result = mysqli_query($con, "SELECT * FROM `subjects_count` WHERE `sem`='$semester' and `deptId`='$deptId'") or die(mysqli_error($con));
    $department_count = mysqli_num_rows($result);
    if ($department_count > 0) {
?>
        <script>
            alert('Subject count is already created!');
            document.location = './create_subjects_count.php';
        </script>
        <?php
    } else {
        $insert_query = "INSERT INTO `subjects_count` 
        (`id`, `total_subjects`, `sem`, `deptId`) 
        VALUES (NULL, '$subjectsCount', '$semester', '$deptId')";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Subject Count has been created successfully!');
                document.location = './subjects_count.php';
            </script>
        <?php
        } else {
            die(mysqli_error($con));
        ?>
            <script>
                alert('Something went wrong!');
                // document.location = './subjects.php';
            </script>
<?php
        }
    }
}

?>