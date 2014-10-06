<?php

function select_unit(){
	$query = mysql_query("select * from units
			");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT a.*, b.unit_name
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
 							WHERE  a.transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into transactions values(".$data.")");
}

function create_date2($id, $date2){
	mysql_query("insert into transaction_date2 values('','$id','$date2')");
}

function update($data, $id){
	mysql_query("update transactions set ".$data." where transaction_id = '$id'");
}

function delete($id){
	mysql_query("delete from users  where user_id = '$id'");
}
function detail_read_id($date,$unit_id){
	$query = mysql_query("SELECT a.*, b.unit_name,c.user_name 	
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN users c ON  c.user_id = a.trainer_id 	
 							WHERE  a.transaction_date = '$date'
 							AND transaction_approved_status = '1' 
							AND a.unit_id = '$unit_id'");
	return $query;
}
function detail_read_id2($date,$unit_id){
	$query = mysql_query("SELECT a.*, b.unit_name,c.user_name 	
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN users c ON  c.user_id = a.trainer_id 	
 							WHERE  a.transaction_date = '$date'
 							AND transaction_approved_status = '1' 
							AND a.unit_id = '$unit_id' AND a.trainer_id  ='".$_SESSION['user_id']."'");
	return $query;
}
function detail_read_id3($date,$unit_id){
	$query = mysql_query("SELECT a.*, b.unit_name,c.user_name 	
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN users c ON  c.user_id = a.trainer_id 	
 							WHERE  a.transaction_date = '$date'
 							AND transaction_approved_status = '1' 
							AND a.unit_id = '$unit_id' AND c.leader_id ='".$_SESSION['user_id']."'");
	return $query;
}


function delete_trainer($id){
	mysql_query("delete from transaction_trainers  where  transaction_trainer_id= '$id'");
	//mysql_query("UPDATE   transactions SET sign_by_id ='0'  WHERE  transaction_id = '".$id."' OR transaction_type_date_id  = '".$id."'");
}
function delete_agent($id){
	
	$query=mysql_query("SELECT agent_id FROM  transaction_agents_tmp where  transaction_agents_tmp_id 	 = '$id'");
	$agent=mysql_fetch_array($query);
	mysql_query("UPDATE agents SET agent_active_status = '1' where agent_id='$agent[0]'");
	mysql_query("delete from transaction_agents_tmp  where  transaction_agents_tmp_id 	 = '$id'");
}

function select_not_approved(){
	$query = mysql_query("SELECT a . * , b.unit_name, c.user_name
				FROM transactions a
				JOIN units b ON a.unit_id = b.unit_id
				LEFT JOIN users c ON c.user_id = a.trainer_id
				WHERE transaction_approved_status = '0'
				AND transaction_type_date = '1'");
	return $query;
}

function read_trainer_view($id){
	$query = mysql_query("select a.*, b.*
							from transaction_trainers a
							join users b on a.user_id = b.user_id where transaction_id = $id");
	return $query;
}

function create_trainer2($data){
	mysql_query("insert into transaction_trainers values(".$data.")");
}

function read_agent_tmp($id,$ses_id){
	$query = mysql_query("select a.*, b.*
							from transaction_agents_tmp a
							join agents b on a.agent_id = b.agent_id where a.session_id='$ses_id' and a.transaction_id = '$id'");
	return $query;
}

function read_agent_view($id){
	$query = mysql_query("select a.*, b.*
							from transaction_agents a
							join agents b on a.agent_id = b.agent_id where a.transaction_id = '$id'");
	return $query;
}
function count_agent_tmp_excel($sess_id,$user_id){
	$query = mysql_query("SELECT  agent_id_tmp_event FROM  agents_tmp_event WHERE session_id = '$sess_id'  AND user_id = '$user_id'");
	$result = mysql_num_rows($query);
	return $result;

}

function count_agent_tmp_excel2($sess_id,$user_id){
	$query = mysql_query("SELECT  agent_id_tmp_event2 FROM  agents_tmp_event2 WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND type_data='2'");
	$result = mysql_num_rows($query);
	return $result;

}

function count_agent_clean($sess_id,$id){
	$query = mysql_query("SELECT  transaction_agents_tmp_id  FROM transaction_agents_tmp WHERE session_id = '$sess_id'  AND  transaction_id = '$id'");
	$result = mysql_num_rows($query);
	return $result;

}
function cek_status($agent_id){
	$query = mysql_query("SELECT agent_active_status from agents where agent_id='".$agent_id."'");
	$result = mysql_fetch_array($query);
	return $result;

}
function pass_status($agent_id){
	$query = mysql_query("SELECT agent_pass_status from agents where agent_id='".$agent_id."'");
	$row = mysql_fetch_array($query);
	$row['0'];
	return $row['0'];

}
function delete_agent_tmp_event($sess_id,$user_id,$agent_id){
	mysql_query("delete from  agents_tmp_event  WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND agent_id_tmp_event='$agent_id'");
}	
function delete_agent_tmp_event2($sess_id,$user_id,$agent_id){
	mysql_query("delete from  agents_tmp_event2  WHERE session_id = '$sess_id'  AND user_id = '$user_id' AND agent_id_tmp_event2='$agent_id'");
}	
	
function select_agent_tmp_excel($sess_id,$user_id){	
	$query = mysql_query("SELECT * FROM agents_tmp_event WHERE session_id = '$sess_id'  AND user_id = '$user_id' ");
	return $query;
}
function select_agent_tmp_excel2($sess_id,$user_id){	
	$query = mysql_query("SELECT agent_id_tmp_event2,agen_kode,agen_ktp,agen_name FROM agents_tmp_event2 WHERE session_id = '$sess_id'  AND user_id = '$user_id'  and type_data='2'");
	return $query;
}
function create_agent_tmp($data,$agent_id){
	mysql_query("insert into  transaction_agents_tmp values(".$data.")");
	mysql_query("UPDATE agents SET agent_active_status ='0' WHERE agent_id ='".$agent_id."'");
}


function create_trainer($tainer_id,$id){
	mysql_query("insert into transaction_trainers values('','".$id ."','".$tainer_id."')");
}



function create_agent($id,$ses_id){
	$query = mysql_query("select a.*, b.*
							from transaction_agents_tmp a
							join  agents b on a.agent_id = b.agent_id where a.session_id='$ses_id' and transaction_id = $id");
	while($create_agent=mysql_fetch_array($query)){
		mysql_query("insert into  transaction_agents values('','".$create_agent['transaction_id']."','".$create_agent['agent_id']."')");
		mysql_query("DELETE from transaction_agents_tmp WHERE  transaction_agents_tmp_id = '".$create_agent['transaction_agents_tmp_id']."'");
		mysql_query("UPDATE agents SET agent_active_status = '0' WHERE agent_id = '".$create_agent['agent_id']."'"); 

}
}
function create_agent_event($no_ktp,$cede,$name,$name_leader,$phone_number,$name_agency,$clean){
	mysql_query("INSERT INTO agents(agent_ktp_number,agent_code,agent_name,agent_senior_name,agent_phone,branch_id,agent_active_status) VALUES 		('$no_ktp','$cede','$name','$name_leader','$phone_number','$name_agency','$clean')");

}

function create_agent_event2($code,$name,$agen_tgl_lahir,$agen_jenkel,$agen_marital,$agen_agama,$agen_pendidikan,$agen_ktp,$agen_tipe_lisensi,$clean){
mysql_query("INSERT INTO agents(agent_code,
								agent_name,
								agent_birth_date,
								agent_gender,
								agent_status,
								religion_id,
								agent_last_education,
								agent_ktp_number,
								agent_license_type,
								agent_active_status) 
								VALUES 
								('$code',
								'$name',
								'$agen_tgl_lahir',
								'$agen_jenkel',
								'$agen_marital',
								'$agen_agama',
								'$agen_pendidikan',
								'$agen_ktp',
								'$agen_tipe_lisensi',
								'$clean')");

}
function cek_transaction_trainer_tmp($ses_id,$id,$trainer_id){
	$query = mysql_query("SELECT transaction_trainers_tmp_id
FROM transaction_trainers_tmp  WHERE session_id = '$ses_id' AND transaction_id = '$id' AND user_id = '$trainer_id' ");
	$result = mysql_num_rows($query);
	return $result;

}
function cek_transaction_agent_tmp($ses_id,$id,$id_agent){
	$query = mysql_query("SELECT transaction_agents_tmp_id FROM  transaction_agents_tmp WHERE session_id = '$ses_id' AND transaction_id = '$id' AND agent_id = '$id_agent' ");
	$result = mysql_num_rows($query);
	return $result;

}

function cek_total_trainer($id){
	$query = mysql_query("SELECT transaction_trainer_id
							FROM transaction_trainers
						WHERE transaction_id = '$id' ");
	$result = mysql_num_rows($query);
	return $result;

}
function get_id_trainer($id){
	$query = mysql_query("SELECT user_id FROM transaction_trainers WHERE transaction_id ='".$id."' ");
	$row = mysql_fetch_array($query);
	$row['0'];
	return $row['0'];
}
function create_existing_agen($data){
	mysql_query("insert into  agents_existing values(".$data.")");
}

function create_sign_by_id($id, $user_id){
	mysql_query("update transactions set sign_by_id = '$user_id', transaction_status = '1' where transaction_id = '$id' or transaction_type_date_id='$id' ");
}

function upload_event($data){
	mysql_query("insert into  transactions values($data)");
}
function update_sign_by_id($id_triner, $id){
	mysql_query("UPDATE transactions set sign_by_id =  '".$id_triner."' where transaction_id = '".$id."' OR transaction_type_date_id  = '".$id."'");
}
function count_agent($id){
	$query = mysql_query("SELECT COUNT(transaction_agent_id)
							FROM transaction_agents
						WHERE transaction_id = '".$id."'");
	$result = mysql_fetch_array($query);
	$result['0'];
	return $result['0'];
}
function count_agent_tmp($id){
	$query = mysql_query("SELECT COUNT( transaction_agents_tmp_id ) 
							FROM transaction_agents_tmp
						WHERE transaction_id = '".$id."'");
	$result = mysql_fetch_array($query);
	$result['0'];
	return $result['0'];
}
function count_agent2($transaction_type_date_id,$transaction_id){
	$query = mysql_query("SELECT COUNT( a.transaction_agent_id )
					FROM transaction_agents a
					JOIN transactions b ON a.transaction_id = b.transaction_type_date_id
					WHERE b.transaction_type_date_id = '".$transaction_type_date_id."'
					AND b.transaction_id = '".$transaction_id."'");
	$result = mysql_fetch_array($query);
	$result['0'];
	return $result['0'];
}

function select_agent($type_transaction,$param,$limit){
	if($type_transaction == '1'){
		$where = "WHERE a.agent_active_status='1' AND agent_pass_status ='0' $param ";
	}else{
		$where = "WHERE a.agent_active_status='1' $param";
	}
	$query = mysql_query("SELECT a.agent_id, 
								 a.agent_code,
								 a.agent_name,
								 a.agent_ktp_number,
								 b.city_name as home_city 
						 FROM  agents a
						 LEFT join  cities b on a.city_id = b.city_id 
						 $where order by a.agent_id  ASC  $limit 	
							");
	return $query;
}

function count_data_form_agent($type_transaction,$param){
	if($type_transaction == '1'){
		$where = "WHERE a.agent_active_status='1' AND a.agent_pass_status ='0' $param";
	}else{
		$where = "WHERE a.agent_active_status='1' $param";
	}
	$query = mysql_query("SELECT COUNT(a.agent_id)
						 FROM agents a
						 LEFT join  cities b on a.city_id = b.city_id 
						 $where	
							");
	$result=mysql_fetch_array($query);
	$row=$result['0'];
	return $row;
}

function cek_type_transaction($id){
	$query = mysql_query("SELECT transaction_type_id FROM transactions WHERE transaction_id ='".$id."' ");
	$row = mysql_fetch_array($query);
	$row['0'];
	return $row['0'];
}
?>