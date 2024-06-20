<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');

// Checking Email Already Registered
if(isset($_POST['checkemail']) && isset( $_POST['semail'])){
    $studemail = $_POST['semail'];
    $query = "SELECT stud_email FROM student WHERE stud_email = '".$studemail."'";
    $result = $con->query($query);
    $row = $result->num_rows;
    echo json_encode($row);

}


// Student Insert 
if (isset($_POST['sregister']) && isset($_POST['sname']) && isset($_POST['semail']) && isset($_POST['spass'])) {
    $studname = $_POST['sname'];
    $studemail = $_POST['semail'];
    $studpass = $_POST['spass'];

    $query = "INSERT INTO student(stud_name, stud_email, stud_pass) VALUES('$studname', '$studemail', '$studpass')";
    
    if($con->query($query) == TRUE) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }

}

if(!isset($_SESSION['is_login'])){
// Student Login Verification
if (isset($_POST["checkLogemail"]) && isset($_POST["studLogEmail"]) && isset($_POST["studLogPass"])){
    $studLogEmail = $_POST["studLogEmail"];
    $studLogPass = $_POST["studLogPass"];

    $query = "SELECT stud_email, stud_pass FROM student WHERE stud_email='".$studLogEmail."' AND stud_pass='".$studLogPass."'";
    $result = $con->query($query);
    $row = $result->num_rows;

    if($row === 1){
        $_SESSION['is_login'] = true;
        $_SESSION['studLogEmail'] = $studLogEmail;
        echo json_encode($row);
    }else if($row === 0){
        echo json_encode($row);
    }
}
}
?>