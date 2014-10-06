<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/training_dashboard_model.php';
include '../models/global_model.php';
$page = null;

$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$title = ucfirst("training dashboard");


switch ($page) {
	case 'list':
		get_header();

		
		$query_unit = select_unit();
		$add_button = "training_dashboard.php?page=form";
		$upload_button = "training_dashboard.php?page=upload_event";


		include '../views/training_dashboard/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "training_dashboard.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			$row->transaction_date2 = format_date($row->transaction_date2);
			$all_date = $row->transaction_date." - ".$row->transaction_date2;
			
			$action = "training_dashboard.php?page=edit&id=$id";
		}else{
			
			
			//inisialisasi
			$row = new stdClass();
			$row->transaction_date = false;
			$row->transaction_hour = false;
			$row->transaction_hour2 = false;
			$row->transaction_name = get_event_code();
			$row->transaction_description = false;
			$row->transaction_status = false;
			$row->transaction_type_id = false;
			$row->user_account_number = false;
			$row->unit_id = false;
			$all_date = false;
		
			
			$action = "training_dashboard.php?page=save";
		}
		

		include '../views/training_dashboard/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$event_name = get_event_code();// get_isset($event_name);
		$event_date = get_isset($event_date);  
		$event_date = str_replace(" ","", $event_date);
		
		$ev = explode("-", $event_date);
		$date1 = format_back_date($ev[0]);
		$date2 = format_back_date($ev[1]);
		
		$type_id = get_isset($type_id);
		$unit_id = get_isset($unit_id);
		$event_description = get_isset($event_description);
		$user_id = $_SESSION['user_id'];
		if($_SESSION['user_type_id'] ==  2 ){
			$trainer_id =  $_SESSION['user_id'];
		}else{
			$trainer_id ='0';
		}
		
		$selisih=(strtotime($date2)-strtotime($date1))/(60*60*24);
		
		if($type_id == '1' and $selisih > 1){
				header("Location: training_dashboard.php?page=form&unit_id=$id&err=1");
				if($selisih == 0){
			header("Location: training_dashboard.php?page=form&unit_id=$id&err=1");
				}
		}else{
		
		
		

			$data = "'',
					'$date1', 
					'$date2', 
					'$event_name',
					'$event_description', 
					'0', 
					'$type_id', 
					'$unit_id', 
					'$user_id',
					'$trainer_id',
					'0',
					'0',
					'$event_hour',
					'$event_hour2',
					'1',
					'0'
					";
		
			create($data);
			//echo "$date_awal\n";
			$id=mysql_insert_id();
			mysql_query('UPDATE config SET event_code=event_code+1');
			$date_awal = format_back_date($ev[0]);
			$date_awal = date ("Y-m-d", strtotime("+1 day", strtotime($date_awal)));
			$no =2;
			while (strtotime($date_awal) <= strtotime($date2)) {
					$data2 = "'',
							'$date_awal', 
							'', 
							'$event_name',
							'$event_description', 
							'0', 
							'$type_id', 
							'$unit_id',
							'$user_id',
							'$trainer_id',
							'0',
							'0',
							'$event_hour',
							'$event_hour2',
							'$no',
							'$id'
							";
					create($data2);
					//echo "$date_awal\n";
        	 		$date_awal = date ("Y-m-d", strtotime("+1 day", strtotime($date_awal)));
   				$no++;
			}
		
				//create_date2($id, $date2);
			if($_SESSION['user_type_id'] ==  2 ){
				create_trainer($trainer_id,$id);
			}
			header('Location: training_dashboard.php?page=form_save&id='.$id.'');
		}
	
	break;
	
	case 'save2':
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$get_id_triner = get_id_trainer($id);
	//	$update_sign_by_id 	= update_sign_by_id($get_id_triner, $id);
		mysql_query("update transactions set trainer_id='".$get_id_triner."' WHERE transaction_id='".$id."' OR transaction_type_date_id='".$id."'");
		header('Location: training_dashboard.php?page=form_save&id='.$id.'&ok=1');	
	break;
	
	case 'form_save':
		get_header();

			$close_button = "training_dashboard.php?page=list";

			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$add = (isset($_GET['add'])) ? $_GET['add'] : null;
			$ses_id = session_id();
			
			
			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			$row->transaction_date2 = format_date($row->transaction_date2);
			$all_date = $row->transaction_date." - ".$row->transaction_date2;
			
			include '../views/training_dashboard/form_save.php';
			
			if($_SESSION['user_type_id'] ==  '1'){
				$action = "training_dashboard.php?page=save_trainer&id=$id";
			
				$query_trainer_view = read_trainer_view($id);
				$add_button = "training_dashboard.php?page=form_save&id=$id&add=1";
				$save2 = "training_dashboard.php?page=save2&id=$id";
				
				$cek_total_trainer =cek_total_trainer($id);
				if(isset($_GET['ok']) && $_GET['ok'] == 1){
					include '../views/training_dashboard/list_trainer_view.php';
				}else{
					include '../views/training_dashboard/list_trainer.php';
				}
				if($add == '1'){
					include '../views/training_dashboard/form_trainer.php';
				}
				if($cek_total_trainer == '1'){
					include '../views/training_dashboard/form_comand2.php';
					
				}
				
			}else if($_SESSION['user_type_id'] ==  '2'){
				include '../views/training_dashboard/form_comand4.php';
			}
			
			
		get_footer();
	break;
	
	case 'form_save2':
	
			$action = "training_dashboard.php?page=save_trainer&id=$id";
			$save = "training_dashboard.php?page=save_all&id=$id";
			$add_button = "training_dashboard.php?page=form_save&id=$id&add=1";
			$add_agent = "training_dashboard.php?page=list_agent&id=$id";
			$upload_xls = "training_dashboard.php?page=upload_xls&id=$id";
			
			
			$action2 = "training_dashboard.php?page=save_agent&id=$id";
			$back_button2 = "training_dashboard.php?page=form_save&id=$id";
			$close_button2 = "training_dashboard.php?page=list_agent&id=$id";
			
			
			$query_trainer_tmp = read_trainer_tmp($id,$ses_id);
			$query_agent_tmp = read_agent_tmp($id,$ses_id);
		
		
			include '../views/training_dashboard/list_trainer.php';
			
			if($add == '1'){
				include '../views/training_dashboard/form_trainer.php';
			}
			
			include '../views/training_dashboard/list_agent.php';
			
			if($add == '2'){
				include '../views/training_dashboard/form_agent.php';
			}
			
			include '../views/training_dashboard/form_comand.php';
			
		get_footer();
	break;
	
	case 'form_save_view':
		get_header();

		$close_button = "training_dashboard.php?page=list";

			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$add_train = (isset($_GET['add_train'])) ? $_GET['add_train'] : null;
			$ses_id = session_id();
			
		
			$action		= "training_dashboard.php?page=save_trainer&id=$id";
			$save 		= "training_dashboard.php?page=save_all&id=$id";
			$add_button = "training_dashboard.php?page=form_save&id=$id&add=1";
			$add_agent 	= "training_dashboard.php?page=list_agent&id=$id";
			$upload_xls = "training_dashboard.php?page=upload_xls&id=$id";
			$add 		= "training_dashboard.php?page=form_agent_event&id=$id";
			
			
			
			
			$row = read_id($id);
			$row->transaction_date	= format_date($row->transaction_date);
			$row->transaction_date2	= format_date($row->transaction_date2);
			$all_date = $row->transaction_date." - ".$row->transaction_date2;
			
			
			$query_trainer_view = read_trainer_view($id);
			
		
			include '../views/training_dashboard/form_save.php';
			include '../views/training_dashboard/list_trainer_view.php';
		

				$add_button2 = "training_dashboard.php?page=form_save_view&id=$id&add_train=1";
				
				$close_button2 = "training_dashboard.php?page=form_save_view&id=$id";
				
				$query_agent_tmp = read_agent_tmp($id,$ses_id);
				
				include '../views/training_dashboard/list_agent.php';
				if($add_train == '1'){
					
					$get_type_transaction	=cek_type_transaction($id);
					
					if (isset($_GET['pageno2'])) {
   						$pageno2 = $_GET['pageno2'];
					}else {
   						$pageno2 = 1;
					}
					$where = "";
					if($_POST['search']){
  						$where = "AND a.agent_ktp_number like '%".$_POST['search']."%'"; 
  					}
	 
					$count_data = count_data_form_agent($get_type_transaction,$where);
					$rows_per_page = 10;
					$lastpage      = ceil($count_data/$rows_per_page);

					$pageno2 = (int)$pageno2;
					if ($pageno2 > $lastpage) {
						$pageno2 = $lastpage;
					} 
					if ($pageno2 < 1) {
						$pageno2 = 1;
					} 		
					
			
					
					$limit = 'LIMIT ' .($pageno2 - 1) * $rows_per_page .',' .$rows_per_page;
					$query = select_agent($get_type_transaction,$where,$limit);		
					
					$add_form_agent 	= "training_dashboard.php?page=form_agent_event&id=$id";
					$close_form_agent = "training_dashboard.php?page=form_save_view&id=$id";
						
						include '../views/training_dashboard/form_list_agent.php';
					}
					
			
			$count_agent_tmp=count_agent_tmp($id);
			include '../views/training_dashboard/form_comand.php';
		get_footer();
	break;
	
	case 'form_save_view2':
		get_header();

		$close_button = "training_dashboard.php?page=list";

			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$add = (isset($_GET['add'])) ? $_GET['add'] : null;
			$ses_id = session_id();
			$close_button = "training_dashboard.php?page=list";
		
			
			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			$row->transaction_date2 = format_date($row->transaction_date2);
			$all_date = $row->transaction_date." - ".$row->transaction_date2;
			
			
			$query_trainer_view = read_trainer_view($id);
			$query_agent_view = read_agent_view($id);
		
			include '../views/training_dashboard/form_save.php';
			include '../views/training_dashboard/list_trainer_view.php';
		

			include '../views/training_dashboard/list_agent_view.php';
			
			
			include '../views/training_dashboard/form_comand3.php';
			
		get_footer();
	break;
	
	
	case 'upload_xls';
		get_header();
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;	
			$add = (isset($_GET['add'])) ? $_GET['add'] : null;
			
			$get_type_transaction=cek_type_transaction($id);
			if($get_type_transaction == '3' or $get_type_transaction == '4'){
				$type_excel = '*(Man Power Existing Agent)';
				$action = "training_dashboard.php?page=save_xls2&id=$id";
			}else{
				$action = "training_dashboard.php?page=save_xls&id=$id";
			}
			include '../views/training_dashboard/form_upload_xls.php';
			
			
		get_footer();
	break;
	
	case 'save_xls':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$add = (isset($_GET['add'])) ? $_GET['add'] : null;
		$ses_id = session_id();
		$user_id = $_SESSION['user_id'];
			
				$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
				$hasildata = $data->rowcount($sheet_index=0);
					
	
					for($l=2; $l<=$hasildata; $l++)
					{	
								$agent_ktp_number		= trim($data->val($l,1)); 	//nomor_ktp *
							
								$cek_ktp_number=get_ktp_number($agent_ktp_number);
							
								if($cek_ktp_number > '0'){
									
									$id_agent=get_id_agent_tmp($agent_ktp_number);
									$id_transaction_agents_tmp_id = cek_transaction_agent_tmp($ses_id,$id,$id_agent);
									
									if($id_transaction_agents_tmp_id != '0'){
										continue;
									}
									$get_type_transaction=cek_type_transaction($id);
								
									if($get_type_transaction == '1'){
										$cek_pass_status = pass_status($id_agent);

										if($cek_pass_status == '1'){
												continue;
										}
									}
									$cek_status = cek_status($id_agent);
									if($cek_status['agent_active_status'] == '0'){
										continue;
									}
									
									mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$ses_id."','".$id."','".$id_agent."')");
									mysql_query("UPDATE agents SET agent_active_status = '0' where agent_id='$id_agent'");
										
										
								}else{
									$agent_ktp_number		= trim($data->val($l,1)); 	//nomor_ktp *
									$kode_agent 			= trim($data->val($l,2));  			 
									$nama_lengkap			= trim($data->val($l,3)); 			 
									$nama_leader 			= trim($data->val($l,4));		 		 
									$nama_agency			= trim($data->val($l,5)); 			 
									$nomer_handphone 		= trim($data->val($l,6)); 			 
									$lokasi_gts				= trim($data->val($l,7)); 			 
									$date_gts				= trim($data->val($l,8)); 				 
										
									$sess_id				= session_id();
									$input_date = date('y-m-d');	
										
									
									if($agent_ktp_number  == ''){
										continue;
									}
									mysql_query("INSERT INTO agents_tmp_event values ('',
																					'".$agent_ktp_number."',
																					'".$kode_agent."',
																					'".$nama_lengkap."',
																					'".$nama_leader."',
																					'".$nama_agency."',
																					'".$nomer_handphone."',
																					'".$lokasi_gts."',
																					'".$date_gts."',
																					'".$sess_id ."',
																					'".$user_id."',
																					'".$input_date."'
																					);");
																			
																	
										
						
							}
					}
	
			header('Location: training_dashboard.php?page=list_agent_tmp&id='.$id.'');
	
		
		
	break;
	
	
	
	case 'save_xls2':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$add = (isset($_GET['add'])) ? $_GET['add'] : null;
		$ses_id = session_id();
		$user_id = $_SESSION['user_id'];
			
				$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
				$hasildata = $data->rowcount($sheet_index=0);
				$user_id = $_SESSION['user_id'];	
				$sess_id				= session_id();	
					
					for($l=7; $l<=$hasildata; $l++)
					{
								$agen_ktp 				= trim($data->val($l,22));	//nomor_ktp *
							
								$cek_ktp_number=get_ktp_number($agen_ktp);
							
								if($cek_ktp_number > '0'){
									
									$id_agent=get_id_agent_tmp($agen_ktp);
									$id_transaction_agents_tmp_id = cek_transaction_agent_tmp($ses_id,$id,$id_agent);
									
									if($id_transaction_agents_tmp_id != '0'){
										continue;
									}
									
									$cek_status = cek_status($id_agent);
									if($cek_status['agent_active_status'] == '0'){
										continue;
									}
									
									mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$ses_id."','".$id."','".$id_agent."')");
									mysql_query("UPDATE agents SET agent_active_status = '0' where agent_id='$id_agent'");
									
									$distrik_kode			= trim($data->val($l,2)); 	//nomor_ktp *
									$distrik_name 			= trim($data->val($l,3));  			 
									$cabang_kode			= trim($data->val($l,4)); 			 
									$cabang_name 			= trim($data->val($l,5));		 		 
									$branch_dimicile_kode			= trim($data->val($l,7)); 			 
									$branch_dimicile_name 		= trim($data->val($l,8)); 			 
									$agen_clien				= trim($data->val($l,9)); 			 
									
									$agen_level 			= trim($data->val($l,12)); 			 
									$agen_vip				= trim($data->val($l,13)); 			 
									$agen_tgl_masuk 		= trim($data->val($l,14));		 		 
									$agen_tgl_promosi			= trim($data->val($l,15)); 			 			  				 			 
									$agen_nomer_id			= trim($data->val($l,21)); 			 
									$agen_npwp				= trim($data->val($l,23)); 			 
									$agen_ptkp 	= trim($data->val($l,24));		 		 
									$agen_kode_lisensi			= trim($data->val($l,25)); 				 
									$agen_jenis_lisensi				= trim(strtolower($data->val($l,27))); 			 
									$agen_tgl_exp				= trim($data->val($l,28));  				 
									$agen_status_lsf_lisensi		= addslashes(trim($data->val($l,29))); 	//nomor_ktp *
									$agen_tgl_inception			= trim($data->val($l,30));  			 
									$agen_tgl_aktif				= trim($data->val($l,31)); 			 
									$recruiting_clien 			= trim($data->val($l,32));
									$recruiting_kode			= trim($data->val($l,33)); 			 
									$recruiting_name			= trim($data->val($l,34));		 		 
									$recruiting_level			= trim($data->val($l,35)); 			 
									$spv_clien 					= trim($data->val($l,36)); 			 
									$spv_code					= trim($data->val($l,37)); 			 
									$spv_name					= trim($data->val($l,38));  				 
									$spv_level					= trim($data->val($l,39)); 	//nomor_ktp *
									$spv_status					= trim($data->val($l,40));  
									$type_data					='1'; //data agen sudah ada 
									
									mysql_query("INSERT INTO agents_tmp_event2 values ('',
																					'".$id_agent."',
																					'".$distrik_kode."',
																					'".$distrik_name."',
																					'".$cabang_kode."',
																					'".$cabang_name."',
																					'".$branch_dimicile_kode."',
																					'".$branch_dimicile_name."',
																					'".$agen_clien."',
																					'',
																					'',
																					'".$agen_level."',
																					'".$agen_vip."',
																					
																					'".$agen_tgl_masuk."',
																					'".$agen_tgl_promosi."',
																					'',
																					'',
																					'".$agen_maritial."',
																					'',
																					'',
																					'".$agen_nomer_id."',
																					'',
																					'".$agen_npwp."',
																					'".$agen_ptkp."',
																					
																					'".$agen_kode_lisensi."',
																					'',
																					'".$agen_jenis_lisensi."',
																					'".$agen_tgl_exp."',
																					'".$agen_status_lsf_lisensi."',
																					'".$agen_tgl_inception."',
																					'".$agen_tgl_aktif."',
																					'".$recruiting_clien."',
																					'".$recruiting_kode ."',
																					'".$recruiting_name."',
																					'".$recruiting_level."',
																					
																					'".$spv_clien."',
																					'".$spv_code."',
																					'".$spv_name."',
																					'".$spv_level ."',
																					'".$spv_status."',
																					'".$sess_id."',
																					'".$user_id."',
																					'".$type_data."'
																					);");		
						
	
								}else{
									
									if($agen_ktp == ''){
										continue;
									}
							
								
									$distrik_kode			= trim($data->val($l,2)); 	//nomor_ktp *
									$distrik_name 			= trim($data->val($l,3));  			 
									$cabang_kode			= trim($data->val($l,4)); 			 
									$cabang_name 			= trim($data->val($l,5));		 		 
									$branch_dimicile_kode	= trim($data->val($l,7)); 			 
									$branch_dimicile_name 	= trim($data->val($l,8)); 			 
									$agen_clien				= trim($data->val($l,9)); 			 
									$agen_code				= trim($data->val($l,10));
									$agen_name				= addslashes(trim($data->val($l,11))); 	
									$agen_level 			= trim($data->val($l,12)); 			 
									$agen_vip				= trim($data->val($l,13)); 			 
									$agen_tgl_masuk 		= trim($data->val($l,14));		 		 
									$agen_tgl_promosi		= trim($data->val($l,15)); 			 
									$agen_tgl_lahir 		= trim($data->val($l,16)); 			 
									$agen_jenkel			= trim(strtolower($data->val($l,17))); 			 
									$agen_maritial			= trim(strtolower($data->val($l,18)));  				 
									$agen_agama				= trim(strtolower($data->val($l,19))); 
									$agen_pendidikan 		= trim($data->val($l,20));  			 
									$agen_nomer_id			= trim($data->val($l,21)); 			 
									$agen_ktp 				= trim($data->val($l,22));
									
									$agen_npwp				= trim($data->val($l,23)); 			 
									$agen_ptkp 				= trim($data->val($l,24));		 		 
									$agen_kode_lisensi		= trim($data->val($l,25)); 			 
									$agen_tipe_lisensi 		= trim($data->val($l,26)); 			 
									$agen_jenis_lisensi		= trim($data->val($l,27)); 			 
									$agen_tgl_exp			= trim($data->val($l,28));  				 
									$agen_status_lsf_lisensi	= addslashes(trim($data->val($l,29))); 	//nomor_ktp *
									$agen_tgl_inception			= trim($data->val($l,30));  			 
									$agen_tgl_aktif				= trim($data->val($l,31)); 			 
									$recruiting_clien 			= trim($data->val($l,32));
									
									$recruiting_kode			= trim($data->val($l,33)); 			 
									$recruiting_name			= trim($data->val($l,34));		 		 
									$recruiting_level			= trim($data->val($l,35)); 			 
									$spv_clien 					= trim($data->val($l,36)); 			 
									$spv_code					= trim($data->val($l,37)); 			 
									$spv_name					= trim($data->val($l,38));  				 
									$spv_level					= trim($data->val($l,39)); 	//nomor_ktp *
									$spv_status					= trim($data->val($l,40));  
									$type_data					='2'; //data agen belum ada 
									
									mysql_query("INSERT INTO agents_tmp_event2 values ('',
																					'',
																					'".$distrik_kode."',
																					'".$distrik_name."',
																					'".$cabang_kode."',
																					'".$cabang_name."',
																					'".$branch_dimicile_kode."',
																					'".$branch_dimicile_name."',
																					'".$agen_clien."',
																					'".$agen_code."',
																					'".$agen_name ."',
																					'".$agen_level."',
																					'".$agen_vip."',
																					
																					'".$agen_tgl_masuk."',
																					'".$agen_tgl_promosi."',
																					'".$agen_tgl_lahir."',
																					'".$agen_jenkel."',
																					'".$agen_maritial."',
																					'".$agen_agama."',
																					'".$agen_pendidikan."',
																					'".$agen_nomer_id."',
																					'".$agen_ktp ."',
																					'".$agen_npwp."',
																					'".$agen_ptkp."',
																					
																					'".$agen_kode_lisensi."',
																					'".$agen_tipe_lisensi."',
																					'".$agen_jenis_lisensi."',
																					'".$agen_tgl_exp."',
																					'".$agen_status_lsf_lisensi."',
																					'".$agen_tgl_inception."',
																					'".$agen_tgl_aktif."',
																					'".$recruiting_clien."',
																					'".$recruiting_kode ."',
																					'".$recruiting_name."',
																					'".$recruiting_level."',
																					
																					'".$spv_clien."',
																					'".$spv_code."',
																					'".$spv_name."',
																					'".$spv_level ."',
																					'".$spv_status."',
																					'".$sess_id."',
																					'".$user_id."',
																					'".$type_data."'
																					);");		
					
				}
			}
			header('Location: training_dashboard.php?page=list_agent_tmp2&id='.$id.'');
	
		
		
	break;
	
	case 'list_agent_tmp':
		get_header();
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];

			$count_clean 	 = count_agent_clean($sess_id,$id);
			$count_not_found = count_agent_tmp_excel($sess_id,$user_id);
			
			$update =   "training_dashboard.php?page=insert_agent_tmp_excel&id=$id";
			$add 	=   "training_dashboard.php?page=form_agent_event&id=$id";
			$ignore =   "training_dashboard.php?page=delete_agent_tmp_excel&id=$id";
			$ok = "training_dashboard.php?page=form_save_view&id=$id&did=3";
			
			$query 			= select_agent_tmp_excel($sess_id,$user_id);
		
			include '../views/training_dashboard/list_tmp_excel.php';	
		get_footer();	
	break;
	
	case 'list_agent_tmp2':
		get_header();
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];

			$count_clean 	 = count_agent_clean($sess_id,$id);
			$count_not_found = count_agent_tmp_excel2($sess_id,$user_id);
			
			$update =   "training_dashboard.php?page=insert_agent_tmp_excel2&id=$id";
			$ignore =   "training_dashboard.php?page=delete_agent_tmp_excel2&id=$id";
			$ok		 = "training_dashboard.php?page=form_save_view&id=$id&did=3";
			
			$query 			= select_agent_tmp_excel2($sess_id,$user_id);
		
			include '../views/training_dashboard/list_tmp_excel2.php';	
		get_footer();	
	break;
	
	
	
	case 'form_agent_event':
		get_header();
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$action		 =  "training_dashboard.php?page=save_agent_event&id=$id";
		$close_button = "training_dashboard.php?page=form_save_view&id=$id";
		include '../views/training_dashboard/form_agent_event.php';	
		get_footer();	
	break;
	
	case 'save_agent_event':
	extract($_POST);
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
				$no_ktp = get_isset($no_ktp);
				$cede = get_isset($cede);
				$name = get_isset($name);
				$name_leader = get_isset($name_leader);
				$name_agency = get_isset($name_agency);
				$phone_number = get_isset($phone_number);
		
		$cek_ktp_number=get_ktp_number($no_ktp);
	
		if($cek_ktp_number > 0){	
			header('Location: training_dashboard.php?page=form_agent_event&err=1');
		}else{
		
			create_agent_event($no_ktp,$cede,$name,$name_leader,$phone_number,$name_agency,1);
			$id_agent =mysql_insert_id();
			//mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$sess_id."','".$id."','".$id_agent."')");
					

			header('Location: training_dashboard.php?page=form_save_view&id='.$id.'&add_train=1&add=1');
		}
	break;
	
	case 'delete_agent_tmp_event':
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$agent_id_tmp_event = (isset($_GET['agent_id_tmp_event'])) ? $_GET['agent_id_tmp_event'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
		
			delete_agent_tmp_event($sess_id,$user_id,$agent_id_tmp_event);
			
			header('Location: training_dashboard.php?page=list_agent_tmp&id='.$id.'&did=3');
	
	break;
	
	case 'delete_agent_tmp_event2':
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$agent_id_tmp_event = (isset($_GET['agent_id_tmp_event'])) ? $_GET['agent_id_tmp_event'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
		
			delete_agent_tmp_event2($sess_id,$user_id,$agent_id_tmp_event);
			
			header('Location: training_dashboard.php?page=list_agent_tmp2&id='.$id.'&did=3');
	
	break;
	
	
	
	case 'insert_agent_tmp_excel':
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			
			$query = mysql_query("SELECT * FROM agents_tmp_event WHERE session_id = '$sess_id'  AND user_id = '$user_id'");
			$total = mysql_num_rows($query);
			
			
			while($row=mysql_fetch_array($query)){
				$cek_ktp_number=get_ktp_number($row['agent_ktp_tmp_event']);		
						if($cek_ktp_number > 0){
							continue;
						}else{
							$row['agent_ktp_tmp_event'];
							$row['agent_code_tmp_event'];
							$row['agent_name_tmp_event'];
							$row['agent_agency_name_tmp_event'];
							$row['agent_leder_name_tmp_event'];
							$row['agent_phone_number_tmp_event'];
							
							create_agent_event($row['agent_ktp_tmp_event'],$row['agent_code_tmp_event'],$row['agent_name_tmp_event'],$row['agent_leder_name_tmp_event'],$row['agent_phone_number_tmp_event'],$row['agent_agency_name_tmp_event'],0);
							$id_agent =mysql_insert_id();
							mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$sess_id."','".$id."','".$id_agent."')");
					}
			}
			mysql_query("DELETE  FROM  agents_tmp_event WHERE session_id = '$sess_id'  AND user_id = '$user_id'");
			
		header('Location: training_dashboard.php?page=form_save_view&id='.$id.'&did=3');
			
	break;
	
	case 'insert_agent_tmp_excel2':
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			
			$query = mysql_query("SELECT * FROM agents_tmp_event2 WHERE session_id = '$sess_id'  AND user_id = '$user_id'");
			$total = mysql_num_rows($query);
			
			
			while($row=mysql_fetch_array($query)){
			
			
	
				
				$row['agen_tgl_lahir']=format_back_date3($row['agen_tgl_lahir']);
				$row['agen_tgl_masuk']=format_back_date3($row['agen_tgl_masuk']);
				$row['agen_tgl_promosi']=format_back_date3($row['agen_tgl_promosi']);
				
				$row['agen_tgl_exp']=format_back_date3($row['agen_tgl_exp']);
				$row['agen_tgl_inception']=format_back_date2($row['agen_tgl_inception']);
				$row['agen_tgl_aktif']=format_back_date2($row['agen_tgl_aktif']);
				
				if($row['agen_jenkel'] ==  'pria'){
					$row['agen_jenkel'] = '1';
				}else if($row['agen_jenkel'] ==  'wanita'){
					$row['agen_jenkel'] = '2';
				}
				
				$cek_religion=cek_religion($row['agen_agama']);
				$row['agen_agama'] = $cek_religion;
				
				if($row['agen_marital'] == 'married  '){
							$row['agen_marital'] = 1;
				}else if ($row['agen_marital'] == 'single'){
							$row['agen_marital'] = 2; 
				}else{
							$row['agen_marital'] = 0;
				}
				
		create_agent_event2($row['agen_kode'],
							$row['agen_name'],
							$row['agen_tgl_lahir'],
							$row['agen_jenkel'],
							$row['agen_marital'],
							$row['agen_agama'],
							$row['agen_pendidikan'],
							$row['agen_ktp'],
							$row['agen_tipe_lisensi'],
							0);
		$id_agent =mysql_insert_id();
		$row['agen_status_tsf_lisensi']	 = 	addslashes($row['agen_status_tsf_lisensi']);
		$data1="'',
				'$id_agent',
				'$row[distrik_code]',
				'$row[distrik_name]',
				'$row[cabang_code]',
				'$row[cabang_name]',
				'$row[branch_domicile_code]',
				'$row[branch_domicile_name]',
				'$row[agen_client]',
				'$row[agen_level]',
				'$row[agen_vip]',
				'$row[agen_tgl_masuk]',
				'$row[agen_tgl_promosi]',
				'$row[agen_nomer_id]',
				'$row[agen_npwp]',
				'$row[agen_ptkp]',
				'$row[agen_kode_lisensi]',
				'$row[agen_jenis_lisensi]',
				'$row[agen_tgl_exp]', 
				'$row[agen_status_tsf_lisensi]',
				'$row[agen_tgl_inception]',
				'$row[agen_tgl_aktif]',
				'$row[recruiting_client]',
				'$row[recruiting_kode]',
				'$row[recruiting_name]',
				'$row[recruiting_level]',
				'$row[spv_client]',
				'$row[spv_kode]',
				'$row[spv_name]',
				'$row[spv_level]',
				'$row[spv_status]'";
			create_existing_agen($data1);
			mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$sess_id."','".$id."','".$id_agent."')");
					}
			mysql_query("DELETE  FROM  agents_tmp_event2 WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND type_data='2'");
			
		header('Location: training_dashboard.php?page=form_save_view&id='.$id.'&did=3');
			
	break;


	case 'save_trainer':
	
		extract($_POST);
		
		$ses_id = session_id();
		
		$trainer_id =  get_isset($trainer_id);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
	
 		$cek_total_trainer =cek_total_trainer($id);
		if($cek_total_trainer == '1'){
			header('Location: training_dashboard.php?page=form_save&id='.$id.'&ded=1');
		}else{
		
		$data = "'', 
				'$id',
				'$trainer_id'";
					
				create_trainer2($data);
			
		header('Location: training_dashboard.php?page=form_save&id='.$id.'&did=2');
		}
		break;
		
	case 'save_agent':
	
		extract($_POST);
		
		$ses_id = session_id();
		$agent_id =  (isset($_GET['id_agent'])) ? $_GET['id_agent'] : null;
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
	 
		$cek_agent_id = cek_transaction_agent_tmp($ses_id,$id,$agent_id);
		
		if($cek_agent_id > '0'){
			
			header('Location: training_dashboard.php?page=form_save&id='.$id.'&id_train=1&err=2');
		}else{
		$data = "'',
				'$ses_id', 
				'$id',
				'$agent_id'";
					
		create_agent_tmp($data,$agent_id);
	
		header('Location: training_dashboard.php?page=form_save_view&id='.$id.'&add_train=1&did=3');
		}
	break;
		
	case 'save_all':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$ses_id = session_id();
		$user_id = $_SESSION['user_id'];
	
		create_trainer($id,$ses_id);
		create_agent($id,$ses_id);
		create_sign_by_id($id, $user_id);
		
		header("Location: training_dashboard.php?page=form_save_view2&id=$id&add=2");
	break;	
		
	case 'edit':

		extract($_POST);
		$id = get_isset($_GET['id']);
		$event_name = get_isset($event_name);
		$event_date = get_isset($event_date);  $event_date = format_back_date($event_date);
		$type_id = get_isset($type_id);
		$unit_id = get_isset($unit_id);
		$event_description = get_isset($event_description);

			$data = "transaction_date = '$event_date', 
					transaction_name 	 = '$event_name',
					transaction_description 	 = '$event_description',
					transaction_type_id = '$type_id',
					unit_id = '$unit_id'

			";

			
			update($data, $id);
		//echo $data;
		
			header('Location: training_dashboard.php?page=view&date='.$event_date.'&unit_id='.$unit_id.'');

	

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: training_dashboard.php?page=list&did=3');

	break;
	
	case 'delete_trainer':
		$id_trainer = get_isset($_GET['id_trainer']);
		$id = get_isset($_GET['id']);
		delete_trainer($id_trainer);
		
		header('Location: training_dashboard.php?page=form_save&id='.$id.'&del=1');

	break;
	case 'delete_agent':
		$id_agent = get_isset($_GET['id_agent']);
		$id = get_isset($_GET['id']);	

		delete_agent($id_agent);

		header('Location: training_dashboard.php?page=form_save_view&id='.$id.'&del=2');

	break;
	
	case 'delete_trainer':
		$id_trainer = get_isset($_GET['id_trainer']);
		$id = get_isset($_GET['id']);	

		delete_trainer($id_trainer);

		header('Location: training_dashboard.php?page=form_save&id='.$id.'&del=1');

	break;
	
	case 'view';
	
		get_header();
		
		$add_button = "training_dashboard.php?page=form";
		$close_button = "training_dashboard.php?page=list";
			
		$date = get_isset($_GET['date']);
		$unit_id = get_isset($_GET['unit_id']);
		
		//$query_view = detail_read_id($date,$unit_id);
		 
		if($_SESSION['user_type_id']  == '2'){	
           $query_view = detail_read_id2($date, $unit_id);
		}if($_SESSION['user_type_id']  == '5'){	
            $query_view = detail_read_id3($date, $unit_id);
		}else{
            $query_view = detail_read_id($date, $unit_id);
		}
		include '../views/training_dashboard/list_view.php';
		
		get_footer();
		
	break;

	case 'view_not_approved';
	
		get_header();
		$title = "Event";
		$query_view = select_not_approved();
		include '../views/training_dashboard/list_view_not_approved.php';
		
		get_footer();
		
	break;

	case 'upload_event':
		get_header();
			$title = ucfirst("upload event");
			$unit_id = (isset($_GET['unit_id'])) ? $_GET['unit_id'] : null;	
			$action = "training_dashboard.php?page=save_event&unit_id=$unit_id";
			$close_button = "training_dashboard.php?page=list";
			
			include '../views/training_dashboard/form_upload_event.php';
			
		get_footer();
	break;

	case 'save_event':
	
		$unit_id = (isset($_GET['unit_id'])) ? $_GET['unit_id'] : null;
		$user_id = $_SESSION['user_id'];
			
				$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);

				
				$hasildata = $data->rowcount($sheet_index=0);
					
					for ($i=2; $i<=$hasildata; $i++)
					{
						//$name = $data->val($i,1); 	
						$date1_after = $data->val($i,1);
						$date2_after = $data->val($i,2);
						$date1 = format_back_date_upload($date1_after);
						$date2 = format_back_date_upload($date2_after);
						
						$hour1 = $data->val($i,3);
						$hour1 = $data->val($i,4);
						$type = $data->val($i,5);
						$description = $data->val($i,6);
						if($name){	
							
		
			
						}
			
					}
					//header('Location: training_dashboard.php?page=form_save&id=id='.$id.'');
					
		
		
	break;

	case 'approved':
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		mysql_query("update transactions set transaction_approved_status = '1' where transaction_id = '$id' OR transaction_type_date_id = '$id'");
		
		header('Location: training_dashboard.php?page=view_not_approved&did=1');
	break;
	
	case 'not_aproved':
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		//echo $id;
		mysql_query("update transactions set transaction_approved_status = '2'  WHERE transaction_id = '$id' OR transaction_type_date_id = '$id'");
		mysql_query("DELETE FROM transaction_trainers_tmp WHERE transaction_id = '$id' ");
		header('Location: training_dashboard.php?page=view_not_approved&del=1');
	break;
	}

?>