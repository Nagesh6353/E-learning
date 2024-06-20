<?php
include('./dbConnection.php');

if (isset($_POST['changebtn'])) {

    $email = $_POST['email'];
    $pass = $_POST['confirmPassword'];

    $query = "SELECT * FROM student WHERE stud_email='$email'";
    $result = $con->query($query);
    if ($result->num_rows == 1) {
        $query = "UPDATE student SET stud_pass = '$pass' WHERE stud_email = '$email'";
        if ($con->query($query) == TRUE) {
            // below msg display on form submit success
            echo '<div class="resmsg"> Password Reset Successfully </div>';
        } else {
            // below msg display on form submit failed
            echo '<div class="resmsge"> Unable Reset Password !</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: -100;
        }
        label{
            font-weight: bold;
        }
        .card {
            width: 400px;
            border: none;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            padding: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-control {
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .invalid-feedback {
            display: none;
            color: #dc3545;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .animated-bg {
            animation: gradient-animation 10s infinite;
        }

        .resmsg {
            margin-top: 50px;
            background-color: #28a745;
            width: 410px;
            margin-left: 555px;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        .resmsge{
            margin-top: 50px;
            background-color: rgb(255, 0, 0);
            width: 410px;
            margin-left: 555px;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        .link{
        text-decoration: none;
        margin-left: 110px;
       }


        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Change Password</h4>
            </div>
            <div class="card-body">
                <form id="changePasswordForm" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <small class="invalid-feedback">Please enter a valid email address.</small>
                    </div><br>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword"
                            placeholder="Enter your new password" maxlength="8">
                        <small class="invalid-feedback">Password must be at least 8 characters long.</small>
                    </div><br>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                            placeholder="Confirm your new password" maxlength="8" >
                        <small class="invalid-feedback">Passwords do not match.</small>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="changebtn">Change Password</button>
                </form><br>
                <a href="index.php" class="link">Back to Home</a>
            </div>
        </div>
    </div>

    <div class="animated-bg"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Jquery and Bootstrap Javascript -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#changePasswordForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    newPassword: {
                        required: true,
                        minlength: 8
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: '#newPassword'
                    }
                },
                messages: {
                    email: {
                        required: 'Please enter your email address',
                        email: 'Please enter a valid email address'
                    },
                    newPassword: {
                        required: 'Please enter a new password',
                        minlength: 'Password must be at least 8 characters long'
                    },
                    confirmPassword: {
                        required: 'Please confirm your new password',
                        equalTo: 'Passwords do not match'
                    }
                },
                errorElement: 'small',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    $(element).closest('.form-group').find('.invalid-feedback').show();
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).closest('.form-group').find('.invalid-feedback').hide();
                }
            });
        });
    </script>
</body>

</html>