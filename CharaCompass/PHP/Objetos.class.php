<?php
include_once 'Conexao.php';

class Objetos{

    use Model;

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

    //save
    public function save(){
        $pdo= conexao();
        try{
            $stmt = $pdo->prepare('INSERT INTO Personagens');
        }
    }
}
?>