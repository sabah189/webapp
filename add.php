<?php 

include('config.php');

if (isset($_POST['ajout'])) {

    $nom              = addslashes($_POST['nom']);
    $prenom           = addslashes($_POST['prenom']);
    $cin              = addslashes($_POST['cin']);
    $ddn              = addslashes($_POST['ddn']);
    $ville            = addslashes($_POST['ville']);
    // $inscri              = date("Y-m-d");
    $sitfam           = addslashes($_POST['sitfam']);
    $tel              = addslashes($_POST['tel']);
    $adresse          = addslashes($_POST['adresse']);
    $prof             = addslashes($_POST['prof']);
    $typemut          = addslashes($_POST['typemut']);
    $sexe             = addslashes($_POST['sexe']);

    $ant              = addslashes($_POST['ant']);
    $chirurg          = addslashes($_POST['chirurg']);
    $fam              = addslashes($_POST['fam']);
    $chron            = addslashes($_POST['chron']);
    
   
 
    $req="INSERT INTO patient(nom,prenom,cin,ddn,ville,sitfam,telephone,adresse,profession,mutuelle,sexe,ant,chirurg,fam,chron) 
    values ('$nom','$prenom','$cin','$ddn','$ville','$sitfam','$tel','$adresse','$prof','$typemut','$sexe','$ant','$chirurg','$fam','$chron');";  
    mysqli_query($conn,$req);
    header('location:patient.php');
 
 }

		  

?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ajouter patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon/dent.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
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

      
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php 
      include('header.php'); 
      
      ?>

<nav aria-label="breadcrumb"  >
  <ol class="breadcrumb"style="background-image: url('assets/images/icon/opticiens.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
    <li class="breadcrumb-item"><a href="patient.php">Retour</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ajouter un patient</li>
  </ol>
</nav>
         <form action="" method="post">
            <!-- page title area end -->
            <div class="main-content-inner" >
                <div class="row" align="center">
              
                    <!-- data table start -->

                    <div class="col-12 mt-5"  >
                        <div class="card col-sm-12"  style="   margin: 0 auto; ">
                            <div class="card-body col-sm-12"  style="   margin: 0 auto; ">
                       
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                  
          
              <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">
          
                <input type="text" class="  form-control mb-3" name="nom" placeholder="Nom" >
              
                
                   

          
                <input class="form-control mb-3" type="text" name="prenom" id="example-tel-input" placeholder="Prenom">
    
                <input class="form-control mb-3" type="text" name="cin" id="example-tel-input" placeholder="Cin">

                <input class="form-control mb-3" type="text" name="tel" id="example-tel-input" placeholder="Telephone">

   
                                 <b class="text-muted   d-block">Sexe: &nbsp; &nbsp; &nbsp;</b>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Femme" id="customRadio" name="sexe" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio">Femme</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Homme" id="customRadio2" name="sexe" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Homme</label>
                                            </div>
              </div>
            

                                    </div>


                                </div>
                  
                    
              

                                    <!---------------------- start 2-------------------->


                                <div class="row">
                                    <div class="col-md-12 mt-5">
                                        
                                  
          
              <div class="row col-sm-12" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 1%">
                <input type="text" value="Né (le)" class=" col-sm-4 form-control mb-3" disabled>
                <input type="date" class=" col-sm-4 form-control mb-3" name="ddn" ><br>
                <input type="text" class=" col-sm-4 form-control mb-3" placeholder="à" name="ville" ><br><br>
                <select class=" form-control mb-3" name="sitfam">
                                                <option >Situation Familliale</option>
                                                <option value="marié">Marié</option>
                                                <option value="célibataire">Célibataire</option>
                                                <option value="divorcé">Divorcé</option>
                                            </select>
                   

          
                <input class="form-control mb-3" type="text" name="adresse" id="example-tel-input" placeholder="Adresse">
    
                <input class="form-control mb-3" type="text" name="prof" id="example-tel-input" placeholder="Profession">
   
                                 <b class="text-muted   d-block">Mutuelle: &nbsp; &nbsp; &nbsp;</b>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Cnss"  id="customRadio1" name="typemut" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Cnss</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Cnops" id="customRadio3" name="typemut" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Cnops</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" value="Autre" id="customRadio5" name="typemut" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio5">Autre</label>
                                            </div>


                            
                                            
                           
              </div>
              

                                    </div>


                               
                                </div>
                  
                    
                            <!----------------- end 2---------------->


                                
                                
                                                          <!---------------------- start 3------------------------------------------>
                                            

                                <div class=" col-xs-12 col-sm-12 mt-5 " >
              <div class="space space-10"></div>
                <div class=" row center" style="border: 2px solid #99bcd0;border-radius: 12px;padding: 4%">
                  <div name="ant" class="col-sm-3">
                    <label style="width: 100%; background-color:#E0E0E0">Antécédents Médicaux</label>
                    <textarea class="form-control" aria-label="With textarea" name="ant"></textarea>

                  </div>
                  <div name="chirurg" class="col-sm-3">
                    <label class="label label-success label-white" style="width: 100%; background-color:#E0E0E0">Chirugicaux</label>
                    <textarea class="form-control" aria-label="With textarea" name="chirurg"></textarea>

                  </div>
                  <div name="fam"  class="col-sm-3">
                    <label class="label label-success label-white" style="width: 100%; background-color:#E0E0E0">Familiaux</label>
                    <textarea class="form-control" aria-label="With textarea" name="fam"></textarea>

                  </div>
                  <div name="chron" class="col-sm-3">
                    <label class="label label-success label-white" style="width: 100%; background-color:#E0E0E0">Affections Chroniques</label>
                    <textarea class="form-control" aria-label="With textarea" name="chron"></textarea>

                  </div>
                </div>
              </div>

                    

                    <!------- end 3------->

                    <input type="submit" class="btn btn-primary btn-lg mt-3 " value="valider" name="ajout" style="width: 50%;">


                     


                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                 
                </div>
            </div>
        </div>
    </div>
</form>
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

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>



<script src="   https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css "></script> 
<script src="  https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css"></script> 
<script src="  https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css"></script> 
<script src="  https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"></script> 

    <script>$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );</script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>