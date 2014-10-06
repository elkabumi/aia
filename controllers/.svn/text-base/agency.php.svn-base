<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/agency_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Agency");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "agency.php?page=form";


		include '../views/agency/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "agency.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);


			$action = "agency.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();

			$row->agency_name = false;
			$row->agency_description = false;

			$action = "agency.php?page=save";
		}

		include '../views/agency/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = "'','$i_title', '$i_description'";

		create($data);

		header('Location: agency.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = " agency_name = '$i_title', agency_description = '$i_description'";

		
		update($data, $id);

		header('Location: agency.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: agency.php?page=list&did=3');

	break;
}

?>