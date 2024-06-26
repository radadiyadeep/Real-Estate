<?php
include 'admin/class/session-start.php'; 
include 'admin/class/atclass.php';
include 'admin/class/user-session-check.php';

$page_title = "My Wishlist";
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
          
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>My Wishlist</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-title d-flex align-items-center">
          <h2>Wish List</h2>
        </div>
        <div class="row">

        <?php
                                            $query_list = mysqli_query($connection, "select * from tbl_wishlist where user_id='{$_SESSION["userid"]}'  order by wishlist_id desc") or die(mysqli_error($connection));

                                             $count_w =mysqli_num_rows($query_list);
                                             if($count_w > 0)
                                             {

                                            $x = 1;
                                            while ($row = mysqli_fetch_array($query_list)) {
                                                $query_user = mysqli_query($connection, "select * from tbl_user where user_id='{$row["user_id"]}'") or die(mysqli_error($connection));
                                                $row_user = mysqli_fetch_array($query_user);

                                                $query_property = mysqli_query($connection, "select * from tbl_property where property_id='{$row["property_id"]}'") or die(mysqli_error($connection));
                                                $row_property = mysqli_fetch_array($query_property);

                                                $query_location = mysqli_query($connection, "select * from tbl_location where location_id='{$row_property["location_id"]}'") or die(mysqli_error($connection));
                                                $row_location = mysqli_fetch_array($query_location);
                                                ?>
  <div class="col-md-6 col-lg-4">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="admin/property/<?php echo $row_property["pimage"];?>" style="width:350px;height:211px;" alt="">
                <div class="property-lable">
                </div>
           
                
              </div>
              <div class="property-details">
                <div class="property-details-inner">
                  <h5 class="property-title"><a href="property-detail-style-01.html"><?php echo $row_property["title"];?></a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i><?php echo $row_location["location_name"];?></span><br>
                  <div class="property-price">₹<?php echo $row_property["price"];?> </div>
               
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail.php?pid=<?php echo $row_property["property_id"];?>">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">

                    <form method="post" action="delete-wishlist.php">
                    <input type="hidden" name="wishlist_id" value="<?php echo $row["wishlist_id"];?>">
                    
                    <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>

                                            <?php } } else {
                                                echo "<h4>Your Wish List Empty</h4>";
                                            } ?>

        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'themepart/footer.php';?>

<?php 
include 'themepart/footer-script.php';
?>

</body>


</html>
