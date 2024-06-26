<?php 

include 'admin/class/session-start.php';
include 'admin/class/atclass.php';
if (isset($_POST['submit'])) {
    $wishlist_id = mysqli_real_escape_string($connection, $_POST['wishlist_id']);
    $query_check = mysqli_query($connection, "DELETE FROM `tbl_wishlist` WHERE `wishlist_id`='{$wishlist_id}'") or die(mysqli_error($connection));
    if ($query_check) {
    
        redirect("my-wishlist.php?success=1&msg=Your Property Deleted To Wishlist");
            
      } else {
      
        redirect("my-wishlist.php?success=1&msg=Your Record Not Deleted");
           
      }
    }
?>