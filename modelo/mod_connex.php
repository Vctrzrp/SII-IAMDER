<?php
class Connex{//Abro clase conexión
    private $user;
    private $clave;
    private $servidor;
    private $db;
    private $port;
    private $pgconn;

    function Connex()
    {
        $this->user = 'postgres';
        $this->clave='cucchacao';
        $this->servidor ='localhost';
        $this->db = 'iamder';
        $this->port = 5432;
        $this->pgconn='';
    }

//Función conectar
    public function conectar()
    {
        $this->pgconn = pg_connect("host=".$this->servidor." port=".$this->port." password=".$this->clave." user=".$this->user." dbname=".$this->db) or die("ERROR DE CONEXION");
        $pgconn = $this->pgconn;
        $_SESSION['pgconn']=$pgconn;
        return $this->pgconn;
    }//Cierro función conectar
}//Cierro clase conexión
?>