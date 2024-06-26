<?php 
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';

$msg="";
if(isset($_POST['add']))
{
	$pid=$_REQUEST['id'];
	$title=$_POST['title'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$uid=$_SESSION['userid'];
	$price=$_POST['price'];
	$location_id=$_POST['location123'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	
	$feature=$_POST['feature'];
	
	


	
	
	$sql = "UPDATE tbl_property SET title= '{$title}', category_id='{$ptype}', bhk='{$bhk}', stype='{$stype}',
	badroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}',
	size='{$asize}', price='{$price}', location='{$loc}', location_id='{$location_id}', state='{$state}',user_id='{$uid}', feature='{$feature}', status='{$status}' WHERE property_id = '{$pid}'";
	
	$result=mysqli_query($connection,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
}						
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">


<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css11/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css11/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css11/layerslider.css">
<link rel="stylesheet" type="text/css" href="css11/color.css">
<link rel="stylesheet" type="text/css" href="css11/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css11/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts11/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css11/style.css">
<link rel="stylesheet" type="text/css" href="css11/login.css">


	<?php include 'themepart/header-script.php' ?>
<title>Real Estate PHP</title>

</head>
<body>


<?php include 'themepart/header.php'; ?>
<div id="page-wrapper">
    <div class="row"> 
       
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Update Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($connection,"select * from tbl_property where property_id='$pid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
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
															<option value="rent">Rent</option>
															<option value="sale">Sale</option>
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
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												
													<?php echo $row['13']; ?>
												
											</textarea>
											</div>
										</div>
												
										<h5 class="text-secondary"> Status</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												
											
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

										
											<input type="submit" value="Submit" class="btn btn-success"name="add" style="margin-left:200px;">
										
									</div>
								</form>
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>
	
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        
    </div>
</div>
<script src="js1/jquery.min.js"></script> 
<script src="js1/tinymce/tinymce.min.js"></script>
<script src="js1/tinymce/init-tinymce.min.js"></script>
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