<?php 
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
							
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

<!--	Css Link -->
<link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css1/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css1/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css1/layerslider.css">
<link rel="stylesheet" type="text/css" href="css1/color.css">
<link rel="stylesheet" type="text/css" href="css1/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css1/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts1/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css1/style.css">
<link rel="stylesheet" type="text/css" href="css1/login.css">

<!--	Title -->
<title>Real Estate PHP</title>
<?php include 'themepart/header-script.php';?>
</head>
<body>

<?php include 'themepart/header.php';?>


<div id="page-wrapper">
    <div class="row"> 
      
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Seller Listed Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Seller Listed Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Seller Listed Property</h2>
							<?php 
								if(isset($_GET['msg']))	
								echo $_GET['msg'];	
							?>
                        </div>
					</div>
					<table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">Properties</th>
                                <th class="text-white font-weight-bolder">Price</th>
                                <th class="text-white font-weight-bolder">BHK</th>
                        
                                <th class="text-white font-weight-bolder">Requirement Type</th>
								<th class="text-white font-weight-bolder">Status</th>
                                <th class="text-white font-weight-bolder">Update</th>
								<th class="text-white font-weight-bolder">Delete</th>
                             </tr>
                        </thead>
                        <tbody>
						
							<?php 
							$uid=$_SESSION['userid'];
							$query=mysqli_query($connection,"SELECT * FROM `tbl_property` WHERE user_id='$uid'");
								while($row=mysqli_fetch_array($query))
								{
							?>
                            <tr>
                                <td>
									<img src="admin/property/<?php echo $row['14'];?>" alt="pimage">
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['title'];?></a></h5>
                                        <span class="font-14 text-capitalize"><i class="fas fa-map-marker-alt text-success font-13"></i>&nbsp; <?php echo $row['location'];?></span>
                                        <div class="price mt-3">
										</div>
                                    </div>
								</td>
                                <td>₹<?php echo $row['10'];?></td>
                                <td><?php echo $row['2'];?></td>
                                <td class="text-capitalize"><?php echo $row['3'];?></td>
                                <td><?php echo $row['22'];?></td>
                                <td><a class="btn btn-info" href="submitpropertyupdate.php?id=<?php echo $row['0'];?>">Update</a></td>
								<td><a class="btn btn-danger" href="submitpropertydelete.php?id=<?php echo $row['0'];?>">Delete</a></td>
                            </tr>
							<?php } ?>
							
                        </tbody>
                    </table>            
            </div>
        </div>
	
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        
    </div>
</div>
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