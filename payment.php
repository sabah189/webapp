
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
    <title>Paiement</title>
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
                     <!-- basic modal start -->

                     <div class="card-body">
                       
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalLong" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                   <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Acte:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input" >
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Tarif:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Catégorie:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input">
                        </div>
                       
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                       <button type="button" class="btn btn-primary">Ajouter</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                 
           </div>
           <!-- basic modal end -->
                <div class="col" align="right" style="margin-top:20px">
                            
                            
                            <button  class="btn btn-sm btn-primary pull-right"  data-toggle="modal" data-target="#exampleModalLong"> <i class="fa fa-user-plus"></i> &nbsp; Nouveau acte</button>

                                           
                                                                     </div>



                                                                     


                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">la liste des actes</h4>
                                <div class="data-tables">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Patients</th>
                <th>Tarif</th>
                <th>Catégorie</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($et = mysqli_fetch_assoc($rs1))  {  ?>
    
            <tr>
                <td><?php echo ($et['nom']); ?>            <?php echo ($et['prenom']); ?></td>
                <td><?php echo ($et['cin']); ?></td>
                <td><?php echo ($et['sexe']); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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

$('#example').dataTable({
  "columnDefs": [{ 
    "targets": [3,4,5,6,7,8], //Comma separated values
    "visible": false,
    
    "searchable": false }
  ]
});

} );








</script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
