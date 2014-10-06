<?php

function get_city(){
	$query = mysql_query("SELECT * FROM cities");
	return $query;
}
function get_branch(){
	$query = mysql_query("SELECT * FROM branches");
	return $query;
}
function get_ktp_number($ktp_number){
	$query = mysql_query("SELECT agent_id FROM agents WHERE agent_ktp_number = '$ktp_number'");
	$result = mysql_num_rows($query);
	return $result;

}

function cek_religion($name_religion){
	$query = mysql_query("SELECT religion_id
											FROM religions
										WHERE religion_name =  '".$name_religion."'");
	$data=mysql_fetch_array($query);
	$religion = $data['0'];
	return $religion;

}

function get_id_agent_tmp($ktp_number){
	$query = mysql_query("SELECT agent_id
											FROM agents
										WHERE agent_ktp_number =  '".$ktp_number."'");
	$data=mysql_fetch_array($query);
	$religion = $data['0'];
	return $religion;

}


function cek_city($name_city){
	$query = mysql_query("SELECT city_id
							FROM cities
						WHERE city_name =  '".$name_city."'");
	$data=mysql_fetch_array($query);
	$sum=mysql_num_rows($query);
	if($sum == '1'){
		$city_name = $data['0'];
	}else{
		$city_name = 0;
	}
	return $city_name;
}