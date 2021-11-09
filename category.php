
<?php 

include('config.php');


$req = "SELECT * from categorie_med ";
$rs4 = mysqli_query($conn,$req) ;
$row6=mysqli_fetch_array($rs4);



if (isset($_POST['ajouter'])) {

	$cat  = $_POST['cat'];
	$req  ="INSERT INTO categorie_med(nom_cat) values ('$cat');";  
  $row3 =mysqli_query($conn,$req);

	header('location:category.php');
   
  }
 
  $sql_all    ="SELECT * FROM categorie_med  ORDER BY id_cat ";
  $result_all = mysqli_query($conn,$sql_all);

//   $code = $_GET['code'];    
// $req2 = "SELECT * FROM medicament WHERE id_cat=$code  ";
// $rs9 = mysqli_query($conn,$req2) ;
// $row5=mysqli_fetch_array($rs9);
		  

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Categorie - Medicaments</title>
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
<?php 
      include('sidebar.php'); 
      
      ?>
 
 
    <!-- page container area start -->
 
        <!-- sidebar menu area start -->
    
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
       
            <?php 
      include('header.php'); 
      
      ?>




          
            <!-- page title area end -->
            <div class="main-content-inner">
            <div class="col" align="right" style="margin:20px  0 10px 0">
					            <button data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-danger pull-right" > <i class="fa fa-medkit"></i> &nbsp;          Ajouter une categorie</button>

                                                                	</div>	</div>

                                                                    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie :</h5>
      </div>
      
      <div class="modal-body">


      <input type="hidden" name="id">
  
    
    <p> Le nom de categorie : </p>
    <input type="text" name="cat"  class="form-control" >


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <input  type="submit" class="btn btn-info " name="ajouter"  value="Ajouter">
      </div>
   
  </div>
</div>
</form>

</div>
         

<!------------ Fin Modal ---------->
                <div class="row">
                    <!-- seo fact area start -->
                   
                            


   <div style="padding-left: 8% ">
        <div class="row">
		<div class="space"></div>
		<?php  while ($et = mysqli_fetch_assoc($result_all))  {  ?>

        <div class="col-xs-12 col-sm-5" style="margin-left:40px">

	
  <a href="medicine.php?code=<?php echo ($et['id_cat']); ?>" >  <input style="width:100% ; height:90px ; font-size:100% ; border-radius:20px, " class="btn btn-info btn-app"    value="<?php echo ($et['nom_cat']); ?>" readonly /></a> 
  <hr class="my-3">

  </div>
  <?php } ?>
</div></div>







                        
                 
                    </div>   </div>
                    </div>
          
          




    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
