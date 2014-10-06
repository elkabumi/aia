<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/agent_model.php';
include '../models/global_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("agents");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		if (isset($_GET['pageno2'])) {
   			$pageno2 = $_GET['pageno2'];
		}else {
   			$pageno2 = 1;
		}
		$where = '';
		if($_GET['search']){
  			$where = "WHERE a.agent_name like '%".$_GET['search']."%' OR a.agent_code like '%".$_GET['search']."%' OR a.agent_ktp_number like '%".$_GET['search']."%' OR b.city_name like '%".$_GET['search']."%' "; 
  		}
	 
		$count_data = count_data($where);
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
		$query = select($where,$limit);
		$add_button = "agent.php?page=form";
		$upload = "agent.php?page=form_upload";
			
		include '../views/agent/list.php';
	
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "agent.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			
			$row = read_id($id);
		
			$action = "agent.php?page=edit&id=$id";
			$city = get_city();
			
			$ofice_city = get_city();
			$exam_city = get_city();
			$branch = get_branch();
		
			
		} else{
			
			$row = new stdClass();
			$row->pic = false;
			$row->month = false;
			$row->agent_name = false;
			$row->agent_code = false;
			$row->city_id = false;
			$row->agent_address = false;
			$row->agent_phone = false;
			
			$row->agent_ktp_number = false;
			$row->agent_birth_place = false;
			$row->agent_birth_date = false;
			$row->agent_gender = false;
			$row->agent_status = false;
			
			$row->agent_last_education = false;
			$row->agent_position = false;
			$row->agent_senior_name = false;
			$row->agent_join_date = false;
			$row->agent_industry_entry_date = false;
			
			$row->agent_license_type = false;
			$row->agent_exam_date = false;
			$row->agent_registration = false;
			$row->agent_exam_status = false;
			$row->agent_dc_regional = false;
			
			$row->agent_delivery_cd_date = false;
			$row->agent_active_status = false;
			$row->agent_exam_hour = false;
			$row->agent_exam_date_is_not_selected = false;
			$row->agent_exam_status = false;
			$row->agent_certificate = false;
			
			$row->agent_invoice_number = false;
			$row->agent_invoice_status_id = false;
			$row->agent_exam_confirmation = false;
			$row->agent_enroll_date = false;
			$row->agent_cl_sheet = false;
		
			$row->agent_result = false;
			$row->agent_btp_result = false;
			$row->agent_file_desctiption = false;
			$row->agent_card_delivery = false;
			$row->agent_graduated_date = false;
			
			$row->agent_date_of_exit_exam_results = false;
			$row->agent_btp = false;
			$row->agent_description = false;
			$row->agent_file_come = false;
			$row->agent_file_process = false;
			
			$row->agent_check = false;
			$row->office_city_id = false;
			$row->exam_city_id = false;
			$row->branch_id = false;
			$row->payment_method_id = false;
			
			$row->religion_id = false;
			
			
			$city = get_city();
			$ofice_city = get_city();
			$exam_city = get_city();
			$branch = get_branch();
			$action = "agent.php?page=save";
		}

		include '../views/agent/form.php';
		get_footer();
	break;
	
	case 'form_upload':
		get_header();
		$action = "agent.php?page=save_upload";
		$close = "agent.php?page=list";
		$save = (isset($_GET['save'])) ? $_GET['save'] : null;	
		include '../views/agent/form_upload.php';
		
		$sess_id=session_id();
		$count=count_agent_tmp($sess_id);

		if(isset($save) && $count >= 1){
			$update =   "agent.php?page=update_agent_tmp";
			$ignore =   "agent.php?page=delete_all";
			$query=selct_agent_tmp($sess_id);
		
			include '../views/agent/list_tmp.php';	
		}
		get_footer();
	break;
	
	case 'save_upload':

		extract($_POST);
		$type_file   = $_FILES['file']['type'];
	
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
									
									$pic 					= trim($data->val($j,2));  			//pic 
									$month			 		= trim($data->val($j,3)); 			//month 
									$agent_code 			= trim($data->val($j,4));		 		//kode_agen 
									$agent_name				= addslashes(trim($data->val($j,5))); 			//nama_lengkap_agen
									$not_agent_code2 		= trim($data->val($j,6)); 			//kode_agen2
									$agent_address			= trim($data->val($j,7)); 			//alamat_rumah
									$city_id				= trim(strtolower($data->val($j,8))); 				//home_city
									$agent_phone			= trim($data->val($j,9)); 	//no_hp/telp
									$agent_ktp_number		= trim($data->val($j,10)); 	//nomor_ktp *
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
									$agent_active_status	= trim(strtolower($data->val($j,31))); 	//clean/not_clean
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
									$input_type_id ='1';
									$input_date = date('y-m-d');
				
									if($agent_ktp_number == ''){
										continue;
									}
										mysql_query ("INSERT INTO agents_tmp_excel values ('',
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
																				'',
																				'".$input_type_id ."',
																				'".$input_date."'
																				)").";";
							
							}
						}
						$cari_sisa = $hasildata % 500;
							if($cari_sisa != 0)
							{
								
								for($k=$j; $k<=$hasildata; $k++)
								{
								
								
									$pic 					= trim($data->val($k,2));  			//pic 
									$month			 		= trim($data->val($k,3)); 			//month 
									$agent_code 			= trim($data->val($k,4));		 		//kode_agen 
									$agent_name				= addslashes(trim($data->val($k,5))); 			//nama_lengkap_agen
									$not_agent_code2 		= trim($data->val($k,6)); 			//kode_agen2
									$agent_address			= trim($data->val($k,7)); 			//alamat_rumah
									$city_id				= trim(strtolower($data->val($k,8))); 				//home_city
									$agent_phone			= trim($data->val($k,9)); 	//no_hp/telp
									$agent_ktp_number		= trim($data->val($k,10)); 	//nomor_ktp *
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
									$agent_active_status	= trim(strtolower($data->val($k,31))); 	//clean/not_clean
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
									$input_type_id ='1';
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
																				'',
																				'".$input_type_id ."',
																				'".$input_date."'
																				)").";";
							
								
								}
							} 	
					
	echo"<script> window.location='agent.php?page=agent_list_cek'</script>";
	break;
	
	
	case 'agent_list_cek':
	get_header();
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			$count=count_agent_tmp_excel($sess_id,$user_id);
			$update =   "agent.php?page=insert_agent_tmp_excel";
			$ignore =   "agent.php?page=delete_agent_tmp_excel";
			$query=select_agent_tmp_excel($sess_id,$user_id);
		
			include '../views/agent/list_tmp_excel.php';	
	get_footer();	
	break;
	
	case 'insert_agent_tmp_excel':
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			
			$query = mysql_query("SELECT * FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='1'");
			$total = mysql_num_rows($query);
			
			while($row=mysql_fetch_array($query)){
				$cek_ktp_number=get_ktp_number($row['agent_ktp_number_tmp_excel']);
				
							if ($row['agent_active_status_tmp_excel'] == 'clean'){
								$row['agent_active_status_tmp_excel'] = 1;
							}else if($row['agent_active_status_tmp_excel'] == 'not clean'){
								$row['agent_active_status_tmp_excel'] = 0;
							}
				
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
							$row['agent_name_tmp_excel'] = addslashes($row['agent_name_tmp_excel']);
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
									
						if($cek_ktp_number == '0'){
				mysql_query("INSERT INTO agents  VALUES ('','".$row['pic_tmp_excel']."',
									'".$row['month_tmp_excel']."',
									'".$row['city_id_tmp_excel']."',
									'".$row['agent_code_tmp_excel']."',
									'".$row['agent_name_tmp_excel']."',
									'".$row['agent_address_tmp_excel']."',
									'".$row['agent_phone_tmp_excel']."',
									'".$row['agent_ktp_number_tmp_excel']."',
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
									'".$row['agent_active_status_tmp_excel']."',
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
									'".$row['religion_id_tmp_excel']."',
									'');");
				}else{
						$id_user = $_SESSION['user_id'];
						$sess_id=session_id();
						$input_type_id ='1';
						$input_date = date('y-m-d');
					
						mysql_query("INSERT INTO agents_tmp  VALUES ('','".$id_user."',
									'".$sess_id."',
									'".$row['pic_tmp_excel']."',
									'".$row['month_tmp_excel']."',
									'".$row['city_id_tmp_excel']."',
									'".$row['agent_code_tmp_excel']."',
									'".$row['agent_name_tmp_excel']."',
									'".$row['agent_address_tmp_excel']."',
									'".$row['agent_phone_tmp_excel']."',
									'".$row['agent_ktp_number_tmp_excel']."',
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
										'".$row['agent_active_status_tmp_excel']."',
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
									'".$row['religion_id_tmp_excel']."',
									'',
									'".$input_type_id ."',
									'".$input_date."');");
				}
			}
			mysql_query("DELETE  FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='1'");
			//header('Location: agent.php?page=form_upload&save=1');
			echo"<script> window.location='agent.php?page=form_upload&save=1'</script>";
	break;
	
	case 'delete_agent_tmp_excel':
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
		
			delete_agent_tmp_excel($sess_id,$user_id);

			header('Location: agent.php?page=form_upload');
	
	
	break;
	
	case 'save':

		extract($_POST);
		$pic = get_isset($pic);
		$month = get_isset($month);
		$city_id = get_isset($city_id);
		$agency_code = get_isset($agency_code);
		$agency_name = get_isset($agency_name);
		$agent_address = get_isset($agent_address);
		$agent_phone = get_isset($agent_phone);
		
		$agent_ktp_number = get_isset($agent_ktp_number);
		$agent_birth_place = get_isset($agent_birth_place);
		$agent_birth_date = get_isset($agent_birth_date);  $agent_birth_date = format_back_date($agent_birth_date);
		$agent_gender = get_isset($agent_gender);
		$agent_status = get_isset($agent_status);
		
		$agent_last_education = get_isset($agent_last_education);
		$agent_position = get_isset($agent_position);
		$agent_senior_name = get_isset($agent_senior_name);
		$agent_join_date = get_isset($agent_join_date);   $agent_join_date = format_back_date($agent_join_date);
		$agent_industry_entry_date = get_isset($agent_industry_entry_date);  $agent_industry_entry_date = format_back_date($agent_industry_entry_date);
		
		
		$agent_license_type = get_isset($agent_license_type);
		$agent_exam_date = get_isset($agent_exam_date);  $agent_exam_date = format_back_date($agent_exam_date);
		$agent_registration = get_isset($agent_registration);
		$agent_exam_status = get_isset($agent_exam_status);
		$agent_dc_regional = get_isset($agent_dc_regional);
		
		$agent_delivery_cd_date = get_isset($agent_delivery_cd_date);  $agent_delivery_cd_date = format_back_date($agent_delivery_cd_date);
		$agent_active_status = get_isset($agent_active_status);
		$agent_exam_hour = get_isset($agent_exam_hour);
		$agent_exam_date_is_not_selected = get_isset($agent_exam_date_is_not_selected); $agent_exam_date_is_not_selected = format_back_date($agent_exam_date_is_not_selected);
		$agent_certificate = get_isset($agent_certificate);
		
		$agent_invoice_number = get_isset($agent_invoice_number); 
		$agent_invoice_status_id = get_isset($agent_invoice_status_id);
		$agent_exam_confirmation = get_isset($agent_exam_confirmation); $agent_exam_confirmation= format_back_date($agent_exam_confirmation);
		$agent_enroll_date = get_isset($agent_enroll_date);  $agent_enroll_date = format_back_date($agent_enroll_date);
		$agent_cl_sheet = get_isset($agent_cl_sheet);  $agent_cl_sheet= format_back_date($agent_cl_sheet);
		
		$agent_result = get_isset($agent_result); 
		$agent_btp_result = get_isset($agent_btp_result);
		$agent_file_desctiption = get_isset($agent_file_desctiption); 
		$agent_card_delivery = get_isset($agent_card_delivery); 
		$agent_graduated_date = get_isset($agent_graduated_date);  $agent_graduated_date= format_back_date($agent_graduated_date);
		
		$agent_date_of_exit_exam_results = get_isset($agent_date_of_exit_exam_results);   $agent_date_of_exit_exam_results= format_back_date($agent_date_of_exit_exam_results);
		$agent_btp = get_isset($agent_btp);
		$agent_description = get_isset($agent_description); 
		$agent_file_come = get_isset($agent_file_come);  $agent_file_come= format_back_date($agent_file_come);
		$agent_file_process = get_isset($agent_file_process);  $agent_file_process= format_back_date($agent_file_process);
		
		$agent_check = get_isset($agent_check);
		$office_city_id = get_isset($office_city_id); 
		$exam_city_id = get_isset($exam_city_id);
		$branch_id = get_isset($branch_id); 
		$payment_method_id = get_isset($payment_method_id);
		
		$religion_id = get_isset($religion_id); 
		
	
		
		$cek_ktp_number=get_ktp_number($agent_ktp_number);
		if($cek_ktp_number > 0){	
				header('Location: agent.php?page=list&did=4');
		}
		else{
		$data = "'',
				'$pic',
				'$month',
				'$city_id',
				'$agency_code',
				'$agency_name',
				'$agent_address',
				'$agent_phone',
				'$agent_ktp_number',
				'$agent_birth_place',
				'$agent_birth_date',
				'$agent_gender',
				'$agent_status',
				
				'$agent_last_education',
				'$agent_position',
				'$agent_senior_name',
				'$agent_join_date',
				'$agent_industry_entry_date',
						
				'$agent_license_type',
				'$agent_exam_date',
				'$agent_registration',
				'$agent_exam_status',
				'$agent_dc_regional',
						
				'$agent_delivery_cd_date',
				'$agent_active_status',
				'$agent_exam_hour',
				'$agent_exam_date_is_not_selected',
				'$agent_certificate',
						
				'$agent_invoice_number',
				'$agent_invoice_status_id',
				'$agent_exam_confirmation',
				'$agent_enroll_date',
				'$agent_cl_sheet',
						
				'$agent_result',
				'$agent_btp_result',
				'$agent_file_desctiption',
				'$agent_card_delivery',
				'$agent_graduated_date',
						
				'$agent_date_of_exit_exam_results',
				'$agent_btp',
				'$agent_description',
				'$agent_file_come',
				'$agent_file_process',
						
				'$agent_check',
				'$office_city_id',
				'$exam_city_id',
				'$branch_id',
				'$payment_method_id',
						
				'$religion_id',
				''";

		create($data);

		header('Location: agent.php?page=list&did=1');
		}
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$city_id = get_isset($city_id);
		$agency_code = get_isset($agency_code);
		$agency_name = get_isset($agency_name);
		$agent_address = get_isset($agent_address);
		$agent_phone = get_isset($agent_phone);
		
		$agent_ktp_number = get_isset($agent_ktp_number);
		$agent_birth_place = get_isset($agent_birth_place);
		$agent_birth_date = get_isset($agent_birth_date);  $agent_birth_date = format_back_date($agent_birth_date);
		$agent_gender = get_isset($agent_gender);
		$agent_status = get_isset($agent_status);
		
		$agent_last_education = get_isset($agent_last_education);
		$agent_position = get_isset($agent_position);
		$agent_senior_name = get_isset($agent_senior_name);
		$agent_join_date = get_isset($agent_join_date);   $agent_join_date = format_back_date($agent_join_date);
		$agent_industry_entry_date = get_isset($agent_industry_entry_date);  $agent_industry_entry_date = format_back_date($agent_industry_entry_date);
		
		
		$agent_license_type = get_isset($agent_license_type);
		$agent_exam_date = get_isset($agent_exam_date);  $agent_exam_date = format_back_date($agent_exam_date);
		$agent_registration = get_isset($agent_registration);
		$agent_exam_status = get_isset($agent_exam_status);
		$agent_dc_regional = get_isset($agent_dc_regional);
		
		$agent_delivery_cd_date = get_isset($agent_delivery_cd_date);  $agent_delivery_cd_date = format_back_date($agent_delivery_cd_date);
		$agent_active_status = get_isset($agent_active_status);
		$agent_exam_hour = get_isset($agent_exam_hour);
		$agent_exam_date_is_not_selected = get_isset($agent_exam_date_is_not_selected); $agent_exam_date_is_not_selected = format_back_date($agent_exam_date_is_not_selected);
		$agent_certificate = get_isset($agent_certificate);
		
		$agent_invoice_number = get_isset($agent_invoice_number); 
		$agent_invoice_status_id = get_isset($agent_invoice_status_id);
		$agent_exam_confirmation = get_isset($agent_exam_confirmation); $agent_exam_confirmation= format_back_date($agent_exam_confirmation);
		$agent_enroll_date = get_isset($agent_enroll_date);  $agent_enroll_date = format_back_date($agent_enroll_date);
		$agent_cl_sheet = get_isset($agent_cl_sheet);  $agent_cl_sheet= format_back_date($agent_cl_sheet);
		
		$agent_result = get_isset($agent_result); 
		$agent_btp_result = get_isset($agent_btp_result);
		$agent_file_desctiption = get_isset($agent_file_desctiption); 
		$agent_card_delivery = get_isset($agent_card_delivery); 
		$agent_graduated_date = get_isset($agent_graduated_date);  $agent_graduated_date= format_back_date($agent_graduated_date);
		
		$agent_date_of_exit_exam_results = get_isset($agent_date_of_exit_exam_results);   $agent_date_of_exit_exam_results= format_back_date($agent_date_of_exit_exam_results);
		$agent_btp = get_isset($agent_btp);
		$agent_description = get_isset($agent_description); 
		$agent_file_come = get_isset($agent_file_come);  $agent_file_come= format_back_date($agent_file_come);
		$agent_file_process = get_isset($agent_file_process);  $agent_file_process= format_back_date($agent_file_process);
		
		$agent_check = get_isset($agent_check);
		$office_city_id = get_isset($office_city_id); 
		$exam_city_id = get_isset($exam_city_id);
		$branch_id = get_isset($branch_id); 
		$payment_method_id = get_isset($payment_method_id);
		
		$religion_id = get_isset($religion_id); 
		
		
		
		
		$data = "
				city_id ='$city_id',
				agent_code ='$agency_code',
				agent_name ='$agency_name',
				agent_address ='$agent_address',
				agent_phone ='$agent_phone',
			
				agent_ktp_number = '$agent_ktp_number',
				agent_birth_place = '$agent_birth_place',
				agent_birth_date = '$agent_birth_date',
				agent_gender = '$agent_gender',
				agent_status = '$agent_status',
				
				agent_last_education = '$agent_last_education',
				agent_position = '$agent_position',
				agent_senior_name = '$agent_senior_name',
				agent_join_date = '$agent_join_date',
				agent_industry_entry_date = '$agent_industry_entry_date',
						
				agent_license_type = '$agent_license_type',
				agent_exam_date = '$agent_exam_date',
				agent_registration = '$agent_registration',
				agent_exam_status = '$agent_exam_status',
				agent_dc_regional = '$agent_dc_regional',
						
				agent_delivery_cd_date = '$agent_delivery_cd_date',
				agent_active_status = '$agent_active_status',
				agent_exam_hour = '$agent_exam_hour',
				agent_exam_date_is_not_selected ='$agent_exam_date_is_not_selected',
				agent_certificate ='$agent_certificate',
						
				agent_invoice_number = '$agent_invoice_number',
				agent_invoice_status_id = '$agent_invoice_status_id',
				agent_exam_confirmation = '$agent_exam_confirmation',
				agent_enroll_date = '$agent_enroll_date',
				agent_cl_sheet = '$agent_cl_sheet',
						
				agent_result = '$agent_result',
				agent_btp_result = '$agent_btp_result',
				agent_file_desctiption = '$agent_file_desctiption',
				agent_card_delivery = '$agent_card_delivery',
				agent_graduated_date = '$agent_graduated_date',
						
				agent_date_of_exit_exam_results = '$agent_date_of_exit_exam_results',
				agent_btp = '$agent_btp',
				agent_description = '$agent_description',
				agent_file_come = '$agent_file_come',
				agent_file_process = '$agent_file_process',
						
				agent_check = '$agent_check',
				office_city_id = '$office_city_id',
				exam_city_id = '$exam_city_id',
				branch_id ='$branch_id',
				payment_method_id = '$payment_method_id',
						
				religion_id = '$religion_id',
				''";
		
		update($data, $id);

		header('Location: agent.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: agent.php?page=list&did=3');

	break;
	//delete agent_tmp
	case 'delete_agent_tmp':

		$id = get_isset($_GET['id']);	

		delete_agent_tmp($id);

		header('Location: agent.php?page=form_upload&save=1&did=3');

	break;
	//update agents 
	case 'update_agent_tmp':
		$sess_id=session_id();
		update_agent_tmp($sess_id);
		
		header('Location: agent.php?page=form_upload&save=1');
	break;
	
	case 'delete_all':
		
		$sess_id=session_id();
	
		delete_all($sess_id);

	header('Location: agent.php?page=list');
	break;

}
?>