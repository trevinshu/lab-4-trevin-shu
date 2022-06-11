<?php
include("../includes/mysql_connect.php");

$charID = $_GET['id'];

if (is_numeric($charID)) {
    mysqli_query($con, "Delete from characterslab where id = '$charID'") or die(mysqli_error($con));
    header("Location:edit.php");
}
