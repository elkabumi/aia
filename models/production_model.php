<?php
function select(){
	$query = mysql_query("SELECT a.*, 
								 b.city_name as home_city 
						 FROM  agents a
						 join  cities b on a.city_id = b.city_id 	
							");
	return $query;
}
function select_agent($id){
	$query = mysql_query("SELECT a.agent_code, a.agent_name, a.agent_ktp_number,
								 b.city_name as home_city 
						 FROM  agents a
						 join  cities b on a.city_id = b.city_id 	
						 where a.agent_id = '$id'
							");
	return $query;
}

function select_event($id){
	$query = mysql_query("select b.*, c.unit_name
						from transaction_agents a
						join transactions b on b.transaction_id = a.transaction_id 
						join units c on c.unit_id = b.unit_id
						where a.agent_id = '$id'");
	return $query;
}

function select_production($id){
	$query = mysql_query("select a.*,concat (a.production_detail_month,'/',a.production_detail_year) as period
							 from 
							production_details a 
							join productions b on b.production_id = a.production_id
							where b.agent_id = '$id'");
	return $query;
}


function check_data_production($id){
	$query = mysql_query("select count(*) as jumlah_data from productions where agent_id = '$id'
							");
	$result = mysql_fetch_object($query);
	return $result->jumlah_data;
}

function check_edit($month, $year, $id, $detail_id){
	$query = mysql_query("select count(*) as jumlah_data from production_details a
							join productions b on b.production_id = a.production_id 
							where b.agent_id = '$id' and a.production_detail_month = '$month' and a.production_detail_year = '$year' and production_detail_id <> $detail_id
							");
	$result = mysql_fetch_object($query);
	return $result->jumlah_data;
}

function check_data_detail($month, $year, $id){
	$query = mysql_query("select count(*) as jumlah_data from production_details a
							join productions b on b.production_id = a.production_id 
							where b.agent_id = '$id' and a.production_detail_month = '$month' and a.production_detail_year = '$year'
							");
	$result = mysql_fetch_object($query);
	return $result->jumlah_data;
}


function save_production($month, $year, $value, $description, $id){
	mysql_query("insert into productions values('', '$id')");
	
	$q = mysql_query("select production_id from productions where agent_id = '$id'");
	$r = mysql_fetch_object($q);
	
	$pro_id = $r->production_id;
	
	mysql_query("insert into production_details values('', '$pro_id', '$month', '$year', '$value', '$description')");
	
}

function save_detail($month, $year, $value, $description, $id){	
	$q = mysql_query("select production_id from productions where agent_id = '$id'");
	$r = mysql_fetch_object($q);
	
	$pro_id = $r->production_id;
	
	mysql_query("insert into production_details values('', '$pro_id', '$month', '$year', '$value', '$description')");
}

function edit_production($month, $year, $value, $description, $detail_id){	
	mysql_query("update production_details set production_detail_month =  '$month', production_detail_year = '$year', production_detail_value = '$value', production_detail_description = '$description' where production_detail_id = '$detail_id'");
}

function read_id($id){
	$query = mysql_query("select * from production_details where production_detail_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}
?>

