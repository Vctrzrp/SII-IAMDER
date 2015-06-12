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
        $this->user = 'root';
        $this->clave='';
        $this->servidor ='localhost';
        $this->db = 'regaze';
        $this->port = "3306";
        $this->mysqlconn='';
    }

//Función conectar
    public function conectar()
    {
        $this->mysqlconn = mysqli_connect($this->servidor, $this->user,$this->clave, $this->db) or die("ERROR DE CONEXION".mysqli_error($mysqlconn));
        $mysqlconn = $this->mysqlconn;
        return $this->mysqlconn;
    }//Cierro función conectar
}//Cierro clase conexión
?>