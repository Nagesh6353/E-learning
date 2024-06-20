<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
include('./studInclude/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $studEmail = $_SESSION['studLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

 $query = "SELECT * FROM student WHERE stud_email='$studEmail'";
 $result = $con->query($query);
 if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 $studId = $row["stud_id"];
}

 if(isset($_REQUEST['submitFeedbackBtn'])){
  if(($_REQUEST['f_content'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $fcontent = $_REQUEST["f_content"];
   $query = "INSERT INTO feedback (f_content, stud_id) VALUES ('$fcontent', '$studId')";
   if($con->query($query) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submitted Successfully </div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit </div>';
      }
    }
 }

?>
 <div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="studId" style="font-weight:bold;">Student ID</label>
      <input type="text" class="form-control" id="studId" name="studId" value=" <?php if(isset($studId)) {echo $studId;} ?>" readonly>
    </div><br>
    <div class="form-group">
      <label for="f_content" style="font-weight:bold;">Write Feedback:</label>
      <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
    </div><br>
    <button type="submit" class="btn btn-primary" name="submitFeedbackBtn" style="font-weight:bold;">Submit</button>
    <?php if(isset($passmsg)) {echo $passmsg; } ?>
  </form>
 </div>

 </div> <!-- Close Row Div from header file -->

 <?php
include('./studInclude/footer.php'); 
?>