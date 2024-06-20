<!-- Start Including Header Section -->
<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
?>
<!-- End Including Header Section -->

<!-- Start Home page background Section -->
<div class="container-fluid remove-vid-marg">
    <div class="vid-play">
        <video playsinline autoplay muted loop>
            <source src="video\istockphoto-1053952778-640_adpp_is.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h2 class="my-content">Welcome to E-Learning Platform</h2>
        <small class="my-content">Learn and Implement</small><br><br>
        <?php
        if (!isset($_SESSION['is_login'])) {
            echo '<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#studRegModalCenter">Get Started</a>';
        } else {
            echo '<a href="Student/studentProfile.php" class="btn btn-primary">My Profile</a>';
        }
        ?>


    </div>
</div>
<!-- End Home page background Section -->

<!-- Start Text Banner Section -->
<div class="container-fluid txt-banner backg">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open con"></i> Online Courses</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users con"></i>Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard con"></i>Lifetime Access</h5>
        </div>

    </div>
</div>
<!-- End Text Banner Section -->

<!-- Start Most Popular Course Section -->
<div class="container mt-4">
    <h1 class="text-center">Popular Course</h1><br>
<!-- image slider -->
 <?php
 include('./slider.php');
 ?>
<!-- image slider -->
<br>
<!-- image slider -->
<?php
 include('./sliderAndroid.php');
 ?>
<!-- image slider -->
    <!-- Start Most Popular Course 1st Card row -->
    <br><div class="row">
        <!-- First Card -->
        <?php
        $query = "SELECT * FROM course ORDER BY course_id ASC LIMIT 8, 4";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '<div class="col-md-3">
            <div class="card-deck">
               
                        <a href="coursedetail.php?course_id=' . $course_id . '" class="btn" style="text-align:left; padding:0px; margin:0px;">
                        <div class="card">
                            <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" style="width:302px; height:170px;" />
                            <div class="card-body">
                                <h5 class="card-title">' . $row['course_name'] . '</h5>
                                <span style="font-weight:bold;">Duration:</span><span class="card-text">&nbsp;' . $row['course_duration'] . '</span>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">Price: <span class="font-weight-bolder"><i
                                            class="fa-solid fa-indian-rupee-sign"></i>&nbsp;' . $row['course_price'] . '</span></p>
                                <a class="btn btn-primary bt" href="coursedetail.php?course_id=' . $course_id . '">Enroll</a>
                            </div>
                        </div>
                    </a>
               
            </div>
        </div>';
            }
        }
        ?>

    </div>
    <!-- Start Most Popular Course 2nd Card row -->
    <div class="row">
        <!-- First Card -->
        <?php
        $query = "SELECT * FROM course ORDER BY course_id DESC LIMIT 4";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '<div class="col-md-3">
            <div class="card-deck">
               
                        <a href="coursedetail.php?course_id=' . $course_id . '" class="btn" style="text-align:left; padding:0px; margin:0px;">
                        <div class="card">
                            <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" style="width:302px; height:170px;" />
                            <div class="card-body">
                                <h5 class="card-title">' . $row['course_name'] . '</h5>
                                <span style="font-weight:bold;">Duration:</span><span class="card-text">&nbsp;' . $row['course_duration'] . '</span>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">Price: <span class="font-weight-bolder"><i
                                            class="fa-solid fa-indian-rupee-sign"></i>&nbsp;' . $row['course_price'] . '</span></p>
                                <a class="btn btn-primary bt" href="coursedetail.php?course_id=' . $course_id . '">Enroll</a>
                            </div>
                        </div>
                    </a>
               
            </div>
        </div>';
            }
        }
        ?>
    </div>
    <!-- End Most Popular Course 2nd Card -->
    <div class="text-center m-4">
        <a href="courses.php" class="btn btn-warning btn-sm">View All Course</a>
    </div>
</div>
<!-- End Most Popular Course Section -->

<!-- Start Contact-Us Section -->
<?php
include('./contact.php');
?>
<!-- End Contact-Us Section -->

<!-- Start Students Feedback Testimonial -->
<div class="container-fluid mt-4" style="background-color: #191C27;" id="Feedback">
    <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
    <div class="row">
        <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                <?php
                $query = "SELECT s.stud_name, s.stud_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stud_id = f.stud_id";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $s_img = $row['stud_img'];
                        $n_img = str_replace('../', '', $s_img)
                            ?>
                        <div class="testimonial">
                            <p class="description">
                                <?php echo $row['f_content']; ?>
                            </p>
                            <div class="pic">
                                <img src="<?php echo $n_img; ?>" alt="" />
                            </div>
                            <div class="testimonial-prof">
                                <h4>
                                    <?php echo $row['stud_name']; ?>
                                </h4>

                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Students Testimonial -->

<!-- Start Social Follow Section -->
<div class="container-fluid  socbg">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a href="#" class="social text-white"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="col-sm">
            <a href="#" class="social text-white"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
        <div class="col-sm">
            <a href="#" class="social text-white"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
        <div class="col-sm">
            <a href="#" class="social text-white"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </div>
</div>
<!-- End Social Follow Section -->


<!-- Start Including About Us Section -->
<?php
include('./aboutus.php');
?>
<!-- End Including About Us Section -->

<!-- Start Including Footer Section -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End Including Footer Section -->


