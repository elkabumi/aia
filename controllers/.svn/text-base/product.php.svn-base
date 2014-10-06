<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/product_model.php';
$page = null;
$page = get_isset($_GET['page']);
$title = ucfirst("Product");

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "product.php?page=form";


		include '../views/product/list.php';
		get_footer();
	break;
	
	case 'list_his':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
		$query = select_his($id);
		
		$back_button = "product.php?page=list";
		}

		include '../views/product/list_his.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "product.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$ada = readonly($id);

			$action = "product.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
			$row->product_code = false;
			$row->product_name = false;
			$row->product_stock = false;

			$action = "product.php?page=save";
		}

		include '../views/product/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_stock = get_isset($i_stock);

		$data = "'','$i_code', '$i_name',$i_stock";

		create($data);

		header('Location: product.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_stock = get_isset($i_stock);
		

		$data = " product_code = '$i_code', product_name = '$i_name', product_stock = '$i_stock'";

		
		update($data, $id);

		header('Location: product.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: product.php?page=list&did=3');

	break;
	
	case 'plus':
	
	get_header();

		$close_button = "product.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);


			$action = "product.php?page=plus_edit&id=$id";
		}

		include '../views/product/form_plus.php';
		get_footer();
		
	break;
	
	case 'plus_edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_product_history_type = 1;
		$i_product_history_qty = get_isset($i_product_history_qty);
		$i_stock =  get_isset($i_stock);
		$i_product_history_balance = $i_stock + $i_product_history_qty;
		$i_product_history_description = get_isset($i_product_history_description);

		$data = " '','$i_product_history_type', '$i_product_history_qty', '$i_product_history_balance', '$i_product_history_description','$id'";
		$data2 = " product_stock = $i_product_history_balance";

		
		action_plus($data, $id, $data2);

		header('Location: product.php?page=list&did=2');

	break;
	
	case 'minus':
	
	get_header();

		$close_button = "product.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);


			$action = "product.php?page=minus_edit&id=$id";
		}

		include '../views/product/form_minus.php';
		get_footer();
		
	break;
	
	case 'minus_edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_product_history_type = 2;
		$i_product_history_qty = get_isset($i_product_history_qty);
		$i_stock =  get_isset($i_stock);
		$i_product_history_balance = $i_stock - $i_product_history_qty;
		$i_product_history_description = get_isset($i_product_history_description);

		$data = " '','$i_product_history_type', '$i_product_history_qty', '$i_product_history_balance', '$i_product_history_description','$id'";
		$data2 = " product_stock = $i_product_history_balance";

		
		action_plus($data, $id, $data2);

		header('Location: product.php?page=list&did=2');

	break;
}

?>