<?php

function select(){
	$query = mysql_query("select * from transaction_types");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from transaction_types where transaction_type_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into transaction_types values(".$data.")");
}

function update($data, $id){
	mysql_query("update transaction_types set ".$data." where transaction_type_id = '$id'");
}

function delete($id){
	mysql_query("delete from transaction_types  where transaction_type_id = '$id'");
}


?>