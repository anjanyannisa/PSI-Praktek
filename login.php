<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <?php
require './includes/config.php';
include 'conn.php';

$page_title = 'Login';
$err = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['username'] = $_POST['username'];

    // $req = $dbc->prepare('SELECT * FROM tbl_gangguan WHERE username = ?');
    // $req->bindParam(1, $_POST['username']);
    // $req->execute();

    $username = $_POST['username'];
    $ambil = mysqli_query($koneksi,"SELECT * FROM tbl_admin where username='$username'");
    $data = mysqli_fetch_array($ambil);
    $hasil = $data['password'];
    $level = $data['level'];

    if ($data = password_hash($hasil, PASSWORD_DEFAULT)) {
        if (password_verify($_POST['password'], $data)) {
            if($level == 'admin'){
                $_SESSION['admin'] = true;
                header('Location: index.php');
                exit;
            }
            else {
                 $_SESSION['teknisi'] = true;
                header('Location: indexteknisi.php');
                exit;
            }
        }
    }

    $err = true;
}
?>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/01.png);">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>

                <form method="post" class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Enter username"
                        <?php
                            if (isset($_SESSION['username'])) {
                                echo "value = '$_SESSION[username]'";
                            }
                         ?>>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        <div>
                            <a href="register.php" class="txt1">
                                Dont have an account? Sign Up
                            </a>
                        </div>

                    </div>



                    <div class="container-login100-form-btn">
                        <style type="text/css">
                            .login100-form-btn {
                            display: -webkit-box;
                            display: -webkit-flex;
                            display: -moz-box;
                            display: -ms-flexbox;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            padding: 0 20px;
                            min-width: 160px;
                            height: 50px;
                            background-color: #e6493a;
                            border-radius: 25px;

                            font-family: Poppins-Regular;
                            font-size: 16px;
                            color: #fff;
                            line-height: 1.2;

                            -webkit-transition: all 0.4s;
                            -o-transition: all 0.4s;
                            -moz-transition: all 0.4s;
                            transition: all 0.4s;
                            }
                        </style>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ($err) {
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Username</strong> atau <strong>Password</strong> salah.
            </div>';
    }
    ?>
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>