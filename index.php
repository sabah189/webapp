<?php


include("config.php");

    $datenow = date('Y-m-d H:i:s');
    session_start();    

if(isset($_POST["go"])){
	$user   = $_POST["log"];
	$passe1 = $_POST["pas"];
	$passe  = md5($passe1);

    $query = "SELECT * FROM user WHERE user_name='".$user."' AND user_password='".$passe."'";
    $result = mysqli_query($conn, $query);


if ($result) 
{

    $row                      = mysqli_fetch_assoc($result);
	$iduseris                 = $row['user_id'];
	$statut                   = $row['statut'];
	$_SESSION["session_login"]= $row['user_name'];
	


    $update1="UPDATE user set last_activity='".$datenow."' WHERE user_name='".$user."' AND user_password='".$passe."'";
    mysqli_query($conn, $update1);
	if ($user=!$row['user_name'] || $passe=!$row['user_password'])
	{
        echo "<script>alert(\"Attention ! le nom d'utilisateur ou le mot de passe est incorrect.\")</script>";
    }
	else{
	if ($statut == 1)
    {
        echo "<script>alert(\"Attention ! Votre compte est désactivé.\")</script>";
    }
	else{
        header('location: home.php');
     }
}
}
}

?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login-Dento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon/dent.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    
    <!-- login area start -->
    <div class="login-area login-bg"style="background-image: url('assets/images/bg/login.jpeg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post" action="">
                    <div class="login-form-head">
                        <h4></h4>
                        <p>Veuillez saisir vos informations : </p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Nom d'utilisateur</label>
                            <input type="text" id="exampleInputEmail1" name="log">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <i class="ti-lock"></i>
                            <input type="password" id="exampleInputPassword1" name="pas">
                            
                            <div class="text-danger"></div>
                        </div>
                        
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="go">Se connecter <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Pour plus d'information et support contactez nous ! </p>
                            &nbsp;
                            <p class="text-muted">User : admin  </p>   <p class="text-muted">Password : admin  </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>