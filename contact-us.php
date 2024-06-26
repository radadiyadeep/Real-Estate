<?php
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
$page_title = "Contact Us";

if (isset($_POST["submit"])) {
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $subject = mysqli_real_escape_string($connection, $_POST['subject']);
  $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
  $message = mysqli_real_escape_string($connection, $_POST['message']);

  $query = mysqli_query($connection, "INSERT INTO `tbl_contactus`(`contact_name`, `email`, `subject`, `mobile`, `message`) VALUES ('{$username}','{$email}','{$subject}','{$mobile}','{$message}')") or die(mysqli_error($connection));

  if ($query) {

    redirect("contact-us.php?success=1&msg=Your Information Send Successfully");
  }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="keywords" content="HTML5 Template" />
  <meta name="description" content="Real Villa - Real Estate HTML5 Template" />
  <meta name="author" content="potenzaglobalsolutions.com" />
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

            <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Contact us </span></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="space-ptb">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h2>Contact Us</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="contact-address bg-light p-4">
            <div class="d-flex mb-3">
              <div class="contact-address-icon">
                <i class="flaticon-map text-primary font-xlll"></i>
              </div>
              <div class="ml-3">
                <h6>Address</h6>
                <p>The First,B/H, Keshavbaug Party Plot, D-1106, Disha Estate Management, nr. Shivalik Highstreet, Vastrapur, Ahmedabad, Gujarat 380015</p>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="contact-address-icon">
                <i class="flaticon-email text-primary font-xlll"></i>
              </div>
              <div class="ml-3">
                <h6>Email</h6>
                <p>dishaestatemanagement@gmail.com</p>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="contact-address-icon">
                <i class="flaticon-call text-primary font-xlll"></i>
              </div>
              <div class="ml-3">
                <h6>Phone Number</h6>
                <span>+91 79400 59454</span><br>
                <span>+91 99250 01074</span>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-lg-7 mt-4 mt-lg-0">
          <div class="contact-form">
            <h4 class="mb-4">Inquiry</h4>
            <form id="contactusform" method="post" action="#">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="username" id="username" placeholder="Your name">
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your email">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" maxlength="10" onkeyup="Validate(this)" name="mobile" id="mobile" placeholder="Your Mobile">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                </div>
                <div class="form-group col-md-12">
                  <textarea class="form-control" rows="4" name="message" id="message" placeholder="Type Inquiry..."></textarea>
                </div>

                <div class="col-md-12">
                  <button class="btn btn-primary" name="submit" type="submit">Send message</button>
                </div>
              </div>
            </form>
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
      $("#contactusform").validate({
        rules: {


          username: {
            required: true,
            minlength: 2
          },
          email: {
            required: true,
            email: true
          },
          mobile: {
            required: true,
            minlength: 10,
            maxlength: 10
          },



          message: {
            required: true

          },
          subject: {
            required: true

          }




        },
        messages: {


          username: {
            required: "Please Enter Name",


          },

          email: {
            required: "Please Enter Email ",
            email: "Invalid email address"


          },
          mobile: {
            required: "Please Enter Mobile Number",
            minlength: "Please Enter 10 digit Mobile Number only",
            maxlength: "Please Enter 10 digit Mobile Number only"

          },
          message: {
            required: "Please Enter Message"
          },
          subject: {
            required: "Please Enter Subject"
          },

      


        }
      });

    });
  </script>
</body>


</html>