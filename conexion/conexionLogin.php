<?php
class Conexion{

    private $host;
    private $db;
    private $user;
    private $clave;
    private $charset;
    
    public function __construct(){
        
        $this->host = 'localhost';
        $this->db = 'usuariosemprendedor';
        $this->user= 'root';
        $this->clave = '';
        $this->charset = 'utf8mb4';
        
        
    }

    function conectar(){
        try{ 
        $connection = "mysql:servidor=" . $this->host.";dbname=".$this->db.";charset=" . $this->charset;
        $options = [

            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,

        ];
        $pdo = new PDO($connection, $this->user, $this->clave, $options);
        print_r("Conectado LOgin");
        return $pdo;
    }catch(PDOException $e){
        print_r('Error connection:'.$e->getMessage());

    }

    }
}
