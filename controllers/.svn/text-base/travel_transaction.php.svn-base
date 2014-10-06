<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/travel_transaction_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$title = ucfirst("Travel Transactions");

switch ($page) {
	case 'list':
		get_header();

		$user_id = $_SESSION['user_id'];
		$user_type_id = $_SESSION['user_type_id'];
		$query = select($user_id, $user_type_id);
		$add_button = "travel_transaction.php?page=form";

		include '../views/travel_transaction/list.php';
		get_footer();
	break;
	
	case 'list_approved':
	$title = ucfirst("Approve Travel Transactions");

		get_header();
	
		$query = select_approved();
		include '../views/travel_transaction/list_approved.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "travel_transaction.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			
			$row = read_id($id);
			$row->travel_date = format_date($row->travel_date);
			$row->travel_check_in = format_date($row->travel_check_in);
			$row->travel_check_out = format_date($row->travel_check_out);

			$action = "travel_transaction.php?page=edit&id=$id";
			
			
		
			
		} else{
			
			$row = new stdClass();
			
			
			$row->travel_cost = false;
			$row->travel_maskapai_name = false;
			$row->travel_from = false;
			$row->travel_to = false;
			$row->travel_date = false;
			$row->transaction_id = false;
			$row->travel_description = false;
			$row->user_id = false;
			$row->travel_hour = false;
			$row->travel_status = false;
			$row->travel_hotel_name = false;
			$row->travel_check_in = false;
			$row->travel_check_out = false;
			
			
			$action = "travel_transaction.php?page=save";
		}

		include '../views/travel_transaction/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

	
		$travel_cost = 0;
		$travel_maskapai_name = get_isset($travel_maskapai_name);
		$travel_from = get_isset($travel_from);
		$travel_to = get_isset($travel_to);
		$travel_date = get_isset($travel_date);  $travel_date = format_back_date($travel_date);
		$transaction_id = 0;
		$travel_description = get_isset($travel_description);
		$user_id = $_SESSION['user_id'];
		$travel_hour = get_isset($travel_hour);
		$travel_hotel_name = get_isset($travel_hotel_name);
		$travel_check_in = get_isset($travel_check_in);  $travel_check_in = format_back_date($travel_check_in);
		$travel_check_out = get_isset($travel_check_out);  $travel_check_out= format_back_date($travel_check_out);
		$travel_status = 1;
		
		$data = "'',
				'$travel_cost',
				'$travel_maskapai_name',
				'$travel_from',
				'$travel_to',
				'$travel_date',
			
				'$transaction_id',
				'$travel_description',
				'$user_id',
				'$travel_hour',
				'$travel_status',
				'$travel_hotel_name',
				'$travel_check_in',
				'$travel_check_out'
				";
				
		//echo $data;
		create($data);

		header('Location: travel_transaction.php?page=list&did=1');
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$travel_maskapai_name = get_isset($travel_maskapai_name);
		$travel_from = get_isset($travel_from);
		$travel_to = get_isset($travel_to);
		$travel_date = get_isset($travel_date);  $travel_date = format_back_date($travel_date);
		$transaction_id = get_isset($transaction_id);
		$travel_description = get_isset($travel_description);
		$travel_hour = get_isset($travel_hour);
		$travel_hotel_name = get_isset($travel_hotel_name);
		$travel_check_in = get_isset($travel_check_in);  $travel_check_in = format_back_date($travel_check_in);
		$travel_check_out = get_isset($travel_check_out);  $travel_check_out= format_back_date($travel_check_out);
		
		
		$data = "
				travel_cost = 0,
				travel_maskapai_name ='$travel_maskapai_name',
				travel_from ='$travel_from',
				travel_to ='$travel_to',
				travel_date ='$travel_date',
			
				transaction_id = 0,
				travel_description = '$travel_description',
				travel_hour = '$travel_hour',
				travel_hotel_name = '$travel_hotel_name',
				travel_check_in = '$travel_check_in',
				travel_check_out = '$travel_check_out'
				";
				
		
		update($data, $id);

		header('Location: travel_transaction.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: travel_transaction.php?page=list&did=3');

	break;
	
	case 'save_onprogress':
		$id = get_isset($_GET['id']);
		
		save_onprogress($id);
		header('Location: travel_transaction.php?page=list&did=4');
	break;
	
	case 'save_onprogress_approved':
		$id = get_isset($_GET['id']);
		
		save_onprogress($id);
		header('Location: travel_transaction.php?page=list_approved&did=4');
	break;
	
	case 'save_done':
		$id = get_isset($_GET['id']);
		
		save_done($id);
		header('Location: travel_transaction.php?page=list&did=5');
	break;
	
	case 'reject';
		$id = get_isset($_GET['id']);
		
		reject($id);
		header('Location: travel_transaction.php?page=list_approved&did=6');
	break;
}

?>