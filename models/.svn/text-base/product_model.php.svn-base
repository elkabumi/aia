<?php

function select(){
	$query = mysql_query("select * from products");
	return $query;
}

function select_his($id){
	$query = mysql_query("select * from product_histories where product_id = '$id'");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from products where product_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into products values(".$data.")");
}

function update($data, $id){
	mysql_query("update products set ".$data." where product_id = '$id'");
}

function delete($id){
	mysql_query("delete from products  where product_id = '$id'");
}

function action_plus($data, $id, $data2){
	mysql_query("insert into product_histories values(".$data.")");
	mysql_query("update products set ".$data2." where product_id = '$id'");
		
}

function action_minus($data, $id){
	mysql_query("insert into product_histories values(".$data.")");
	mysql_query("update products set ".$data2." where product_id = '$id'");
		
}

function readonly($id){
	$query = mysql_query("select * from products join product_histories on products.product_id = product_histories.product_id where products.product_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


?>