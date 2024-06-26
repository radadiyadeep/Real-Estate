<?php
include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
if (isset($_POST['submit'])) {
    $property_id = mysqli_real_escape_string($connection, $_POST['property_id']);
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
  
    $query_check = mysqli_query($connection, "select * from tbl_wishlist where property_id='{$property_id}' and user_id='{$user_id}'") or die(mysqli_error($connection));
  
  $count = mysqli_num_rows($query_check);
  
  if($count>0)
  {
    
    redirect("my-wishlist.php?success=1&msg=Property Already Exist ");
    
  }
  else{
  
    
    $queryins = mysqli_query($connection, "insert into tbl_wishlist(`property_id`,`user_id`) VALUES ('{$property_id}','{$user_id}')") or die(mysqli_error($connection));
  
    if ($queryins) {
    
      redirect("my-wishlist.php?success=1&msg=Your Property Added To Wishlist");
          
    } else {
    
      redirect("my-wishlist.php?success=1&msg=Your Record Not Inserted");
         
    }
  }
  }
?>