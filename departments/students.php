<?php

session_start();
include('./department_header.php');
include('../db/dbcon.php');

$deptId = $_SESSION['userData'][3];
if (isset($_GET['sem'])) {
    $result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `dept_id` = '$deptId' and `semester`='$_GET[sem]'") or die(mysqli_error($con));
    $seminar_hall_count = mysqli_num_rows($result);
} else {
    $result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `dept_id` = '$deptId'") or die(mysqli_error($con));
    $seminar_hall_count = mysqli_num_rows($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department - Faculties List</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Students List</p>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control" id="sem" name="sem" onchange="onSelectSemester(event)" required>
                        <option value="">--Semester--</option>
                        <option value="1" <?php echo isset($_GET['sem']) && $_GET['sem'] === '1' ? 'selected' : ''; ?>>1st Sem</option>
                        <option value="2" <?php echo isset($_GET['sem']) && $_GET['sem'] === '2' ? 'selected' : ''; ?>>2nd Sem</option>
                        <option value="3" <?php echo isset($_GET['sem']) && $_GET['sem'] === '3' ? 'selected' : ''; ?>>3rd Sem</option>
                        <option value="4" <?php echo isset($_GET['sem']) && $_GET['sem'] === '4' ? 'selected' : ''; ?>>4th Sem</option>
                        <option value="5" <?php echo isset($_GET['sem']) && $_GET['sem'] === '5' ? 'selected' : ''; ?>>5th Sem</option>
                        <option value="6" <?php echo isset($_GET['sem']) && $_GET['sem'] === '6' ? 'selected' : ''; ?>>6th Sem</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <?php
            if ($seminar_hall_count === 0) {
            ?>
                <div class="text-center">
                    <img src="./../images/no-data.png" alt="No Data" width="300px">
                    <p class="text-muted font-weight-bold m-0">No Students found</p>
                </div>
            <?php
            } else {
            ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-danger text-light">
                            <th scope="col">#</th>
                            <th scope="col">Student Id</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $count = $count + 1;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?> <?php echo $row[3]; ?></td>
                                <td><?php echo $row[4]; ?></td>
                                <td><?php echo $row[5]; ?></td>
                                <td><a href="./view_student.php?id=<?php echo $row[1]; ?>&sem=<?php echo $row[9]; ?>" class="badge badge-success">view</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_GET['id'])) {
    $delete_query = "DELETE FROM `students_list` WHERE `students_list`.`id` = $_GET[id]";
    if (mysqli_query($con, $delete_query)) {
?>
        <script>
            alert('Student has been deleted successfully!');
            document.location = './students_list.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Something went wrong!');
            document.location = './students_list.php';
        </script>
<?php
    }
}

?>

<script>
    function onSelectSemester(event) {
        if (event.target.value) {
            document.location = "./students.php?sem=" + event.target.value;
        } else {
            document.location = "./students.php";
        }
    }
</script>