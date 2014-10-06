<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_event_summary_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Report Event Summary");

switch ($page) {
	
	case 'form':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$date_default = "";
		$date_url = "";
		
		if(isset($_GET['preview'])){
			$i_date = get_isset($_GET['date']);
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
		}
		
		$action = "report_event_summary.php?page=form_result&preview=1";
		
		include '../views/report_event_summary/form.php';
		
		if(isset($_GET['preview'])){
			
				if(isset($_GET['date'])){
					$i_date = $_GET['date'];
				}else{
					extract($_POST);
					$i_date = get_isset($i_date);
				}
			$i_date = str_replace(" ","", $i_date);
			
			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);
			
			$query_item = select_item($date1, $date2);
			
			include '../views/report_event_summary/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$date_default = "";
		$date_url = "";
		
		//if(isset($_GET['preview'])){
			extract($_POST);
			$i_date = (isset($_POST['i_date'])) ? $_POST['i_date'] : null;
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
		//}
		
		header("Location: report_event_summary.php?page=form&preview=1&date=$date_default");
	break;
	

	
	case 'form_detail':
		$title = ucfirst("Report Event Detail");
		get_header();
		
		$close_button = "report_event_summary.php?page=form";

			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			
			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			$row->transaction_date2 = format_date($row->transaction_date2);
			$all_date = $row->transaction_date." - ".$row->transaction_date2;

			$query_trainer_view = read_trainer_view($id);
			$query_agent_view = read_agent_view($id);
		
			include '../views/report_event_summary/form_save.php';
			include '../views/report_event_summary/list_trainer_view.php';
			include '../views/report_event_summary/list_agent_view.php';
			include '../views/report_event_summary/form_comand3.php';
			
		get_footer();
	break;
	
	case 'download_summary':
			
			
			$i_date = get_isset($_GET['date']);
			$i_date = str_replace(" ","", $i_date);
			
			$date = explode("-", $i_date);
			$date1 = format_back_date($date[0]);
			$date2 = format_back_date($date[1]);
			
			$query = select_item($date1, $date2);
			
			//$title = 'ABSENSI';
			
			$title = 'Report_Event_Summary_'.$date1.'-'.$date2;
			$format = create_report($title);
			
			include '../views/report/report_event_summary.php';
			

	break;
	
	case 'download_detail':
			
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			
			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			$row->transaction_date2 = format_date($row->transaction_date2);
			$all_date = $row->transaction_date." - ".$row->transaction_date2;

			$query_trainer_view = read_trainer_view($id);
			$query_agent_view = read_agent_view($id);
			
			$title = 'Report_Event_Detail';
			$format = create_report($title);
			
			include '../views/report/report_event_detail.php';
			

	break;
	
	
}

?>