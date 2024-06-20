<?php
include('./dbConnection.php');
session_start();
if (!isset($_SESSION['studLogEmail'])) {
  echo "<script> location.href = 'loginorsignup.php'</script>";
} else {
  $studEmail = $_SESSION['studLogEmail'];
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- SwiperJS Css CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Checkout</title>
  </head>

  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-6 offset-sm-3 jumbotron">
          <h3 class="mb-5">Welcome to E-Learning Payment Page</h3>
          <form method="post" action="confirmpayment.php">
            <div class="form-group row">
              <label for="ORDER_ID" class="col-sm-4 col-form-label" style="font-weight:bold;">Order ID:</label>
              <div class="col-sm-8">
                <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                  autocomplete="off" value="<?php echo "ORDS" . rand(10000, 99999999);?>" readonly>
              </div>
            </div><br>
            <div class="form-group row">
              <label for="CUST_ID" class="col-sm-4 col-form-label" style="font-weight:bold;">Student Email:</label>
              <div class="col-sm-8">
                <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID"
                  autocomplete="off" value="<?php if (isset($studEmail)) {
                    echo $studEmail;
                  } ?>" readonly>
              </div>
            </div><br>
            <div class="form-group row">
              <label for="TXN_AMOUNT" class="col-sm-4 col-form-label" style="font-weight:bold;">Amount:</label>
              <div class="col-sm-8">
                <input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT"
                  value="<?php if (isset($_POST['id'])) {
                    echo $_POST['id'];
                  } ?>" readonly>
              </div>
            </div><br>

            <div class="text-center">
              <form action="checkout.php" method="post">
                <input type="hidden" name="id" value="<?php if (isset($_POST['id'])) {
                  echo $_POST['id'];
                } ?>">
                <input value="Pay Now" type="submit" class="btn btn-primary" onclick="" style="font-weight:bold;">
              </form>
              <a href="./courses.php" class="btn btn-secondary" style="font-weight:bold;">Cancel</a>
            </div><br>
          </form>
          <small class="form-text text-muted" style="font-weight:bold;">Note: Complete Your Payment by Clicking Pay Now Button</small>
        </div>
      </div>
    </div>
  </body>

  </html>

<?php }
?>
