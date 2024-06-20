<?php
include('./dbConnection.php');
session_start();
if (!isset($_SESSION['studLogEmail'])) {
  echo "<script> location.href = 'loginorsignup.php'</script>";
} else {
  $studEmail = $_SESSION['studLogEmail'];
}

if(isset($_SESSION['studLogEmail'])){
    $stud_email = $_SESSION['studLogEmail'];
    $cid = $_SESSION['course_id'];
    $ord_id = $_POST['ORDER_ID'];
    $txn_id = $_POST['TXN_ID'];
    $txn_amount = $_POST['TXN_AMOUNT'];
    $query = "INSERT INTO courseorder(txn_id, order_id, txn_amount, stud_email, course_id) VALUES('$txn_id', '$ord_id', '$txn_amount', '$stud_email', '$cid')";
    if ($con->query($query) == TRUE) {
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Payment Successful..</div>';
    } else {
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Payment Failed !</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Response</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="post" >
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header" style="font-weight: bold; font-size: 20px; ">
            Payment Status
          </div>
          <div class="card-body">
            <h5 class="card-title">Payment Successful</h5>
            <p class="card-text">Thank you for your payment. Your transaction was successful.</p>
            <p><span style="font-weight: bold;">Email ID:</span>&nbsp;&nbsp;<?php echo $_SESSION['studLogEmail'];?></p>
            <p><span style="font-weight: bold;">Course ID:</span>&nbsp;&nbsp;<?php echo $_SESSION['course_id'];?></p>
            <p><span style="font-weight: bold;">Order ID:</span>&nbsp;&nbsp;<?php echo $_POST['ORDER_ID'];?></p>
            <input type="hidden" name="ORDER_ID" value="<?php echo $_POST['ORDER_ID'];?>" >
            <p><span style="font-weight: bold;">Transaction ID:</span>&nbsp;&nbsp;<?php echo $_POST['TXN_ID'];?></p>
            <p><span style="font-weight: bold;">Amount:</span>&nbsp;&nbsp;<?php echo $_POST['TXN_AMOUNT'];?></p>
            <p><span style="font-weight: bold;">Status:</span>&nbsp;&nbsp;Success</p>
            <a href="index.php" class="btn btn-primary">Return to Home</a><br><br>
            <small class="text-success" style="font-weight: bold; font-size: 20px; ">Please Note or Remember The Order ID For Check Your Payment Status </small>
          </div>
        </div>
      </div>
    </div>
  </div>
    </form>
  <!-- Jquery and Bootstrap Javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome Js -->
<script src="js/all.min.js"></script>

</body>
</html>




