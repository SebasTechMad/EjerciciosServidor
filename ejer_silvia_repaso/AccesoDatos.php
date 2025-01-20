<?php
include_once "./config.php";
include_once "./Cliente.php";
include_once "./Pedido.php";

/**
 * Clase AccesoDAO
 * 
 * Clase que se encarga de acceder a la base de datos y obtener los datos de los clientes
 * 
 */

class AccesoDatos {

    private static $modelo = null;
    private $dbh = null;
    private $stmt_cliente = null;
    private $stmt_pedidos = null;
    private $stmt_numpedidos = null;

    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
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
        try {

            $this->stmt_cliente = $this->dbh->prepare("SELECT * FROM clientes WHERE nombre= :nombre AND clave= :clave");
            $this->stmt_pedidos = $this->dbh->prepare("SELECT * FROM pedidos WHERE cod_cliente= :cod_cliente LIMIT :primero, :cuantos");
            $this->stmt_numpedidos = $this->dbh->prepare("SELECT  COUNT(*) FROM pedidos WHERE cod_cliente = :cod_cliente");

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
            $obj->stmt_pedidos = null;
            $obj->stmt_NUMpedidos = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }

    public function getCliente(String $nombre, String $clave)
    {
        $tuser = [];

        $this->stmt_cliente->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        $this->stmt_cliente->bindParam(":nombre",$nombre);
        $this->stmt_cliente->bindParam(":clave",$clave);

        if ( $this->stmt_cliente->execute() ){
            while ( $user = $this->stmt_cliente->fetch()){
               $tuser[] = $user;
            }
        }
        
        return $tuser;
    }

    public function getPedidos(String $cod_cliente, $index, $cuantos)
    {
        $tpedidos = [];

        $this->stmt_pedidos->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        $this->stmt_pedidos->bindParam(":cod_cliente",$cod_cliente);
        $this->stmt_pedidos->bindParam(":primero",$index);
        $this->stmt_pedidos->bindParam(":cuantos",$cuantos);


        if ( $this->stmt_pedidos->execute() ){
            while ( $pedidos = $this->stmt_pedidos->fetch()){
               $tpedidos[] = $pedidos;
            }
        }
        
        return $tpedidos;
    }

    public function totalPedidos ($cod_cliente):int{
        $this->stmt_numpedidos->bindParam(":cod_cliente",$cod_cliente);
        $this->stmt_numpedidos->execute();
        $valor = $this->stmt_numpedidos->fetch();
        return $valor[0];
    }


    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}

