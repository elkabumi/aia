<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/feedback_answer_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Feedback");

switch ($page) {
	case 'list':
		get_header();
			$user_id = $_SESSION['user_id'];
			$user_type_id = $_SESSION['user_type_id'];
			$query = select($user_id, $user_type_id);
			
			$add_button = "feedback_answer.php?page=form";
			include '../views/feedback_answer/list.php';
		get_footer();
	break;
	
	case 'list_agent':
		get_header();
			$id = get_isset($_GET['id']);
			
			$query_event = select_event($id);
			$data_event = mysql_fetch_object($query_event);
			
			$query = select_agent($id);
			$query2 = select_agent($id);
			$query3 = select_agent($id);
			
			$query_p_gts1 = select_p_gts1();
			$query_p_gts2 = select_p_gts2();
			
			$add_button = "feedback_answer.php?page=form";
			$close_button = "feedback_answer.php?page=list";
			include '../views/feedback_answer/list_agent.php';
		get_footer();
	break;
	
	case 'feedback_gts':
		get_header();
			$id = get_isset($_GET['id']);
			
			// ambil data transaction_id
			$transaction_id = get_transaction_id($id);
			
			// ambil data agent
			$agent_name = get_data_agent($id);
			
			// cek apakah sudah pernah di simpan
			$check_data = check_data($id, 1);
			
			// ambil data event
			$query_event = select_event($transaction_id);
			$data_event = mysql_fetch_object($query_event);
			
			
			
			//cek jawaban
			if($check_data > 0){
				//jika sudah pernah disimpan
				$feedback_id = get_feedback_id($id, 1);
				$action = "feedback_answer.php?page=edit_feedback_gts&id=$id";
				
				// ambil soal tipe gts format 1 edit
				$query_p_gts1 = select_p_gts1_edit($feedback_id);
				
				// ambil soal tipe gts format 2 edit
				$query_p_gts2 = select_p_gts2_edit($feedback_id);
				
				// ambil soal tipe gts format 3 edit
				$query_p_gts3 = select_p_gts3_edit($feedback_id);
				
				// ambil soal tipe gts format 4 edit
				$query_p_gts4 = select_p_gts4_edit($feedback_id);
				
			}else{
				
				// ambil soal tipe gts format 1
				$query_p_gts1 = select_p_gts1();
				
				// ambil soal tipe gts format 2
				$query_p_gts2 = select_p_gts2();
				
				// ambil soal tipe gts format 3
				$query_p_gts3 = select_p_gts3();
				
				// ambil soal tipe gts format 4
				$query_p_gts4 = select_p_gts4();
				
				//jika belum disimpan	
				$action = "feedback_answer.php?page=save_feedback_gts&id=$id";
			}
			
			
			$close_button = "feedback_answer.php?page=list_agent&id=$transaction_id";
			include '../views/feedback_answer/form_feedback_gts.php';
		get_footer();
	break;
	
	case 'save_feedback_gts';
		$id = get_isset($_GET['id']);
		$transaction_id = get_transaction_id($id);
		//simpan di tabel feedbacks
		$save_feedback = save_feedback($id, 1);
		
		// load soal tipe gts format 1
		$query_p_gts1 = select_p_gts1();
		$no1 = 1;
		while($row_p_gts1 = mysql_fetch_array($query_p_gts1)){
			$r = get_isset($_POST["r".$no1]);
			$data = "'', '".$row_p_gts1['feedback_item_id']."', '".$row_p_gts1['feedback_question']."', '".$row_p_gts1['feedback_format_id']."', '$r', '".$save_feedback."'";
			$save_answer1 = save_answer($data);
		$no1++;
		}
		// load soal tipe gts format 2
		$query_p_gts2 = select_p_gts2();
		$no2 = 1;
		while($row_p_gts2 = mysql_fetch_array($query_p_gts2)){
			$r2 = get_isset($_POST["r2".$no2]);
			$data = "'', '".$row_p_gts2['feedback_item_id']."', '".$row_p_gts2['feedback_question']."', '".$row_p_gts2['feedback_format_id']."', '$r2', '".$save_feedback."'";
			$save_answer2 = save_answer($data);
		$no2++;
		}
		
		// load soal tipe gts format 3
		$query_p_gts3 = select_p_gts3();
		$no3 = 1;
		while($row_p_gts3 = mysql_fetch_array($query_p_gts3)){
			$r3 = get_isset($_POST["r3".$no3]);
			$data = "'', '".$row_p_gts3['feedback_item_id']."', '".$row_p_gts3['feedback_question']."', '".$row_p_gts3['feedback_format_id']."', '$r3', '".$save_feedback."'";
			$save_answer3 = save_answer($data);
		$no3++;
		}
		
		// load soal tipe gts format 4
		$query_p_gts4 = select_p_gts4();
		$no4 = 1;
		while($row_p_gts4 = mysql_fetch_array($query_p_gts4)){
			$r4 = get_isset($_POST["r4".$no4]);
			$data = "'', '".$row_p_gts4['feedback_item_id']."', '".$row_p_gts4['feedback_question']."', '".$row_p_gts4['feedback_format_id']."', '$r4', '".$save_feedback."'";
			$save_answer4 = save_answer($data);
		$no4++;
		}
		 
		echo"<script> window.location='feedback_answer.php?page=list_agent&id=$transaction_id&did=1'</script>";
	break;
	
	case 'edit_feedback_gts';
		$id = get_isset($_GET['id']);
		
		
		$transaction_id = get_transaction_id($id);
		$feedback_id = get_feedback_id($id, 1);
		
		//$delete_feedback = delete_feedback($feedback_id);
		//$delete_feedback_answer = delete_feedback_answer($feedback_id);
		
		//simpan di tabel feedbacks
		//$save_feedback = save_feedback($id, 1);
		
	
		$query_p_gts1 = select_p_gts1_edit($feedback_id);
		$no1 = 1;
		while($row_p_gts1 = mysql_fetch_array($query_p_gts1)){
			$r = get_isset($_POST["r".$no1]);
			
			$edit_answer1 = edit_answer($r, $row_p_gts1['feedback_answer_id']);
		$no1++;
		}
		// load soal tipe gts format 2
		$query_p_gts2 = select_p_gts2_edit($feedback_id);
		$no2 = 1;
		while($row_p_gts2 = mysql_fetch_array($query_p_gts2)){
			$r2 = get_isset($_POST["r2".$no2]);
			
			$edit_answer2 = edit_answer($r2, $row_p_gts2['feedback_answer_id']);
		$no2++;
		}
		
		// load soal tipe gts format 3
		$query_p_gts3 = select_p_gts3_edit($feedback_id);
		$no3 = 1;
		while($row_p_gts3 = mysql_fetch_array($query_p_gts3)){
			$r3 = get_isset($_POST["r3".$no3]);
			
			$edit_answer3 = edit_answer($r3, $row_p_gts3['feedback_answer_id']);
		$no3++;
		}
		
		// load soal tipe gts format 4
		$query_p_gts4 = select_p_gts4_edit($feedback_id);
		$no4 = 1;
		while($row_p_gts4 = mysql_fetch_array($query_p_gts4)){
			$r4 = get_isset($_POST["r4".$no4]);
			
			$edit_answer4 = edit_answer($r4, $row_p_gts4['feedback_answer_id']);
		$no4++;
		}
		
		echo"<script> window.location='feedback_answer.php?page=list_agent&id=$transaction_id&did=1'</script>";
	break;
	
	case 'feedback_fac':
		get_header();
			$id = get_isset($_GET['id']);
			
			// ambil data transaction_id
			$transaction_id = get_transaction_id($id);
			
			// ambil data agent
			$agent_name = get_data_agent($id);
			
			// cek apakah sudah pernah di simpan
			$check_data = check_data($id, 2);
			
			// ambil data event
			$query_event = select_event($transaction_id);
			$data_event = mysql_fetch_object($query_event);
			
			
			
			//cek jawaban
			if($check_data > 0){
				//jika sudah pernah disimpan
				$feedback_id = get_feedback_id($id, 2);
				$action = "feedback_answer.php?page=edit_feedback_fac&id=$id";
				
				// ambil soal tipe fac format 3
				$query_p_fac3 = select_p_fac3_edit($feedback_id);
				
				// ambil soal tipe fac format 4
				$query_p_fac4 = select_p_fac4_edit($feedback_id);
				
				// ambil soal tipe fac format 5
				$query_p_fac5 = select_p_fac5_edit($feedback_id);
				
			}else{
				
				// ambil soal tipe fac format 3
				$query_p_fac3 = select_p_fac3();
				
				// ambil soal tipe fac format 4
				$query_p_fac4 = select_p_fac4();
				
				// ambil soal tipe fac format 5
				$query_p_fac5 = select_p_fac5();
				
				//jika belum disimpan	
				$action = "feedback_answer.php?page=save_feedback_fac&id=$id";
			}
			
			
			$close_button = "feedback_answer.php?page=list_agent&id=$transaction_id";
			include '../views/feedback_answer/form_feedback_fac.php';
		get_footer();
	break;
	
	case 'save_feedback_fac';
		$id = get_isset($_GET['id']);
		$transaction_id = get_transaction_id($id);
		//simpan di tabel feedbacks
		$save_feedback = save_feedback($id, 2);
		
		// load soal tipe fac format 3
		$query_p_fac3 = select_p_fac3();
		$no1 = 1;
		while($row_p_fac3 = mysql_fetch_array($query_p_fac3)){
			$r = get_isset($_POST["r".$no1]);
			$data = "'', '".$row_p_fac3['feedback_item_id']."', '".$row_p_fac3['feedback_question']."', '".$row_p_fac3['feedback_format_id']."', '$r', '".$save_feedback."'";
			$save_answer3 = save_answer($data);
		$no1++;
		}
		// load soal tipe fac format 4
		$query_p_fac4 = select_p_fac4();
		$no2 = 1;
		while($row_p_fac4 = mysql_fetch_array($query_p_fac4)){
			$r2 = get_isset($_POST["i_answer".$no2]);
			$data = "'', '".$row_p_fac4['feedback_item_id']."', '".$row_p_fac4['feedback_question']."', '".$row_p_fac4['feedback_format_id']."', '$r2', '".$save_feedback."'";
			$save_answer4 = save_answer($data);
		$no2++;
		}
		
		// load soal tipe fac format 4
		$query_p_fac5 = select_p_fac5();
		$no3 = 1;
		while($row_p_fac5 = mysql_fetch_array($query_p_fac5)){
			$r3 = get_isset($_POST["rp".$no3]);
			$data = "'', '".$row_p_fac5['feedback_item_id']."', '".$row_p_fac5['feedback_question']."', '".$row_p_fac5['feedback_format_id']."', '$r3', '".$save_feedback."'";
			$save_answer5 = save_answer($data);
		$no3++;
		}
		
			echo"<script> window.location='feedback_answer.php?page=list_agent&id=$transaction_id&did=2'</script>";
	
	break;
	
	case 'edit_feedback_fac';
		$id = get_isset($_GET['id']);
		
		$transaction_id = get_transaction_id($id);
		$feedback_id = get_feedback_id($id, 2);
		
		//$delete_feedback = delete_feedback($feedback_id);
		//$delete_feedback_answer = delete_feedback_answer($feedback_id);
		
		//simpan di tabel feedbacks
		//$save_feedback = save_feedback($id, 2);
		
		$query_p_fac3 = select_p_fac3_edit($feedback_id);
		$no1 = 1;
		while($row_p_fac3 = mysql_fetch_array($query_p_fac3)){
			$r = get_isset($_POST["r".$no1]);
			
			$edit_answer3 = edit_answer($r, $row_p_fac3['feedback_answer_id']);
		$no1++;
		}
		// load soal tipe fac format 4
		$query_p_fac4 = select_p_fac4_edit($feedback_id);
		$no2 = 1;
		while($row_p_fac4 = mysql_fetch_array($query_p_fac4)){
			$r2 = get_isset($_POST["i_answer".$no2]);
			
			$edit_answer4 = edit_answer($r2, $row_p_fac4['feedback_answer_id']);
		$no2++;
		}
		
		// load soal tipe fac format 4
		$query_p_fac5 = select_p_fac5_edit($feedback_id);
		$no3 = 1;
		while($row_p_fac5 = mysql_fetch_array($query_p_fac5)){
			$r3 = get_isset($_POST["rp".$no3]);
			
			$edit_answer5 = edit_answer($r3, $row_p_fac5['feedback_answer_id']);
		$no3++;
		}
		
		header("Location: feedback_answer.php?page=list_agent&id=$transaction_id&did=2");
		
	break;
	
	case 'report_gts':
		$title = ucfirst("Report Feedback");
		get_header();
			$id = get_isset($_GET['id']);
			

			// ambil data event
			$query_event = select_event($id);
			$data_event = mysql_fetch_object($query_event);
			
			// ambil soal tipe gts format 1
			$query_p_gts1 = select_p_gts1();
			
			// ambil soal tipe gts format 2
			$query_p_gts2 = select_p_gts2();
			
			// ambil soal tipe gts format 3
			$query_p_gts3 = select_p_gts3();
			
			// ambil soal tipe gts format 4
			$query_p_gts4 = select_p_gts4();
			
			$count_title_agent = count_title_agent($id, 1);
			$query_title_agent = select_title_agent($id, 1);
			
			$query_title_agent2 = select_title_agent($id, 1);
			
			$query_title_agent3 = select_title_agent($id, 1);
			
			$query_title_agent4 = select_title_agent($id, 1);
			
			
			$close_button = "feedback_answer.php?page=list";
			include '../views/feedback_answer/report_gts.php';
		get_footer();
	break;
	
	case 'report_fac':
		$title = ucfirst("Report Facilitator");
		get_header();
			$id = get_isset($_GET['id']);

			// ambil data event
			$query_event = select_event($id);
			$data_event = mysql_fetch_object($query_event);
			
			// ambil soal tipe gts format 1
			$query_p_fac3 = select_p_fac3();
			
			$count_title_agent = count_title_agent($id, 2);
			$count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
			$query_title_agent = select_title_agent($id, 2);
			$query_title_agent2 = select_title_agent($id, 2);
			
			
			$close_button = "feedback_answer.php?page=list";
			include '../views/feedback_answer/report_facilitator.php';
		get_footer();
	break;
	
	case 'download_gts':
			
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			
			// ambil data event
			$query_event = select_event($id);
			$data_event = mysql_fetch_object($query_event);
			
			// ambil soal tipe gts format 1
			$query_p_gts1 = select_p_gts1();
			
			// ambil soal tipe gts format 2
			$query_p_gts2 = select_p_gts2();
			
			// ambil soal tipe gts format 3
			$query_p_gts3 = select_p_gts3();
			
			// ambil soal tipe gts format 4
			$query_p_gts4 = select_p_gts4();
			
			$count_title_agent = count_title_agent($id, 1);
			$query_title_agent = select_title_agent($id, 1);
			
			$query_title_agent2 = select_title_agent($id, 1);
			
			$query_title_agent3 = select_title_agent($id, 1);
			
			$query_title_agent4 = select_title_agent($id, 1);
			
			$title = 'Report_Feedback_GTS';
			$format = create_report($title);
			
			include '../views/report/report_feedback_gts.php';
			

	break;
	
	case 'download_fac':
			
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			
			
			// ambil data event
			$query_event = select_event($id);
			$data_event = mysql_fetch_object($query_event);
			
			// ambil soal tipe gts format 1
			$query_p_fac3 = select_p_fac3();
			
			$count_title_agent = count_title_agent($id, 2);
			$count_title_agent = ($count_title_agent == 0) ? 1 : $count_title_agent;
			$query_title_agent = select_title_agent($id, 2);
			$query_title_agent2 = select_title_agent($id, 2);
			
			$title = 'Report_Feedback_facilitator';
			$format = create_report($title);
			
			include '../views/report/report_feedback_facilitator.php';
			

	break;
}

?>