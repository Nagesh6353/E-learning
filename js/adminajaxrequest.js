// Ajax Call for Admin Login Verification
function checkAdminLogin(){
    
    var adminLogEmail = $("#adminlogemail").val();
    var adminLogPass = $("#adminlogpass").val();
    $.ajax({
        url: 'Admin/admin.php',
        method: 'POST',
        data:{
            checkLogemail: "checklogmail",
            adminLogEmail:adminLogEmail,
            adminLogPass:adminLogPass,
        },
        success:function(data){
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }else if(data == 1){
                $("#statusAdminLogMsg").html('<small class="alert alert-success">Login Success !</small>');
                window.location.href = "Admin/adminDashboard.php";
            }
        }
    })
}

$(document).ready(function() {
    // Function to validate price input
    $('#course_price').on('keyup', function() {
      var price = $(this).val();
      if (price < 1) {
        $(this).val('');
        $("#msgp").html('<small class="alert alert-danger">Price cannot be Negative or Zero or Character form</small>');
      }else {
        $("#msgp").html('<small class="alert alert-success">Enter Price</small>');
      }
    });
  });
