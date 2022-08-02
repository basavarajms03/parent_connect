<?php

session_start();
include('./faculty_header.php');
include('../db/dbcon.php');

$result = mysqli_query($con, "SELECT * FROM `subjects` WHERE `id`=$_GET[id]") or die(mysqli_error($cin));
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Update Subject</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Update Subject</p>
            </div>
        </div>
        <form method="POST" action="" autocomplete="off">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subjectId">Course Code</label>
                        <input type="text" value="<?php echo $row[1]; ?>" class="form-control" name="subjectId" id="subjectId" placeholder="Enter Course Code" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subjectName">Subject Name</label>
                        <input type="text" value="<?php echo $row[2]; ?>" class="form-control" name="subjectName" id="subjectName" placeholder="Enter Subject Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sem">Select Semester</label>
                        <select class="form-control" id="sem" name="sem" required>
                            <option value="">--Semester--</option>
                            <option value="1" <?php echo $row[3] === '1' ? "selected" : "" ?>>1st Sem</option>
                            <option value="2" <?php echo $row[3] === '2' ? "selected" : "" ?>>2nd Sem</option>
                            <option value="3" <?php echo $row[3] === '3' ? "selected" : "" ?>>3rd Sem</option>
                            <option value="4" <?php echo $row[3] === '4' ? "selected" : "" ?>>4th Sem</option>
                            <option value="5" <?php echo $row[3] === '5' ? "selected" : "" ?>>5th Sem</option>
                            <option value="6" <?php echo $row[3] === '6' ? "selected" : "" ?>>6th Sem</option>
                        </select>
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
    $subjectId = $_POST['subjectId'];
    $subjectName = $_POST['subjectName'];
    $semester = $_POST['sem'];
    $result = mysqli_query($con, "SELECT * FROM `subjects` WHERE `subjectId`='$subjectId' and `semester`='$semester'") or die(mysqli_error($con));
    $subject_count = mysqli_num_rows($result);
    if ($subject_count > 0 && $row[1] !== $subjectId) {
?>
        <script>
            alert('Subject is already exist!');
            document.location = './subjects.php';
        </script>
        <?php
    } else {
        $insert_query = "UPDATE `subjects` 
        SET `subjectId` = '$subjectId', `subjectName` = '$subjectName', 
        `semester` = '$semester' WHERE `subjects`.`id` = $_GET[id]";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Subject has been updated successfully!');
                document.location = './subjects.php';
            </script>
        <?php
        } else
        ?>
        <script>
            alert('Something went wrong!');
            document.location = './subjects.php';
        </script>
<?php
}
}
