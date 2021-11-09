
<?php

include("config.php");

session_start();   
 
if(isset($_SESSION["session_login"])){
$query = "SELECT * FROM user WHERE user_name='".$_SESSION["session_login"]."'";
                                $result = mysqli_query($conn, $query);
                                $row    = mysqli_fetch_assoc($result);
                                $iduser = $row['user_id'];
                                $nameuser = $row['user_name'];

$time     = date('H:i');
$datetime = date('Y-m-d H:i:s');
$datenow  = date('Y-m-d');
$now_year = date('Y');
$now_mois = date('m');
$now_jour = date('d');
}else
{
  header("location: index.php");
}
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

</head



    
<body>


<div class="header-area">
                <div class="row align-items-left">
                    <!-- nav and search button -->
               
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                       
                    </div>

                
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        
                        <ul class="notification-area pull-right">
                            
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                            <div class="">
                            <img class="avatar user-thumb pull-right user-name dropdown-toggle" data-toggle="dropdown" src="assets/images/author/avatar.png" alt="avatar">
                            <span class="user-info">
									<small>Bienvenue,</small>

									<?php
                             if(isset($_SESSION["session_login"])){
                                $query       = "SELECT * FROM user WHERE user_name='".$_SESSION["session_login"]."'";
                                $result      = mysqli_query($conn, $query);
                                $row         = mysqli_fetch_assoc($result);
                                $namesession = $row['user_name'];

                                ?>
									<?php echo $namesession;  }?>
								</span>
                
                            <div class="dropdown-menu">
                             <a class="dropdown-item" href="logout.php"> <i class="ace-icon fa fa-power-off"></i> &nbsp;  Déconnexion</a>
                       
                </div>
                </div>
            </div>
            

                    </div>
                </div>
     
            <!-- header area end -->
            <!-- page title area start -->

</body>
</html>