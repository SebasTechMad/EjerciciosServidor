<?php
include_once "cliente.php";
include_once "pedido.php";

/*
 * Acceso a datos con BD Usuarios y Patrón Singleton 
 * Un único objeto para la clase
 * VERSION 2: El contructor crea las sentencias precompiladas
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt_cliente = null;
    private $stmt_pedidos = null;
    private $stmt_trabajador = null;


    public static function getModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    

   // Constructor privado  Patron singleton
   
    private function __construct(){
        
        try {
            $dsn = "mysql:host=".'localhost'.";dbname="."tienda".";charset=utf8";
            $this->dbh = new PDO($dsn,"root","");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        // Construyo las consultas de golpe y no las emulo.
        $this->dbh->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );
        try {
        $this->stmt_cliente  = $this->dbh->prepare("select * from clientes WHERE nombre= :nombre AND clave = :clave");
        $this->stmt_pedidos = $this->dbh->prepare("SELECT * FROM pedidos WHERE cod_cliente = :cod_cliente");
        $this->stmt_trabajador = $this->dbh->prepare("SELECT * FROM trabajadores WHERE cod_cliente = :cod_cliente AND password = :pwd");
        } catch ( PDOException $e){
            echo " Error al crear la sentencias ".$e->getMessage();
            exit();
        }
    
    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo(){
        if (self::$modelo != null){
            $obj = self::$modelo;
            $obj->stmt_cliente = null;
            $obj->stmt_pedidos = null;
            $obj->dbh = null;
            self::$modelo = null; // Borro el objeto.
        }
    }


    // Devuelvo la lista de Usuarios
    public function getCliente ($nombre, $clave) {
        $user = null;
        $this->stmt_cliente->bindParam(":nombre",$nombre);
        $this->stmt_cliente->bindParam(":clave",$clave);

        $this->stmt_cliente->setFetchMode(PDO::FETCH_CLASS, 'cliente');
        
        if ( $this->stmt_cliente->execute() ){
            if($obj = $this->stmt_cliente->fetch()){
               $user= $obj;
            }   
        }
        return $user;
    }


    public function getPedidos(String $cod_cliente){
        $tpedidos = [];
        
        $this->stmt_pedidos->bindParam(":cod_cliente",$cod_cliente);

        $this->stmt_pedidos->setFetchMode(PDO::FETCH_CLASS, 'pedido');
        
        if ( $this->stmt_pedidos->execute() ){
            while($obj = $this->stmt_pedidos->fetch()){
               $tpedidos[] = $obj;
            }   
        }

        return $tpedidos;
    }

    public function buscarTrabajador(String $cod_empleado, String $pwd){
        $user = null;
        $this->stmt_trabajador->bindParam(":cod_empleado",$cod_empleado);
        $this->stmt_trabajador->bindParam(":password",$pwd);

        $this->stmt_trabajador->setFetchMode(PDO::FETCH_CLASS, 'Trabajador');
        
        if ( $this->stmt_trabajador->execute() ){
            if($obj = $this->stmt_trabajador->fetch()){
               $user= $obj;
            }   
        }
        return $user;
    }
    
       
    
     // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}
