<!-- Start Including Header Section -->
<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
?>
<!-- End Including Header Section -->

<!-- Start Courses Page Banner -->
<div class="container-fluid">
    <!-- Swiper -->
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="image/carousel/angularjs.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="image/carousel/Data-Science.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="image/carousel/c.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="image/carousel/reactjs.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="image/carousel/python.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="image/carousel/html.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
            <div class="swiper-slide">
                <img src="image/carousel/ajax.jpg" style="height:500px;" class="w-100 d-block" />
            </div>
        </div>

    </div>

    <!-- Swiper JS -->
</div>


<!-- End Courses Page Banner -->

<!-- Start All Courses Section -->

<div class="container mt-4">
    <h1 class="text-center">All Courses</h1>
    <!-- Start All Course 1st Card row -->
    <div class="row">
        <!-- First Card -->
        <?php
        $query = "SELECT * FROM course";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '<div class="col-md-3">
            <div class="card-deck">
               
                        <a href="coursedetail.php?course_id='. $course_id .'" class="btn" style="text-align:left; padding:0px; margin:0px;">
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
</div>
<!-- End All Course Section -->

<!-- Start Including Footer Section -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End Including Footer Section -->