<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Change Password');
define('PAGE', 'studentChangePass');
include('./studInclude/header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $studEmail = $_SESSION['studLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

 if(isset($_REQUEST['studPassUpdateBtn'])){
  if(($_REQUEST['studNewPass'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $query = "SELECT * FROM student WHERE stud_email='$studEmail'";
    $result = $con->query($query);
    if($result->num_rows == 1){
     $studPass = $_REQUEST['studNewPass'];
     $query = "UPDATE student SET stud_pass = '$studPass' WHERE stud_email = '$studEmail'";
      if($con->query($query) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
}

?>

<div class="col-sm-9 col-md-10">
  <div class="row">
    <div class="col-sm-6">
      <form class="mt-5 mx-5" method="POST">
        <div class="form-group">
          <label for="inputEmail" style="font-weight:bold;">Email</label>
          <input type="email" class="form-control" id="inputEmail" value=" <?php echo $studEmail ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputnewpassword" style="font-weight:bold;">New Password</label>
          <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="studNewPass">
        </div>
        <button type="submit" class="btn btn-primary mr-4 mt-4" name="studPassUpdateBtn" style="font-weight:bold;">Update</button>
        <button type="reset" class="btn btn-secondary mt-4" style="font-weight:bold;">Reset</button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
      </form>

    </div>

  </div>
</div>

 </div> <!-- Close Row Div from header file -->

<?php
include('./studInclude/footer.php'); 
?>