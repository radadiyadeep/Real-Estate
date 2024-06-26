<?php 
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';

$page_title = "Property List";

if(isset($_GET["lid"]))
{
  $lid =$_GET["lid"];

  $search_location = "where location_id ='{$lid}'";
}
else{
  $search_location = "";

}


if(isset($_GET["cid"]))
{
  $cid =$_GET["cid"];

  $search_cat = "where category_id ='{$cid}'";
}
else{
  $search_cat = "";

}

if(isset($_POST["submit"]))
{
  $sprice =$_POST["start_price"];
  $eprice =$_POST["end_price"];

  $search_price = "where property_price between $sprice and $eprice";
}
else{
  $search_price = "";
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
         
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Property grid </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="space-ptb">
  <div class="container">
   
    <div class="row">
      <div class="col-lg-3 mb-5 mb-lg-0">
        <div class="sidebar">
          
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
              <h6>Filter</h6>
            </div>
            <form method="post" action="property-list.php">
              <div class="input-group mb-2">
                
                <input type="number" min="1" class="form-control" name="start_price" placeholder="Start Price" required>
              </div>
              <div class="input-group mb-2">
               
                <input type="number" min="1" class="form-control" name="end_price" id="inlineFormInputGroup" placeholder="End Price" required>
              </div>
              
              <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
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
              <img class="img-fluid" src="admin/property/<?php echo $row_property_1["pimage"];?>" style="width:70px;height:70px" alt="">
              <div class="recent-list-item-info">
                <a class="address mb-2" href="property-detail.php?pid=<?php echo $row_property_1["property_id"];?>"><?php echo $row_property_1["title"];?></a>
                <span class="text-primary">Rs.<?php echo $row_property_1["price"];?> </span>
              </div>
            </div>

            <?php } ?>

      
          </div>
        </div>
      </div>
      <div class="col-lg-9">

        <div class="row mt-4">
            <?php

        if(isset($_REQUEST['filter']))
							{
								$type=$_REQUEST['ptype'];
								$stype=$_REQUEST['stype'];
								$city=$_REQUEST['location123'];
								
								$sql="SELECT tbl_property.*, tbl_user.user_name FROM `tbl_property`,`tbl_user` WHERE tbl_property.user_id=tbl_user.user_id and category_id='{$type}' and stype='{$stype}' and location_id='{$city}'";
								$result=mysqli_query($connection,$sql);
							
								if(mysqli_num_rows($result)>0)
								{
									if($result == true)
									{
										while($row=mysqli_fetch_array($result))
										{
							?>
							 <div class="col-sm-6">
            <div class="property-item">
              <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" src="admin/property/<?php echo $row['pimage']; ?>" style="width:398px;height:240px;" alt="">
                
                </div>
                <div class="property-details">
                  <div class="property-details-inner">
                    <h5 class="property-title"><a href="property-detail.php?pid=<?php echo $row["property_id"]; ?>"><?php echo $row["title"]; ?> </a></h5>
                    
                    <div class="property-price"><?php echo $row["stype"]; ?></div>
                    <div class="property-price">₹<?php echo $row["price"]; ?></div>
                  
                  </div><div class="property-btn">
                  <a class="property-link" href="property-detail.php?pid=<?php echo $row["property_id"];?>">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <?php 
                    if(isset($_SESSION["userid"]))
                    {
                    ?>
                    <form method="post" action="add-wishlist.php">
                    <input type="hidden" name="property_id" value="<?php echo $row["property_id"];?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["userid"];?>">
                    <li class="property-favourites">
                    <button class="btn btn-primary" type="submit" name="submit"><i class="far fa-heart"></i></button>
                    </li>
                    </form>
                    <?php } else{ ?>
                    <li class="property-favourites">
                    <a data-toggle="tooltip" data-placement="top" title="Favourite" href="login.php"><i class="far fa-heart"></i></a> 
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <?php 		
										} 
					
									}
								}
								else {
									
									echo "<h1 class='mb-5'><center>No Property Available</center></h1>";
								}
									
							}

							?>
                            
                                             
        


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
