<?php 
include_once('../dbConnection.php');
 if(!isset($_SESSION)){ 
   session_start(); 
 } 
 if(isset($_SESSION['is_login'])){
  $studLogEmail = $_SESSION['studLogEmail'];
 } 
 // else {
 //  echo "<script> location.href='../index.php'; </script>";
 // }
 if(isset($studLogEmail)){
  $query = "SELECT stud_img FROM student WHERE stud_email = '$studLogEmail'";
  $result = $con->query($query);
  $row = $result->fetch_assoc();
  $stud_img = $row['stud_img'];
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Profile</title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/studstyle.css">

</head>

<body>
 <!-- Top Navbar -->
 <nav class="navbar navbar-dark fixed-top shadow" style="background-color: #225470;">
  <a class="navbar-brand col-sm-3 col-md-2" href="studentProfile.php">E-Learning</a>
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5 " style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item mb-3">
      <img src="<?php echo $stud_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
      </li>
      <li class="nav-item bgi">
       <a class="nav-link <?php if(PAGE == 'profile') {echo 'active';} ?>" href="studentProfile.php">
        <i class="fas fa-user"></i>
        Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item bgi">
       <a class="nav-link <?php if(PAGE == 'mycourse') {echo 'active';} ?>" href="myCourse.php">
        <i class="fab fa-accessible-icon"></i>
        My Courses
       </a>
      </li>
      <li class="nav-item bgi">
       <a class="nav-link <?php if(PAGE == 'feedback') {echo 'active';} ?>" href="studfeedback.php">
        <i class="fab fa-accessible-icon"></i>
        Feedback
       </a>
      </li>
      <li class="nav-item bgi">
       <a class="nav-link <?php if(PAGE == 'studentChangePass') {echo 'active';} ?>" href="studentChangePass.php">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item bgi">
       <a class="nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>