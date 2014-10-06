<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/update_ars_model.php';
include '../models/global_model.php';
$page = null;
if(!($_GET['page'])){
	$page = "form";
}else{
	$page=$_GET['page'];
}
if(isset($_GET['search'])){
	$page = "agent_list_cek"; 

}
if(isset($_GET['search2'])){
	$page = "form"; 

}
$title = ucfirst("clean data ars");

$_SESSION['menu_active'] = 1;

switch ($page) {
	
	
	case 'form':
		get_header();

	
		$add_button = "update_ars.php?page=form";
		$action = "update_ars.php?page=save_upload";
	
		
		//$action = "update_ars.php?page=save_upload";
		$save = (isset($_GET['save'])) ? $_GET['save'] : null;	
		$search2 = (isset($_GET['search2'])) ? $_GET['search2'] : null;	
		include '../views/update_ars/form.php';
		$sess_id=session_id();
		$user_id = $_SESSION['user_id'];
		
		$count=count_agent_tmp($sess_id,$user_id);

		if(isset($save) && $count >= 1 or isset($search2)){
			if (isset($_GET['pageno2'])) {
   				$pageno2 = $_GET['pageno2'];
			}else {
   				$pageno2 = 1;
			}
			$where = " WHERE session_id = '$sess_id' AND user_id='$user_id' AND input_type_id='2'" ;
			if($_GET['search2']){
  				$where = "WHERE agent_ktp_number_tmp like '%".$_GET['search2']."%' AND session_id = '$sess_id' AND user_id='$user_id' AND input_type_id='2'" ;
  		}
	 
		$count_data = count_agent_tmp2($where);
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
		$query = select_agent_tmp($where,$limit);
		$update =   "update_ars.php?page=update";
		$ignore =   "update_ars.php?page=delete_all";
			
			
			
			
			
			
		
			include '../views/update_ars/list_tmp.php';	
		}
		get_footer();
	break;
		

		if(isset($save) && $count >= 1){
			if (isset($_GET['pageno2'])) {
   				$pageno2 = $_GET['pageno2'];
			}else {
   				$pageno2 = 1;
			}
				$where = "WHERE session_id = '$sess_id' AND user_id='$user_id' AND input_type_id='2'";
			if($_GET['search']){
  				$where = "WHERE a.agent_ktp_number like '%".$_GET['search']."%' AND session_id = '$sess_id' AND user_id='$user_id' AND input_type_id='2'"; 
  			}
	 
			$count_data = count_agent_tmp($where);
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
			
			
			
				$update =   "update_ars.php?page=update";
				$ignore =   "update_ars.php?page=delete_all";
			
				$query=select_agent_tmp($where);
		
			include '../views/update_ars/list_tmp.php';	
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
									$month			 		=trim($data->val($j,3)); 			//month 
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
									$input_type_id ='2';
									
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
																				)");
							
							}
						}
						$cari_sisa = $hasildata % 500;
							if($cari_sisa != 0)
							{
								
								for($k=$j; $k<=$hasildata; $k++)
								{
								
								
									$pic 					= trim($data->val($k,2));  			//pic 
									$month			 		=trim($data->val($k,3)); 			//month 
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
									$input_type_id ='2';
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
																				)");
							
								
								}
							} 	
					echo"<script> window.location='update_ars.php?page=agent_list_cek'</script>";
		
		break;
	
	case 'agent_list_cek':
		get_header();
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			
			if (isset($_GET['pageno2'])) {
   				$pageno2 = $_GET['pageno2'];
			}else{
   				$pageno2 = 1;
			}
			$where = "WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='2'"; ;
		
			if($_GET['search']){
  				$where = "WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='2' AND agent_ktp_number_tmp_excel like '%".$_GET['search']."%'"; 
  			}
			
			$count_data = count_agent_tmp_excel($where);
			$rows_per_page = 10;
			$lastpage      = ceil($count_data/$rows_per_page);

			$pageno2 = (int)$pageno2;
			if($pageno2 > $lastpage) {
   				$pageno2 = $lastpage;
			} 
			if ($pageno2 < 1) {
				$pageno2 = 1;
			}
				
				
			
			$update =   "update_ars.php?page=insert_agent_tmp_excel";
			$ignore =   "update_ars.php?page=delete_agent_tmp_excel";
			$limit = 'LIMIT ' .($pageno2 - 1) * $rows_per_page .',' .$rows_per_page;
			$query = select_agent_tmp_excel($where,$limit);
		
			include '../views/update_ars/list_tmp_excel.php';	
		get_footer();	
	break;
	
		case 'insert_agent_tmp_excel':
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
			
			$query = mysql_query("SELECT * FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='2'");
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
						$row['agent_birth_date_tmp_excel']  = format_back_date_upload($row['agent_birth_date_tmp_excel']);
						$row['agent_join_date_tmp_excel']  = format_back_date_upload($row['agent_join_date_tmp_excel']);
						$row['agent_industry_entry_date_tmp_excel'] = format_back_date_upload($row['agent_industry_entry_date_tmp_excel']);
						$row['agent_exam_date_tmp_excel'] = format_back_date_upload($row['agent_exam_date_tmp_excel']);
						$row['agent_delivery_cd_date_tmp_excel'] = format_back_date_upload($row['agent_delivery_cd_date_tmp_excel']);
						$row['agent_exam_date_is_not_selected_tmp_excel'] = format_back_date_upload($row['agent_exam_date_is_not_selected_tmp_excel']);
						$row['agent_exam_confirmation_tmp_excel'] = format_back_date_upload($row['agent_exam_confirmation_tmp_excel']);
						$row['agent_enroll_date_tmp_excel'] = format_back_date_upload($row['agent_enroll_date_tmp_excel']);
						$row['agent_cl_sheet_tmp_excel'] = format_back_date_upload($row['agent_cl_sheet_tmp_excel']);
						$row['agent_graduated_date_tmp_excel'] = format_back_date_upload($row['agent_graduated_date_tmp_excel']);
						$row['agent_date_of_exit_exam_results_tmp_excel'] = format_back_date_upload($row['agent_date_of_exit_exam_results_tmp_excel']);
						$row['agent_file_come_tmp_excel'] = format_back_date_upload($row['agent_file_come_tmp_excel']);
						$row['agent_file_process_tmp_excel']  = format_back_date_upload($row['agent_file_process_tmp_excel']);
									
				if($cek_ktp_number == '0'){
						$id_user = $_SESSION['user_id'];
						$sess_id=session_id();
						$input_type_id ='2';
						$input_date = date('y-m-d');
					
						mysql_query("INSERT INTO agents_tmp  VALUES ('',
									'".$id_user."',
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
				}else{
						
						update_ars($row['agent_active_status_tmp_excel'],$row['agent_ktp_number_tmp_excel']);	;
					
				}
			}
			mysql_query("DELETE  FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='2'");

			echo"<script> window.location='update_ars.php?page=form&save=1'</script>";
	break;
	
	


	
	case 'delete_agent_tmp_excel':
			$sess_id = session_id();
			$user_id = $_SESSION['user_id'];
		
			delete_agent_tmp_excel($sess_id,$user_id);

			header('Location: update_ars.php?page=form');
	
	
	break;
	
	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: update_ars.php?page=form&save=1&did=3');

	break;
	//update agents 
	case 'update':
		$sess_id=session_id();
		update($sess_id);
	
		header('Location: update_ars.php?page=form&save=1');
	break;
	
	case 'delete_all':
		$sess_id=session_id();
		delete_all($sess_id);

	header('Location: update_ars.php?page=form&save=1');
	break;
}	

?>