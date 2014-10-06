<?php

function select(){
	$query = mysql_query("select a.*, b.city_name, c.user_name
						from users a 
						join cities b on b.city_id = a.city_id
						join users c on a.leader_id  = c.user_id
						where a.user_type_id = 2
			");
	return $query;
}

function select_rdh(){
	$query = mysql_query("select user_id, user_name from users where user_type_id = '5'
			");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from users 
			where user_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into users values(".$data.")");
}

function update($data, $id){
	mysql_query("update users set ".$data." where user_id = '$id'");
}

function delete($id){
	mysql_query("delete from users  where user_id = '$id'");
}


?>