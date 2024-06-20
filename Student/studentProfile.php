<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Student Profile');
define('PAGE', 'profile');

include('./studInclude/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $studEmail = $_SESSION['studLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

 $sql = "SELECT * FROM student WHERE stud_email='$studEmail'";
 $result = $con->query($sql);
 if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 $studId = $row["stud_id"];
 $studName = $row["stud_name"]; 
 $studImg = $row["stud_img"];

}

 if(isset($_REQUEST['updateStudNameBtn'])){
  if(($_REQUEST['studName'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $studName = $_REQUEST["studName"];
   $stud_image = $_FILES['studImg']['name']; 
   $stud_image_temp = $_FILES['studImg']['tmp_name'];
   $img_folder = '../image/stud/'. $stud_image; 
   move_uploaded_file($stud_image_temp, $img_folder);
   $query = "UPDATE student SET stud_name = '$studName', stud_img = '$img_folder' WHERE stud_email = '$studEmail'";
   if($con->query($query) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
 }

?>
 <div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="studId" style="font-weight: bold;">Student ID</label>
      <input type="text" class="form-control" id="studId" name="studId" value=" <?php if(isset($studId)) {echo $studId;} ?>" readonly>
    </div><br>
    <div class="form-group">
      <label for="studEmail" style="font-weight: bold;">Email</label>
      <input type="email" class="form-control" id="studEmail" value=" <?php echo $studEmail ?>" readonly>
    </div><br>
    <div class="form-group">
      <label for="studName" style="font-weight: bold;">Name</label>
      <input type="text" class="form-control" id="studName" name="studName" value=" <?php if(isset($studName)) {echo $studName;} ?>">
    </div><br>
    <div class="form-group">
      <label for="studImg" style="font-weight: bold;">Upload Image</label>
      <input type="file" class="form-control-file" id="studImg" name="studImg">
    </div><br>
    <button type="submit" class="btn btn-primary" name="updateStudNameBtn">Update</button>
    <?php if(isset($passmsg)) {echo $passmsg; } ?>
  </form>
 </div>

 </div> <!-- Close Row Div from header file -->

 <?php
include('./studInclude/footer.php'); 
?>