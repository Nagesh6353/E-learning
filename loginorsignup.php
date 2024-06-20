<?php 
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
?>
    <div class="container-fluid bg-dark"> <!-- Start Course Page Banner -->
      <div class="row">
        <img src="./image/el1.jpg" alt="courses" style="height:550px; width:100%; object-fit: cover; box-shadow: 10px;"/>
      </div> 
    </div><br><br> <!-- End Course Page Banner -->


    <div class="container jumbotron mb-5 bg-white">
     <div class="row">
      <div class="col-md-4">    
        <h5 class="mb-3">If Already Registered !! Login</h5>
       <form role="form" id="studLoginForm">
         <div class="form-group">
           <i class="fas fa-envelope"></i>&nbsp;&nbsp;<label for="studlogemail" class="pl-2" style="font-weight: bold;">Email</label><small id="statusLogMsg1"></small><br><input type="email"
               class="form-control" placeholder="Email" name="studlogemail" id="studlogemail" required >
           </div><br>
           <div class="form-group">
            <i class="fas fa-key"></i>&nbsp;&nbsp;<label for="studlogpass" class="pl-2" style="font-weight: bold;">Password</label><br><input type="password" class="form-control" placeholder="Password" name="studlogpass" id="studlogpass" maxlength="8" required >
         </div><br>
         <button type="button" class="btn btn-primary" id="studLoginBtn" onclick="checkStudLogin()" style="font-weight: bold;">Login</button>
       </form><br/>
       <small id="statusLogMsg"></small>
      </div>
      <div class="col-md-6 offset-md-1">
      <h5 class="mb-3">New User !! Sign Up</h5>
        <form role="form" id="studRegForm">
           <div class="form-group">
             <i class="fas fa-user"></i>&nbsp;&nbsp;<label for="studname" class="pl-2" style="font-weight: bold;">Name</label><small id="statusMsg1"></small><br><input type="text"
               class="form-control" placeholder="Name" name="studname" id="studname" required >
           </div><br>
           <div class="form-group">
           <i class="fas fa-envelope"></i>&nbsp;&nbsp;<label for="studemail" class="pl-2" style="font-weight: bold;">Email</label><small id="statusMsg2"></small><br><input type="email"
               class="form-control" placeholder="Email" name="studemail" id="studemail" required >
             <small class="form-text">We'll never share your email with anyone else.</small>
           </div><br>
           <div class="form-group">
             <i class="fas fa-key"></i>&nbsp;&nbsp;<label for="studpass" class="pl-2" style="font-weight: bold;">New
               Password</label><small id="statusMsg3"></small><br><input type="password" class="form-control" placeholder="Password" name="studpass" id="studpass" required maxlength="8" >
           </div><br>
           <button type="button" class="btn btn-primary" id="signup" onclick="addStud()" style="font-weight: bold;">Sign Up</button>
        </form> <br/>
        <small id="successMsg"></small>
      </div>
     </div>
    </div>
    <hr/>

<?php 
// Contact Us
include('./contact.php'); 
?> 

<?php 
  // Footer Include from mainInclude 
  include('./mainInclude/footer.php'); 
?> 