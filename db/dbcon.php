<?php

$con = mysqli_connect('localhost', 'root', '', 'parent_connect') or die(mysqli_error($con));

mysqli_select_db($con, 'parent_connect') or die(mysqli_error($con));

?>