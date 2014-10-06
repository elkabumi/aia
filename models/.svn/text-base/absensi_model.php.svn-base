<?php

function select($user_id, $user_type_id){
	
	$parameter = "";
	if($user_type_id == 2 || $user_type_id == 3){
		$parameter = " and a.trainer_id = '$user_id'";
	}else if($user_type_id == 5){
		$parameter = " and d.leader_id = '$user_id'";
	}
	
	$query = mysql_query("SELECT a.*, b.unit_name, d.user_name
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN transaction_trainers c ON a.transaction_id = c.transaction_id
							JOIN users d ON c.user_id = d.user_id 
 							WHERE   transaction_approved_status = '1'
							and transaction_type_date = '1' 
							$parameter
							");
	return $query;
}
function select2($id){
	$query=mysql_query("SELECT a.*,
									 b.agent_id,
									 b.agent_name,
									 b.agent_code,
									 b.agent_phone,
									 b.agent_senior_name,
									 b.agent_ktp_number,
									 b.branch_id
									FROM transaction_agents a
									JOIN agents b on a.agent_id = b.agent_id
									WHERE a.transaction_id =  '". $id."'
									order by agent_name 
									");
	return $query;
}

function get_count_agent($id){
	$query=mysql_query("SELECT count(a.transaction_agent_id) as jumlah
								
									FROM transaction_agents a
									JOIN agents b on a.agent_id = b.agent_id
									WHERE a.transaction_id =  '". $id."'
									order by agent_name 
									");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
}

function get_event_type($id){
	$query=mysql_query("SELECT transaction_type_id from transactions where transaction_id = '$id'
									");
	$result = mysql_fetch_object($query);
	return $result->transaction_type_id;
}

function heder($id){
	$query=mysql_query("SELECT transaction_date, b.unit_name, d.user_name
						FROM transactions a
						JOIN units b ON a.unit_id = b.unit_id
						JOIN transaction_trainers c ON a.transaction_id = c.transaction_id
						JOIN users d ON c.user_id = d.user_id 
						WHERE transaction_approved_status = '1'
						AND a.transaction_id = '". $id."'");
	$result=mysql_fetch_array($query);
	return $result;
}

function select_event($id){
	$query = mysql_query("SELECT a.*, b.unit_name, d.user_name as trainer_name, a.transaction_name
							FROM  transactions a
							left join transaction_trainers c on c.transaction_id = a.transaction_id
							left JOIN users d on d.user_id = c.user_id
							JOIN units b on a.unit_id = b.unit_id
 							WHERE  a.transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function save_absensi($id, $transaction_agent_id){
		mysql_query("insert into absensi values('', '$id', '$transaction_agent_id', '0', '0')");
}

function save_absensi2($result, $value, $id){
		mysql_query("update absensi set absensi_exam_result = '$result', absensi_exam_value = '$value' where absensi_id = '$id'");
		
			$transaction_agent_id = mysql_fetch_array(mysql_query("SELECT transaction_agent_id FROM absensi WHERE absensi_id='$id'"));
			$agent_id = mysql_fetch_array(mysql_query("SELECT agent_id FROM transaction_agents WHERE  transaction_agent_id='". 	$transaction_agent_id['0']."'"));
		if($result == '0'){
			$agent_pass_status = '0';
		}else{
			$agent_pass_status = '1';
		}
		mysql_query("UPDATE agents set agent_pass_status ='".$agent_pass_status."' WHERE agent_id = '".$agent_id[0]."'");
}

function save_absensi_item($data){
		mysql_query("insert into absensi_items values($data)");
}

function check_data($id){
	$query = mysql_query("select count(absensi_id) as jumlah from absensi where transaction_id = '$id'
							");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
}

function delete_data($id){
	$query = mysql_query("select * from absensi where transaction_id = '$id'");
	while($row = mysql_fetch_array($query)){
		mysql_query("delete from absensi_items 
					
					where absensi_id = '".$row['absensi_id']."'");
	}
	mysql_query("delete from absensi where transaction_id = '$id'");
	
}

?>