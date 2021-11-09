<?php 
include_once 'config.php';

if (isset($_POST['cat_id'])) {
	$query = "SELECT * FROM medicament where id_cat=".$_POST['cat_id'];
	$result = mysqli_query($conn,$query) ;
	if ($result->num_rows > 0 ) {
			echo '<option value="" style="width:170px">Les medicaments</option>  <br>';
		 while ($row = $result->fetch_assoc()) 
		 {
			 echo '<button value ="'.$row['id_med'].'" style="border:none;background-color:none" data-toggle="modal" data-target="#Long">'.$row['nom_med'].'</button>  <br> <br>' ;
		 }
	}else{

		echo '<option>medicament non trouvé!</option>';
	}

}


?>

