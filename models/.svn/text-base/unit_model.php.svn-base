<?php

function select(){
	$query = mysql_query("select * from units");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from units where unit_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into units values(".$data.")");
}

function update($data, $id){
	mysql_query("update units set ".$data." where unit_id = '$id'");
}

function delete($id){
	mysql_query("delete from units  where unit_id = '$id'");
}


?>