<?php
session_start();
include('./faculty_header.php');
include('../db/dbcon.php');

$deptId = $_SESSION['userData'][3];
$subjects = mysqli_query($con, "SELECT * FROM `subjects` WHERE `deptId` = '$deptId'") or die(mysqli_error($con));
$subjects_two = mysqli_query($con, "SELECT * FROM `subjects` WHERE `deptId` = '$deptId'") or die(mysqli_error($con));

$result = mysqli_query($con, "SELECT * FROM `students_list` s, `departments` d
WHERE s.`dept_id` = d.`deptId` and s.`roll_no` = '$_GET[id]'") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$fPhoneNumber = $row[11];

if ($_GET['sem'] != 5 && $_GET['sem'] != 6) {
    $student_marks_details = mysqli_query($con, "SELECT * FROM `student_marks_details` m, `subjects` s
 WHERE m.`student_id` = '$_GET[id]' and s.`subjectId` = m.`subjectId` and s.`semester` = $_GET[sem]") or die(mysqli_error($con));
    $student_marks_details_count = mysqli_num_rows($student_marks_details);

    $attendance = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and s.`subjectId` = a.`subjectId`and s.`semester` = $_GET[sem]") or die(mysqli_error($con));
    $attendance_count = mysqli_num_rows($attendance);
} else {
    $first_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and m.`marks_type`=1 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $first_internal_count = mysqli_num_rows($first_internal);

    $attendance = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and a.`attendance_type`=1 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_count = mysqli_num_rows($attendance);

    $second_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and m.`marks_type`=2 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $second_internal_count = mysqli_num_rows($second_internal);

    $attendance_second = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and a.`attendance_type`=2 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_second_count = mysqli_num_rows($attendance_second);

    $third_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and m.`marks_type`=3 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $third_internal_count = mysqli_num_rows($third_internal);

    $attendance_third = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and a.`attendance_type`=3 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_third_count = mysqli_num_rows($attendance_third);

    $final_sem = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and m.`marks_type`='finalSem' and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
    $final_sem_count = mysqli_num_rows($final_sem);

    $attendance_final = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and a.`attendance_type`='finalSem' and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
    $attendance_final_count = mysqli_num_rows($attendance_final);

    if (isset($_GET['sem'])) {
        $first_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem] and m.`marks_type`=1 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
        $first_internal_count = mysqli_num_rows($first_internal);

        $attendance = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and a.`attendance_type`=1 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
        $attendance_count = mysqli_num_rows($attendance);

        $second_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and m.`marks_type`=2 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
        $second_internal_count = mysqli_num_rows($second_internal);

        $attendance_second = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and a.`attendance_type`=2 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
        $attendance_second_count = mysqli_num_rows($attendance_second);

        $third_internal = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and m.`marks_type`=3 and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
        $third_internal_count = mysqli_num_rows($third_internal);

        $attendance_third = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and a.`attendance_type`=3 and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
        $attendance_third_count = mysqli_num_rows($attendance_third);

        $final_sem = mysqli_query($con, "SELECT * FROM `marks_details` m, `subjects` s
    WHERE m.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and m.`marks_type`='finalSem' and s.`subjectId` = m.`subjectId`") or die(mysqli_error($con));
        $final_sem_count = mysqli_num_rows($final_sem);

        $attendance_final = mysqli_query($con, "SELECT * FROM `attendance` a, `subjects` s
    WHERE a.`student_id` = '$_GET[id]' and s.`semester` = $_GET[sem]  and a.`attendance_type`='finalSem' and s.`subjectId` = a.`subjectId`") or die(mysqli_error($con));
        $attendance_final_count = mysqli_num_rows($attendance_final);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Information - Faculty</title>
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-8">
                <table cellpadding="5" class="mb-2">
                    <tr>
                        <td class="font-weight-bold">Name</td>
                        <td>: </td>
                        <td class="text-muted font-weight-bold"><?php echo $row[2] . ' ' . $row[3]; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Register Number</td>
                        <td>: </td>
                        <td class="text-muted font-weight-bold"><?php echo $row[1]; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Semester</td>
                        <td>: </td>
                        <td class="text-muted font-weight-bold"><?php echo $_GET['sem']; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Branch</td>
                        <td>: </td>
                        <td class="text-muted font-weight-bold"><?php echo $row[14];; ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Faculty Name</td>
                        <td>: </td>
                        <td class="text-muted font-weight-bold"><?php echo $_SESSION['userData'][1] . ' ' . $_SESSION['userData'][2]; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sem"> <span class="font-weight-bold text-success"> Select Semester</span></label>
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
        <div class="mt-3">
            <?php
            if ($_GET['sem'] != '5' && $_GET['sem'] != '6') {

                if ($student_marks_details_count === 0) {
            ?>
                    <div class="text-center">
                        <p class="alert alert-danger font-weight-bold">No Data found</p>
                    </div>
                <?php
                } else {
                ?>
                    <h4 class="text-success font-weight-bold">Marks Details</h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="bg-danger text-light text-center">
                                <th scope="col">Subject Name</th>
                                <th scope="col">CIE1</th>
                                <th scope="col">CIE2</th>
                                <th scope="col">CIE3</th>
                                <th scope="col">Avg</th>
                                <?php
                                if ($_GET['sem'] == 3 || $_GET['sem'] == 4) {
                                ?>
                                    <th scope="col">CIE4 (SKT Pr)</th>
                                    <th scope="col">CIE5 (SKT Pr)</th>
                                    <th scope="col">Avg</th>
                                <?php
                                }
                                ?>

                                <?php
                                if ($_GET['sem'] == 1 || $_GET['sem'] == 2) {
                                ?>
                                    <th scope="col">MCQ/ QUIZ</th>
                                    <th scope="col">Open Book</th>
                                    <th scope="col">Activity / Assignment</th>
                                <?php
                                }
                                if ($_GET['sem'] == 3 || $_GET['sem'] == 4) {
                                ?>
                                    <th scope="col">Portfolio</th>
                                <?php
                                }
                                if ($_GET['sem'] == 1 || $_GET['sem'] == 2) {
                                ?>
                                    <th scope="col">Avg</th>
                                <?php
                                }
                                ?>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($student_marks_details)) {
                                $CIECount = 0;
                                $SKTestCount = 0;
                                $MCQCount = 0;
                                $avg1 = 0;
                                $avg2 = 0;
                                $avg3 = 0;
                                $CIE1 = 0;
                                $CIE2 = 0;
                                $CIE3 = 0;
                                $MCQ = 0;
                                $OPENBOOKTEST = 0;
                                $activity = 0;
                                $SKTEST1 = 0;
                                $SKTEST2 = 0;
                                $SKTEST3 = 0;
                                $portfolio = 0;
                                $maxMarks = 0;
                            ?>
                                <tr>
                                    <td><?php echo $row[15]; ?></td>
                                    <td>
                                        <?php
                                        if ($row[3] !== '0,0') {
                                            if ($row[3] !== '-1,-1') {
                                                $CIECount = $CIECount + 1;
                                                $maxMarks = explode(',', $row[3])[0];
                                                $CIE1 = explode(',', $row[3])[1];
                                                echo explode(',', $row[3])[1] . '/' . explode(',', $row[3])[0];
                                            } else {
                                                echo 'AB';
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row[4] !== '0,0') {
                                            if ($row[4] !== '-1,-1') {
                                                $CIECount = $CIECount + 1;
                                                $maxMarks = explode(',', $row[4])[0];
                                                $CIE2 = explode(',', $row[4])[1];
                                                echo explode(',', $row[4])[1] . '/' . explode(',', $row[4])[0];
                                            } else {
                                                echo 'AB';
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row[5] !== '0,0') {
                                            if ($row[5] !== '-1,-1') {
                                                $CIECount = $CIECount + 1;
                                                $maxMarks = explode(',', $row[5])[0];
                                                $CIE3 = explode(',', $row[5])[1];
                                                echo explode(',', $row[5])[1] . '/' . explode(',', $row[5])[0];
                                            } else {
                                                echo 'AB';
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($CIE1 != 0 || $CIE2 != 0 || $CIE3 != 0) {
                                            $avg1 = ($CIE1 + $CIE2 + $CIE3) / $CIECount;
                                            echo round($avg1) . '/' . $maxMarks;
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <?php
                                    if ($_GET['sem'] == 3 || $_GET['sem'] == 4) {
                                    ?>
                                        <td>
                                            <?php
                                            if ($row[9] !== '0,0') {
                                                if ($row[9] !== '-1,-1') {
                                                    $SKTestCount = $SKTestCount + 1;
                                                    $maxMarks = explode(',', $row[9])[0];
                                                    $SKTEST1 = explode(',', $row[9])[1];
                                                    echo explode(',', $row[9])[1] . '/' . explode(',', $row[9])[0];
                                                } else {
                                                    echo 'AB';
                                                }
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row[10] !== '0,0') {
                                                if ($row[10] !== '-1,-1') {
                                                    $SKTestCount = $SKTestCount + 1;
                                                    $maxMarks = explode(',', $row[10])[0];
                                                    $SKTEST2 = explode(',', $row[10])[1];
                                                    echo explode(',', $row[10])[1] . '/' . explode(',', $row[10])[0];
                                                } else {
                                                    echo 'AB';
                                                }
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($SKTEST1 != 0 || $SKTEST2 != 0) {
                                                $avg2 = ($SKTEST1 + $SKTEST2) / $SKTestCount;
                                                echo round($avg2) . '/' . explode(',', $row[9])[0];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($_GET['sem'] == 1 || $_GET['sem'] == 2) {
                                    ?>
                                        <td>
                                            <?php
                                            if ($row[6] !== '0,0') {
                                                if ($row[6] !== '-1,-1') {
                                                    $MCQCount = $MCQCount + 1;
                                                    $maxMarks = explode(',', $row[6])[0];
                                                    $MCQ = explode(',', $row[6])[1];
                                                    echo explode(',', $row[6])[1] . '/' . explode(',', $row[6])[0];
                                                } else {
                                                    echo 'AB';
                                                }
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row[7] !== '0,0') {
                                                if ($row[7] !== '-1,-1') {
                                                    $MCQCount = $MCQCount + 1;
                                                    $maxMarks = explode(',', $row[7])[0];
                                                    $OPENBOOKTEST = explode(',', $row[7])[1];
                                                    echo explode(',', $row[7])[1] . '/' . explode(',', $row[7])[0];
                                                } else {
                                                    echo 'AB';
                                                }
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($row[8] !== '0,0') {
                                                if ($row[8] !== '-1,-1') {
                                                    $MCQCount = $MCQCount + 1;
                                                    $maxMarks = explode(',', $row[8])[0];
                                                    $activity = explode(',', $row[8])[1];
                                                    echo explode(',', $row[8])[1] . '/' . explode(',', $row[8])[0];
                                                } else {
                                                    echo 'AB';
                                                }
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($_GET['sem'] == 3 || $_GET['sem'] == 4) {
                                    ?>
                                        <td>
                                            <?php
                                            if ($row[11] !== '0,0') {
                                                echo explode(',', $row[11])[1] . '/' . explode(',', $row[11])[0];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if ($_GET['sem'] == 1 || $_GET['sem'] == 2) {
                                    ?>
                                        <td>
                                            <?php
                                            if ($row[6] !== '0,0' || $row[7] !== '0,0' || $row[8] !== '0,0') {
                                                $avg3 = ($MCQ + $OPENBOOKTEST + $activity) / $MCQCount;
                                                echo round($avg3) . '/' . $maxMarks;
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <?php
                                        if ($_GET['sem'] == 1 || $_GET['sem'] == 2) {
                                            echo round($avg1 + $avg3) . '/50';
                                        } else {
                                            echo round($avg1 + $avg2 +  explode(',', $row[11])[1]) . '/60';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <h5 class="font-weight-bold text-success">Attendance</h5>
                    <?php
                    if ($attendance_count === 0) {
                    ?>
                        <div class="">
                            <p class="text-muted font-weight-bold m-0">No Data found</p>
                        </div>
                    <?php
                    } else {
                    ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="bg-danger text-light">
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Total Classes</th>
                                    <th scope="col">Classes Attended</th>
                                    <th scope="col">Percentage</th>
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
                                        <td><?php echo $row[5]; ?></td>
                                        <td><?php echo $row[3]; ?></td>
                                        <td><?php echo $row[4]; ?></td>
                                        <td><?php echo round(($row[4] / $row[3]) * 100) . '%'; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            <?php
            } else {
            ?>
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
                                                <th scope="col">Course Code</th>
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
                                                    <td><?php echo $row[2] == -1 ? 'AB' : $row[2]; ?></td>
                                                    <td><?php echo $row[3] == -1 ? 'AB' : $row[3]; ?></td>
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
                                                <th scope="col">Course Code</th>
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
                                                <th scope="col">Course Code</th>
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
                                                    <td><?php echo $row[2] == -1 ? 'AB' : $row[2]; ?></td>
                                                    <td><?php echo $row[3] == -1 ? 'AB' : $row[3]; ?></td>
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
                                                <th scope="col">Course Code</th>
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
                                                <th scope="col">Course Code</th>
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
                                                    <td><?php echo $row[2] == -1 ? 'AB' : $row[2]; ?></td>
                                                    <td><?php echo $row[3] == -1 ? 'AB' : $row[3]; ?></td>
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
                                                <th scope="col">Course Code</th>
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
                                                <th scope="col">Course Code</th>
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
                                            <th scope="col">Course Code</th>
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
                <?php
            }
                ?>
                </div>
        </div>
    </div>
</body>

</html>

<script>
    function onSelectSemester(event) {
        document.location = "./student_details.php?id=<?php echo $_GET['id']; ?>&&sem=" + event.target.value;
    }
</script>