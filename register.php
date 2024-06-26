<?php 
include 'admin/class/atclass.php';
$page_title = "Register";

if(isset($_POST["submit"]))
{
    $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $utype = mysqli_real_escape_string($connection, $_POST['utype']);
    $user_mobile = mysqli_real_escape_string($connection, $_POST['user_mobile']);
    $user_password = mysqli_real_escape_string($connection, $_POST['password']);
  
    
    $query_check = mysqli_query($connection, "select lower(user_email) from tbl_user where user_email=lower('{$user_email}')") or die(mysqli_error($connection));

    $count = mysqli_num_rows($query_check);
    
    if($count>0)
    {
      
      redirect("register.php?success=2&msg=Email Already Exist");
      
    }
    else{ 
     
  $queryins = mysqli_query($connection, "INSERT INTO tbl_user(`user_name`,`user_email`,`user_password`,`user_mobile`,`utype`) VALUES ('{$user_name}','{$user_email}','{$user_password}','{$user_mobile}','{$utype}')") or die(mysqli_error($connection));

  if ($queryins) {
    redirect("login.php?success=1&msg=Your Registration Successfully");
        
  } else {
    
    redirect("register.php?success=2&msg=Your Record Not Inserted");
       
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
    <?php include 'themepart/header-script.php'; ?>

</head>

<body>

  <?php include 'themepart/header.php'; ?>

<!--=================================
Breadcrumb -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php"> <i class="fas fa-home"></i> </a></li>
          
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Create an account </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
Breadcrumb -->

<!--=================================
Login -->
<section class="space-ptb login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">Create an Account</h2>
        </div>
        <!-- <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="agent-tab" data-toggle="tab" href="#agent" role="tab" aria-controls="agent" aria-selected="false">Agent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="regular-user-tab" data-toggle="tab" href="#regular-user" role="tab" aria-controls="regular-user" aria-selected="true">Regular User</a>
          </li>
        </ul> -->
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="agent" role="tabpanel" aria-labelledby="agent-tab">
            <form method="post" action="#" id="regform" class="form-row mt-4 align-items-center">
              <div class="form-group col-sm-12">
                <label>Username:</label>
                <input type="text" name="user_name" onkeyup ="Validatestring(this)" class="form-control" placeholder="Enter Username" required>
              </div>
              <div class="form-group col-sm-12">
                <label>Email Address:</label>
                <input type="email" name="user_email" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group col-sm-12">
                <label>Mobile:</label>
                <input type="text" maxlength="10" onkeyup ="Validate(this)" name="user_mobile" class="form-control" placeholder="Enter Mobile">
              </div>
              


              
              <div class="form-group col-sm-12">
                <label>Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
              </div>
              <div class="form-group col-sm-12">
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password">
              </div>
              <div class="form-check-inline">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="user" checked>User
									  </label>
									</div><!-- FOR MORE PROJECTS visit: codeastro.com -->
									
									<div class="form-check-inline disabled">
									  <label class="form-check-label">
										<input type="radio" class="form-check-input" name="utype" value="seller">Seller
									  </label>
									</div>
      
              <div class="col-sm-6">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Sign up</button>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="mr-1"><a href="login.php">Already Registered User? Click here to login</a></li>
                </ul>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Login -->

<!--=================================

<!-=================================
footer-->
<?php include 'themepart/footer.php';?>
<!--=================================
footer-->

<!--=================================
Javascript -->

  
<?php 
include 'themepart/footer-script.php';
?>
  <script>
            //             var jq = $.noConflict();

            $(document).ready(function () {

                // validate signup form on keyup and submit
                $("#regform").validate({
                    rules: {
                      
                        user_name: {
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


                       
                            password: {
                            required: true,
                            minlength:6
                            

                        },
                         confirm_password: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        }
                     
                     




                    },
                    messages: {
                      
                        user_name: {
                            required: "Please Enter User Name"
                          

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
                      password: {
                            required: "Please Enter Password"
                          

                        },
                          confirm_password: {
                            required: "Please Enter Confirm Password",
                            minlength: "Your password must be at least 6 characters long",
                            equalTo: "Please enter the same password as above"
                    }
                       
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
