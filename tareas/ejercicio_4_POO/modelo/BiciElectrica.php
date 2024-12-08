<?php

class Bicicleta{
    private $id; // Identificador de la bicicleta (entero)
    private $coordx; // Coordenada X (entero)
    private $coordy; // Coordenada Y (entero)
    private $bateria; // Carga de la batería en tanto por ciento (entero)
    private $operativa; // Estado de la bicleta ( true operativa- false no disponible)


    public function __construct($id, $coordx, $coordy, $bateria, $operativa)
    {
        $this->id = $id;
        $this->coordx = $coordx;
        $this->coordy = $coordy;
        $this->bateria = $bateria;
        $this->operativa = $operativa;
    }



    public function __get($propiedad)
    {
        return (isset($this->$propiedad)) ? $this->$propiedad: "la variable $propiedad no existe/no esta definida";
    }

    public function __set($propiedad, $valor)
    {
        (property_exists($this, $propiedad)) ? $this->propiedad = $valor:null;
    }

    public function __toString()
    {
        return 'id de la bicicleta=>'. $this->id.', bateria=>'.$this->bateria.'%';
    }

    public function distancia($x, $y)
    {
        return sqrt( ($x - $this->coordx)**2 + ($y - $this->coordy)**2 );
    }

}
?>