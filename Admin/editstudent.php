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
if(isset($_REQUEST['newStudSubmitBtn'])){
    // cheking for empty fields
    if(($_REQUEST['stud_id'] == "") || ($_REQUEST['stud_name'] == "") ||
       ($_REQUEST['stud_pass'] == "")){
         
        // msg displayed if required fields missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">First Fill All The Fields !</div>';
       } else{
        $stdid = $_REQUEST['stud_id'];
        $stdname = $_REQUEST['stud_name'];
        $stdemail = $_REQUEST['stud_email'];
        $stdpass = $_REQUEST['stud_pass'];
       
        $query = "UPDATE student SET stud_id = '$stdid', stud_name = '$stdname', stud_email = '$stdemail', stud_pass = '$stdpass' WHERE stud_id = '$stdid'";
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
    

    <?php 
       if(isset($_REQUEST['view'])){
        $query = "SELECT * FROM student WHERE stud_id = {$_REQUEST['id']}";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
       }
    ?>

  <h3 class="text-center">Update Student Details</h3>
  <form action="" method="POST" enctype="multipart/form-data">
   <div class="form-group">
      <label for="Stud_id">Student ID</label>
      <input type="text" class="form-control" id="stud_id" name="stud_id" value="<?php if(isset($row['stud_id'])) {
        echo $row['stud_id']; } ?>" readonly>
   </div>
   <div class="form-group">
      <label for="Stud_name">Name</label>
      <input type="text" class="form-control" id="stud_name" name="stud_name" value="<?php if(isset($row['stud_name'])) {
        echo $row['stud_name']; } ?>">
    </div>
    <div class="form-group">
      <label for="Stud_email">Email</label>
      <input type="text" class="form-control" id="stud_email" name="stud_email" value="<?php if(isset($row['stud_email'])) {
        echo $row['stud_email']; } ?>">
    </div>
    <div class="form-group">
      <label for="Stud_pass">Password</label>
      <input type="text" class="form-control" id="stud_pass" name="stud_pass" value="<?php if(isset($row['stud_pass'])) {
        echo $row['stud_pass']; } ?>">
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