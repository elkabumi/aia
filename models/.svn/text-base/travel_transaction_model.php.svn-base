<?php

function select($user_id, $user_type_id){
	$parameter = "";
	if($user_type_id == 2 || $user_type_id == 3){
		$parameter = " and a.user_id = '$user_id'";
	}else if($user_type_id == 5){
		$parameter = " and b.leader_id = '$user_id'";
	}
	$query = mysql_query("SELECT a.*, b.user_name 		
						 FROM  travel_transactions  a
						 JOIN users b ON b.user_id = a.user_id
						 $parameter
							");
	return $query;
}

function select_approved(){
	$query = mysql_query("SELECT a.*, b.user_name 		
						 FROM  travel_transactions  a
						 JOIN users b ON b.user_id = a.user_id
							where travel_status = '1'
							");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from  travel_transactions where travel_transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into  travel_transactions values(".$data.")");
}

function update($data, $id){
	mysql_query("update  travel_transactions set ".$data." where travel_transaction_id = '$id'");
}

function delete($id){
	mysql_query("delete from  travel_transactions  where travel_transaction_id = '$id'");
}

function save_onprogress($id){
	mysql_query("update  travel_transactions set travel_status = '2' where travel_transaction_id = '$id'");
}

function save_done($id){
	mysql_query("update  travel_transactions set travel_status = '0' where travel_transaction_id = '$id'");
}

function reject($id){
	mysql_query("update  travel_transactions set travel_status = '3' where travel_transaction_id = '$id'");
}

function read_user_id($id){
	$query = mysql_query("select user_type_id from users where user_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['user_type_id'];
}

?>