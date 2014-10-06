<?php

function select(){
	$query = mysql_query("SELECT a.*, b.feedback_type_name, c.feedback_format_name
							FROM feedback_items a
 							JOIN feedback_types b ON a.feedback_type_id = b.feedback_type_id
							JOIN feedback_formats c ON	a.feedback_format_id = c.feedback_format_id
							WHERE a.feedback_type_id = '1'
							");
	return $query;
}

function select2(){
	$query = mysql_query("SELECT a.*, b.feedback_type_name, c.feedback_format_name
							FROM feedback_items a
 							JOIN feedback_types b ON a.feedback_type_id = b.feedback_type_id
							JOIN feedback_formats c ON	a.feedback_format_id = c.feedback_format_id
							WHERE a.feedback_type_id = '2'
							");
	return $query;
}

function select_p_gts1(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '1' and feedback_format_id = '1'
							");
	return $query;
}
function select_p_gts2(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '1' and feedback_format_id = '2'
							");
	return $query;
}
function select_p_fac3(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '2' and feedback_format_id = '3'");
	return $query;
}
function select_p_fac4(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '2' and feedback_format_id = '4'");
	return $query;
}
function select_p_fac5(){
	$query = mysql_query("select * from feedback_items where feedback_type_id = '2' and feedback_format_id = '5'");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from feedback_items where feedback_item_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into feedback_items values(".$data.")");
}

function update($data, $id){
	mysql_query("update feedback_items set ".$data." where feedback_item_id = '$id'");
}

function delete($id){
	mysql_query("delete from feedback_items  where feedback_item_id = '$id'");
}


?>