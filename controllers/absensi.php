<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/absensi_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("absensi");

switch ($page) {
	case 'list':
		get_header();

		$user_id = $_SESSION['user_id'];
		$user_type_id = $_SESSION['user_type_id'];
		$query = select($user_id, $user_type_id);
		$add_button = "absensi.php?page=form";


		include '../views/absensi/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		$jumlah_agent = get_count_agent($id);
		$event_type = get_event_type($id);
		
		$check_data = check_data($id);
		if($check_data > 0){
			if($event_type == 1){
				$action = "absensi.php?page=edit&id=$id";
			}else{
				$action = "absensi.php?page=edit2&id=$id";
			}
		}else{
			if($event_type == 1){
				$action = "absensi.php?page=save&id=$id";
			}else{
				$action = "absensi.php?page=save2&id=$id";
			}
		}
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		
		$close_button = "absensi.php";
		
		if($event_type == 1){
			include '../views/absensi/form.php';
		}else{
			include '../views/absensi/form2.php';
		}
		
		get_footer();
	
	break;
	
	case 'form_view':
		
		
		$type = get_isset($_GET['type']);
		if($type == 2){
			$title = ucfirst("Event Detail");
			$close_button = "report_event_summary.php?page=form";
		}else{
			$close_button = "absensi.php";
		}
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$download_button = "absensi.php?page=download&id=$id";
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		$jumlah_agent = get_count_agent($id);
		$event_type = get_event_type($id);
		
		$check_data = check_data($id);
		
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		
		
		
		if($event_type == 1){
			include '../views/absensi/form_view.php';
		}else{
			include '../views/absensi/form_view2.php';
		}
		
		get_footer();
	
	break;
	
	case 'save':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		
		// load agent
		$query = select2($id);
		$no = 1;
		while($row = mysql_fetch_array($query)){
			
			$save_absensi = save_absensi($id, $row['transaction_agent_id']);
			$new_id = mysql_insert_id();
			$result = 0;
			$value = 0;
			
			for($i=1; $i<=$jumlah_hari; $i++){
				
				
				
				$c_text = isset($_POST["c-".$no."-".$i]) ? $_POST["c-".$no."-".$i] : 0;
				$i_text = isset($_POST["i-".$no."-".$i]) ? $_POST["i-".$no."-".$i] : 0;
				
				$data = "'', '".$new_id."', '".$i."', '".$c_text."', '$i_text'";
				$save_absensi_item = save_absensi_item($data);
				
				$result = $result + $c_text;
				$value = $value + $i_text;
			
			}
			
			$exam_result = ($result == $jumlah_hari) ? 1 : 0;
			$value = $value / $jumlah_hari;
			$exam_value = $value;
			
			$save_absensi2 = save_absensi2($exam_result, $exam_value, $new_id);
			
			

		$no++;
		}
		
		header("location: absensi.php?page=form&id=$id");
	
	break;
	
	case 'save2':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		
		// load agent
		$query = select2($id);
		$no = 1;
		while($row = mysql_fetch_array($query)){
			
			$save_absensi = save_absensi($id, $row['transaction_agent_id']);
			$new_id = mysql_insert_id();
			$result = 0;
			$value = 0;
			
			for($i=1; $i<=$jumlah_hari; $i++){
				
				
				
				$c_text = isset($_POST["c-".$no."-".$i]) ? $_POST["c-".$no."-".$i] : 0;
				//$i_text = isset($_POST["i-".$no."-".$i]) ? $_POST["i-".$no."-".$i] : 0;
				
				$data = "'', '".$new_id."', '".$i."', '".$c_text."', '0'";
				$save_absensi_item = save_absensi_item($data);
				
				//$result = $result + $c_text;
				//$value = $value + $i_text;
			
			}
			
			//$exam_result = ($result == $jumlah_hari) ? 1 : 0;
			//$value = $value / $jumlah_hari;
			//$exam_value = $value;
			
			//$save_absensi2 = save_absensi2($exam_result, $exam_value, $new_id);
			
			

		$no++;
		}
		
		header("location: absensi.php?page=form&id=$id");
	
	break;
	
	case 'edit':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		delete_data($id);
		
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		
		// load agent
		$query = select2($id);
		$no = 1;
		while($row = mysql_fetch_array($query)){
			
			$save_absensi = save_absensi($id, $row['transaction_agent_id']);
			$new_id = mysql_insert_id();
			$result = 0;
			$value = 0;
			
			for($i=1; $i<=$jumlah_hari; $i++){
				
				
				
				$c_text = isset($_POST["c-".$no."-".$i]) ? $_POST["c-".$no."-".$i] : 0;
				$i_text = isset($_POST["i-".$no."-".$i]) ? $_POST["i-".$no."-".$i] : 0;
				
				$data = "'', '".$new_id."', '".$i."', '".$c_text."', '$i_text'";
				$save_absensi_item = save_absensi_item($data);
				
				$result = $result + $c_text;
				$value = $value + $i_text;
			
			}
			
			$exam_result = ($result == $jumlah_hari) ? 1 : 0;
			$value = $value / $jumlah_hari;
			$exam_value = $value;
			
			$save_absensi2 = save_absensi2($exam_result, $exam_value, $new_id);
			
			

		$no++;
		}
		
		header("location: absensi.php?page=form&id=$id");
	
	break;
	
	case 'edit2':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		delete_data($id);
		
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		
		// load agent
		$query = select2($id);
		$no = 1;
		while($row = mysql_fetch_array($query)){
			
			$save_absensi = save_absensi($id, $row['transaction_agent_id']);
			$new_id = mysql_insert_id();
			$result = 0;
			$value = 0;
			
			for($i=1; $i<$jumlah_hari; $i++){
				
				
				
				$c_text = isset($_POST["c-".$no."-".$i]) ? $_POST["c-".$no."-".$i] : 0;
				//$i_text = isset($_POST["i-".$no."-".$i]) ? $_POST["i-".$no."-".$i] : 0;
				
				$data = "'', '".$new_id."', '".$i."', '".$c_text."', '0'";
				$save_absensi_item = save_absensi_item($data);
				
				//$result = $result + $c_text;
				//$value = $value + $i_text;
			
			}
			
			//$exam_result = ($result == $jumlah_hari) ? 1 : 0;
			//$value = $value / $jumlah_hari;
			//$exam_value = $value;
			
			//$save_absensi2 = save_absensi2($exam_result, $exam_value, $new_id);
			
			

		$no++;
		}
		
		header("location: absensi.php?page=form&id=$id");
	
	break;

	case 'download_form':
			
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			//$title = 'ABSENSI';
			$heder = heder($id);
			$query = select2($id);
			$data_event = select_event($id);
			//$title = 'form_absensi_'.$id.'';
			//$format = create_report($title);
			$date1 = $data_event->transaction_date;
			$date2 = $data_event->transaction_date2;		
		
			$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
			$jumlah_hari = $selisih + 1;
			include '../views/report/form_absensi.php';
			

	break;
	
	case 'download':
		//get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		// ambil data event
		$data_event = select_event($id);
		$query = select2($id);
		$jumlah_agent = get_count_agent($id);
		$event_type = get_event_type($id);
		
		$check_data = check_data($id);
		if($check_data > 0){
			if($event_type == 1){
				$action = "absensi.php?page=edit&id=$id";
			}else{
				$action = "absensi.php?page=edit2&id=$id";
			}
		}else{
			if($event_type == 1){
				$action = "absensi.php?page=save&id=$id";
			}else{
				$action = "absensi.php?page=save2&id=$id";
			}
		}
		
		$date1 = $data_event->transaction_date;
		$date2 = $data_event->transaction_date2;		
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		$jumlah_hari = $selisih + 1;
		$title = 'ABSENSI_'.$id.'';
		//$format = create_report($title);
		if($event_type == 1){
			include '../views/report/absensi_pdf.php';
		}else{
			include '../views/report/absensi_pdf2.php';
		}
		
		//get_footer();
	
	break;
}

?>