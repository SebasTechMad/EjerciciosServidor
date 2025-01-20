<?php
include_once "config.php";
require_once "Cliente.php";

/**
 * Clase AccesoDAO
 * 
 * Clase que se encarga de acceder a la base de datos y obtener los datos de los clientes
 * 
 */

class AccesoDAO {

    private static $modelo = null;
    private $dbh = null;
    private $stmt_clientes = null;
    private $stmt_numclientes = null;
    private $stmt_cliente = null;
    private $stmt_update_cliente = null;
    private $stmt_add_cliente = null;
    private $stmt_delete_cliente = null;


    
    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDAO();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".SERVER_DB.";dbname=".DATABASE.";charset=utf8";
            $this->dbh = new PDO($dsn,DB_USER,DB_PASSWD);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo las consultas de golpe y no las emulo.
        $this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
        try {
        $this->stmt_clientes  = $this->dbh->prepare("select * from clientes limit :primero ,:cuantos");
        $this->stmt_numclientes  = $this->dbh->prepare("SELECT count(*) FROM clientes");
        $this->stmt_cliente = $this->dbh->prepare("SELECT * FROM clientes WHERE id = :id");
        $this->stmt_update_cliente = $this->dbh->prepare("UPDATE clientes SET first_name = :first_name, last_name = :last_name, 
        email = :email, gender = :gender, ip_address = :ip_address, telefono = :telefono WHERE id = :id");
        $this->stmt_add_cliente = $this->dbh->prepare("INSERT INTO clientes (first_name, last_name, email, gender, ip_address, telefono) VALUES (:first_name, :last_name, :email, :gender, :ip_address, :telefono)");
        $this->stmt_delete_cliente = $this->dbh->prepare("DELETE FROM clientes WHERE id = :id");
        } catch ( PDOException $e){
            echo " Error al crear la sentencias ".$e->getMessage();
            exit();
        }
    
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;   
            $obj->stmt_clientes = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo la lista de Clientes
    public function getClientes (int $primero, int $cuantos):array {
        $tuser = [];
        $this->stmt_clientes->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt_clientes->bindParam(":primero",$primero);
        $this->stmt_clientes->bindParam(":cuantos",$cuantos);
        if ( $this->stmt_clientes->execute() ){
            while ( $user = $this->stmt_clientes->fetch()){
               $tuser[]= $user;
            }
        }
        return $tuser;
    }

    public function getCliente($id){
        $this->stmt_cliente->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt_cliente->bindParam(":id",$id);

        if ( $this->stmt_cliente->execute() ){
            while ( $user = $this->stmt_cliente->fetch()){
               $tuser[]= $user;
            }
        }
        return $tuser;
    }

    public function updateCliente($first_name, $last_name, $email, $gender,$ip_address,$telefono,$id){
        $this->stmt_update_cliente->bindParam(":first_name",$first_name);
        $this->stmt_update_cliente->bindParam(":last_name",$last_name);
        $this->stmt_update_cliente->bindParam(":email",$email);
        $this->stmt_update_cliente->bindParam(":gender",$gender);
        $this->stmt_update_cliente->bindParam(":ip_address",$ip_address);
        $this->stmt_update_cliente->bindParam(":telefono",$telefono);
        $this->stmt_update_cliente->bindParam(":id",$id);
        $this->stmt_update_cliente->execute();
    }

    public function addCliente($first_name, $last_name, $email, $gender,$ip_address,$telefono){
        $this->stmt_add_cliente->bindParam(":first_name",$first_name);
        $this->stmt_add_cliente->bindParam(":last_name",$last_name);
        $this->stmt_add_cliente->bindParam(":email",$email);
        $this->stmt_add_cliente->bindParam(":gender",$gender);
        $this->stmt_add_cliente->bindParam(":ip_address",$ip_address);
        $this->stmt_add_cliente->bindParam(":telefono",$telefono);
        $this->stmt_add_cliente->execute();
    }

    public function deleteCliente($id){
        $this->stmt_delete_cliente->bindParam(":id",$id);
        $this->stmt_delete_cliente->execute();
    }

    public function totalClientes ():int{
        $this->stmt_numclientes->execute();
        $valor = $this->stmt_numclientes->fetch();
        return $valor[0];
    }
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

