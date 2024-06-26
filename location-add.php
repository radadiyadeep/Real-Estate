<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
$page_title = "Location";
$page= "location";
$list_link = $page."-list.php";
$add_link = $page."-add.php";
$redirect_link = $page."-add.php";
$table = "tbl_location";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add <?php echo $page_title;?> | <?php echo $project_title;?></title>
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
              <li class="breadcrumb-item"><a href="<?php echo $list_link;?>">List <?php echo $page_title;?></a></li>
              <li class="breadcrumb-item active">Add <?php echo $page_title;?></li>
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
                <h3 class="card-title">Add <?php echo $page_title;?></h3>
              </div>
                <form role="form" id="myform" method="post" action="#" enctype="multipart/form-data">
             
              <div class="card-body">
              
                  <div class="row">
                    <div class="col-sm-3">
                     
                      <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" name="location_name"  class="form-control" placeholder="Enter Location Name" required="">
                      </div>
                    </div>


                    
                  </div>
                   
                  
                
                  
              
                    
              </div>
              <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="<?php echo $list_link;?>" class="btn btn-info">View</a>

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
if (isset($_POST['submit'])) {
  $location_name = mysqli_real_escape_string($connection, $_POST['location_name']);


  $query_check = mysqli_query($connection, "select lower(location_name) from $table where location_name=lower('{$location_name}')") or die(mysqli_error($connection));

$count = mysqli_num_rows($query_check);

if($count>0)
{
  $msg = "Location Name Already Exist";
  $alert = "warning";
  include 'class/alert-msg.php';
  
}
else{

  
  $queryins = mysqli_query($connection, "insert into $table(`location_name`) VALUES ('{$location_name}')") or die(mysqli_error($connection));

  if ($queryins) {
    $msg = "Your Record Inserted Successfully";
    $alert = "success";
    include 'class/alert-msg.php';
        
  } else {
    $msg = "Your Record Not Inserted";
    $alert= "error";
    include 'class/alert-msg.php';
       
  }
}
}
?>
     <script>
              $(document).ready(function () {

                // validate signup form on keyup and submit
                $("#myform").validate({
                    rules: {
                      location_name: {
                            required: true,
                            minlength:2

                        }
                        
                    },
                    messages: {
                      location_name: {
                            required: "Please Enter Location Name"

                        }
                      
                        
                       
                    }
                });

            });
            </script>
             
             <?php include 'class/alert-script.php';?>  
</body>
</html>
