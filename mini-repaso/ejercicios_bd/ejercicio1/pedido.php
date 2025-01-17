<?php 
    class Pedido{
        private $numped;
        private $cod_cliente;
        private $producto;
        private $precio;

        public function __get($atributo)
        {
            if(property_exists($this, $atributo)){
                return $this->$atributo;
            }
        }

        public function __set($atributo, $valor)
        {
            if(property_exists($this, $atributo)){
                 $this->$atributo = $valor;
            }
        }
    }
?>