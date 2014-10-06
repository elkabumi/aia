<?php

function select(){
	$query = mysql_query("select * from agencies");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from agencies where agency_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into agencies values(".$data.")");
}

function update($data, $id){
	mysql_query("update agencies set ".$data." where agency_id = '$id'");
}

function delete($id){
	mysql_query("delete from agencies  where agency_id = '$id'");
}


?>