<?php

trait Model{
    //getter e setter
    public function __get($quem){
        $metodo = 'get'. ucfirst($quem);
        if (method_exists($this, $metodo)){
            return $this->{$metodo}();
        }
    return $this->{$quem};
    }

    public function __set($quem, $valor){
        $this->{$quem} = $valor;
    }

    //chamada
    public function __call($metodo, $args){
        $metodo = str_replace('set', '', strtolower($metodo));
        $this->{$metodo} = $args[0]; 
    }
}
?>