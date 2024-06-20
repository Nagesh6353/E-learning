<!-- Start Including Header Section -->
<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
session_start();
?>
<!-- End Including Header Section -->

<!-- Start Courses Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/el1.jpg" alt="courses"
            style="height:550px; width:100%; object-fit: cover; box-shadow: 10px;" />
    </div>
</div>
<!-- End Courses Page Banner -->

<!-- Start Main Content -->
<div class="container mt-5">
    <?php 
       if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $query = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $con->query($query);
        $row = $result->fetch_assoc();
       }
    ?>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo str_replace('..', '.', $row['course_img']) ?>" alt="Python" class="card-img-top" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold;">Course Name:&nbsp;<?php echo $row['course_name']; ?></h5><br>
                <p class="card-text" style="font-weight: bold;">Description:&nbsp;<?php echo $row['course_desc']; ?></p>
                <p class="card-text" style="font-weight: bold;">Duration:&nbsp;<?php echo $row['course_duration']; ?></p>
                <form action="checkout.php" method="post">
                    <p class="card-text d-inline" style="font-weight: bold;">Price: <span class="font-weight-bolder"><i class="fa-solid fa-indian-rupee-sign"></i>&nbsp;<?php echo $row['course_price']; ?></span></p>
                    <input type="hidden" name="id" value="<?php echo $row['course_price']?>">
                    <button type="submit" class="btn btn-primary bt" name="buy" style="font-weight: bold;">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
            <?php
               $query = "SELECT * FROM lesson";
               $result = $con->query($query);
               if($result->num_rows > 0){
                $num = 0;
                while($row = $result->fetch_assoc()){
                    if($course_id == $row['course_id']){
                        $num++;
                  echo '<tr>
                    <th scope="row">'.$num.'</th>
                     <td>'. $row['lesson_name'] .'</td>
                </tr>';
                    }
                }
               }

            ?>
            
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Main Content -->

<!-- Start Including Footer Section -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End Including Footer Section -->