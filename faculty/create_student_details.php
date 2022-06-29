<?php

session_start();
include('./faculty_header.php');
include('../db/dbcon.php');

$deptId = $_SESSION['userData'][3];
$subjects = mysqli_query($con, "SELECT * FROM `subjects` WHERE `deptId` = '$deptId'") or die(mysqli_error($con));
$subjects_two = mysqli_query($con, "SELECT * FROM `subjects` WHERE `deptId` = '$deptId'") or die(mysqli_error($con));

$result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `roll_no` = $_GET[id]") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

$first_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and m.`marks_type`=1 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
$first_internal_count = mysqli_num_rows($first_internal);

$attendance = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and a.`attendance_type`=1 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
$attendance_count = mysqli_num_rows($attendance);

$second_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and m.`marks_type`=2 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
$second_internal_count = mysqli_num_rows($second_internal);

$attendance_second = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and a.`attendance_type`=2 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
$attendance_second_count = mysqli_num_rows($attendance_second);

$third_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and m.`marks_type`=3 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
$third_internal_count = mysqli_num_rows($third_internal);

$attendance_third = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and a.`attendance_type`=3 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
$attendance_third_count = mysqli_num_rows($attendance_third);

$final_sem = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and m.`marks_type`='finalSem' and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
$final_sem_count = mysqli_num_rows($final_sem);

$attendance_final = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and a.`attendance_type`='finalSem' and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
$attendance_final_count = mysqli_num_rows($attendance_final);

