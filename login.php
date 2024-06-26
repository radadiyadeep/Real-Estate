<?php
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
$page_title = "Login";

if (isset($_POST["submit"])) {


  $email = mysqli_real_escape_string($connection, $_POST['user_email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  $query = mysqli_query($connection, "select *from tbl_user where user_email='{$email}' and user_password='{$password}'") or die(mysqli_error($connection));

  $count = mysqli_num_rows($query);

  if ($count > 0) {
    $row = mysqli_fetch_array($query);

    $user_id = $row['user_id'];
    $ad_name = $row['user_name'];
    $type=$row['utype'];
    $_SESSION["userid"] = $user_id;
    $_SESSION["utype"] = $type;

    $_SESSION["username"] = $ad_name;
    redirect("index.php?success=1&msg=You have Successfully Logged In");
  }
   else 
  {
    redirect("login.php?success=2&msg=Username and Password Wrong");
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
  <title><?php echo $page_title; ?> - <?php echo $project_title; ?></title>

  <?php include 'themepart/header-script.php'; ?>

</head>

<body>


  <?php include 'themepart/header.php'; ?>
  
  <div class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.php"> <i class="fas fa-home"></i> </a></li>

            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Login </span></li>
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
            <h2 class="text-center">Login</h2>
          </div>
         
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="agent" role="tabpanel" aria-labelledby="agent-tab">
              <form method="post" action="#" id="regform" class="form-row mt-4 align-items-center">

                <div class="form-group col-sm-12">
                  <label>Email Address:</label>
                  <input type="email" name="user_email" class="form-control" placeholder="Enter Email">
                </div>


                <div class="form-group col-sm-12">
                  <label>Password:</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                </div>

                <div class="col-sm-6">
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                    <li class="mr-1"><a href="register.php">If No Registered User? Click here to Register</a>
                      <br>
                      <a href="forgot-password.php">Forgot Password</a>
                    </li>

                  </ul>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php include 'themepart/footer.php'; ?>



  <?php
  include 'themepart/footer-script.php';
  ?>
  <script>
   
    $(document).ready(function() {

      // validate signup form on keyup and submit
      $("#regform").validate({
        rules: {

          user_email: {
            required: true,
          
            email: true
          },


          password: {
            required: true

          },


        },
        messages: {

          user_email: {
            required: "Please Enter Email ",
            email: "Invalid email address."
          },

          password: {
            required: "Please Enter Password"


          },






        }
      });

    });
  </script>
</body>


</html>