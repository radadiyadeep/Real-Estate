<?php 
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
$page_title = "Property Detail";

$pid = $_GET['pid'];


if(isset($_POST["submit"]))
{
     $property_contact_name = mysqli_real_escape_string($connection ,$_POST['property_contact_name']);
     $property_id = mysqli_real_escape_string($connection ,$_POST['property_id']);
     $property_contact_mobile = mysqli_real_escape_string($connection ,$_POST['property_contact_mobile']);
     $property_contact_msg = mysqli_real_escape_string($connection ,$_POST['property_contact_msg']);
     
     $query = mysqli_query($connection,"INSERT INTO `tbl_property_contact`(`property_contact_name`,`property_id`, `property_contact_mobile`, `property_contact_msg`) VALUES ('{$property_contact_name}','{$property_id}','{$property_contact_mobile}','{$property_contact_msg}')")or die(mysqli_error($connection));
    
     if($query){

      redirect("property-detail.php?pid=$pid&success=1&msg=Your Information Send Successfully");
          
     }
}

if (!isset($_GET['pid']) || empty($_GET['pid'])) {
    header("location:property-list.php");
}

$query_list = mysqli_query($connection, "select * from tbl_property  where property_id='{$pid}'")or die(mysqli_error($connection));
$row_list = mysqli_fetch_array($query_list);


$query_location = mysqli_query($connection, "select * from tbl_location where location_id='{$row_list["location_id"]}'") or die(mysqli_error($connection));
$row_location = mysqli_fetch_array($query_location);
?>
<!DOCTYPE html>
<html lang="en">
  

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Real Estate PHP">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="shortcut icon" href="images1/favicon.ico">

<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css1/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css1/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css1/layerslider.css">
<link rel="stylesheet" type="text/css" href="css1/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css1/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css1/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts1/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css1/style.css">
<title>
  Real Estate PHP
</title>
    <?php include 'themepart/header-script.php' ;?>

  </head>

<body>


<?php include 'themepart/header.php' ;?>

