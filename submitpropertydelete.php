<?php
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
$pid = $_GET['id'];
$sql = "DELETE FROM tbl_property WHERE property_id = {$pid}";
$result = mysqli_query($connection, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Deleted</p>";
	header("Location:feature.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Property Not Deleted</p>";
	header("Location:feature.php?msg=$msg");
}
mysqli_close($con);
?>