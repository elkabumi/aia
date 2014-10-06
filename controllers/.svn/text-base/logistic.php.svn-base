<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/logistic_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("logistic Request");

switch ($page) {
	case 'list':
		get_header();

		$user_id = $_SESSION['user_id'];
		$user_type_id = $_SESSION['user_type_id'];
		$query = select($user_id, $user_type_id);
		
		$add_button = "logistic.php?page=form";


		include '../views/logistic/list.php';
		get_footer();
	break;
	
	case 'list_approved':
	$title = ucfirst("Approved logistic Request");

		get_header();

		
		$query = select_approved();
		
		include '../views/logistic/list_approved.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "logistic.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row['logistic_date'] = format_date($row['logistic_date']);

			$action = "logistic.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();

			$row->logistic_date = false;
			$row->logistic_description = false;
			
			$user_id = $_SESSION['user_id'];
			
			$query_item = select_item_tmp($user_id);
			
			
			
			$add_item = "logistic.php?page=form&add=1";
			$action = "logistic.php?page=save";
		}
		
		
		
		include '../views/logistic/form.php';
		include '../views/logistic/list_item.php';
		
		$close_item = "logistic.php?page=form";
		
		if(isset($_GET['add'])){
			
			$row_item = new stdClass();

			$row_item->logistic_item_name = false;
			$row_item->logistic_item_value = false;
			$action_item = "logistic.php?page=save_item";
			include '../views/logistic/form_item.php';
		}
		
		if(isset($_GET['id_item'])){
			$id_item = get_isset($_GET['id_item']);
			$row_item = read_id_item($id_item);
			$action_item = "logistic.php?page=edit_item&id_item=$id_item";
			include '../views/logistic/form_item.php';
		}
		
		
		include '../views/logistic/form_save.php';
		
		get_footer();
	break;
	
	case 'form_edit':
		get_header();

		$close_button = "logistic.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
			$row = read_id($id);
			$row->logistic_date = format_date($row->logistic_date);

			$action = "logistic.php?page=edit&id=$id";
			
			$query_item_edit = select_item_edit($id);
			$add_item = "logistic.php?page=form_edit&id=$id&add=1";
		include '../views/logistic/form.php';
		include '../views/logistic/list_item_edit.php';
		
		$close_item = "logistic.php?page=form_edit&id=$id";
		
		if(isset($_GET['add'])){
			
			$row_item = new stdClass();

			$row_item->logistic_item_name = false;
			$row_item->logistic_item_value = false;
			$action_item = "logistic.php?page=save_item_edit&id=$id";
			include '../views/logistic/form_item_edit.php';
		}
		
		if(isset($_GET['id_item'])){
			$id_item = get_isset($_GET['id_item']);
			$row_item = read_id_item_edit($id_item);
			$action_item = "logistic.php?page=edit_item_edit&id=$id&id_item=$id_item";
			include '../views/logistic/form_item_edit.php';
		}
		
		
		include '../views/logistic/form_save.php';
		
		get_footer();
	break;
	
	case 'form_view':
		get_header();

		$close_button = "logistic.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
			$row = read_id($id);
			$row->logistic_date = format_date($row->logistic_date);

			$action = "logistic.php?page=edit&id=$id";
			
			$query_item_edit = select_item_edit($id);
			
		include '../views/logistic/form_view.php';
		include '../views/logistic/list_item_view.php';
	
		include '../views/logistic/form_save.php';
		
		get_footer();
	break;
	
	case 'save_item_edit':
		$id =  get_isset($_GET['id']);
		extract($_POST);
		
		$i_name = get_isset($i_name);
		$i_value = get_isset($i_value);
		$user_id = $_SESSION['user_id'];

		$data = "'', '$id', '$i_name', '$i_value'";

		create_item_edit($data);

		header("Location: logistic.php?page=form_edit&id=$id&did_item=1");

	break;
	
	case 'save_item':

		extract($_POST);
	
		$i_name = get_isset($i_name);
		$i_value = get_isset($i_value);
		$user_id = $_SESSION['user_id'];

		$data = "'','$i_name', '$i_value', '$user_id'";

		create_item_tmp($data);

		header('Location: logistic.php?page=form&did_item=1');

	break;
	
	case 'edit_item':

		extract($_POST);
		$id_item =  get_isset($_GET['id_item']);
		
		$i_name = get_isset($i_name);
		$i_value = get_isset($i_value);
		$user_id = $_SESSION['user_id'];

		$data = "logistic_item_name = '$i_name', logistic_item_value = '$i_value'";
		//echo $data;
		edit_item_tmp($data, $id_item);

		header('Location: logistic.php?page=form&did_item=2');

	break;
	
	case 'edit_item_edit':
		$id =  get_isset($_GET['id']);
		extract($_POST);
		$id_item =  get_isset($_GET['id_item']);
		
		$i_name = get_isset($i_name);
		$i_value = get_isset($i_value);
		$user_id = $_SESSION['user_id'];

		$data = "logistic_item_name = '$i_name', logistic_item_value = '$i_value'";
		//echo $data;
		edit_item_edit($data, $id_item);

		header("Location: logistic.php?page=form_edit&id=$id&did_item=2");

	break;
	
	case 'delete_item':

		$id = get_isset($_GET['id']);	

		delete_item_tmp($id);

		header('Location: logistic.php?page=form&did_item=3');

	break;
	
	case 'delete_item_edit':

		$id = get_isset($_GET['id']);	
		$id_item =  get_isset($_GET['id_item']);

		delete_item_edit($id_item);

		header("Location: logistic.php?page=form_edit&id=$id&did_item=3");

	break;

	case 'save':

		extract($_POST);

		$i_date = get_isset($i_date);  
		$i_date = format_back_date($i_date);
		$i_description = get_isset($i_description);
		$user_id = $_SESSION['user_id'];
		
		$check_item = check_item_tmp($user_id);
		if($check_item > 0){
		
		$data = "'','$i_date', '$i_description', '$user_id', '1'";

		save($data);
		$new_id = mysql_insert_id();
		save_item($user_id, $new_id);

		header('Location: logistic.php?page=list&did=1');
		
		}else{
			header('Location: logistic.php?page=form&err=1');
		}
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_date = get_isset($i_date);  
		$i_date = format_back_date($i_date);
		$i_description = get_isset($i_description);

		$data = " logistic_date = '$i_date', logistic_description = '$i_description'";

		
		update($data, $id);

		header('Location: logistic.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: logistic.php?page=list&did=3');

	break;
	
	case 'save_onprogress':
		$id = get_isset($_GET['id']);
		
		save_onprogress($id);
		header('Location: logistic.php?page=list&did=4');
	break;
	
	
	case 'save_done':
		$id = get_isset($_GET['id']);
		
		save_done($id);
		header('Location: logistic.php?page=list&did=5');
	break;
	
	case 'save_onprogress_approved':
		$id = get_isset($_GET['id']);
		
		save_onprogress($id);
		header('Location: logistic.php?page=list_approved&did=4');
	break;
	
	case 'reject';
		$id = get_isset($_GET['id']);
		
		reject($id);
		header('Location: logistic.php?page=list_approved&did=6');
	break;
}

?>