<!-- Start Student Registration Form -->

<form class="form-group" method="post" id="studRegisterForm">

    <i class="fas fa-user"></i><label for="studname"
        style="font-weight:bold; margin-left: 10px; font-size: 18px;">Name</label> <small id="statusMsg1"></small><input type="text" class="form-control"
        placeholder="Enter Name" name="studname" id="studname" required /><br>
    <i class="fas fa-envelope"></i><label for="studemail"
        style="font-weight:bold; margin-left: 10px; font-size: 18px;">Email</label> <small id="statusMsg2"></small><input type="email"
        class="form-control" placeholder="Enter Email" name="studemail" id="studemail" required /><br>
    <i class="fas fa-key"></i><label for="studpass"
        style="font-weight:bold; margin-left: 10px; font-size: 18px;">Password</label> <small id="statusMsg3"></small><input type="password"
        class="form-control" placeholder="Enter Password" name="studpass" id="studpass" required maxlength="8" />

</form>
<!-- End Student Registration Form -->