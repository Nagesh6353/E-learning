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
    if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") ||
       ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || 
       ($_REQUEST['course_name'] == "")){
         
        // msg displayed if required fields missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">First Fill All The Fields !</div>';
       } else{
        $lid = $_REQUEST['lesson_id'];
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $llink = '../lessonvid/'. $_FILES['lesson_link']['name'];

        $query = "UPDATE lesson SET lesson_id = '$lid', lesson_name = '$lname', lesson_desc = '$ldesc', course_id = '$cid', course_name = '$cname', lesson_link = '$llink'  WHERE lesson_id = '$lid'";
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
    <h3 class="text-center">Update Lesson Details</h3>

    <?php 
       if(isset($_REQUEST['view'])){
        $query = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
       }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if(isset($row['lesson_id'])){
                echo $row['lesson_id'];
            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){
                echo $row['lesson_name'];
            } ?>">
        </div><br>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc" rows="2" class="form-control"><?php if(isset($row['lesson_desc'])){
                echo $row['lesson_desc'];
            } ?></textarea>
        </div><br>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])){
                echo $row['course_id'];
            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){
                echo $row['course_name'];
            } ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])) {echo $row['lesson_link']; } ?>" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div><br>
        <div class="text-center">
            <button class="btn btn-success" type="submit" id="requpdate" name="requpdate">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
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