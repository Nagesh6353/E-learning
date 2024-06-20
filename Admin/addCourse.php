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

if (isset($_REQUEST['courseSubmitBtn'])) {
    // Cheking Empty Fields
    if (
        ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") ||
        ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") ||
        ($_REQUEST['course_price'] == "")
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">First Fill All The Fields !</div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_price = $_REQUEST['course_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../image/courseimg/' . $course_image;
        move_uploaded_file($course_image_temp, $img_folder);

        $query = "INSERT INTO course(course_name, course_desc, course_author, course_img, course_duration, course_price) VALUES('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price')";

        if ($con->query($query) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Succesfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add Course</div>';
        }
    }

}
?>



<div class="col-sm-6 mt-5 mx-3 jumbotron  bg-white">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name" style="font-weight: bold;">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div><br>
        <div class="form-group">
            <label for="course_desc" style="font-weight: bold;">Course Description</label>
            <textarea name="course_desc" id="course_desc" rows="2" class="form-control"></textarea>
        </div><br>
        <div class="form-group">
            <label for="course_author" style="font-weight: bold;">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author">
        </div><br>
        <div class="form-group">
            <label for="course_duration" style="font-weight: bold;">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration">
        </div><br>
        <div class="form-group">
            <label for="course_price" style="font-weight: bold;">Price</label>
            <input type="number" class="form-control" id="course_price" name="course_price"><br>
            <span id="msgp"></span>
        </div><br>
        <div class="form-group">
            <label for="course_img" style="font-weight: bold;">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div><br>
        <div class="text-center">
            <button class="btn btn-success" type="submit" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
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