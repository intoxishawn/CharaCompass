<?php
include_once 'Conexao.php';

class Objetos{
    private $id;
    private $nome;
    private $alternativo;
    private $tipo;
    private $material;
    private $propriedades;
    private $status;
    private $informacoes;
    private $simbolismo;
    private $origem;
    private $aplicabilidade;
    private $passado;

    //set e get
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

    public function getAlternativo(){
        return $this->alternativo;
    }

    public function setAlternativo($alternativo){
        $this->alternativo = $alternativo;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getMaterial(){
        return $this->material;
    }

    public function setMaterial($material){
        $this->material = $material;
    }
    
    public function getPropriedades(){
        return $this->propriedades;
    }

    public function setPropriedades($propriedades){
        $this->propriedades = $propriedades;
    }
    
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getInformacoes(){
        return $this->informacoes;
    }

    public function setInformacoes($informacoes){
        $this->informacoes = $informacoes;
    }
    
    public function getSimbolismo(){
        return $this->simbolismo;
    }

    public function setSimbolismo($simbolismo){
        $this->simbolismo = $simbolismo;
    }
    
    public function getOrigem(){
        return $this->origem;
    }

    public function setOrigem($origem){
        $this->origem = $origem;
    }
    
    public function getAplicabilidade(){
        return $this->aplicabilidade;
    }

    public function setAplicabilidade($aplicabilidade){
        $this->aplicabilidade = $aplicabilidade;
    }
    
    public function getPassado(){
        return $this->passado;
    }

    public function setPassado($passado){
        $this->passado = $passado;
    }

    //save
    public function save(){
        $pdo= conexao();
        try{
            $stmt = $pdo->prepare('INSERT INTO Personagens');
        }
    }

    //update
    public function update(){

    }

    //deletar
    public static function deletar ($id){

    }

    //getAll
    public static function getAll(){

    }

    //load
    public function load(){

    }
}
?>