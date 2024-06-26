<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
$page_title = "Category";
$page= "category";
$list_link = $page."-list.php";
$add_link = $page."-add.php";
$table = "tbl_category";
$primary_key = "category_id";
$redirect_link = $page."-edit.php";
$editid = $_GET['eid'];





if (!isset($_GET['eid']) || empty($_GET['eid'])) {
    header("location:$list_link");
}

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
              <li class="breadcrumb-item"><a href="<?php echo $list_link;?>">List <?php echo $page_title;?></a></li>
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
                  <input type="hidden" class="form-control" name="category_id"  value="<?php echo $row_list['category_id']; ?>"  required>
                    
                  <div class="col-sm-3">
                  
                      <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name"   value="<?php echo $row_list['category_name']; ?>" class="form-control" placeholder="Enter Category Name" required="">
                      </div>
                    </div>
                   
             
                    
                  </div>
                   
                  
                
                  
              
                    
              </div>
              <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
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
if (isset($_POST['update'])) {

  $id = mysqli_real_escape_string($connection, $_POST['category_id']);
  $category_name = mysqli_real_escape_string($connection, $_POST['category_name']);

     




   $query_check = mysqli_query($connection, "select lower(category_name) from $table where category_name=lower('{$category_name}')  and NOT $primary_key = '{$id}'") or die(mysqli_error($connection));

$count = mysqli_num_rows($query_check);

if($count>0)
{ $msg = "Category Name Already Exist";
  $alert = "warning";
  include 'class/alert-msg.php';

       
}
  else{
    
  $queryupdate = mysqli_query($connection, "update $table set `category_name`='{$category_name}' where $primary_key='{$id}'") or die(mysqli_error($connection));



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
}
?>

<script>
              $(document).ready(function () {

                // validate signup form on keyup and submit
                $("#myform").validate({
                    rules: {
                      category_name: {
                            required: true,
                            minlength:2,

                        }
                    },
                    messages: {
                      category_name: {
                            required: "Please Enter Category Name"

                        }
                       
                    }
                });

            });
            </script>
          <?php include 'class/alert-script.php';?>  

</body>
</html>
