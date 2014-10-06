<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/update_ars_model.php';
include '../models/global_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("clean data ars");

switch ($page) {
	
	
	case 'form':
		get_header();

	
		$add_button = "update_ars_backup.php?page=form";
		$action = "update_ars_backup.php?page=save";
		$save = (isset($_GET['save'])) ? $_GET['save'] : null;	
		include '../views/update_ars/form.php';
		$sess_id=session_id();
		$count=count_agent_tmp($sess_id);

		if(isset($save) && $count > 1){
			$update =   "update_ars_backup.php?page=update";
			$ignore =   "update_ars_backup.php?page=delete_all";
			$query=selct_agent_tmp($sess_id);
		
			include '../views/update_ars/list_tmp.php';	
		}
		get_footer();
	break;

	case 'save':

		extract($_POST);
		$i_bank_name = get_isset($i_bank_name);
		$type_file   = $_FILES['file']['type'];
	
		$hasil = cek_type_file($type_file); 
  	
		
  
			/*if ($hasil == 0){
					 header('Location: update_ars.php?page=form&did=1');
			}else{*/
				
					$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
					$hasildata = $data->rowcount($sheet_index=0);
					/*
					echo $_FILES['file']['tmp_name']."<br>";
					$no=1;
					for ($i=1; $i<=70; $i++){
						$data2 = $data->val(1,$i);
						$data_excel = strtolower($data2);
						$data_excel = str_replace(" ","_",$data_excel);
						echo $no.".&nbsp;&nbsp;";
						echo $data_excel."<br>";
					$no++;
					}*/
					
				
			
					for ($i=2; $i<=$hasildata; $i++)
					{
						$agent_ktp_number		= $data->val($i,10); 	//nomor_ktp *
						$agent_active_status	= strtolower($data->val($i,31)); 	//clean/not_clean
						
						
						$cek_ktp_number=get_ktp_number($agent_ktp_number);
						//AGEMT ACTIVE STATUS
						if ($agent_active_status == 'clean'){
							$clean =1;
						}else if ($agent_active_status == 'not clean'){
							$clean =0;
						}

						
						if($agent_ktp_number == ''){
							continue;
						}
						
							if($cek_ktp_number != 0){	
								update_ars($clean,$agent_ktp_number);
						
							}else{
							
							
								$pic 					= $data->val($i,2);  			//pic 
								$month			 		= $data->val($i,3); 			//month 
								$agent_code 			= $data->val($i,4);		 		//kode_agen 
								$agent_name				= $data->val($i,5); 			//nama_lengkap_agen
								$not_agent_code2 		= $data->val($i,6); 			//kode_agen2
								$agent_address			= $data->val($i,7); 			//alamat_rumah
								$city_id				= strtolower($data->val($i,8)); 				//home_city
								$agent_phone			= $data->val($i,9); 	//no_hp/telp
								//
								$agent_birth_place		= $data->val($i,11); 	//tempat_lahir   
								$agent_birth_date		= $data->val($i,12); 	//tanggal_lahir
								$agent_gender			= strtolower($data->val($i,13)); 	//jenis_kelamin
								$agent_status			= strtolower($data->val($i,14)); 	//status_perkawinan
								$religion_id			= strtolower($data->val($i,15));	//agama
								$agent_last_education	= strtolower($data->val($i,16)); 	//pendidikan_terakhir *
								$office_city_id			= strtolower($data->val($i,17)); 	//office_city
								$agent_position			= $data->val($i,18); 	//jabatan 
								$agent_senior_name		= $data->val($i,19); 	//nama_atasan_langsung 
								$agent_join_date		= $data->val($i,20); 	//joint_date
								$agent_industry_entry_date	= $data->val($i,21); 	//industry_entry_date
								$agent_license_type		= strtolower($data->val($i,22));	//jenis_lisensi *
								$agent_exam_date		= $data->val($i,23); 	//tanggal_ujian
								$exam_city_id			= strtolower($data->val($i,24)); 	//kota_ujian
								$agent_registration 	= strtolower($data->val($i,25)); 	//registrasi
								$agent_exam_status 		= strtolower($data->val($i,26)); 	//exam_status
								$branch_id			 	= strtolower($data->val($i,27)); 	//nama_cabang
								$payment_method_id	 	= strtolower($data->val($i,28)); 	//metode_pembayaran
								$agent_dc_regional  	= $data->val($i,29); 	// dc_regional
								$agent_delivery_cd_date	= $data->val($i,30); 	//tgl_kirim_cd
								//
								$agent_exam_hour		= $data->val($i,32); 	//jam_ujian
								$agent_exam_date_is_not_selected = $data->val($i,33); 	//tanggal_ujian_tidak_dipilih
								$agent_certificate		= $data->val($i,34); 	//kartu/sertifikat
								$agent_invoice_number	= $data->val($i,35);	// nomor_invoice
								$agent_invoice_status_id	= strtolower($data->val($i,36)); 	//status_invoice
								$agent_exam_confirmation	= $data->val($i,37); 	//konfirmasi_ujian
								$agent_enroll_date			= $data->val($i,38); 	// tgl_enroll
								$agent_cl_sheet				= $data->val($i,39); 	//lembar_cl
								$agent_result				= $data->val($i,40);	// result
								$agent_btp_result			= $data->val($i,41); 	//btp_result
								$agent_file_desctiption		= $data->val($i,42); 	// keterangan_berkas
								$agent_card_delivery		= $data->val($i,43); 	//pengiriman_kartu  
								$agent_graduated_date		= $data->val($i,44); 	// tanggal_lulus
								$agent_date_of_exit_exam_results	= $data->val($i,45);	//tanggal_keluar_hasil_ujian  
								$agent_btp							= $data->val($i,46); 	//btp
								$agent_description					= $data->val($i,47); 	//keterangan_agen 
								$not_agent_description2				= $data->val($i,48); 	//keterangan_agen2	
								$agent_file_come					= $data->val($i,49); 	//berkas_datang
								$agent_file_process		= $data->val($i,50); 	//berkas_diproses	
								$agent_check			= $data->val($i,51); 	//cek
									
								//GENDER ID
								/*if ($agent_gender == 'm'){
									$gender = 1;  
								}else if ($agent_gender == 'f'){
									$gender = 2; 
								}else{*/
									$gender = 0;
								//}
								//STATUS ID
								/*if($agent_status == 'm'){
									$status = 1;
								}else if ($agent_status == 's'){
									$status = 2; 
								}else{*/
									$status = 0;
								//}
									//RELIGION
								//$cek_religion=cek_religion($religion_id);
								$religion = 1;
								//city_id
								//$cek_city = cek_city($city_id);
								$city = 1;
								//OFICE CITY
								//$cek_office_city = cek_city($office_city_id);
								$office_city = 1;
								//BRANCH ID
								//$cek_branch_id = cek_city($branch_id);
								$branch = 1;
								//EXAM CITY ID
								//$cek_exam_city_id = cek_city($exam_city_id);
								$exam_city = 1;
								//agent_last_education masih deidfiniskan dgn 0 
								$agent_last_education = '0';
								$agent_license_type	= '0';
								$agent_registration = '0';
								$agent_exam_status  = '0';
								$payment_method_id  = '0';
								$agent_invoice_status_id = '0';
								//ubah date
								$agent_birth_date = '0000-00-00';
								$agent_join_date = '0000-00-00';
								$agent_industry_entry_date = '0000-00-00';
								$agent_exam_date = '0000-00-00';
								$agent_delivery_cd_date = '0000-00-00';
								$agent_exam_date_is_not_selected = '0000-00-00';
								$agent_exam_confirmation = '0000-00-00';
								$agent_enroll_date = '0000-00-00';
								$agent_cl_sheet = '0000-00-00';
								$agent_graduated_date = '0000-00-00';
								$agent_date_of_exit_exam_results = '0000-00-00';
								$agent_file_come = '0000-00-00';
								$agent_file_process = '0000-00-00';
								$input_type_id ='2';//jenis asal inputan 2 untuk update ars
								$sess_id=session_id();
								
								
								mysql_query("INSERT INTO  agents_tmp values ('',
																		'".$sess_id."',
																		'".$pic."',
																		'".$month."',
																		'".$city."',
																		'".$agent_code."',
																		'".$agent_name."',
																		'".$agent_address."',
																		'".$agent_phone."',
																		'".$agent_ktp_number."',
																		'".$agent_birth_place."',
																		'".$agent_birth_date."',
																		'".$gender."',
																		'".$status."',
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
																		'".$clean."',
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
																		'".$office_city."',
																		'".$exam_city."',
																		'".$branch."',
																		'".$payment_method_id."',
																		'".$religion."',
																		'".$input_type_id."' 
																		)");
						}
				
				
			 }  
					header('Location: update_ars.php?page=form&save=1');
		
		

	break;
	//delete agent_tmp
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