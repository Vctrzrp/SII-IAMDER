<?php
$user = 'postgres';
$clave='cucchacao';
$servidor ='localhost';
$db= 'iamder';
$port = 5432;
$pgconn='';

$uploaddir="/tmp/";
$con=pg_connect("host=".$this->servidor." port=".$this->port." password=".$this->clave." user=".$this->user." dbname=".$this->db);
?>
