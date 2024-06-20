<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Sell Report');
define('PAGE', 'sellreport');
include('./admininclude/header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>

<style>
  @media print{
    .navbar{
      display: none;
    }
    .col-sm-3, .btn{
      display: none;
    }
  }
</style>

  <div class="col-sm-9 mt-5">
      <!--<form action="" method="POST" class="d-print-none">
        <div class="form-row">
          <div class="form-group col-md-2">
            <input type="date" class="form-control" id="startdate" name="startdate">
          </div> <span> to </span>
          <div class="form-group col-md-2">
            <input type="date" class="form-control" id="enddate" name="enddate">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
          </div>
        </div>
      </form>-->
      <?php
    if(isset($_SESSION['is_admin_login'])){
       
        // $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '2024-3-11' AND '2024-3-13'";
        $sql = "SELECT * FROM courseorder";
        $result = $con->query($sql);
        if($result->num_rows > 0){
        echo '
      <p class=" bg-dark text-white p-2 mt-4">Details</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Course ID</th>
            <th scope="col">Student Email</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>
           
            <td>'.$row["course_id"].'</td>
            <td>'.$row["stud_email"].'</td>
            <td>'.$row["txn_amount"].'</td>
          </tr>';
        }
        echo '<tr>
        <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
      </tr></tbody>
      </table>';
      } else {
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
      }
    }
      ?>
        </div>
        </div>
  </div>
 
 
  </div>  <!-- div Row close from header -->
 </div>  <!-- div Conatiner-fluid close from header -->
<?php
include('./admininclude/footer.php'); 
?>