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
?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID :</label> 
            <input type="text" class="offset-sm-1 form-control" id="checkid" name="checkid" style="width: 250px; margin-left: 130px; margin-top: -30px;">
        </div>
        <button class="btn btn-danger" type="submit" style="margin-left: 395px; margin-top: -66px;">Search</button>
    </form>

    <?php 

        $query = "SELECT course_id FROM course";
        $result = $con->query($query);
        while($row = $result->fetch_assoc()){
            if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
                $query = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}"; 
                $result = $con->query($query);
                $row = $result->fetch_assoc();
               if(($row['course_id']) == $_REQUEST['checkid']){
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];

                ?>
                <h3 class="mt-3 bg-dark text-white p-2">Course ID: <?php if(isset($row['course_id'])){
                    echo $row['course_id']; } ?> &nbsp; Course Name: <?php if(isset($row['course_name'])){
                        echo $row['course_name']; } ?> </h3>
              <?php 
                $query = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
                $result = $con->query($query);
               echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Lesson ID</th>
                        <th scope="col">Lesson Name</th>
                        <th scope="col">Lesson Link</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
                     while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['lesson_id'] . '</th>';
                        echo '<td>' . $row['lesson_name'] . '</td>';
                        echo '<td>' . $row['lesson_link'] . '</td>';
                        echo '<td>
                        <form action="editlesson.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='. $row["lesson_id"].'>
                        <button 
                           type="submit" 
                           class="btn btn-info mr-3" 
                           name="view" 
                           value="View">
                           <i class="fas fa-pen"></i>
                        </button> &nbsp;</form>
    
                        <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value='. $row["lesson_id"].'>
                        <button 
                           type="submit" 
                           class="btn btn-danger" 
                           name="delete" 
                           value="Delete">
                           <i class="fas fa-trash-alt"></i>
                        </button></form>
                        </td>
                        </tr>';
                    } 
                   echo '</tbody>
            </table>';
               } else{
                 echo '<div class="alert alert-dark mt-4" role="alert">Course Not Found ! </div>';
               }
               if(isset($_REQUEST['delete'])){
                $query = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
                if($con->query($query) === TRUE){
                    // echo '<div class="alert alert-success col-sm-6 ml-5 mt-2">Record Deleted Successfully</div>';
                    // below code will refresh the page after deleting the record
                  echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                } else{
                    echo "Unable to Delete Data";
                }
               }
            }
        }

    ?>
</div>
<?php
if(isset($_SESSION['course_id'])){
    echo '<div>
    <a class="btn btn-success box" href="./addLesson.php"><i class="fas fa-plus fa-2x"></i></a>
</div>';
}

?>


<!-- Start Admin Footer Section Including -->
<?php
include('./admininclude/footer.php');
?>
<!-- End Admin Footer Section Including -->