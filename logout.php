<?php
include 'class/session-start.php';
include 'class/atclass.php';

 session_destroy();

   $alert = "success";
   $msg = "You have Successfully Logged Out";
?>

<html>
<head>

<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Logout | <?php echo $project_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
include 'themepart/header-script.php';
?>
  </head>
  <body>
<button type="button" class="btn btn-success mybtn" style="display:none;">

                </button>				
				<?php include 'themepart/footer-script.php';?>
				

<script>
	


$(document).ready(function() {
Swal.fire({
 type: 'success',
  title: 'You have Successfully Logged Out',
   timer: 1500
})

	window.setTimeout(function (){
	window.location.href = "index.php";},1500);
});
  		</script>
		</body>
		</html>