<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/update_ars_model.php';
include '../models/global_model.php';
$page = null;
$page = get_isset($_GET['page']);
$title = ucfirst("Update ars");

switch ($page) {
case 'save':

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
									$agent_name				= trim($data->val($j,5)); 			//nama_lengkap_agen
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
									$agent_name				= trim($data->val($k,5)); 			//nama_lengkap_agen
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
																				'".$input_type_id ."',
																				'".$input_date."'
																				)");
							
								
								}
							} 	
					echo"<script> window.location='agent.php?page=agent_list_cek'</script>";
				//header('Location: agent.php?page=agent_list_cek');
		
		break;
}
?>
	