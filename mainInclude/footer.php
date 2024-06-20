<!-- Start Footer -->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2024 || Designed By E-Learning || <a href="#login" data-bs-toggle="modal"
            data-bs-target="#adminLoginModalCenter">Admin Login</a></small>
</footer>
<!-- End Footer -->

<!-- Start Student Registration Form Using Bootstrap Modal -->
<!-- Modal -->
<div class="modal fade" id="studRegModalCenter" tabindex="-1" aria-labelledby="studRegModalCenterLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="studRegModalCenterLabel" style="font-weight:bold; color:red;">Student
                    Registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- including Student Registration Form -->
                <?php include('studentRegistration.php'); ?>
                <!-- End Student Registration Form -->
            </div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="button" class="btn btn-primary" id="studRegisterBtn" onclick="addStud()">Register</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Student Registration Form Using Bootstrap Modal -->

<!-- Start Student Login Form Using Bootstrap Modal -->
<!-- Modal -->
<div class="modal fade" id="studLoginModalCenter" tabindex="-1" aria-labelledby="studLoginModalCenterLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="studLoginModalCenterLabel" style="font-weight:bold; color:red;">Student
                    Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start Student Login Form -->
                <form class="form-group" method="post" id="studLoginForm">
                    <i class="fas fa-envelope"></i><label for="studlogemail"
                        style="font-weight:bold; margin-left: 10px; font-size: 18px;">Email</label><input type="email"
                        class="form-control" placeholder="Enter Email" name="studlogemail" id="studlogemail" required /><br>
                    <i class="fas fa-key"></i><label for="studlogpass"
                        style="font-weight:bold; margin-left: 10px; font-size: 18px;">Password</label><input
                        type="password" class="form-control" placeholder="Enter Password" name="studlogpass"
                        id="studlogpass" required maxlength="8" /><br>
                        <a href="resetpasslink.php" style="text-decoration: none;" >Forgot Password !</a> 
                </form><!-- End Student Login Form -->
            </div>
            <div class="modal-footer">
                <small id="statusLogMsg"></small>
                <button type="button" class="btn btn-primary" id="studLoginBtn"
                    onclick="checkStudLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Student Login Form Using Bootstrap Modal -->


<!-- Start Admin Login Form Using Bootstrap Modal -->
<!-- Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenterLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="adminLoginModalCenterLabel" style="font-weight:bold; color:red;">Admin
                    Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Start Admin Login Form -->
                <form id="adminlogin">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="adminlogemail"
                            style="font-weight:bold; margin-left: 10px; font-size: 18px;">Email</label><input
                            type="email" class="form-control" placeholder="Enter Email" name="adminlogemail"
                            id="adminlogemail" required />
                        <i class="fas fa-key"></i><label for="adminlogpass"
                            style="font-weight:bold; margin-left: 10px; font-size: 18px;">Password</label><input
                            type="password" class="form-control" placeholder="Enter Password" name="adminlogpass"
                            id="adminlogpass" required maxlength="9" />

                    </div>
                </form>
                <!-- End Admin Login Form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="adminloginBtn"
                        onclick="checkAdminLogin()">Login</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Jquery and Bootstrap Javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome Js -->
<script src="js/all.min.js"></script>



<!-- Start Student Ajax Call Javascript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>
<!-- End Student Ajax Call Javascript -->

<!-- Start Admin Ajax Call Javascript -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
<!-- End Admin Ajax Call Javascript -->

<!-- Index Page 3d Carousel materialize cdn js Link -->
<script src="script.js"></script>

<!-- SwiperJS Javascript CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Student Testimonial Owl Slider JS  -->
<script type="text/javascript" src="js/owl.min.js"></script>
<script type="text/javascript" src="js/testyslider.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        }
    });

</script>


<script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  <!-- End Initialize Swiper -->

</body>

</html>