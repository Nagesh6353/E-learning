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

if (isset($_REQUEST['newStudSubmitBtn'])) {
    // Cheking Empty Fields
    if (
        ($_REQUEST['stud_name'] == "") || ($_REQUEST['stud_email'] == "") ||
        ($_REQUEST['stud_pass'] == "")
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">First Fill All The Fields !</div>';
    } else {
        $stud_name = $_REQUEST['stud_name'];
        $stud_email = $_REQUEST['stud_email'];
        $stud_pass = $_REQUEST['stud_pass'];
       
        $query = "INSERT INTO student(stud_name, stud_email, stud_pass) VALUES('$stud_name', '$stud_email', '$stud_pass')";

        if ($con->query($query) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Succesfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add Student</div>';
        }
    }

}
?>



<div class="col-sm-6 mt-5  mx-3 jumbotron bg-white">
  <h3 class="text-center">Add New Student</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="Stud_name">Name</label>
      <input type="text" class="form-control" id="stud_name" name="stud_name">
    </div>
    <div class="form-group">
      <label for="Stud_email">Email</label>
      <input type="text" class="form-control" id="stud_email" name="stud_email">
    </div>
    <div class="form-group">
      <label for="Stud_pass">Password</label>
      <input type="text" class="form-control" id="stud_pass" name="stud_pass">
    </div>
    <br>
    <div class="text-center">
      <button type="submit" class="btn btn-success" id="newStudSubmitBtn" name="newStudSubmitBtn">Submit</button>
      <a href="students.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>



<!-- Start Admin Footer Section Including -->
<?php
include('./admininclude/footer.php');
?>
<!-- End Admin Footer Section Including -->