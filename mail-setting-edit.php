<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
$page_title = "Mail Setting";
$table = "tbl_mail_setting";
$primary_key = "mail_setting_id";
$redirect_link = "mail-setting-edit.php";
$editid = "1";



$query_list = mysqli_query($connection, "select * from $table  where $primary_key='{$editid}'")or die(mysqli_error($connection));
$row_list = mysqli_fetch_array($query_list);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit <?php echo $page_title;?> | <?php echo $project_title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <?php
include 'themepart/header-script.php';
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php
include 'themepart/top-header.php';
?>
  
   <?php
include 'themepart/sidebar.php';
?>

  
  <div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo $home_page;?>">Home</a></li>
            
              <li class="breadcrumb-item active">Edit <?php echo $page_title;?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-md-12">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit <?php echo $page_title;?></h3>
              </div>
                <form role="form" id="myform" method="post" action="#" enctype="multipart/form-data">
             
              <div class="card-body">
              
                  <div class="row">
                  <input type="hidden" class="form-control" name="mail_setting_id"  value="<?php echo $row_list['mail_setting_id']; ?>"  required>
                  
                  <div class="col-sm-3">
                      
                      <div class="form-group">
                        <label>SMTP Secure</label>
                        <input type="text" name="mail_smtp_secure"  class="form-control" value="<?php echo $row_list['mail_smtp_secure']; ?>" placeholder="Enter SMTP Secure" required="">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Host</label>
                        <input type="text" name="mail_host"  class="form-control" value="<?php echo $row_list['mail_host']; ?>" placeholder="Enter Host" required="">
                      </div>
                    </div>
                    

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Port</label>
                        <input type="text" name="mail_port"  class="form-control" value="<?php echo $row_list['mail_port']; ?>" placeholder="Enter Port" required="">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text"  name="mail_username"  class="form-control" value="<?php echo $row_list['mail_username']; ?>" placeholder="Enter Username" required="">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="mail_password"  class="form-control" value="<?php echo $row_list['mail_password']; ?>" placeholder="Enter Password" required="">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Email Send</label>
                        <input type="text" name="mail_email_send"  class="form-control" value="<?php echo $row_list['mail_email_send']; ?>" placeholder="Enter Email Send" required="">
                      </div>
                    </div>

                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Mail Title</label>
                        <input type="text" name="mail_title"  class="form-control" value="<?php echo $row_list['mail_title']; ?>" placeholder="Enter Mail Title" required="">
                      </div>
                    </div>

                  </div>
                   
                  
                
                  
              
                    
              </div>
              <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                  

                </div>
                </form>
            </div>
            
            <?php
          include 'class/mybtn.php';
           ?>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php include 'themepart/footer.php';?>


</div>


<?php include 'themepart/footer-script.php';?>

<?php 
if (isset($_POST['update'])) {

  $id = mysqli_real_escape_string($connection, $_POST['mail_setting_id']);
  $mail_smtp_secure = mysqli_real_escape_string($connection, $_POST['mail_smtp_secure']);
  $mail_host = mysqli_real_escape_string($connection, $_POST['mail_host']);
  $mail_port = mysqli_real_escape_string($connection, $_POST['mail_port']);
  $mail_username = mysqli_real_escape_string($connection, $_POST['mail_username']);
  $mail_password = mysqli_real_escape_string($connection, $_POST['mail_password']);
  $mail_email_send = mysqli_real_escape_string($connection, $_POST['mail_email_send']);
  $mail_title = mysqli_real_escape_string($connection, $_POST['mail_title']);
  


  
  $queryupdate = mysqli_query($connection, "update $table set `mail_smtp_secure`='{$mail_smtp_secure}',`mail_host`='{$mail_host}',`mail_port`='{$mail_port}',`mail_username`='{$mail_username}',`mail_password`='{$mail_password}',`mail_email_send`='{$mail_email_send}',`mail_title`='{$mail_title}',`update_datetime`='{$datetime}' where $primary_key='{$id}'") or die(mysqli_error($connection));



  if ($queryupdate) {
    $msg = "Your Record Updated Successfully";
    $alert = "success";
    
    include 'class/alert-msg.php';
     
  }
  else{
    $msg = "Your Record Not Inserted";
    $alert= "error";
    include 'class/alert-msg.php'; 
            
          }
        
}
?>

<script>
              $(document).ready(function () {

                // validate signup form on keyup and submit
                $("#myform").validate({
                    rules: {
                      project_rera_number_title: {
                            required: true
                        },
                        project_rera_number_first: {
                            required: true
                        },
                        project_rera_number_second: {
                            required: true
                        },
                        project_rera_title: {
                            required: true
                        },
                        project_rera_link: {
                            required: true,
                            url:true
                        }
                      
                    
                    },
                    messages: {
                      project_rera_number_title: {
                            required: "Please Enter Project Rera Number"

                        },
                        project_rera_number_first: {
                            required: "Please Enter First Project Rera Number"

                        },
                        project_rera_number_second: {
                            required: "Please Enter Second Project Rera Number"

                        },
                        project_rera_title: {
                            required: "Please Enter Project Rera Title"

                        },
                        project_rera_link: {
                            required: "Please Enter Project Rera Link"

                        }
                        
                       
                    }
                });

            });
            </script>
          <?php include 'class/alert-script.php';?>  

</body>
</html>
