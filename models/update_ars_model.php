<?php


function update_ars($data,$id){
	mysql_query("UPDATE agents SET agent_active_status = '".$data."' where agent_ktp_number ='".$id."'").";";
}

function count_agent_tmp_excel($where){
	$query = mysql_query("SELECT  agent_id_tmp_excel FROM agents_tmp_excel $where");
	$result = mysql_num_rows($query);
	return $result;

}
function delete_agent_tmp_excel($sess_id,$user_id){
	mysql_query("delete from  agents_tmp_excel  WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND input_type_id='2'");
}	
	
function select_agent_tmp_excel($where,$limit){	
	$query = mysql_query("SELECT agent_id_tmp_excel, 
								agent_code_tmp_excel,
								agent_name_tmp_excel,
								agent_ktp_number_tmp_excel,
								city_id_tmp_excel,
								agent_active_status_tmp_excel 
							FROM agents_tmp_excel $where order by agent_id_tmp_excel  ASC  $limit");
	return $query;
}


function update($sess_id){
	$query = mysql_query("SELECT * FROM agents_tmp WHERE session_id = '$sess_id'  AND input_type_id='2' ");
	while($row=mysql_fetch_array($query)){
	
	mysql_query("INSERT INTO agents  VALUES ('','".$row['pic_tmp']."',
									'".$row['month_tmp']."',
									'".$row['city_id_tmp']."',
									'".$row['agent_code_tmp']."',
									'".$row['agent_name_tmp']."',
									'".$row['agent_address_tmp']."',
									'".$row['agent_phone_tmp']."',
									'".$row['agent_ktp_number_tmp']."',
									'".$row['agent_birth_place_tmp']."',
									'".$row['agent_birth_date_tmp']."',
									'".$row['agent_gender_tmp']."',
									'".$row['agent_status_tmp']."',
									'".$row['agent_last_education_tmp']."',
									'".$row['agent_position_tmp']."',
									'".$row['agent_senior_name_tmp']."',
									'".$row['agent_join_date_tmp']."',
									'".$row['agent_industry_entry_date_tmp']."',
									'".$row['agent_license_type_tmp']."',
									'".$row['agent_exam_date_tmp']."',
									'".$row['agent_registration_tmp']."',
									'".$row['agent_exam_status_tmp']."',
									'".$row['agent_dc_regional_tmp']."',
									'".$row['agent_delivery_cd_date_tmp']."',
									'".$row['agent_active_status_tmp']."',
									'".$row['agent_exam_hour_tmp']."',
									'".$row['agent_exam_date_is_not_selected_tmp']."',
									'".$row['agent_certificate_tmp']."',
									'".$row['agent_invoice_number_tmp']."',
									'".$row['agent_invoice_status_id_tmp']."',
									'".$row['agent_exam_confirmation_tmp']."',
									'".$row['agent_enroll_date_tmp']."',
									'".$row['agent_cl_sheet_tmp']."',
									'".$row['agent_result_tmp']."',
									'".$row['agent_btp_result_tmp']."',
									'".$row['agent_file_desctiption_tmp']."',
									'".$row['agent_card_delivery_tmp']."',
									'".$row['agent_graduated_date_tmp']."',
									'".$row['agent_date_of_exit_exam_results_tmp']."',
									'".$row['agent_btp_tmp']."',
									'".$row['agent_description_tmp']."',
									'".$row['agent_file_come_tmp']."',
									'".$row['agent_file_process_tmp']."',
									'".$row['agent_check_tmp']."',
									'".$row['office_city_id_tmp']."',
									'".$row['exam_city_id_tmp']."',
									'".$row['branch_id_tmp']."',
									'".$row['payment_method_id_tmp']."',
									'".$row['religion_id_tmp']."',
									'');");
										
							
		mysql_query("DELETE FROM agents_tmp WHERE agent_id_tmp = '".$row['agent_id_tmp']."'");
							
	}
	
	
}

function delete($id){
	mysql_query("delete from agents_tmp  where agent_id_tmp = '$id'");
}
function delete_all($sess_id){
	mysql_query("DELETE FROM agents_tmp WHERE  WHERE session_id = '$sess_id'");
}
function count_agent_tmp($sess_id,$user_id){
	$query = mysql_query("SELECT count(agent_id_tmp)
							FROM agents_tmp WHERE session_id = '$sess_id' AND user_id='$user_id' AND input_type_id='2'");
	$result = mysql_fetch_array($query);
	$row = $result['0'];
	return $row;

}
function select_agent_tmp($where,$limit){	
$query = mysql_query("SELECT a.agent_id_tmp, a.agent_active_status_tmp, a.agent_code_tmp, a.agent_name_tmp, a.agent_ktp_number_tmp, a.city_id_tmp, 	
						b.city_name
			FROM agents_tmp a
						JOIN cities b ON a.city_id_tmp = b.city_id
					  $where order by a.agent_id_tmp ASC  $limit");
	return $query;
}
function count_agent_tmp2($where){
	$query = mysql_query("SELECT count(agent_id_tmp)
							FROM agents_tmp $where");
	$result = mysql_fetch_array($query);
	$row = $result['0'];
	return $row;

}
?>