<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/trainer_ext_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Trainer External");

$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "trainer_ext.php?page=form";


		include '../views/trainer_ext/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "trainer_ext.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->user_birth_date = format_date($row->user_birth_date);
			$row->user_confirm_password = $row->user_password;


			$action = "trainer_ext.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();

			$row->user_code = false;
			$row->user_name = false;
			$row->user_birth_date = false;
			$row->user_email = false;
			$row->user_phone = false;
			$row->city_id = false;
			$row->agency_id = false;
			$row->user_account_number = false;
			$row->user_bank_name = false;
			$row->user_password = false;
			$row->user_login = false;
			$row->user_confirm_password = false;

			$action = "trainer_ext.php?page=save";
		}

		include '../views/trainer_ext/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_login = get_isset($i_login);
		$i_password = get_isset($i_password);
		$i_confirm_password = get_isset($i_confirm_password);
		$i_name = get_isset($i_name);
		$i_code = get_isset($i_code);
		$i_birth_date = get_isset($i_birth_date);
		$i_email = get_isset($i_email);
		$i_phone = get_isset($i_phone);
		$i_city_id = get_isset($i_city_id);
		$i_agency_id = get_isset($i_agency_id);
		$i_account_number = get_isset($i_account_number);
		$i_bank_name = get_isset($i_bank_name);


		$birth_date = explode("/", $i_birth_date);
		$new_birth_date = $birth_date[2]."-".$birth_date[1]."-".$birth_date[0];
		
		$path = "../img/user/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";

		
		if($i_password != $i_confirm_password){

			header('Location: trainer_ext.php?page=form&err=1');

		}else{

			$i_password = md5($i_password);

			$data = "'',
					'3', 
					'$i_login',
					'$i_password', 
					'$i_name', 
					'$i_code', 
					'$new_birth_date', 
					'$i_email', 
					'$i_phone', 
					'$i_city_id',  
					'$i_account_number', 
					'$i_bank_name', 
					'$i_agency_id',
					'$i_img',
					'0'
			";

			create($data);
			if($i_img){
				move_uploaded_file($i_img_tmp, $path.$i_img);
			}

			header('Location: trainer_ext.php?page=list&did=1');

		}
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_login = get_isset($i_login);
		$i_password = get_isset($i_password);
		$i_name = get_isset($i_name);
		$i_code = get_isset($i_code);
		$i_birth_date = get_isset($i_birth_date);
		$i_email = get_isset($i_email);
		$i_phone = get_isset($i_phone);
		$i_city_id = get_isset($i_city_id);
		$i_agency_id = get_isset($i_agency_id);
		$i_account_number = get_isset($i_account_number);
		$i_bank_name = get_isset($i_bank_name);

		$birth_date = explode("/", $i_birth_date);
		$new_birth_date = $birth_date[2]."-".$birth_date[1]."-".$birth_date[0];
		
		$path = "../img/user/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";

		if($i_password != $i_confirm_password){

			header("Location: trainer_ext.php?page=form&id=$id&err=1");

		}else{

			$i_password = md5($i_password);
			if($i_img){
				if(move_uploaded_file($i_img_tmp, $path.$i_img)){
					unlink($path . $row->user_img);

			$data = " user_login = '$i_login', 
					user_password = '$i_password',
					user_name = '$i_name',
					user_code = '$i_code',
					user_birth_date = '$i_birth_date',
					user_email = '$i_email',
					user_phone = '$i_phone',
					city_id = '$i_city_id',
					user_account_number = '$i_account_number',
					user_bank_name = '$i_bank_name',
					agency_id = '$i_agency_id',
					user_img = '$i_img'

			";
				}
			}else{
				$data = " user_login = '$i_login', 
					user_password = '$i_password',
					user_name = '$i_name',
					user_code = '$i_code',
					user_birth_date = '$i_birth_date',
					user_email = '$i_email',
					user_phone = '$i_phone',
					city_id = '$i_city_id',
					user_account_number = '$i_account_number',
					user_bank_name = '$i_bank_name',
					agency_id = '$i_agency_id'
					";
			}

			
			update($data, $id);

			header('Location: trainer_ext.php?page=list&did=2');

		}

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		$row = read_id($id);
		if($row->user_img != ''){
			delete($id);
			unlink("../img/user/".$row->user_img);			
			}	

		header('Location: trainer_ext.php?page=list&did=3');

	break;
}

?>