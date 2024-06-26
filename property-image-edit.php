<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
$page_title = "Property Image";
$page= "property-image";
$list_link = $page."-list.php";
$add_link = $page."-add.php";
$table = "tbl_property_image";
$primary_key = "property_img_id";
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
                  <input type="hidden" class="form-control" name="property_img_id"  value="<?php echo $row_list['property_img_id']; ?>"  required>
                    
                    
                  <div class="col-sm-3">
                     
                      <div class="form-group">
                        <label>Property</label>
                        <select name="property_id" class="form-control">
                        <option value="">-Select Property-</option>
                        <?php 
                        $query_property = mysqli_query($connection,"SELECT * FROM `tbl_property`")or die(mysqli_error($connection));
                        while($row_property = mysqli_fetch_array($query_property))
                        {
                          if($row_property["property_id"] == $row_list["property_id"])
                          {
                           $select = "selected";
                          }
                          else{
                            $select = "";
                          }
                        ?>
                        <option value="<?php echo $row_property["property_id"];?>" <?php echo $select;?>><?php echo $row_property["property_title"];?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                   
                 


                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="property_img_path"  class="form-control"  accept="image/*">

                        <input type="hidden" name="cust_photo" value="<?php echo $row_list['property_img_path'];?>">
                      </div>
                    </div>
                      
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        
             <a href="upload/<?php echo $row_list['property_img_path'];?>" target="_blank"><img src="upload/<?php echo $row_list['property_img_path']; ?>" style="width: 100px;height: 100px;"></a>
                   
                      </div>
                    </div>
                    
                  </div>
                   
                  
                
                  
              
                    
              </div>
              <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                  <a href="<?php echo $list_link;?>" class="btn btn-info">View</a>

                </div>
              <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <?php
          include 'class/mybtn.php';
           ?>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'themepart/footer.php';?>


</div>
<!-- ./wrapper -->


<?php include 'themepart/footer-script.php';?>

<?php 
if (isset($_POST['update'])) {

  $id = mysqli_real_escape_string($connection, $_POST['property_img_id']);
  $property_id = mysqli_real_escape_string($connection, $_POST['property_id']);


    //image start
  //product image name
  $cphoto = $_FILES['property_img_path']['name'];
  $path = 'upload/';
  $time = time();
  $destination = $path.$time.basename($cphoto);
  

   //product image name
   $cimg = $time.basename($cphoto);
  
   
   //product img name
   $cust_photo  =$_POST["cust_photo"];
       
      if($cphoto=='')
   {
          $cimg =$cust_photo;
      } 
      else{
               if($cust_photo!=='')
    {
     if(file_exists('upload/'.$cust_photo))
             
                                     {
         if($cust_photo == "noimage.png")
         {
             
         }else{
         
                                         unlink('upload/'.$cust_photo);
         }
                                     }
    }                               
                                $cimg =$cimg;
    
      move_uploaded_file($_FILES['property_img_path']['tmp_name'], $destination);
      }
  //image end



  
  $queryupdate = mysqli_query($connection, "update $table set `property_id`='{$property_id}',`property_img_path`='{$cimg}' where $primary_key='{$id}'") or die(mysqli_error($connection));



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
                      property_id: {
                            required: true
                        }
                        
                    },
                    messages: {
                      property_id: {
                            required: "Please Select Property"

                        },
                        
                        
                       
                    }
                });

            });
            </script>
          <?php include 'class/alert-script.php';?>  

</body>
</html>
