<!-- Start Including Header Section -->
<?php
include('./dbConnection.php');
include('./mainInclude/header.php');

if (!isset($_SESSION['studLogEmail'])) {
  echo "<script> location.href = 'loginorsignup.php'</script>";
} else {
  $studEmail = $_SESSION['studLogEmail'];
}
?>

<!-- Media print css  -->
<style>
  .aalt{
    font-weight: bold;
    font-size: 30px;
    margin-left: 580px;
   
  }
  @media print{
    .navbar, .alt{
        display: none;
    }
    .container-fluid{
      display: none;
    }
    .container-fluid{
      display: none;
    }
    .text-center, .offset-sm-4, .offset-sm-1, .btn, .contact{
      display: none;
    }
}
</style>

<!-- Start Courses Page Banner -->
<div class="container-fluid bg-dark">
  <div class="row">
    <img src="./image/el1.jpg" alt="e-learning"
      style="height:550px; width:100%; object-fit: cover; box-shadow: 10px;" />
  </div>
</div>
<!-- End Courses Page Banner -->

<!-- Start Main Content -->
<div class="container">
  <h2 class="text-center my-4">Payment Status</h2>
  <form action="" method="post">
    <div class="form-group pg">
      <label class="offset-sm-4 col-form-label" style="font-weight:bold;">Order ID:</label>
      <div>
        <input type="text" class="offset-sm-1 form-control psearch" name="checkid">
      </div>
      <div>
        <input type="submit" class="btn btn-primary offset-sm-6" value="View" name="submit">
      </div>
    </div>
  </form>
</div>
<?php
$flag=true;
if (isset($_POST['submit'])) {
  $query = "SELECT * FROM courseorder";
  $result = $con->query($query);
  while ($row = $result->fetch_assoc()) {
    if ($_REQUEST['checkid'] == $row['order_id'] && $_SESSION['studLogEmail'] == $row['stud_email']) { 
      $flag=false;
      ?>
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header" style="font-weight: bold; font-size: 20px;">
                Payment Receipt
              </div>
              <div class="card-body">

                <p><span style="font-weight: bold;">Email ID:</span>&nbsp;&nbsp;
                  <?php echo $row['stud_email']; ?>
                </p>
    
    
               <p><span style="font-weight: bold;">Course ID:</span>&nbsp;&nbsp;
                  <?php echo $row['course_id']; ?>
                </p>
                <p><span style="font-weight: bold;">Order ID:</span>&nbsp;&nbsp;
                  <?php echo $row['order_id']; ?>
                </p>
                <p><span style="font-weight: bold;">Transaction ID:</span>&nbsp;&nbsp;
                  <?php echo $row['txn_id']; ?>
                </p>
                <p><span style="font-weight: bold;">Amount:</span>&nbsp;&nbsp;
                  <?php echo $row['txn_amount']; ?>
                </p>
                <p><span style="font-weight: bold;">Status:</span>&nbsp;&nbsp;Success</p>
                <button class="btn btn-primary" onclick="getprint();">Print Receipt</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php
    }
  }
    if($flag)
    {
      echo '<div class="aalt">No Transaction Found !</div>';
    }
  
}

?>
<!-- End Main Content -->

<!-- Start Including Contact US -->

<?php
include('./contact.php');
?>

<!-- End Including Contact US -->

<!-- Start Including Footer Section -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End Including Footer Section -->
<script>
  function getprint(){
    window.print();
  }
</script>