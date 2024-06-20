<!-- Start Admin Header section Including -->
<?php
if(!isset($_SESSION)){
    session_start();
}
include('./admininclude/header.php');

// Start Including DB Connection file
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
} else{
    echo "<script> location.href='../index.php'; </script>";
}

// Data Update
if(isset($_REQUEST['requpdate'])){
    // cheking for empty fields
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") ||
       ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || 
       ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "")){
         
        // msg displayed if required fields missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">First Fill All The Fields !</div>';
       } else{
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $cimg = '../image/courseimg/'. $_FILES['course_img']['name'];

        $query = "UPDATE course SET course_id = '$cid', course_name = '$cname', course_desc = '$cdesc', course_author = '$cauthor', course_duration = '$cduration', course_price = '$cprice', course_img = '$cimg' WHERE course_id = '$cid'";
        if($con->query($query) == TRUE){
            // below msg display on form submit success
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Succesfully </div>';
        } else{
            // below msg display on form submit failed
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
       }
}


?>

<div class="col-sm-6 mt-5 mx-3 jumbotron  bg-white">
    <h3 class="text-center">Update Course Details</h3>

    <?php 
       if(isset($_REQUEST['view'])){
        $query = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
       }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="course_id" style="font-weight: bold;">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){
                echo $row['course_id'];
            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name" style="font-weight: bold;">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){
                echo $row['course_name'];
            } ?>">
        </div><br>
        <div class="form-group">
            <label for="course_desc" style="font-weight: bold;">Course Description</label>
            <textarea name="course_desc" id="course_desc" rows="2" class="form-control"><?php if(isset($row['course_desc'])){
                echo $row['course_desc'];
            } ?></textarea>
        </div><br>
        <div class="form-group">
            <label for="course_author" style="font-weight: bold;">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])){
                echo $row['course_author'];
            } ?>">
        </div><br>
        <div class="form-group">
            <label for="course_duration" style="font-weight: bold;">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])){
                echo $row['course_duration'];
            } ?>">
        </div><br>
        <div class="form-group">
            <label for="course_price" style="font-weight: bold;">Price</label>
            <input type="number" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])){
                echo $row['course_price'];
            } ?>"><br>
            <span id="msgp"></span>
        </div><br>
        <div class="form-group">
            <label for="course_img" style="font-weight: bold;">Course Image</label>
            <img src="<?php if(isset($row['course_img'])){
                echo $row['course_img'];
            } ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div><br>
        <div class="text-center">
            <button class="btn btn-success" type="submit" id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <br>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

    </form>

</div>




<!-- Start Admin Footer Section Including -->
<?php
include('./admininclude/footer.php');
?>
<!-- End Admin Footer Section Including -->