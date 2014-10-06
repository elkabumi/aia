<?php

function select($where,$limit){
	$query = mysql_query("SELECT a.*, 
								 b.city_name as home_city 
						 FROM  agents a
						 join  cities b on a.city_id = b.city_id
						 $where order by a.agent_id  ASC  $limit 	
							");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from  agents where agent_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into  agents values(".$data.")");
}

function update($data, $id){
	mysql_query("update  agents set ".$data." where agent_id = '$id'");
}

function delete($id){
	mysql_query("delete from  agents  where agent_id = '$id'");
}

function count_agent_tmp($sess_id){
	$query = mysql_query("SELECT agent_id_tmp FROM agents_tmp WHERE session_id = '$sess_id'  AND input_type_id='1'");
	$result = mysql_num_rows($query);
	return $result;

}
function selct_agent_tmp($sess_id){	
$query = mysql_query("SELECT a.agent_id_tmp, a.agent_active_status_tmp,a.agent_code_tmp, a.agent_name_tmp, a.agent_ktp_number_tmp, a.city_id_tmp, b.city_name
FROM agents_tmp a
JOIN cities b ON a.city_id_tmp = b.city_id
					 WHERE a.session_id = '$sess_id' AND a.input_type_id='1'");

	return $query;
}
function count_agent_tmp_excel($sess_id,$user_id){
	$query = mysql_query("SELECT  agent_id_tmp_excel FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='1'");
	$result = mysql_num_rows($query);
	return $result;

}
function delete_agent_tmp_excel($sess_id,$user_id){
	mysql_query("delete from  agents_tmp_excel  WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='1'");
}	
	
function select_agent_tmp_excel($sess_id,$user_id){	
	$query = mysql_query("SELECT agent_id_tmp_excel, 
								agent_code_tmp_excel,
								agent_name_tmp_excel,
								agent_ktp_number_tmp_excel,
								city_id_tmp_excel,
								agent_active_status_tmp_excel 
							FROM agents_tmp_excel WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='1'");
	return $query;
}

			



function update_agent_tmp($sess_id){
	$query = mysql_query("SELECT * FROM agents_tmp WHERE session_id = '$sess_id'  AND input_type_id='1' ");
	while($row=mysql_fetch_array($query)){
					
	mysql_query("UPDATE agents SET  pic	='".$row['pic_tmp']."',
									month	='".$row['month_tmp']."',
									city_id ='".$row['city_id_tmp']."',
									agent_code	='".$row['agent_code_tmp']."',
									agent_name	='".$row['agent_name_tmp']."',
									agent_address	='".$row['agent_address_tmp']."',
									agent_phone 	='".$row['agent_phone_tmp']."',
									
									agent_birth_place ='".$row['agent_birth_place_tmp']."',
									agent_birth_date  ='".$row['agent_birth_date_tmp']."',
									agent_gender = '".$row['agent_gender_tmp']."',
									agent_status ='".$row['agent_status_tmp']."',
									agent_last_education =	'".$row['agent_last_education_tmp']."',
									agent_position		=	'".$row['agent_position_tmp']."',
									agent_senior_name	=	'".$row['agent_senior_name_tmp']."',
									agent_join_date		=	'".$row['agent_join_date_tmp']."',
									agent_industry_entry_date =	'".$row['agent_industry_entry_date_tmp']."',
									agent_license_type	=		'".$row['agent_license_type_tmp']."',
									agent_exam_date		=		'".$row['agent_exam_date_tmp']."',
									agent_registration	=	'".$row['agent_registration_tmp']."',
									agent_exam_status	=		'".$row['agent_exam_status_tmp']."',
									agent_dc_regional=			'".$row['agent_dc_regional_tmp']."',
									agent_delivery_cd_date	=	'".$row['agent_delivery_cd_date_tmp']."',
									agent_active_status		=	'".$row['clean_tmp']."',
									agent_exam_hour			='".$row['agent_exam_hour_tmp']."',
									agent_exam_date_is_not_selected		=	'".$row['agent_exam_date_is_not_selected_tmp']."',
									agent_certificate		=	'".$row['agent_certificate_tmp']."',
									agent_invoice_number	= 	'".$row['agent_invoice_number_tmp']."',
									agent_invoice_status_id	=	'".$row['agent_invoice_status_id_tmp']."',
									agent_exam_confirmation	=	'".$row['agent_exam_confirmation_tmp']."',
									agent_enroll_date		=	'".$row['agent_enroll_date_tmp']."',
									agent_cl_sheet			=	'".$row['agent_cl_sheet_tmp']."',
									agent_result			=	'".$row['agent_result_tmp']."',
									agent_btp_result		=	'".$row['agent_btp_result_tmp']."',
									agent_file_desctiption	=	'".$row['agent_file_desctiption_tmp']."',
									agent_card_delivery		=	'".$row['agent_card_delivery_tmp']."',
									agent_graduated_date	=	'".$row['agent_graduated_date_tmp']."',
									agent_date_of_exit_exam_results	=	'".$row['agent_date_of_exit_exam_results_tmp']."',
									agent_btp			='".$row['agent_btp_tmp']."',
									agent_description	='".$row['agent_description_tmp']."',
									agent_file_come		='".$row['agent_file_come_tmp']."',
									agent_file_process	='".$row['agent_file_process_tmp']."',
									agent_check			='".$row['agent_check_tmp']."',
									office_city_id		='".$row['office_city_id_tmp']."',
									exam_city_id		='".$row['exam_city_id_tmp']."',
									branch_id 			='".$row['branch_id_tmp']."',
									payment_method_id	='".$row['payment_method_id_tmp']."',
									religion_id			='".$row['religion_id_tmp']."'
							WHERE 	agent_ktp_number = '".$row['agent_ktp_number_tmp']."';");
							
		mysql_query("DELETE FROM agents_tmp WHERE agent_id_tmp = '".$row['agent_id_tmp']."'");
							
	}
	
	
}

function delete_agent_tmp($id){
	mysql_query("delete from agents_tmp  where agent_id_tmp = '$id' AND input_type_id='1' ");
}
function delete_all($sess_id){
	mysql_query("DELETE FROM agents_tmp WHERE  session_id = '$sess_id' AND input_type_id='1'");
}
function count_data($where){
	
	$query = mysql_query("SELECT COUNT(a.agent_id)
						 FROM  agents a
						 join  cities b on a.city_id = b.city_id $where order by agent_id DESC");
	$query_data = mysql_fetch_row($query);
	$numrows = $query_data[0];
	
	return $numrows;
}
?>