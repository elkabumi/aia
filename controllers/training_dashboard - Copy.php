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
			
			$action = "training_dashboard.php?page=edit&id=$id";
		}else{
			
			
			//inisialisasi
			$row = new stdClass();
			$row->transaction_date = false;
			$row->transaction_hour = false;
			$row->transaction_name = false;
			$row->transaction_description = false;
			$row->transaction_status = false;
			$row->transaction_type_id = false;
			$row->user_account_number = false;
			$row->unit_id = false;
		

			$action = "training_dashboard.php?page=save";
		}

		include '../views/training_dashboard/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$event_name = get_isset($event_name);
		$event_date = get_isset($event_date);  $event_date = format_back_date($event_date);
		$type_id = get_isset($type_id);
		$unit_id = get_isset($unit_id);
		$event_description = get_isset($event_description);
		$user_id = $_SESSION['user_id'];

		$data = "'',
					'$event_date', 
					'$event_name',
					'$event_description', 
					'0', 
					'$type_id', 
					'$unit_id', 
					'$user_id',
					'',
					'0',
					'$event_hour'
					";

		
		create($data);
		$id=mysql_insert_id();
		header('Location: training_dashboard.php?page=form_save&id='.$id.'');

	
	break;
	
	case 'form_save':
		get_header();

			$close_button = "training_dashboard.php?page=list";

			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$add = (isset($_GET['add'])) ? $_GET['add'] : null;
			$ses_id = session_id();
		
		
			$action = "training_dashboard.php?page=save_trainer&id=$id";
			$save = "training_dashboard.php?page=save_all&id=$id";
			$add_button = "training_dashboard.php?page=form_save&id=$id&add=1";
			$add_agent = "training_dashboard.php?page=list_agent&id=$id";
			$upload_xls = "training_dashboard.php?page=upload_xls&id=$id";
			
			
			$action2 = "training_dashboard.php?page=save_agent&id=$id";
			$back_button2 = "training_dashboard.php?page=form_save&id=$id";
			$add_button2 = "training_dashboard.php?page=form_save&id=$id&add=2";
			$close_button2 = "training_dashboard.php?page=list_agent&id=$id";
		
			
	
	
	
			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			
			$query_trainer_tmp = read_trainer_tmp($id,$ses_id);
			$query_agent_tmp = read_agent_tmp($id,$ses_id);
		
			include '../views/training_dashboard/form_save.php';
			
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
			$add = (isset($_GET['add'])) ? $_GET['add'] : null;
			$ses_id = session_id();
		
		
		$action = "training_dashboard.php?page=save_trainer&id=$id";
		$save = "training_dashboard.php?page=save_all&id=$id";
		$add_button = "training_dashboard.php?page=form_save&id=$id&add=1";
		$add_agent = "training_dashboard.php?page=list_agent&id=$id";
		$upload_xls = "training_dashboard.php?page=upload_xls&id=$id";
	
			$row = read_id($id);
			$row->transaction_date = format_date($row->transaction_date);
			
			$query_trainer_view = read_trainer_view($id);
			$query_agent_view = read_agent_view($id);
		
			include '../views/training_dashboard/form_save.php';
			include '../views/training_dashboard/list_trainer_view.php';
		

			include '../views/training_dashboard/list_agent_view.php';
			
		get_footer();
	break;
	
	
	case 'upload_xls';
		get_header();
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;	
			$add = (isset($_GET['add'])) ? $_GET['add'] : null;
			$action = "training_dashboard.php?page=save_xls&id=$id";
			
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
			
				$total_bagi= floor($hasildata / 500);
						
						for($i=1; $i<=$total_bagi; $i++){
							
							$total_kali=$i * 500;
							
							if($i =='1'){
								$mulai ='1';
							}
							else{
								$bagi_mulai =$i - 1;
								$mulai = (500 * $bagi_mulai) + 1;
							}
							
							
							for($j=$mulai; $j<=$total_kali; $j++)
							{
								if($j == '1' and $i == '1'){
									continue;
								}
									$agent_ktp_number		= trim($data->val($j,10)); 	//nomor_ktp *
									$agent_active_status	= trim(strtolower($data->val($j,31))); 	//clean/not_clean
									
									$cek_ktp_number=get_ktp_number($agent_ktp_number);
									if($cek_ktp_number != '0'){
										$id_agent=get_id_agent_tmp($agent_ktp_number);
										$id_transaction_agents_tmp_id = cek_transaction_agent_tmp($ses_id,$id,$id_agent);
										if($id_transaction_agents_tmp_id != '0'){
											continue;
										}
										$cek_status = cek_status($id_agent);
										if($cek_status['agent_active_status'] == '0'){
											continue;
										}
										//echo "INSERT INTO  transaction_agents_tmp VALUES('','".$ses_id."','".$id."','".$id_agent."')";
										 mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$ses_id."','".$id."','".$id_agent."')");
										 mysql_query("UPDATE agents SET agent_active_status = '0' where agent_id='$id_agent'");
										
									}else{
									
									
										$pic 					= trim($data->val($j,2));  			//pic 
										$month			 		= trim($data->val($j,3)); 			//month 
										$agent_code 			= trim($data->val($j,4));		 		//kode_agen 
										$agent_name				= trim($data->val($j,5)); 			//nama_lengkap_agen
										$not_agent_code2 		= trim($data->val($j,6)); 			//kode_agen2
										$agent_address			= trim($data->val($j,7)); 			//alamat_rumah
										$city_id				= trim(strtolower($data->val($j,8))); 				//home_city
										$agent_phone			= trim($data->val($j,9)); 	//no_hp/telp
										
										$agent_birth_place		= trim($data->val($j,11)); 	//tempat_lahir   
										$agent_birth_date		= trim($data->val($j,12)); 	//tanggal_lahir
										$agent_gender			= trim(strtolower($data->val($j,13))); 	//jenis_kelamin
										$agent_status			= trim(strtolower($data->val($j,14))); 	//status_perkawinan
										$religion_id			= trim(strtolower($data->val($j,15)));	//agama
										$agent_last_education	= trim(strtolower($data->val($j,16))); 	//pendidikan_terakhir *
										$office_city_id			= trim(strtolower($data->val($j,17))); 	//office_city
										$agent_position			= trim($data->val($j,18)); 	//jabatan 
										$agent_senior_name		= trim($data->val($j,19)); 	//nama_atasan_langsung 
										$agent_join_date		= trim($data->val($j,20)); 	//joint_date
										$agent_industry_entry_date	= trim($data->val($j,21)); 	//industry_entry_date
										$agent_license_type		= trim(strtolower($data->val($j,22)));	//jenis_lisensi *
										$agent_exam_date		= trim($data->val($j,23)); 	//tanggal_ujian
										$exam_city_id			= trim(strtolower($data->val($j,24))); 	//kota_ujian
										$agent_registration 	= trim(strtolower($data->val($j,25))); 	//registrasi
										$agent_exam_status 		= trim(strtolower($data->val($j,26))); 	//exam_status
										$branch_id			 	= trim(strtolower($data->val($j,27))); 	//nama_cabang
										$payment_method_id	 	= trim(strtolower($data->val($j,28))); 	//metode_pembayaran
										$agent_dc_regional  	= trim($data->val($j,29)); 	// dc_regional
										$agent_delivery_cd_date	= trim($data->val($j,30)); 	//tgl_kirim_cd
										
										$agent_exam_hour		= trim($data->val($j,32)); 	//jam_ujian
										$agent_exam_date_is_not_selected = trim($data->val($j,33)); 	//tanggal_ujian_tidak_dipilih
										$agent_certificate		= trim($data->val($j,34)); 	//kartu/sertifikat
										$agent_invoice_number	= trim($data->val($j,35));	// nomor_invoice
										$agent_invoice_status_id	= trim(strtolower($data->val($j,36))); 	//status_invoice
										$agent_exam_confirmation	= trim($data->val($j,37)); 	//konfirmasi_ujian
										$agent_enroll_date			= trim($data->val($j,38)); 	// tgl_enroll
										$agent_cl_sheet				= trim($data->val($j,39)); 	//lembar_cl
										$agent_result				= trim($data->val($j,40));	// result
										$agent_btp_result			= trim($data->val($j,41)); 	//btp_result
										$agent_file_desctiption		= trim($data->val($j,42)); 	// keterangan_berkas
										$agent_card_delivery		= trim($data->val($j,43)); 	//pengiriman_kartu  
										$agent_graduated_date		= trim($data->val($j,44)); 	// tanggal_lulus
										$agent_date_of_exit_exam_results	=trim( $data->val($j,45));	//tanggal_keluar_hasil_ujian  
										$agent_btp							= trim($data->val($j,46)); 	//btp
										$agent_description					= trim($data->val($j,47)); 	//keterangan_agen 
										$not_agent_description2				= trim($data->val($j,48)); 	//keterangan_agen2	
										$agent_file_come					= trim($data->val($j,49)); 	//berkas_datang
										$agent_file_process		= trim($data->val($j,50)); 	//berkas_diproses	
										$agent_check			= trim($data->val($j,51)); 	//cek
										$id_user 				= $_SESSION['user_id'];
										$sess_id	=session_id();
										$input_type_id ='3';
										
										$input_date = date('y-m-d');
				
										if($agent_ktp_number == ''){
											continue;
										}
																	
										mysql_query("INSERT INTO agents_tmp_excel values ('',
																				'".$id_user."',
																				'".$sess_id."',
																				'".$pic."',
																				'".$month."',
																				'".$city_id."',
																				'".$agent_code."',
																				'".$agent_name."',
																				'".$agent_address."',
																				'".$agent_phone."',
																				'".$agent_ktp_number."',
																				'".$agent_birth_place."',
																				'".$agent_birth_date."',
																				'".$agent_gender."',
																				'".$agent_status."',
																				'".$agent_last_education."',
																				'".$agent_position."',
																				'".$agent_senior_name."',
																				'".$agent_join_date."',
																				'".$agent_industry_entry_date."',
																				'".$agent_license_type."',
																				'".$agent_exam_date."',
																				'".$agent_registration."',
																				'".$agent_exam_status."',
																				'".$agent_dc_regional."',
																				'".$agent_delivery_cd_date."',
																				'".$agent_active_status."',
																				'".$agent_exam_hour."',
																				'".$agent_exam_date_is_not_selected."',
																				'".$agent_certificate."',
																				'".$agent_invoice_number."',
																				'".$agent_invoice_status_id."',
																				'".$agent_exam_confirmation."',
																				'".$agent_enroll_date."',
																				'".$agent_cl_sheet."',
																				'".$agent_result."',
																				'".$agent_btp_result."',
																				'".$agent_file_desctiption."',
																				'".$agent_card_delivery."',
																				'".$agent_graduated_date."',
																				'".$agent_date_of_exit_exam_results."',																							
																				'".$agent_btp."',
																				'".$agent_description."',
																				'".$agent_file_come."',
																				'".$agent_file_process."',
																				'".$agent_check."',
																				'".$office_city_id."',
																				'".$exam_city_id."',
																				'".$branch_id."',
																				'".$payment_method_id."',
																				'".$religion_id."',
																				'".$input_type_id ."',
																				'".$input_date."'
																				)");
							
									}
							}
						}
						$cari_sisa = $hasildata % 500;
							if($cari_sisa != 0)
							{
								
								for($k=$j; $k<=$hasildata; $k++)
								{
									$agent_ktp_number		= trim($data->val($j,10)); 	//nomor_ktp *
									$agent_active_status	= trim(strtolower($data->val($j,31))); 	//clean/not_clean
									
									$cek_ktp_number=get_ktp_number($agent_ktp_number);
									if($cek_ktp_number != '0'){
										
										$id_agent=get_id_agent_tmp($agent_ktp_number);
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
										
										
									}else{
									
								
									$pic 					= trim($data->val($k,2));  			//pic 
									$month			 		=trim($data->val($k,3)); 			//month 
									$agent_code 			= trim($data->val($k,4));		 		//kode_agen 
									$agent_name				= trim($data->val($k,5)); 			//nama_lengkap_agen
									$not_agent_code2 		= trim($data->val($k,6)); 			//kode_agen2
									$agent_address			= trim($data->val($k,7)); 			//alamat_rumah
									$city_id				= trim(strtolower($data->val($k,8))); 				//home_city
									$agent_phone			= trim($data->val($k,9)); 	//no_hp/telp
									//$agent_ktp_number		= trim($data->val($k,10)); 	//nomor_ktp *
									$agent_birth_place		= trim($data->val($k,11)); 	//tempat_lahir   
									$agent_birth_date		= trim($data->val($k,12)); 	//tanggal_lahir
									$agent_gender			= trim(strtolower($data->val($k,13))); 	//jenis_kelamin
									$agent_status			= trim(strtolower($data->val($k,14))); 	//status_perkawinan
									$religion_id			= trim(strtolower($data->val($k,15)));	//agama
									$agent_last_education	= trim(strtolower($data->val($k,16))); 	//pendidikan_terakhir *
									$office_city_id			= trim(strtolower($data->val($k,17))); 	//office_city
									$agent_position			= trim($data->val($k,18)); 	//jabatan 
									$agent_senior_name		= trim($data->val($k,19)); 	//nama_atasan_langsung 
									$agent_join_date		= trim($data->val($k,20)); 	//joint_date
									$agent_industry_entry_date	= trim($data->val($k,21)); 	//industry_entry_date
									$agent_license_type		= trim(strtolower($data->val($k,22)));	//jenis_lisensi *
									$agent_exam_date		= trim($data->val($k,23)); 	//tanggal_ujian
									$exam_city_id			= trim(strtolower($data->val($k,24))); 	//kota_ujian
									$agent_registration 	= trim(strtolower($data->val($k,25))); 	//registrasi
									$agent_exam_status 		= trim(strtolower($data->val($k,26))); 	//exam_status
									$branch_id			 	= trim(strtolower($data->val($k,27))); 	//nama_cabang
									$payment_method_id	 	= trim(strtolower($data->val($k,28))); 	//metode_pembayaran
									$agent_dc_regional  	= trim($data->val($k,29)); 	// dc_regional
									$agent_delivery_cd_date	= trim($data->val($k,30)); 	//tgl_kirim_cd
									//$agent_active_status	= trim(strtolower($data->val($k,31))); 	//clean/not_clean
									$agent_exam_hour		= trim($data->val($k,32)); 	//jam_ujian
									$agent_exam_date_is_not_selected = trim($data->val($k,33)); 	//tanggal_ujian_tidak_dipilih
									$agent_certificate		= trim($data->val($k,34)); 	//kartu/sertifikat
									$agent_invoice_number	= trim($data->val($k,35));	// nomor_invoice
									$agent_invoice_status_id	= trim(strtolower($data->val($k,36))); 	//status_invoice
									$agent_exam_confirmation	= trim($data->val($k,37)); 	//konfirmasi_ujian
									$agent_enroll_date			= trim($data->val($k,38)); 	// tgl_enroll
									$agent_cl_sheet				= trim($data->val($k,39)); 	//lembar_cl
									$agent_result				= trim($data->val($k,40));	// result
									$agent_btp_result			= trim($data->val($k,41)); 	//btp_result
									$agent_file_desctiption		= trim($data->val($k,42)); 	// keterangan_berkas
									$agent_card_delivery		= trim($data->val($k,43)); 	//pengiriman_kartu  
									$agent_graduated_date		= trim($data->val($k,44)); 	// tanggal_lulus
									$agent_date_of_exit_exam_results	=trim( $data->val($k,45));	//tanggal_keluar_hasil_ujian  
									$agent_btp							= trim($data->val($k,46)); 	//btp
									$agent_description					= trim($data->val($k,47)); 	//keterangan_agen 
									$not_agent_description2				= trim($data->val($k,48)); 	//keterangan_agen2	
									$agent_file_come					= trim($data->val($k,49)); 	//berkas_datang
									$agent_file_process		= trim($data->val($k,50)); 	//berkas_diproses	
									$agent_check			= trim($data->val($k,51)); 	//cek
									$id_user = $_SESSION['user_id'];
									$sess_id=session_id();
									$input_type_id ='3';
									$input_date = date('y-m-d');
								
									if($agent_ktp_number == ''){
										continue;
									}
									if($cek_ktp_number == '0'){
										continue;
									}
										mysql_query("INSERT INTO agents_tmp_excel values ('',
																				'".$id_user."',
																				'".$sess_id."',
																				'".$pic."',
																				'".$month."',
																				'".$city_id."',
																				'".$agent_code."',
																				'".$agent_name."',
																				'".$agent_address."',
																				'".$agent_phone."',
																				'".$agent_ktp_number."',
																				'".$agent_birth_place."',
																				'".$agent_birth_date."',
																				'".$agent_gender."',
																				'".$agent_status."',
																				'".$agent_last_education."',
																				'".$agent_position."',
																				'".$agent_senior_name."',
																				'".$agent_join_date."',
																				'".$agent_industry_entry_date."',
																				'".$agent_license_type."',
																				'".$agent_exam_date."',
																				'".$agent_registration."',
																				'".$agent_exam_status."',
																				'".$agent_dc_regional."',
																				'".$agent_delivery_cd_date."',
																				'".$agent_active_status."',
																				'".$agent_exam_hour."',
																				'".$agent_exam_date_is_not_selected."',
																				'".$agent_certificate."',
																				'".$agent_invoice_number."',
																				'".$agent_invoice_status_id."',
																				'".$agent_exam_confirmation."',
																				'".$agent_enroll_date."',
																				'".$agent_cl_sheet."',
																				'".$agent_result."',
																				'".$agent_btp_result."',
																				'".$agent_file_desctiption."',
																				'".$agent_card_delivery."',
																				'".$agent_graduated_date."',
																				'".$agent_date_of_exit_exam_results."',																							
																				'".$agent_btp."',
																				'".$agent_description."',
																				'".$agent_file_come."',
																				'".$agent_file_process."',
																				'".$agent_check."',
																				'".$office_city_id."',
																				'".$exam_city_id."',
																				'".$branch_id."',
																				'".$payment_method_id."',
																				'".$religion_id."',
																				'".$input_type_id ."',
																				'".$input_date."'
																				)");
							
								
								}
							} 
						}
		//$count=count_agent_tmp_excel($ses_id,$user_id);
	
		//if($count == '0'){	
			//header('Location: training_dashboard.php?page=form_save&id='.$id.'');
		//}else{
			header('Location: training_dashboard.php?page=list_agent_tmp&id='.$id.'');
		//}
		
		
	break;
	
	case 'list_agent_tmp':
		get_header();
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			$count_clean = count_agent_clean($sess_id,$id);
			$count_not_found = count_agent_tmp_excel($sess_id,$user_id);
			$update =   "training_dashboard.php?page=insert_agent_tmp_excel&id=$id";
			$ignore =   "training_dashboard.php?page=delete_agent_tmp_excel&id=$id";
			$query = select_agent_tmp_excel($sess_id,$user_id);
		
			include '../views/training_dashboard/list_tmp_excel.php';	
		get_footer();	
	break;
	
	case 'insert_agent_tmp_excel':
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			
			$query = mysql_query("SELECT * FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='3'");
			$total = mysql_num_rows($query);
			
			
			while($row=mysql_fetch_array($query)){
		
					
					
					$cek_ktp_number=get_ktp_number($row['agent_ktp_number_tmp_excel']);
					
							$row['agent_active_status_tmp_excel'] = 0;
							
				
									//GENDER ID
							if ($row['agent_gender_tmp_excel'] == 'm'){
									$row['agent_gender_tmp_excel'] = 1;  
							}else if ($$row['agent_gender_tmp_excel'] == 'f'){
									$row['agent_gender_tmp_excel'] = 2; 
							}else{
									$row['agent_gender'] = 0;
							}
									
									//STATUS ID
							if($row['agent_status_tmp_excel'] == 'm'){
										$row['agent_status_tmp_excel'] = 1;
							}else if ($row['agent_status_tmp_excel'] == 's'){
										$row['agent_status_tmp_excel'] = 2; 
							}else{
										$row['agent_status_tmp_excel'] = 0;
							}
									
									//RELIGION
							$cek_religion=cek_religion($row['religion_id_tmp_excel']);
							$row['religion_id_tmp_excel'] = $cek_religion;
									//city_id
							$cek_city = cek_city($row['city_id_tmp_excel']);
							$row['city_id_tmp_excel'] = $cek_city;
									//OFICE CITY
							$cek_office_city = cek_city($row['office_city_id_tmp_excel']);
							$row['office_city_id_tmp_excel'] = $cek_office_city;
									//BRANCH ID
							$cek_branch_id = cek_city($row['branch_id_tmp_excel']);
							$row['branch_id_tmp_excel'] = $cek_branch_id;
									//EXAM CITY ID
							$cek_exam_city_id = cek_city($row['exam_city_id_tmp_excel']);
							$row['exam_city_id_tmp_excel'] = $cek_exam_city_id;
									//agent_last_education masih deidfiniskan dgn 0 
							$row['agent_last_education_tmp_excel'] = '0';
							$row['agent_last_education_tmp_excel']	= '0';
							$row['agent_registration_tmp_excel'] = '0';
							$row['agent_exam_status_tmp_excel']  = '0';
							$row['payment_method_id_tmp_excel']  = '0';
							$row['agent_invoice_status_id_tmp_excel']	 = '0';
									//ubah date
						$row['agent_birth_date_tmp_excel']  = format_date_xl($row['agent_birth_date_tmp_excel']);
						$row['agent_join_date_tmp_excel']  = format_date_xl($row['agent_join_date_tmp_excel']);
						$row['agent_industry_entry_date_tmp_excel'] = format_date_xl($row['agent_industry_entry_date_tmp_excel']);
						$row['agent_exam_date_tmp_excel'] = format_date_xl($row['agent_exam_date_tmp_excel']);
						$row['agent_delivery_cd_date_tmp_excel'] = format_date_xl($row['agent_delivery_cd_date_tmp_excel']);
						$row['agent_exam_date_is_not_selected_tmp_excel'] = format_date_xl($row['agent_exam_date_is_not_selected_tmp_excel']);
						$row['agent_exam_confirmation_tmp_excel'] = format_date_xl($row['agent_exam_confirmation_tmp_excel']);
						$row['agent_enroll_date_tmp_excel'] = format_date_xl($row['agent_enroll_date_tmp_excel']);
						$row['agent_cl_sheet_tmp_excel'] = format_date_xl($row['agent_cl_sheet_tmp_excel']);
						$row['agent_graduated_date_tmp_excel'] = format_date_xl($row['agent_graduated_date_tmp_excel']);
						$row['agent_date_of_exit_exam_results_tmp_excel'] = format_date_xl($row['agent_date_of_exit_exam_results_tmp_excel']);
						$row['agent_file_come_tmp_excel'] = format_date_xl($row['agent_file_come_tmp_excel']);
						$row['agent_file_process_tmp_excel']  = format_date_xl($row['agent_file_process_tmp_excel']);
									
						if($cek_ktp_number > 0){
							continue;
						}else{
						//$cek_ktp_number=get_ktp_number($row['agent_ktp_number_tmp_excel']);
					
						mysql_query("INSERT INTO agents  VALUES ('',
									'".$row['pic_tmp_excel']."',
									'".$row['month_tmp_excel']."',
									'".$row['city_id_tmp_excel']."',
									'".$row['agent_code_tmp_excel']."',
									'".$row['agent_name_tmp_excel']."',
									'".$row['agent_address_tmp_excel']."',
									'".$row['agent_phone_tmp_excel']."',
									'".$row['agent_ktp_number']."',
									'".$row['agent_birth_place_tmp_excel']."',
									'".$row['agent_birth_date_tmp_excel']."',
									'".$row['agent_gender_tmp_excel']."',
									'".$row['agent_status_tmp_excel']."',
									'".$row['agent_last_education_tmp_excel']."',
									'".$row['agent_position_tmp_excel']."',
									'".$row['agent_senior_name_tmp_excel']."',
									'".$row['agent_join_date_tmp_excel']."',
									'".$row['agent_industry_entry_date_tmp_excel']."',
									'".$row['agent_license_type_tmp_excel']."',
									'".$row['agent_exam_date_tmp_excel']."',
									'".$row['agent_registration_tmp_excel']."',
									'".$row['agent_exam_status_tmp_excel']."',
									'".$row['agent_dc_regional_tmp_excel']."',
									'".$row['agent_delivery_cd_date_tmp_excel']."',
									'".$row['clean_tmp_excel']."',
									'".$row['agent_exam_hour_tmp_excel']."',
									'".$row['agent_exam_date_is_not_selected_tmp_excel']."',
									'".$row['agent_certificate_tmp_excel']."',
									'".$row['agent_invoice_number_tmp_excel']."',
									'".$row['agent_invoice_status_id_tmp_excel']."',
									'".$row['agent_exam_confirmation_tmp_excel']."',
									'".$row['agent_enroll_date_tmp_excel']."',
									'".$row['agent_cl_sheet_tmp_excel']."',
									'".$row['agent_result_tmp_excel']."',
									'".$row['agent_btp_result_tmp_excel']."',
									'".$row['agent_file_desctiption_tmp_excel']."',
									'".$row['agent_card_delivery_tmp_excel']."',
									'".$row['agent_graduated_date_tmp_excel']."',
									'".$row['agent_date_of_exit_exam_results_tmp_excel']."',
									'".$row['agent_btp_tmp_excel']."',
									'".$row['agent_description_tmp_excel']."',
									'".$row['agent_file_come_tmp_excel']."',
									'".$row['agent_file_process_tmp_excel']."',
									'".$row['agent_check_tmp_excel']."',
									'".$row['office_city_id_tmp_excel']."',
									'".$row['exam_city_id_tmp_excel']."',
									'".$row['branch_id_tmp_excel']."',
									'".$row['payment_method_id_tmp_excel']."',
									'".$row['religion_id_tmp_excel']."');");
									
					$id_agent =mysql_insert_id();
					mysql_query("INSERT INTO  transaction_agents_tmp VALUES('','".$sess_id."','".$id."','".$id_agent."')");
					}
			}
			mysql_query("DELETE  FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='3'");
			
		header('Location: training_dashboard.php?page=form_save&id='.$id.'&did=3');
			
	break;






	
	case 'delete_agent_tmp_excel':
			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
		
			delete_agent_tmp_excel($sess_id,$user_id);
			header('Location: training_dashboard.php?page=form_save&id='.$id.'&did=3');
	
	
	break;
	
	
	case 'save_trainer':
	
		extract($_POST);
		
		$ses_id = session_id();
		$trainer_id =  get_isset($trainer_id);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
	
		$cek_trainer_id = cek_transaction_trainer_tmp($ses_id,$id,$trainer_id);
 		$cek_total_trainer =cek_total_trainer_tmp($ses_id,$id);
		
		if($cek_trainer_id > '0'){
			header('Location: training_dashboard.php?page=form_save&id='.$id.'&err=1');
		}if($cek_total_trainer == '1'){
			header('Location: training_dashboard.php?page=form_save&id='.$id.'&ded=1');
		}else{
		
		$data = "'',
				'$ses_id', 
				'$id',
				'$trainer_id'";
					
			create_trainer_tmp($data);
		
		
		header('Location: training_dashboard.php?page=form_save&id='.$id.'&did=2');
		}
		break;
		
	case 'save_agent':
	
		extract($_POST);
		
		$ses_id = session_id();
		$agent_id =  get_isset($agent_id);
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
	 
		$cek_agent_id = cek_transaction_agent_tmp($ses_id,$id,$agent_id);
		
		if($cek_agent_id > '0'){
			
			header('Location: training_dashboard.php?page=form_save&id='.$id.'&err=2');
		}else{
		$data = "'',
				'$ses_id', 
				'$id',
				'$agent_id'";
					
		create_agent_tmp($data);
	
		header('Location: training_dashboard.php?page=form_save&id='.$id.'&did=3');
		}
	break;
		
	case 'save_all':
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$ses_id = session_id();
		$user_id = $_SESSION['user_id'];
	
		create_trainer($id,$ses_id);
		create_agent($id,$ses_id);
		create_sign_by_id($id, $user_id);
		
		header("Location: training_dashboard.php?page=form_save_view&id=$id&did=1");
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

		header('Location: training_dashboard.php?page=form_save&id='.$id.'&del=2');

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
		$query_view = detail_read_id($date,$unit_id);
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
						$name = $data->val($i,1); 	
						$date = $data->val($i,2);
						$date = format_back_date_upload($date);
						$hour = $data->val($i,3);
						$type = $data->val($i,4);
						$description = $data->val($i,5);

								
								if($name){
									mysql_query("insert into  transactions values('','".$date."','".$name."','".$description."', '0', '".$type."', '".$unit_id."','".$user_id."', '0', '0', '".$hour."')");
									//echo $date."<br>";
								}
						
						
					}
					header('Location: training_dashboard.php?page=list&did=1');
					
		
		
	break;

	case 'approved':
	$id = (isset($_GET['id'])) ? $_GET['id'] : null;
	mysql_query("update transactions set transaction_approved_status = '1' where transaction_id = '$id'");
	header('Location: training_dashboard.php?page=view_not_approved&did=1');
	break;
	

	}

?>