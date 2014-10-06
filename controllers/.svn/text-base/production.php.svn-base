<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/production_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Production");

switch ($page) {
	case 'list':
		get_header();
			$query = select();
			$add_button = "production.php?page=form";
			include '../views/production/list.php';
		get_footer();
	break;
	
	case 'form_production':
		get_header();
			$id = get_isset($_GET['id']);
			
			$query_agent = select_agent($id);
			$data_agent = mysql_fetch_object($query_agent);
			
			$query_event = select_event($id);
			
			$query_production = select_production($id);
			$add_button = "production.php?page=form_add_production&id=$id";
			$close_button = "production.php";
			include '../views/production/form_production.php';
		get_footer();
	break;
	
	case 'form_add_production':
		get_header();
			$id = get_isset($_GET['id']);
			$detail_id = (isset($_GET['detail_id'])) ? $_GET['detail_id'] : null;
			
			if($detail_id){
				$row = read_id($detail_id);
				$action = "production.php?page=edit_production&detail_id=$detail_id&id=$id";
			}else{
				$row = new stdClass();

				$row->production_detail_month = false;
				$row->production_detail_year = false;
				$row->production_detail_value = false;
				$row->production_detail_description = false;
				$action = "production.php?page=save_production&id=$id";
			}
			
			
			$close_button = "production.php?page=form_production&id=$id";
			include '../views/production/form_add_production.php';
		get_footer();
	break;
	
	
	
	case 'save_production';
		$id = get_isset($_GET['id']);
		
		$month = get_isset($_POST["i_month"]);
		$year = get_isset($_POST["i_year"]);
		$value = get_isset($_POST['i_value']);
		$description = get_isset($_POST['i_description']);
		
		$check_data_production = check_data_production($id);
		
		if($check_data_production > 0 ){
			// Data production sudah ada, tinggal cek detail
			$check_data_detail = check_data_detail($month, $year, $id);
			if($check_data_detail > 0 ){
				// Data sudah ada
				//header("Location: production.php?page=form_add_production&id=$id&err=1");
				echo"<script> window.location='production.php?page=form_add_production&id=$id&err=1'</script>";
			}else{
				$save_detail = save_detail($month, $year, $value, $description, $id);
				//header("Location: production.php?page=form_production&id=$id&did=1");
				echo"<script> window.location='production.php?page=form_production&id=$id&did=1'</script>";
			}
			
		}else{
			
		$save_production = save_production($month, $year, $value, $description, $id);			
			
		//header("Location: production.php?page=form_production&id=$id&did=1");
		echo"<script> window.location='production.php?page=form_production&id=$id&did=1'</script>";
		}

		
		
	break;
	
	case 'edit_production';
		$detail_id = get_isset($_GET['detail_id']);
		$id = get_isset($_GET['id']);
		
		$month = get_isset($_POST["i_month"]);
		$year = get_isset($_POST["i_year"]);
		$value = get_isset($_POST['i_value']);
		$description = get_isset($_POST['i_description']);
		
		$check_edit = check_edit($month, $year, $id, $detail_id);
		if($check_edit > 0){
			header("Location: production.php?page=form_add_production&detail_id=$detail_id&id=$id&err=1");
		}else{
			$edit_production = edit_production($month, $year, $value, $description, $detail_id);	
			//header("Location: production.php?page=form_production&id=$id&did=1");	
			echo"<script> window.location='production.php?page=form_production&id=$id&did=1'</script>";
		}
			
			
		
			
		

		
		
	break;
	
	
}

?>