if (isset($_GET['sem'])) {
    $first_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and s.`semester` = $_GET[sem] and m.`marks_type`=1 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $first_internal_count = mysqli_num_rows($first_internal);

    $attendance = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and a.`attendance_type`=1 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_count = mysqli_num_rows($attendance);

    $second_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and m.`marks_type`=2 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $second_internal_count = mysqli_num_rows($second_internal);

    $attendance_second = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and a.`attendance_type`=2 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_second_count = mysqli_num_rows($attendance_second);

    $third_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and m.`marks_type`=3 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $third_internal_count = mysqli_num_rows($third_internal);

    $attendance_third = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and a.`attendance_type`=3 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_third_count = mysqli_num_rows($attendance_third);

    $final_sem = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
 WHERE m.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and m.`marks_type`='finalSem' and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $final_sem_count = mysqli_num_rows($final_sem);

    $attendance_final = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
 WHERE a.`student_id` = $_GET[id] and s.`semester` = $_GET[sem]  and a.`attendance_type`='finalSem' and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_final_count = mysqli_num_rows($attendance_final);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Create Student Details</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8">
                <p class="page-title font-weight-bold text-success m-0">Student Details</p>
            </div>
            <div class="col-md-4 text-right">
                <p class="page-title font-weight-bold text-danger m-0">Name: <?php echo $row[2] . ' ' . $row[3]; ?></p>
            </div>
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <p class="card-header font-weight-bold">Marks Details</p>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subjectName">Subject Name</label>
                                            <select name="subjectId" class="form-control" id="subjectName" required>
                                                <option value="">--Select--</option>
                                                <?php
                                                while ($row = mysqli_fetch_array($subjects)) {
                                                ?>
                                                    <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marks_type">Marks Type</label>
                                            <select name="marksType" class="form-control" id="marks_type" required>
                                                <option value="">--Select--</option>
                                                <option value="1">Internal 1</option>
                                                <option value="2">Internal 2</option>
                                                <option value="3">Internal 3</option>
                                                <option value="finalSem">Final Sem</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="totalMarks">Total Marks</label>
                                            <input type="number" class="form-control" name="totalMarks" id="totalMarks" placeholder="Enter Total Marks" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="obtainedMarks">Obtained Marks</label>
                                            <input type="number" class="form-control" name="obtainedMarks" id="obtainedMarks" placeholder="Enter Obtained Marks" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0 text-right">
                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <p class="card-header font-weight-bold">Attendance</p>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subjectName">Subject Name</label>
                                            <select name="subjectId" class="form-control" id="subjectName" required>
                                                <option value="">--Select--</option>
                                                <?php
                                                while ($row = mysqli_fetch_array($subjects_two)) {
                                                ?>
                                                    <option value="<?php echo $row[1]; ?>"><?php echo $row[2]; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attendanceType">Attendance Type</label>
                                            <select name="attendanceType" class="form-control" id="attendanceType" required>
                                                <option value="">--Select--</option>
                                                <option value="1">Internal 1</option>
                                                <option value="2">Internal 2</option>
                                                <option value="3">Internal 3</option>
                                                <option value="finalSem">Final Sem</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="totalClasses">Total Classes</label>
                                            <input type="number" class="form-control" name="totalClasses" id="totalClasses" placeholder="Enter Total Classes" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="classesAttended">Number Of Classes Attended</label>
                                            <input type="number" class="form-control" name="classesAttended" id="classesAttended" placeholder="Number Of Classes Attended" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0 text-right">
                                    <button type="submit" name="attendance_submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <div class="card">
                    <p class="card-header font-weight-bold text-danger">Filter By</p>
                    <div class="card-body font-weight-bold col-md-4">
                        <div class="form-group">
                            <label for="sem">Select Semester</label>
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
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <p class="card-header font-weight-bold">Internal 1</p>
                        <div class="card-body">
                            <?php
                            if ($first_internal_count === 0) {
                            ?>
                                <div class="text-center">
                                    <p class="text-muted font-weight-bold m-0">No First Internal Attendance Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Marks</th>
                                            <th scope="col">Obtained Marks</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($first_internal)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                        <div class="card-body">
                            <h5 class="font-weight-bold text-success">Attendance</h5>
                            <?php
                            if ($attendance_count === 0) {
                            ?>
                                <div class="">
                                    <p class="text-muted font-weight-bold m-0">No First Internal Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Classes</th>
                                            <th scope="col">Classes Attended</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($attendance)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <p class="card-header font-weight-bold">Internal 2</p>
                        <div class="card-body">
                            <?php
                            if ($second_internal_count === 0) {
                            ?>
                                <div class="text-center">
                                    <img src="./../images/no-data.png" alt="No Data" width="300px">
                                    <p class="text-muted font-weight-bold m-0">No Second Internal Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Marks</th>
                                            <th scope="col">Obtained Marks</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($second_internal)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                        <div class="card-body">
                            <h5 class="font-weight-bold text-success">Attendance</h5>
                            <?php
                            if ($attendance_second_count === 0) {
                            ?>
                                <div class="">
                                    <p class="text-muted font-weight-bold m-0">No Second Internal Attendance Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Classes</th>
                                            <th scope="col">Classes Attended</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($attendance_second)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <p class="card-header font-weight-bold">Internal 3</p>
                        <div class="card-body">
                            <?php
                            if ($third_internal_count === 0) {
                            ?>
                                <div class="text-center">
                                    <img src="./../images/no-data.png" alt="No Data" width="300px">
                                    <p class="text-muted font-weight-bold m-0">No Third Internal Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Marks</th>
                                            <th scope="col">Obtained Marks</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($third_internal)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                        <div class="card-body">
                            <h5 class="font-weight-bold text-success">Attendance</h5>
                            <?php
                            if ($attendance_third_count === 0) {
                            ?>
                                <div class="">
                                    <p class="text-muted font-weight-bold m-0">No Third Internal Attendance Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Classes</th>
                                            <th scope="col">Classes Attended</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($attendance_third)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[4]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <p class="card-header font-weight-bold">Semester</p>
                        <div class="card-body">
                            <?php
                            if ($final_sem_count === 0) {
                            ?>
                                <div class="text-center">
                                    <img src="./../images/no-data.png" alt="No Data" width="300px">
                                    <p class="text-muted font-weight-bold m-0">No Semester Data found</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-danger text-light">
                                            <th scope="col">Subject Id</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Total Marks</th>
                                            <th scope="col">Obtained Marks</th>
                                            <th scope="col">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        while ($row = mysqli_fetch_array($final_sem)) {
                                            $count = $count + 1;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row[1]; ?></th>
                                                <td><?php echo $row[8]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[3]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
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
                    <div class="card-body">
                        <h5 class="font-weight-bold text-success">Attendance</h5>
                        <?php
                        if ($attendance_final_count === 0) {
                        ?>
                            <div class="">
                                <p class="text-muted font-weight-bold m-0">No Final Attendance Data found</p>
                            </div>
                        <?php
                        } else {
                        ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-danger text-light">
                                        <th scope="col">Subject Id</th>
                                        <th scope="col">Subject Name</th>
                                        <th scope="col">Total Classes</th>
                                        <th scope="col">Classes Attended</th>
                                        <th scope="col">Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($attendance_final)) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row[1]; ?></th>
                                            <td><?php echo $row[8]; ?></td>
                                            <td><?php echo $row[3]; ?></td>
                                            <td><?php echo $row[4]; ?></td>
                                            <td><?php echo $row[9]; ?></td>
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
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $deptId = $_SESSION['userData'][3];
    $subjectId = $_POST['subjectId'];
    $marks_type = $_POST['marksType'];
    $totalMarks = $_POST['totalMarks'];
    $obtainedMarks = $_POST['obtainedMarks'];
    $result = mysqli_query($con, "SELECT * FROM `marks_details` WHERE `student_id`='$_GET[id]' 
    and `subjectId`='$subjectId' and `marks_type`='$marks_type'") or die(mysqli_error($con));
    $marks_detail_count = mysqli_num_rows($result);
    if ($marks_detail_count > 0) {
?>
        <script>
            alert('Marks has been already added for this subject!');
            document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
        </script>
        <?php
    } else {
        $insert_query = "INSERT INTO `marks_details` (`id`, `subjectId`, `total_marks`, 
        `obtained_marks`, `student_id`, `marks_type`) 
        VALUES (NULL, '$subjectId', '$totalMarks', '$obtainedMarks', '$_GET[id]', '$marks_type')";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Marks has been added successfully!');
                document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
            </script>
        <?php
        } else
        ?>
        <script>
            alert('Something went wrong!');
            die(mysqli_error($con));
            // document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
        </script>
    <?php
    }
}

if (isset($_POST['attendance_submit'])) {
    $deptId = $_SESSION['userData'][3];
    $subjectId = $_POST['subjectId'];
    $attendance_type = $_POST['attendanceType'];
    $totalClasses = $_POST['totalClasses'];
    $classesAttended = $_POST['classesAttended'];
    $result = mysqli_query($con, "SELECT * FROM `attendance` WHERE `student_id`='$_GET[id]' 
    and `subjectId`='$subjectId' and `attendance_type`='$attendance_type'") or die(mysqli_error($con));
    $marks_detail_count = mysqli_num_rows($result);
    if ($marks_detail_count > 0) {
    ?>
        <script>
            alert('Attendance has been already added for this subject!');
            document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
        </script>
        <?php
    } else {
        $insert_query = "INSERT INTO `attendance` (`id`, `subjectId`, `student_id`, 
        `number_of_classes`, `no_of_cls_attended`, `attendance_type`) 
        VALUES (NULL, '$subjectId','$_GET[id]','$totalClasses', '$classesAttended', '$attendance_type')";
        if (mysqli_query($con, $insert_query)) {
        ?>
            <script>
                alert('Attendance has been added successfully!');
                document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
            </script>
        <?php
        } else
        ?>
        <script>
            alert('Something went wrong!');
            die(mysqli_error($con));
            // document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
        </script>
<?php
    }
}

?>


<script>
    function onSelectSemester(event) {
        if (event.target.value === '') {
            document.location = "./create_student_details.php?id=<?php echo $_GET['id']; ?>";
        } else {
            document.location = "./create_student_details.php?id=<?php echo $_GET['id']; ?>&&sem=" + event.target.value;
        }
    }
</script>