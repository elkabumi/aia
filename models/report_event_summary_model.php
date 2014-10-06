<?php

function select_item($date1, $date2){
	$query = mysql_query("select a.*, b.transaction_type_name, c.user_name
						from transactions a
						join transaction_types b on b.transaction_type_id = a.transaction_type_id
						join users c on c.user_id = a.trainer_id
						where transaction_approved_status = '1' and transaction_type_date = '1' and
						transaction_date >= '$date1' and transaction_date <= '$date2'");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT a.*, b.unit_name, c.transaction_type_name
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN transaction_types c on c.transaction_type_id = a.transaction_type_id
 							WHERE  a.transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}
function read_trainer_view($id){
	$query = mysql_query("select a.*, b.*, c.city_name
							from transaction_trainers a
							join users b on a.user_id = b.user_id 
							join cities c on c.city_id = b.city_id
							where transaction_id = $id");
	return $query;
}

function read_agent_view($id){
	$query = mysql_query("select a.*, b.*
							from transaction_agents a
							join agents b on a.agent_id = b.agent_id where a.transaction_id = '$id'");
	return $query;
}


?>