<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
          <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="#">Pages</a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> <?php echo $row_list["title"];?></span></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="wrapper">
 
  <section class="space-ptb">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 col-md-6">
          <div class="property-detail-title">
            <h3><?php echo $row_list["title"];?></h3>
            <span class="d-block mb-4"><i class="fas fa-map-marker-alt fa-xs pr-2"></i><?php echo $row_list["location"];?></span>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="price-meta">
            <div class="d-inline">
           
            </div>
            
          </div>
        </div>
        <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                 
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row_list['pimage'];?>" class="ls-bg" alt="" /> </div>
                                    
                       
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row_list['pimage1'];?>" class="ls-bg" alt="" /> </div>
                                    
                                  
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row_list['pimage2'];?>" class="ls-bg" alt="" /> </div>
									
							
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row_list['pimage3'];?>" class="ls-bg" alt="" /> </div>
									
									
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row_list['pimage4'];?>" class="ls-bg" alt="" /> </div>
                                </div>
                            </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-8 col-md-7">
          <div class="property-info mt-5">
            
          </div>
          <div class="property-description">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Description</h5>
              </div>
              <div class="col-sm-9">
              <ul class="property-list list-unstyled mb-0">
              <li><b>BHK:</b><?php echo $row_list["bhk"];?></li>
                <li><b>Requirement:</b><?php echo $row_list["stype"];?></li>
                <li><b>Bedroom:</b><?php echo $row_list["badroom"];?></li>
                <li><b>Bathroom:</b><?php echo $row_list["bathroom"];?></li>
                <li><b>Balcony:</b><?php echo $row_list["balcony"];?></li>
                <li><b>Kitchen:</b><?php echo $row_list["kitchen"];?></li>
                <li><b>Size:</b><?php echo $row_list["size"];?>&nbsp;Sqft.</li>
                <li><b>Price:</b>₹<?php echo $row_list["price"];?></li>
                </div>
            </div>
          </div>
          
          <div class="property-description">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Feature</h5>
              </div>
              <div class="col-sm-9">
              <ul class="property-list list-unstyled mb-0">
                <li><?php echo $row_list["feature"];?></li>
                



                
              </div>
            </div>
          </div>
          
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          
          <?php 
          $query_more_image = mysqli_query($connection,"SELECT * FROM `tbl_property_image` where property_id='{$pid}'")or die(mysqli_error($connection));
           $count_img=mysqli_num_rows($query_more_image);
           if($count_img > 0)
           {
          ?>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          
          <div class="property-detail-img popup-gallery">
            <div class="owl-carousel" data-animateOut="fadeOut" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
             <?php 
             while($row_more_image = mysqli_fetch_array($query_more_image))
             {
             ?>
             <div class="item">
                <a class="portfolio-img" href="admin/upload/<?php echo $row_more_image["property_img_path"];?>"><img class="img-fluid" src="admin/upload/<?php echo $row_more_image["property_img_path"];?>" style="width:730px;359px;" alt=""></a>
              </div>
             <?php } ?>
         
            </div>
          </div>
           <?php } ?>
          
        <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-schedule">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Contact Us</h5>
              </div>
              <div class="col-sm-9">
              <form method="post" action="#" id="contactusform">
                <div class="form-row">
                    
              
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" name="property_contact_name" placeholder="Name" required>
                  </div>
                  
                    <input type="hidden" name="property_id" class="form-control" value="<?php echo $pid;?>">
                  
                  <div class="form-group col-sm-12">
                    <input type="text" class="form-control" maxlength="10" onkeyup ="Validate(this)" name="property_contact_mobile" placeholder="Phone" required maxlength="10">
                  </div>
                  <div class="form-group col-sm-12">
                    <textarea class="form-control" rows="4" name="property_contact_msg" placeholder="Message" required></textarea>
                  </div>
                  <div class="form-group col-sm-12">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                  <div class="col-sm-6"></div>
                </div>
                </form>
              </div>
            </div>
          </div> 
          
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="sticky-top">
            <div class="sidebar mt-5 ">
              <div class="widget agent-info">
                
                
                <?php 
                    if(isset($_SESSION["userid"]))
                    {
                    ?>
                    <form method="post" action="add-wishlist.php">
                    <input type="hidden" name="property_id" value="<?php echo $row_list["property_id"];?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["userid"];?>">
                    <button class="btn btn-dark btn-block" type="submit" name="submit">Add To Wishlist</button>
                    </form>
                    <?php } else{ ?>
                <a class="btn btn-dark btn-block" href="login.php">Add To Wishlist</a>
                    <?php } ?>
                    <br>
              </div>
              <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Category</h6>
              <a class="ml-auto" data-toggle="collapse" href="#type-property" role="button" aria-expanded="false" aria-controls="type-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="type-property">
              <ul class="list-unstyled mb-0 pt-3">

              <?php 
                                           $query_cat = mysqli_query($connection, "select * from tbl_category order by category_id asc") or die(mysqli_error($connection));
                                           while($row_cat = mysqli_fetch_array($query_cat))
                                           {

                                            $query_property_2 = mysqli_query($connection,"SELECT count(*) as total_property FROM `tbl_property`  where category_id='{$row_cat["category_id"]}'") or die(mysqli_error($connection));
                                            
                                            $row_property_2 = mysqli_fetch_array($query_property_2);

              ?>
                              <li><a href="property-list.php?cid=<?php echo $row_cat["category_id"];?>"><?php echo $row_cat["category_name"];?><span class="ml-auto">(<?php echo $row_property_2["total_property"];?>)</span></a></li>
              <?php } ?>
            
              </ul>
            </div>
          </div>
              <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Location</h6>
              <a class="ml-auto" data-toggle="collapse" href="#status-property" role="button" aria-expanded="false" aria-controls="status-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="status-property">
              <ul class="list-unstyled mb-0 pt-3">
              <?php 
                                           $query_location = mysqli_query($connection, "select * from tbl_location order by location_id asc") or die(mysqli_error($connection));
                                           while($row_location = mysqli_fetch_array($query_location))
                                           {

                                            $query_property = mysqli_query($connection,"SELECT count(*) as total_property FROM `tbl_property`  where location_id='{$row_location["location_id"]}'") or die(mysqli_error($connection));
                                            
                                            $row_property = mysqli_fetch_array($query_property);

              ?>

                  <li><a href="property-list.php?lid=<?php echo $row_location["location_id"];?>"><?php echo $row_location["location_name"];?><span class="ml-auto">(<?php echo $row_property["total_property"];?>)</span></a></li>
                                           <?php } ?>
              
              </ul>
            </div>
          </div>
              <div class="widget">
            <div class="widget-title">
              <h6>Recently listed properties</h6>
            </div>

            <?php 
            $query_property_1 = mysqli_query($connection,"SELECT * FROM `tbl_property` order by property_id desc limit 4")or die(mysqli_error($connection));
            while($row_property_1 = mysqli_fetch_array($query_property_1))
            {
            ?>
  <div class="recent-list-item">
              <img class="img-fluid" src="admin/property/<?php echo $row_property_1["pimage"];?>" style="width:70px;height:70px" alt="not image">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="property-detail.php?pid=<?php echo $row_property_1["property_id"];?>"><?php echo $row_property_1["title"];?></a>
                <span class="text-primary">₹<?php echo $row_property_1["price"];?> </span>
              </div>
            </div>

            <?php } ?>

      
          </div>   
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</div>


<?php include 'themepart/footer.php';?>


<?php 
include 'themepart/footer-script.php';
?>
  <script>
            //            var jq = $.noConflict();

            $(document).ready(function () {

                // validate signup form on keyup and submit
                $("#contactusform").validate({
                    rules: {
                        
                        
                      property_contact_name: {
                            required: true,
                            minlength:2
                        },
                        email: {
                            required: true,
                            email:true
                        },
                        property_contact_mobile: {
                               required: true,
                            minlength: 10,
                            maxlength: 10
                        },
                        

                         
                     
property_contact_msg: {
                            required: true
                          
                        },
                          subject: {
                            required: true
                          
                        }
                    
                        
                        

                    },
                    messages: {
                        
                        
                      property_contact_name: {
                            required: "Please Enter Name",
                          

                        },
                     
                        property_contact_mobile: {
                            required: "Please Enter Mobile Number",
                            minlength: "Please Enter 10 digit Mobile Number only",
                            maxlength: "Please Enter 10 digit Mobile Number only"

                        },
                        property_contact_msg: {
                            required: "Please Enter Message"
                        },
                      
                        
                        

                    }
                });

            });

        </script>
        <script src="js1/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js1/greensock.js"></script> 
<script src="js1/layerslider.transitions.js"></script> 
<script src="js1/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js1/popper.min.js"></script> 
<script src="js1/bootstrap.min.js"></script> 
<script src="js1/owl.carousel.min.js"></script> 
<script src="js1/tmpl.js"></script> 
<script src="js1/jquery.dependClass-0.1.js"></script> 
<script src="js1/draggable-0.1.js"></script> 
<script src="js1/jquery.slider.js"></script> 
<script src="js1/wow.js"></script> 
<script src="js1/custom.js"></script>
</body>


</html>
