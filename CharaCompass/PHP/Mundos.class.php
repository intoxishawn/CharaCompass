<?php
include_once 'Conexao.php';

class Mundos{
    private $id;
    private $nome;
    private $informacoes;
    private $trivias;

    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getInformacoes(){
        return $this->informacoes;
    }

    public function setInformacoes($informacoes){
        $this->informacoes = $informacoes;
    }
    
    public function getTrivias(){
        return $this->trivias;
    }

    public function setTrivias($trivias){
        $this->trivias = $trivias;
    }

    public function save(){

    }

    public function update(){

    }

    public static function deletar(){

    }

    public static function getAll(){

    }

    public function load(){
        
    }
}
?>