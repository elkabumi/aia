<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/unit_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("City");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "unit.php?page=form";


		include '../views/unit/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "unit.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);


			$action = "unit.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();

			$row->unit_name = false;
			$row->unit_description = false;

			$action = "unit.php?page=save";
		}

		include '../views/unit/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = "'','$i_title', '$i_description'";

		create($data);

		header('Location: unit.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = " unit_name = '$i_title', unit_description = '$i_description'";

		
		update($data, $id);

		header('Location: unit.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: unit.php?page=list&did=3');

	break;
}

?>