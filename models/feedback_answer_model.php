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
							and transaction_type_id = '1' and transaction_type_date = '1'
							$parameter
							");
	return $query;
}
function select_agent($id){
	$query = mysql_query("SELECT b.agent_id,a.agent_code,a.agent_name,a.agent_ktp_number,a.city_id, b.transaction_id,c.city_name, a.agent_active_status, b.transaction_agent_id
							FROM agents a
							JOIN transaction_agents b on a.agent_id = b.agent_id
							JOIN cities c on a.city_id = c.city_id
 							WHERE b.transaction_id = '$id'
							
							");
	return $query;
}
function select_event($id){
	$query = mysql_query("SELECT a.*, b.unit_name, d.user_name as trainer_name, a.transaction_name
							FROM  transactions a
							left join transaction_trainers c on c.transaction_id = a.transaction_id
							left JOIN users d on d.user_id = c.user_id
							JOIN units b on a.unit_id = b.unit_id
 							WHERE  a.transaction_id = '$id'");
	return $query;
}
function select_p_gts1(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '1' and feedback_format_id = '1'
							order by feedback_item_id
							");
	return $query;
}
function select_p_gts2(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '1' and feedback_format_id = '6'
	order by feedback_item_id");
	return $query;
}
function select_p_gts3(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '1' and feedback_format_id = '7'
	order by feedback_item_id");
	return $query;
}
function select_p_gts4(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '1' and feedback_format_id = '8'
	order by feedback_item_id");
	return $query;
}

function select_p_gts1_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '1'
							order by feedback_item_id");
	return $query;
}


function select_p_gts2_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '6'
							order by feedback_item_id");
	return $query;
}
function select_p_gts3_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '7'
							order by feedback_item_id");
	return $query;
}
function select_p_gts4_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '8'
							order by feedback_item_id");
	return $query;
}


function select_p_fac3(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '2' and feedback_format_id = '3'
							order by feedback_item_id
							");
	return $query;
}
function select_p_fac4(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '2' and feedback_format_id = '4'
	order by feedback_item_id
							");
	return $query;
}
function select_p_fac5(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '2' and feedback_format_id = '5'
	order by feedback_item_id
							");
	return $query;
}
function select_p_fac3_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '3'
							order by feedback_item_id
							");
	return $query;
}

function select_p_fac4_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '4'
							order by feedback_item_id
							");
	return $query;
}

function select_p_fac5_edit($feedback_id){
	$query = mysql_query("select * from feedback_answers where feedback_id = '$feedback_id' and feedback_format_id = '5'
							order by feedback_item_id
							");
	return $query;
}

function select_title_agent($id, $type){
	$query = mysql_query("select c.agent_name 
							from feedbacks a
							join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
							join agents c on c.agent_id = b.agent_id
							where b.transaction_id = '$id' and a.feedback_type_id = '$type'
							order by a.feedback_id 
							");
	return $query;
}

function select_title_value($id, $type){
	$query = mysql_query("select c.agent_name, a.feedback_id
												from feedbacks a
												join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
												join agents c on c.agent_id = b.agent_id
												where b.transaction_id = '$id' and a.feedback_type_id = '$type'
												
												order by b.transaction_agent_id
							");
	return $query;
}

function count_title_agent($id, $type){
	$query = mysql_query("select count(c.agent_name) as jumlah_data 
							from feedbacks a
							join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
							join agents c on c.agent_id = b.agent_id
							where b.transaction_id = '$id' and a.feedback_type_id = '$type'
							order by a.feedback_id 
							");
	$result = mysql_fetch_object($query);
	return $result->jumlah_data;
}

function get_transaction_id($id){
	$query = mysql_query("select transaction_id from transaction_agents where transaction_agent_id = '$id' 
							");
	$result = mysql_fetch_object($query);
	return $result->transaction_id;
}

function get_data_agent($id){
	$query = mysql_query("select agent_name from transaction_agents a 
							join agents b on b.agent_id = a.agent_id
							where transaction_agent_id = '$id' 
							");
	$result = mysql_fetch_object($query);
	return $result->agent_name;
}

function check_data($id, $type){
	$query = mysql_query("select count(*) as jumlah_data from feedbacks where transaction_agent_id = '$id' and 									
							feedback_type_id = '$type'
							");
	$result = mysql_fetch_object($query);
	return $result->jumlah_data;
}

function save_feedback($id, $type){
	mysql_query("insert into feedbacks values('', '$id', '$type')");
	
	$q = mysql_query("select feedback_id from feedbacks where transaction_agent_id = '$id' and feedback_type_id = '$type'");
	$r = mysql_fetch_object($q);
	
	return $r->feedback_id;
}

function save_answer($data){
	mysql_query("insert into feedback_answers values($data)");
}

function edit_answer($data, $id){
	mysql_query("update feedback_answers set feedback_answer = '$data' where feedback_answer_id = '$id'");
}

function get_feedback_id($id, $type){
	$query = mysql_query("select feedback_id from feedbacks where transaction_agent_id = '$id' and feedback_type_id = '$type'
							");
	$result = mysql_fetch_object($query);
	return $result->feedback_id;
}

function query_answer($feedback_item_id, $feedback_id){
	$query = mysql_query("select feedback_answer from feedback_answers where feedback_item_id = '$feedback_item_id' and feedback_id = '$feedback_id'");
	return $query;
}

function delete_feedback($id){
	mysql_query("delete from feedbacks where feedback_id = $id");
}

function delete_feedback_answer($id){
	mysql_query("delete from feedback_answers where feedback_id = $id");
}
function get_feedback($id,$type_id){
	$query = mysql_query("select feedback_id
							from feedbacks a
							join transaction_agents b on b.transaction_agent_id = a.transaction_agent_id
							join agents c on c.agent_id = b.agent_id
							where b.transaction_id = '$id' and a.feedback_type_id = '$type_id'
							order by a.feedback_id 
							");
	$result = mysql_num_rows($query);
	return $result;
}


?>

