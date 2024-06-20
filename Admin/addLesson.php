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

if (isset($_REQUEST['lessonSubmitBtn'])) {
    // Cheking Empty Fields
    if (
        ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") ||
        ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
            // msg displayed if required fields missing
             $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">First Fill All The Fields !</div>';
    } else {
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $link_folder = '../lessonvid/'.$lesson_link;
        move_uploaded_file($lesson_link_temp, $link_folder);

        $query = "INSERT INTO lesson(lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES('$lesson_name', '$lesson_desc', '$link_folder', '$course_id', '$course_name')";

        if ($con->query($query) == TRUE) {
            // below msg display on form submit success
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Succesfully</div>';
        } else {
            // below msg display on form submit failed
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add Lesson</div>';
        }
    }

}
?>



<div class="col-sm-6 mt-5 mx-3 jumbotron  bg-white">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
        </div><br>  
       <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
        </div><br>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div><br>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc" row="2" class="form-control"></textarea>
        </div><br>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div><br>
        <div class="text-center">
            <button class="btn btn-success" type="submit" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
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