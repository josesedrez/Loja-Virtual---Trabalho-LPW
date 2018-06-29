<?php
session_start();
$base_path = 'C:/Bitnami/wappstack-7.1.15-0/apache2/htdocs/meatsProject/';
$base_url='http://localhost/meatsProject/';
$conexao=pg_connect('host=localhost port=5432 dbname=meatsProject user=postgres password=senha5');
if(!$conexao){
	echo 'A conexao foi pra cucuia';
}
?>