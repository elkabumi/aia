<?php

function  select($user_id, $user_type_id){
	$parameter = "";
	if($user_type_id == 2 || $user_type_id == 3){
		$parameter = " and a.user_id = '$user_id'";
	}else if($user_type_id == 5){
		$parameter = " and b.leader_id = '$user_id'";
	}
	$query = mysql_query("select a.*, b.user_name from logistics a 
							join users b on b.user_id = a.user_id
							$parameter
							");
	return $query;
}

function select_approved(){
	$query = mysql_query("select a.*, b.user_name from logistics a 
							join users b on b.user_id = a.user_id
							where logistic_status = '1'
							");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from logistics where logistic_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_id_item($id){
	$query = mysql_query("select * from logistic_items_tmp where logistic_item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_id_item_edit($id){
	$query = mysql_query("select * from logistic_items where logistic_item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function select_item_tmp($user_id){
	$query = mysql_query("select * from logistic_items_tmp where user_id = '".$user_id."'");
	return $query;
}

function select_item_edit($id){
	$query = mysql_query("select * from logistic_items where logistic_id = '".$id."'");
	return $query;
}


function check_item_tmp($user_id){
	$query = mysql_query("select count(*) as jumlah from logistic_items_tmp where user_id = '$user_id'");
	$row = mysql_fetch_array($query);
	return $row['jumlah'];
}


function save($data){
	mysql_query("insert into logistics values(".$data.")");
}

function save_item($user_id, $new_id){
	$query = mysql_query("select * from logistic_items_tmp where user_id = '$user_id'");
	while($row = mysql_fetch_array($query)){
		mysql_query("insert into logistic_items values('','$new_id', '".$row['logistic_item_name']."', '".$row['logistic_item_value']."')");
	}
	mysql_query("delete from logistic_items_tmp where user_id = '$user_id'");
}


function create_item_tmp($data){
	mysql_query("insert into logistic_items_tmp values(".$data.")");
}

function create_item_edit($data){
	mysql_query("insert into logistic_items values(".$data.")");
}


function edit_item_tmp($data, $id){
	mysql_query("update logistic_items_tmp set $data where logistic_item_id = '$id'");
}

function edit_item_edit($data, $id){
	mysql_query("update logistic_items set $data where logistic_item_id = '$id'");
}


function delete_item_tmp($id){
	mysql_query("delete from logistic_items_tmp  where logistic_item_id = '$id'");
}

function delete_item_edit($id){
	mysql_query("delete from logistic_items  where logistic_item_id = '$id'");
}

function update($data, $id){
	mysql_query("update logistics set ".$data." where logistic_id = '$id'");
}

function delete($id){
	mysql_query("delete from logistics  where logistic_id = '$id'");
	mysql_query("delete from logistic_items  where logistic_id = '$id'");
}

function save_onprogress($id){
	mysql_query("update  logistics set logistic_status = '2' where logistic_id = '$id'");
}

function save_done($id){
	mysql_query("update  logistics set logistic_status = '0' where logistic_id = '$id'");
}
function reject($id){
	mysql_query("update  logistics set logistic_status = '3' where logistic_id = '$id'");
}
?>