
<?php 

include('config.php');

$req1 = "SELECT * from patient  ";
$rs1 = mysqli_query($conn,$req1) ;

 


		  

?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Patients</title>
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
                            
                            <a href="add.php ">    
                            <button  class="btn btn-sm btn-primary pull-right" > <i class="fa fa-user-plus"></i> &nbsp; Nouveau patient</button>
  </a>
                                                                     </div>
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">la liste des patients : </h4>
                                <div class="data-tables">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Cin</th>
                <th>Sexe</th>
                <th>Date de naissance</th>
                <th>Profession</th>
                <th>Type de mutuelle</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($et = mysqli_fetch_assoc($rs1))  {  ?>
    
            <tr>
                <td><b>	<a href="folder.php?code=<?php echo ($et['pat_id']); ?>">   <?php echo ($et['nom']); ?>   <?php echo ($et['prenom']); ?></a></b>	</td>
                <td><?php echo ($et['cin']); ?></td>
                <td><?php echo ($et['sexe']); ?></td>
                <td><?php echo ($et['ddn']); ?></td>
                <td><?php echo ($et['profession']); ?></td>
                <td><?php echo ($et['mutuelle']); ?></td>
                <td><?php echo ($et['telephone']); ?></td>
                <td><?php echo ($et['adresse']); ?></td>
                <td> <a href="#"data-toggle="modal" data-target="#myModal2" > <i class="fa fa-eye"></i></a></td>
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
         <!-- footer area start-->
         <?php 
      include('sidebar.php'); 
      
      ?>
        <!-- footer area end-->
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
                "targets": [ 8 ],
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
