<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
$page_title = "property";
$page= "property";
$list_link = $page."-list.php";
$add_link = $page."-add.php";
$table = "tbl_property";
$primary_key = "property_id";
$redirect_link = $page."-edit.php";
$editid = $_GET['eid'];
$error="";
$msg="";
if(isset($_POST['update']))
{
	$pid=$_REQUEST['eid'];
	$title=$_POST['title'];
	
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	
	$price=$_POST['price'];
	$location_id=$_POST['location123'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$feature=$_POST['feature'];
	$uid=$_POST['uid'];
	
	
	
	
	
	
	
	$sql = "UPDATE tbl_property SET title= '{$title}', category_id='{$ptype}', bhk='{$bhk}', stype='{$stype}',
	badroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}',
	size='{$asize}', price='{$price}', location='{$loc}', location_id='{$location_id}', state='{$state}', feature='{$feature}',user_id='{$uid}', status='{$status}' WHERE property_id ='{$pid}'";
	 $result=mysqli_query($connection,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property updated Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Something went wrong. Please try again</p>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | Property</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets1/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets1/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets1/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets1/css/style.css">
		
	
    <?php
        include 'themepart/header-script.php';
        ?>
    </head>
    <body>

			<?php
        include 'themepart/top-header.php';
        ?>
        <?php
        include 'themepart/sidebar.php';
        ?>
			
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Property</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Upadate Property</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Upadate Property Details</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
                <?php
									
									$pid=$_REQUEST['eid'];
									$query=mysqli_query($connection,"select * from tbl_property where property_id='$pid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
								
								<div class="description">
								
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required value="<?php echo $row['1']; ?>">
													</div>
												</div>
                        </div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Property Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="ptype" value="<?php echo $row_list['stype']; ?>">
														<option value="">Select Type</option>
															<?php 
                        $query_cat = mysqli_query($connection,"SELECT * FROM tbl_category")or die(mysqli_error($connection));
                        while($row_cat = mysqli_fetch_array($query_cat))
                        {
                        ?>
                        <option value="<?php echo $row_cat["category_id"];?>"><?php echo $row_cat["category_name"];?></option>
                        <?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Selling Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
															<option value="">Select Status</option>
															<option value="rent">rent</option>
															<option value="sale">sale</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required value="<?php echo $row['5']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required value="<?php echo $row['7']; ?>">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">BHK</label>
													<div class="col-lg-9">
														<select class="form-control" required name="bhk">
															<option value="">Select BHK</option>
															<option value="1 BHK">1 BHK</option>
															<option value="2 BHK">2 BHK</option>
															<option value="3 BHK">3 BHK</option>
															<option value="4 BHK">4 BHK</option>
															<option value="5 BHK">5 BHK</option>
									
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required value="<?php echo $row['4']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required value="<?php echo $row['6']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required value="<?php echo $row['8']; ?>">
													</div>
												</div>
												
											</div>
										</div>
										<h5 class="text-secondary">Price & Location</h5><hr>
										<div class="row">
											<div class="col-xl-6">
						
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required value="<?php echo $row['10']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
													<select class="form-control" name="location123" required>
															<option value="">Select Type</option>
															<?php 
                        $query_location = mysqli_query($connection,"SELECT * FROM tbl_location")or die(mysqli_error($connection));
                        while($row_location = mysqli_fetch_array($query_location))
                        {
                        ?>
                        <option value="<?php echo $row_location["location_id"];?>"><?php echo $row_location["location_name"];?></option>
                        <?php } ?></select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="state" required value="<?php echo $row['12']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required value="<?php echo $row['9']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required value="<?php echo $row['11']; ?>">
													</div>
												</div>
											</div>
											
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>                      								
                      <textarea class="tinymce form-control" name="feature" rows="10" cols="50" >                    
                      <?php echo $row['13']; ?>
											</textarea>
											</div>
                      
										</div>
												
										
                        <div class="form-group row">
													<label class="col-lg-3 col-form-label">Uid</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid" required value="<?php echo $row['19']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
														</select>
													</div>
												</div>

												</div>
											</div>
										</div>

										
                    <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                  <a href="<?php echo $list_link;?>" class="btn btn-info">View</a>

                </div>
									</div>
								</form>
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>

      <script src="assets1/js/jquery-3.2.1.min.js"></script>
		<script src="assets1/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets1/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets1/js/popper.min.js"></script>
        <script src="assets1/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets1/js/script.js"></script>
		
    </body>

</html>