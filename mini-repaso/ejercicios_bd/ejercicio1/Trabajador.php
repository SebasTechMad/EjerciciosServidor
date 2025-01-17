<?php 
    class Trabajador{
        private $id;
        private $nombre;
        private $id_rol;
        private $edad;

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
