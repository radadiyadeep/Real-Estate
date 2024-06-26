<?php
include 'admin/class/session-start.php'; 
include 'admin/class/atclass.php';
include 'admin/class/user-session-check.php';

$page_title = "Profile";

if(isset($_POST["submit"]))
{
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $utype = mysqli_real_escape_string($connection, $_POST['utype']);
    $user_mobile = mysqli_real_escape_string($connection, $_POST['user_mobile']);
    
    
    $_SESSION["username"] = $user_name;
    $query_check = mysqli_query($connection, "select lower(user_email) from tbl_user where user_email=lower('{$user_email}') and NOT user_id = '{$user_id_1}'") or die(mysqli_error($connection));

    $count = mysqli_num_rows($query_check);
    
    if($count>0)
    {
      
      redirect("register.php?success=2&msg=Email Already Exist");
      
    }
    else{ 
     
  $queryupdate = mysqli_query($connection, "update tbl_user set `user_name`='{$user_name}',`user_email`='{$user_email}',`utype`='{$utype}',`user_mobile`='{$user_mobile}' where user_id='{$user_id_1}'") or die(mysqli_error($connection));

  if ($queryupdate) {
    redirect("profile.php?success=1&msg=Your Profile Update Successfully");
        
  } else {
    
    redirect("profile.php?success=2&msg=Your Record Not Update");
       
  }
}
    
}
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $page_title;?> - <?php echo $project_title;?></title>

    <?php include 'themepart/header-script.php' ;?>

  </head>

<body>


<?php include 'themepart/header.php' ;?>

<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php"> <i class="fas fa-home"></i> </a></li>
          
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Profile </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="space-ptb login">
  <div class="container">
  
    <div class="row justify-content-center">
    
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">Profile</h2>
        </div>
        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="agent" role="tabpanel" aria-labelledby="agent-tab">
            <form method="post" action="#" id="regform" class="form-row mt-4 align-items-center">
              <div class="form-group col-sm-12">
                <label>Username:</label>
                <input type="text" name="user_name" value="<?php echo $user_name;?>" onkeyup ="Validatestring(this)" class="form-control" placeholder="Enter Username" required>
              </div>
              <div class="form-group col-sm-12">
                <label>Email Address:</label>
                <input type="email" name="user_email" value="<?php echo $user_email;?>" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group col-sm-12">
                <label>Mobile:</label>
                <input type="text" maxlength="10" value="<?php echo $user_mobile;?>" onkeyup ="Validate(this)" name="user_mobile" class="form-control" placeholder="Enter Mobile">
              </div>
              <div class="form-group col-sm-12">
                <label>User Type:</label>
                <input type="text" name="utype" value="<?php echo $utype;?>" onkeyup ="Validatestring(this)" class="form-control" placeholder="Enter User Type" required>
              </div>
         
              <div class="col-sm-6">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
         
            </form>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'themepart/footer.php';?>

  
<?php 
include 'themepart/footer-script.php';
?>
  <script>
         

            $(document).ready(function () {

                // validate signup form on keyup and submit
                $("#regform").validate({
                    rules: {
                      
                        user_name: {
                            required: true
                            
                        },

                        
                        user_gender: {
                            required: true
                            
                        },
                        user_address: {
                            required: true
                            
                        },
                        location_id: {
                            required: true
                            
                        },
                         user_email: {
                            required: true,
                            // Specify that email should be validated
                            // by the built-in "email" rule
                            email: true
                        },
                        user_mobile: {
                               required: true,
                            minlength: 10,
                            maxlength: 10
                        },


                     
                     




                    },
                    messages: {
                      
                        user_name: {
                            required: "Please Enter User Name"
                          

                        },
                        user_gender: {
                            required: "Please Select Gender"
                          

                        },
                        user_address: {
                            required: "Please Enter Address"
                          

                        },
                        location_id: {
                            required: "Please Select Location"
                          

                        },
                        user_email: {
                            required: "Please Enter Email ",
                            email: "Invalid email address."
                        },
                        user_mobile: {
                            required: "Please Enter Mobile Number",
                            minlength: "Please Enter 10 digit Mobile Number only",
                            maxlength: "Please Enter 10 digit Mobile Number only"

                        },
                     
                       
//                        mobile: {
//                            required: "Please Enter Your Mobile no.",
//                            minlength: "Enter Your 10 digit Mobile no. only",
//                            maxlength: "Enter Your 10 digit Mobile no. only",
//                        }

                        
                     


                    }
                });

            });

        </script>
</body>


</html>
