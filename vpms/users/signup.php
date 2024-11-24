<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $contno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if email or contact number already exists
    $ret = mysqli_query($con, "SELECT Email FROM tblregusers WHERE Email = '$email' OR MobileNumber = '$contno'");
    $result = mysqli_fetch_array($ret);
    if($result > 0) {
        echo '<script>alert("This email or contact number is already associated with another account.");</script>';
    } else {
        // Insert new user
        $query = mysqli_query($con, "INSERT INTO tblregusers (FirstName, LastName, MobileNumber, Email, Password) VALUES ('$fname', '$lname', '$contno', '$email', '$password')");
        if ($query) {
            echo '<script>alert("You have successfully registered.");</script>';
        } else {
            echo '<script>alert("Something went wrong. Please try again.");</script>';
        }
    }
}
?>
<!doctype html>
<html lang="">
<head>
    <title>VPMS - Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript">
        function checkpass() {
            if(document.signup.password.value != document.signup.repeatpassword.value) {
                alert('Password and Repeat Password fields do not match.');
                document.signup.repeatpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <h2 style="color: #fff">VPMS - Create Your Account</h2>
                    </a>
                </div>

                <div class="login-form">
                    <form name="signup" method="post" onsubmit="return checkpass();">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" placeholder="Your First Name..." required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="Your Last Name..." required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Email Address" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Password" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password" name="repeatpassword" placeholder="Repeat Password" required class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">REGISTER</button>
                        <div class="checkbox mt-3">
                            <label class="pull-left"><a href="login.php">Signin</a></label>
                            <label class="pull-right"><a href="../index.php">Home</a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
