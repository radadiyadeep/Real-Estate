<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $project_title;?></title>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                   <?php
                                   $query_cat = mysqli_query($connection,"select count(*) as cat_total from tbl_category")or die(mysqli_error($connection));
                                         
                                  $total_cat = mysqli_fetch_array($query_cat);                                    
                                    
                                    ?>
                <h3><?php   echo $total_cat["cat_total"];?></h3>

                <p>Total Category</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
                <a href="category-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                    <?php
                                    $query_property = mysqli_query($connection,"select count(*) as property_total from tbl_property")or die(mysqli_error($connection));
                                         
                                  $total_property = mysqli_fetch_array($query_property);                                    
                                    
                                    ?>
                <h3><?php    echo $total_property["property_total"];?>
                </h3>

                <p>Total Property</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="property-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                    <?php
                                   $query_user = mysqli_query($connection,"select count(*) as user_total from tbl_user ")or die(mysqli_error($connection));
                                         
                               $total_user = mysqli_fetch_array($query_user);                                    
                                    
                                    ?>
                <h3><?php   echo $total_user["user_total"];?></h3>

                <p>Total User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
                <a href="user-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                   <?php
                                    $query_location = mysqli_query($connection,"select count(*) as location_total from tbl_location")or die(mysqli_error($connection));
                                         
                                $total_location = mysqli_fetch_array($query_location);                                    
                                    
                                    ?>
                <h3>  <?php   echo $total_location["location_total"];?></h3>

                <p>Total Location</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="location-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
 
      </div>
    </section>
   
  </div>
  
 <?php include 'themepart/footer.php';?>
</div>

<?php include 'themepart/footer-script.php';?>
</body>
</html>
