<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/feedback_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Feedback");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$query2 = select2();
		$query_p_gts1 = select_p_gts1();
		$query_p_gts2 = select_p_gts2();
		
		$query_p_fac3 = select_p_fac3();
		$query_p_fac4 = select_p_fac4();
		$query_p_fac5 = select_p_fac5();

		$add_button = "feedback.php?page=form&type=1";
		$add_button2 = "feedback.php?page=form&type=2";

		include '../views/feedback/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "feedback.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "feedback.php?page=edit&id=$id";
		
		} else{
			
			$row = new stdClass();
		
			$row->feedback_question = false;
			$row->feedback_type_id 	= false;
			$row->feedback_format_id = false;
			
			$action = "feedback.php?page=save";
		}

		include '../views/feedback/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_question = get_isset($i_question);
		$i_type = get_isset($i_type);
		$i_format = get_isset($i_format);

		$data = "'','$i_question', '$i_type','$i_format'";

		create($data);

		header("Location: feedback.php?page=list&did=1&type=$i_type");

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_question = get_isset($i_question);
		$i_type = get_isset($i_type);
		$i_format = get_isset($i_format);

		$data = " 	feedback_question = '$i_question', feedback_type_id = '$i_type',feedback_format_id ='$i_format'";

		
		update($data, $id);

		header("Location: feedback.php?page=list&did=2&type=$i_type");

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	
		$type = get_isset($_GET['type']);
		delete($id);

		header("Location: feedback.php?page=list&did=3&type=$type");

	break;
}

?>