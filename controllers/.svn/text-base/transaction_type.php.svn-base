<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaction_type_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Event Type");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "transaction_type.php?page=form";


		include '../views/transaction_type/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "transaction_type.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);


			$action = "transaction_type.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();

			$row->transaction_type_name = false;
			$row->transaction_type_description = false;

			$action = "transaction_type.php?page=save";
		}

		include '../views/transaction_type/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = "'','$i_title', '$i_description'";

		create($data);

		header('Location: transaction_type.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = " transaction_type_name = '$i_title', transaction_type_description = '$i_description'";

		
		update($data, $id);

		header('Location: transaction_type.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: transaction_type.php?page=list&did=3');

	break;
}

?>