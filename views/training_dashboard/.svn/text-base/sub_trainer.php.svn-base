<?php			  
	include'../../lib/config.php';
	$id = $_GET['id'];

	$query_sub_trainer = "select * from users where user_type_id = '$id'";
	$execute_sub_trainer = mysql_query($query_sub_trainer) or die(mysql_error());
	while($row_sub_trainer = mysql_fetch_array($execute_sub_trainer)){
	?>
	
		<option value="<?php echo $row_sub_trainer['user_id']?>"><?php echo $row_sub_trainer['user_name']?></option>
	
	<?php
}
	
?>