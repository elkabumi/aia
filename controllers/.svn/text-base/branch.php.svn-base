<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/branch_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("branch");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "branch.php?page=form";


		include '../views/branch/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "branch.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "branch.php?page=edit&id=$id";
		
		} else{
			
			$row = new stdClass();
			$row->branch_name = false;
			$row->branch_description = false;
			$action = "branch.php?page=save";
		}

		include '../views/branch/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = "'','$i_title', '$i_description'";

		create($data);

		header('Location: branch.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_title = get_isset($i_title);
		$i_description = get_isset($i_description);

		$data = " branch_name = '$i_title', branch_description = '$i_description'";

		
		update($data, $id);

		header('Location: branch.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: branch.php?page=list&did=3');

	break;
}

?>