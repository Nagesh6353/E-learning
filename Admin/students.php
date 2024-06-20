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


<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2 text-center" style="font-weight:bold; font-size:20px;">List of Students</p>
    <?php
    $query = "SELECT * FROM student";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['stud_id'] . '</th>';
                    echo '<td>' . $row['stud_name'] . '</td>';
                    echo '<td>' . $row['stud_email'] . '</td>';
                    echo '<td>';
                    echo '
                    <form action="editstudent.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='. $row["stud_id"].'>
                    <button 
                       type="submit" 
                       class="btn btn-info mr-3" 
                       name="view" 
                       value="View">
                       <i class="fas fa-pen"></i>
                    </button> &nbsp;</form>

                    <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='. $row["stud_id"].'>
                    <button 
                       type="submit" 
                       class="btn btn-danger" 
                       name="delete" 
                       value="Delete">
                       <i class="fas fa-trash-alt"></i>
                    </button></form>
                    </td>
                    </tr>';
                } ?>
            </tbody>
        </table>
    <?php } else {
        echo "0 result";
    }
    // Data Delete Query
    if (isset($_REQUEST['delete'])) {
        $query = "DELETE FROM student WHERE stud_id = {$_REQUEST['id']}";
        if ($con->query($query) == TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        } else {
            echo "Unable to Delete Data";
        }
    }


    ?>
</div>

<div>
    <a href="./addnewstudent.php" class="btn btn-success box"><i class="fas fa-plus fa-2x"></i></a>
</div>




<!-- Start Admin Footer Section Including -->
<?php
include('./admininclude/footer.php');
?>
<!-- End Admin Footer Section Including -->