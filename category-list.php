<?php
include 'class/session-start.php';
include 'class/atclass.php';
include 'class/session-check.php';
$page_title = "Category";
$page= "category";
$list_link = $page."-list.php";
$add_link = $page."-add.php";
$table = "tbl_category";
$primary_key = "category_id";
$edit_link = $page."-edit.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>List <?php echo $page_title; ?> | <?php echo $project_title; ?></title>
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
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><?php echo $page_title; ?></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="<?php echo $home_page; ?>">Home</a></li>
                                    <li class="breadcrumb-item active">List <?php echo $page_title; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

       
                <section class="content">
                    <div class="row">
                        <div class="col-12">


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List <?php echo $page_title; ?></h3>
                                    <a href="<?php echo $add_link;?>" class="btn btn-primary float-right">Add <?php echo $page_title;?></a>
                                </div>
                   
                                <div class="card-body">
                                <div class="table-responsive">
                                
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Srno</th>
                                             
                                               <th>Category Name</th>
                                            
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_list = mysqli_query($connection, "select * from $table  order by $primary_key desc") or die(mysqli_error($connection));


                                            $x = 1;
                                            while ($row = mysqli_fetch_array($query_list)) {

                                                ?>

                                                <tr>

                                                    <td><?php echo $x++; ?></td>
                                                     <td><?php echo $row["category_name"];?></td>
                                                
                                                     
                                                   
                                                    <td><a href="<?php echo $edit_link;?>?eid=<?php echo  $row['category_id']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i></a>
                                                    <button class="btn btn-danger btn-xs delete_record" type="button" name="submit"  value="<?php echo  $row['category_id']; ?>"><i class="fa fa-trash"></i></button>
                                                    </td>
                                    
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                    
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php include 'themepart/footer.php'; ?>
        </div>

        <?php include 'themepart/footer-script.php'; ?>
      

<?php 
include 'class/datatable.php';
include 'class/delete-msg.php';
?>
    </body>
</html>
