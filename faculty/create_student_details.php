<?php

session_start();
include('./faculty_header.php');
include('../db/dbcon.php');

$deptId = $_SESSION['userData'][3];
$subjects = mysqli_query($con, "SELECT * FROM `subjects` WHERE `deptId` = '$deptId'") or die(mysqli_error($con));
$subjects_two = mysqli_query($con, "SELECT * FROM `subjects` WHERE `deptId` = '$deptId'") or die(mysqli_error($con));

$result = mysqli_query($con, "SELECT * FROM `students_list` WHERE `roll_no` = '$_GET[id]'") or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$fPhoneNumber = $row[11];

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
                                                <option value="CIE1">CIE Assesment 1</option>
                                                <option value="CIE2">CIE Assesment 2</option>
                                                <option value="CIE3">CIE Assesment 3</option>
                                                <option value="MCQ">MCQ/QUIZ</option>
                                                <option value="OPENBOOKTEST">Open Book Test</option>
                                                <option value="activity">Activity/Assignment</option>
                                                <option value="SKTEST1">Skill Test Pr 1</option>
                                                <option value="SKTEST2">Skill Test Pr 2</option>
                                                <option value="SKTEST3">Skill Test Pr 3</option>
                                                <option value="portfolio">Portfolio</option>
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
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="Septemeber">Septemeber</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
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
        </div>
    </div>
    </div>
</body>

</html>

<?php

// Program to display URL of current page.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
$link = "http://shorturl.at/gsty4";

if (isset($_POST['submit'])) {
    $deptId = $_SESSION['userData'][3];
    $subjectId = $_POST['subjectId'];
    $marks_type = $_POST['marksType'];
    $totalMarks = $_POST['totalMarks'];
    $obtainedMarks = $_POST['obtainedMarks'];
    $subject_result = mysqli_query($con, "SELECT * FROM `subjects` WHERE `subjectId`='$_POST[subjectId]'") or die(mysqli_error($con));
    $subjet_row = mysqli_fetch_array($subject_result);
    if ($subjet_row[3] != '5' && $subjet_row[3] !== '6') {
        $result = mysqli_query($con, "SELECT * FROM `student_marks_details` WHERE `student_id`='$_GET[id]' 
    and `subjectId`='$subjectId'") or die(mysqli_error($con));
        $marks_detail_count = mysqli_num_rows($result);
        if ($marks_detail_count === 0) {
            $query = "INSERT INTO `student_marks_details` (
            `id`, `subjectId`, `student_id`, `$marks_type`) 
            VALUES (NULL, '$subjectId', '$_GET[id]', '$totalMarks,$obtainedMarks')";
            if (mysqli_query($con, $query)) {
                $smsInfo = [
                    "mobileNumber" => "+91" . $fPhoneNumber,
                    "totalMarks" => $totalMarks,
                    "obtainedMarks" => $obtainedMarks,
                    "SubjectName" => $subjet_row[2],
                    "type" => 'marks',
                    "marks_type" => $marks_type,
                    "link" => $link
                ];
                sendSms($smsInfo);
?>
                <script>
                    alert('Marks has been added Sucessfully!');
                    document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
                </script>
            <?php
            } else {
                die(mysqli_error($con));
            }
        } else {
            $update_query = "UPDATE `student_marks_details` SET `$marks_type` = '$totalMarks,$obtainedMarks'
             WHERE `student_id`='$_GET[id]' 
            and `subjectId`='$subjectId'";
            if (mysqli_query($con, $update_query)) {
                $smsInfo = [
                    "mobileNumber" => "+91" . $fPhoneNumber,
                    "totalMarks" => $totalMarks,
                    "obtainedMarks" => $obtainedMarks,
                    "SubjectName" => $subjet_row[2],
                    "type" => 'marks',
                    "marks_type" => $marks_type,
                    "link" => $link
                ];
                sendSms($smsInfo);
            ?>
                <script>
                    alert('Marks has been Updated Sucessfully!');
                    document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
                </script>
            <?php
            } else {
                die(mysqli_error($con));
            }
        }
    } else {
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
                $smsInfo = [
                    "mobileNumber" => "+91" . $fPhoneNumber,
                    "totalMarks" => $totalMarks,
                    "obtainedMarks" => $obtainedMarks,
                    "SubjectName" => $subjet_row[2],
                    "type" => 'marks',
                    "marks_type" => $marks_type,
                    "link" => $link
                ];
                sendSms($smsInfo);
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
    $subject_result = mysqli_query($con, "SELECT * FROM `subjects` WHERE `subjectId`='$_POST[subjectId]'") or die(mysqli_error($con));
    $subjet_row = mysqli_fetch_array($subject_result);
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
            $smsInfo = [
                "mobileNumber" => "+91" . $fPhoneNumber,
                "totalClasses" => $totalClasses,
                "classesAttended" => $classesAttended,
                "SubjectName" => $subjet_row[2],
                "type" => 'attendance',
                "marks_type" => $attendance_type,
                "link" => $link
            ];
            sendSms($smsInfo);
        ?>
            <script>
                alert('Attendance has been added successfully!');
                document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Something went wrong!');
                die(mysqli_error($con));
                // document.location = './create_student_details.php?id=<?php echo $_GET['id']; ?>';
            </script>
<?php
        }
    }
}

function sendSms($info)
{
    $url = "https://api.twilio.com/2010-04-01/Accounts/ACd74689a87b8ac60065964001b26556a5/Messages.json";
    if ($info['type'] === 'attendance') {
        $data = array(
            'From' => "+19704144821",
            'To' => $info['mobileNumber'],
            'Body' => "
Attendance Info - " . $info['marks_type'] . "
Subject Name : " . $info['SubjectName'] . "
Total Classes : " . $info['totalClasses'] . "
Classes Attended : " . $info['classesAttended'] . "
Link : " . $info['link'] . "
Click on above link to login into the portal
Thank You!
            ",
        );
    } else {
        $data = array(
            'From' => "+19704144821",
            'To' => $info['mobileNumber'],
            'Body' => "
Marks Details - " . $info['marks_type'] . "
Subject Name : " . $info['SubjectName'] . "
Total Marks : " . $info['totalMarks'] . "
Obtained Marks : " . $info['obtainedMarks'] . "
Link : " . $info['link'] . "
Click on above link to login into the portal
Thank You!
            ",
        );
    }
    $post = http_build_query($data);
    $x = curl_init($url);
    curl_setopt($x, CURLOPT_POST, true);
    curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($x, CURLOPT_USERPWD, "ACd74689a87b8ac60065964001b26556a5:52ba8eaef772eb3671e7a3801305e852");
    curl_setopt($x, CURLOPT_POSTFIELDS, $post);
    $y = curl_exec($x);
    curl_close($x);
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