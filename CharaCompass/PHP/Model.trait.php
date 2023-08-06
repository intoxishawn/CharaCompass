<?php

trait Model{

        //getters
        public function __get($prop){
            $metodo = 'get'. ucfirst($prop);
            if(method_exists($this, $metodo)){
                return $this->{$metodo}();
            }
            return $this->{$prop};
        }
        //setters
        public function __set($prop, $valor){
                $this->{$prop} = $valor;
            }
}