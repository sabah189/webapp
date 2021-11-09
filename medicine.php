
<?php 

include('config.php');


$code = $_GET['code'];    
$req2 = "SELECT * FROM medicament WHERE id_cat=$code  ";
$rs9 = mysqli_query($conn,$req2) ;
$row3=mysqli_fetch_array($rs9);
    


	if(isset($_GET['delete_id']))
	{

  
$req3     = "SELECT id_cat FROM categorie_med ";
$rs5      = mysqli_query($conn,$req3) ;
$row_info = mysqli_fetch_assoc($rs5);
// $id = $row_info['id_cat'];

	 $sql_query1="DELETE FROM medicament WHERE id_med=".$_GET['delete_id'];
	 mysqli_query($conn,$sql_query1) ;
	 header('location:medicine.php?code='.$row_info['id_cat'].'');


	}

	
	if (isset($_POST['ajouter'])) {
		$med = $_POST['med'];
		$obs = $_POST['obs'];
		$dos = $_POST['dos'];
		$id_cat=$_POST['id'];
	
	
	// $id=$_GET['code'];
		$req="INSERT INTO medicament (nom_med, dosage,observation,id_cat) values ('$med','$dos', '$obs','$id_cat');";  
		$row4 =mysqli_query($conn,$req);
	
		header('location:medicine.php?code='.$code.'');
	   
	  }


	  $code = $_GET['code'];    
$req = "SELECT * from categorie_med where id_cat=$code  ";
$rs4 = mysqli_query($conn,$req) ;
$row4=mysqli_fetch_array($rs4);



if(isset($_POST['modifier']))
{

$id=$_GET['code'];
$cat=$_POST['cat'];
$update= "UPDATE categorie_med set nom_cat='$cat' WHERE id_cat='$id' ";
$result=mysqli_query($conn,$update);
header('location:medicine.php?code='.$id.'');
}





?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Medicaments</title>
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
    <li class="breadcrumb-item"><a href="category.php">Retour</a></li>
    <li class="breadcrumb-item active" aria-current="page">Medicament</li>
  </ol>
</nav>
         
            <!-- page title area end -->
            <div class="main-content-inner">
                
<div class="col-lg-6 mt-5" align="left">
                   

                   <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#myModal" style="width:33%"> <i class="fa fa-medkit"></i>  &nbsp;  Ajouter medicament</button>
                    <button type="button" class="btn btn-flat btn-warning " data-toggle="modal" data-target="#myModal1" style="width:33%">  <i class="fa fa-pencil"></i> &nbsp;  Modifier ce categorie</button>
                    <button type="button" class="btn btn-flat btn-danger "style="width:33%"> <i class="fa fa-trash"></i> &nbsp;  Supprimer ce categorie</button>
              
        </div>

        
<!----------------AJOUTER Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un medicament :</h5>
      </div>
      
      <div class="modal-body">
    

      <input type="hidden" name="id" value="<?php echo $code ?>">
  
   <label for="">Medicaments : </label> 
    <input type="text" name="med"  class="form-control" ><br>
    <label for="">Dosage : </label> 
    <input type="text" name="dos"  class="form-control" ><br>

    <label for="">Observation : </label> 
    <input type="text" name="obs"  class="form-control" ><br>
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
        
                    
                
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">la liste des patients</h4>
                                <div class="data-tables">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>Medicament</th>
                <th>Observation</th>
                <th>Dosage</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php  while ($et = mysqli_fetch_assoc($rs9))  {  ?>
    
            <tr>
            <td>
	  <button style="background:none;border:0px"><a href="#" class=" fa fa-pencil"></a></button> &nbsp;&nbsp;
	  <button style="background:none;border:0px">	  <a href="javascript:delete_id(<?php echo $et['id_med']; ?>)" class=" fa fa-trash" ></a></button>

	  </td>                
      <td>			  <?php echo ($et['nom_med']); ?></td>
                <td> <?php echo ($et['observation']); ?></td>
                <td>  <?php echo ($et['dosage']); ?></td>
                <td></td>
                <td> </td>
                <td></td>
                <td> </td>
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


                    <!---------------MODIFIER--- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier la  categorie :</h5>
      </div>
      
      <div class="modal-body">


      <input type="hidden" name="id">
  
    
    <p> Le nom de categorie : </p>
    <input type="text" name="cat"  class="form-control" value="<?php echo ($row4['nom_cat']); ?>">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <input  type="submit" class="btn btn-info " name="modifier"  value="Modifier">
      </div>
   
  </div>
</div>
</form>

</div>
         

<!------------ Fin Modal ---------->
     
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
