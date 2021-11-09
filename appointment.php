
<?php 

include('config.php');

//  $req2 = "select,pat.pat_id as id ,type_rdv as type from (t_patient pat) inner join (a_rdv rdv inner join t_patient pat on pat.pat_id = con.pat_id) on (sym.sym_id = con.sym_id ) having id= $code;";

$req2="SELECT nom, prenom , date  ,heure,type, statut  , id_rdv FROM  rdv , patient pat where pat.pat_id=rdv.pat_id ";
$rs6 = mysqli_query($conn,$req2);




$req = "select * from patient";
$rs = mysqli_query($conn,$req) or die(mysqli_error());
$option = NULL;

while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['pat_id'].'">'.$row['nom'].' '.$row['prenom'].' '.$row['ddn'].'</option>';
    }

    if (isset($_POST['ajouter']))
    
    {
      $patient = $_POST['patient'];
      $date =  date("Y-m-d");
      $heure = time("H:m:s");
      $type = $_POST['type'];
      $statut=0;
	
  
      
      $req ="INSERT INTO rdv(date,heure,type,statut,pat_id ) values ('$date','$heure','$type','$statut','$patient');";  //requete SQL insertion 
      mysqli_query($conn,$req);

      header('location:appointment.php');
     
    }

	
   

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
      	<!-- Site favicon -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rendez-vous</title>
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

         
            <!-- page title area end -->
            <div class="main-content-inner">
                
                <div class="row">
                    
                <div class="col" align="right" style="margin-top:20px">
                            
                            <a data-toggle="modal" data-target="#myModal"  >    
                            <button  class="btn btn-sm btn-primary pull-right" > <i class="fa fa-calendar"></i> &nbsp; Nouveau Rendez-vous</button>
  </a>
                                             

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un rendez-vous :</h5>
      </div>
      
      <div class="modal-body">
      <form method="post" action="">

      <input type="hidden" name="id">
    <p>Patient:</p>
    <select name="patient" class="form-control"> 
        <option value = "<?php while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['pat_id'].'">'.$row['pat_nom'].'+'.$row['pat_prenom'].'+'.$row['pat_ddn'].'</option>';
    }  ?>"><?php echo $option; ?>
    </option>
    </select>
    <br>
    <p>date de rendez vous :</p>
    <input type="date" name="date"  class="form-control">
    <br>
    <p>heure du rendez vous:</p>
    <input type="time" id="txt" name="time"  class="form-control">
        <br>
    <p>type : </p>
    <select class="form-control" name="type">
                                                <option>--</option>
                                                <option value="consultation">Consultation</option>
                                                <option value="contrôle">Contrôle</option>
                                            
                                            </select>



	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-info " name="ajouter"  value="ajouter">
      </div>
    </form>
  </div>
</div>
</form>

</div>
         

<!------------ Fin Modal ---------->

<!-- data table start -->
                    <div class="col-12 mt-5">
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">la liste des rendez-vous</h4>
                                <div class="data-tables">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Date de RDV</th>
                <th>Heure de RDV</th>
                <th>Type</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        <?php  while ($et = mysqli_fetch_assoc($rs6))  {  ?>
    
            <tr>
                <td><b>		 <?php echo ($et['nom']); ?>            <?php echo ($et['prenom']); ?></a></b>	</td>
                <td><?php echo ($et['date']); ?></td>
                <td><?php echo ($et['heure']); ?></td>
                <td><?php echo ($et['type']); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> </td>
            </tr>
   
         
            <?php } ?>
                </tbody>
    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                 
                </div>
            </div>
        </div>
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
        "responsive": true,
        "columnDefs": [
            {
                "targets": [ 4,5,6,7,8 ],
                "visible": false,
                "searchable": false
            }
         
        ]




    } );
    new $.fn.dataTable.FixedHeader( table );
} );



</script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
