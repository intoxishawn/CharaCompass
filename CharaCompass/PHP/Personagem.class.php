<?php
include_once 'Conexao.php';

class Personagem{
    private $id; 
    private $nome;
    private $idade;
    private $sexo;
    private $pronomes;
    private $raca;
    private $nacionalidade;
    private $profissao;
    private $importancia;
    private $universo;
    private $alinhamento;
    private $tracos;
    private $pts_fortes;
    private $pts_fracos;
    private $maneirismos;
    private $social;
    private $mentalidade;
    private $passado;
    private $grupo;
    private $inimigos;
    private $condicao_saude;
    private $objetos;
    private $trivias;

    //getters e setters
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

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function getPronomes(){
        return $this->pronomes;
    }

    public function setPronomes($prononomes){
        $this->pronomes = $pronomes;
    }

    public function getRaca(){
        return $this->raca;
    }

    public function setRaca($raca){
        $this->raca = $raca;
    }

    public function getNacionalidade(){
        return $this->nacionalidade;
    }

    public function setNacionalidade($nacionalidade){
        $this->nacionalidade = $nacionalidade;
    }

    public function getProfissao(){
        return $this->profissao;
    }

    public function setProfissao($profissao){
        $this->profissao = $profissao;
    }

    public function getImportancia(){
        return $this->importancia;
    }

    public function setImportancia($importancia){
        $this->importancia = $importancia;
    }
}
?>