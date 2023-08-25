<?php
include_once 'Conexao.php';

class Personagem{

    use Model;

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
    private $ptsFortes;
    private $ptsFracos;
    private $maneirismos;
    private $social;
    private $mentalidade;
    private $passado;
    private $grupo;
    private $inimigos;
    private $saude;
    private $objetos;
    private $trivias;

    //getter e setter no Model

    //save
    public function save(){
        $pdo = conexao();
        try {
            $stmt = $pdo->prepare('INSERT INTO personagem (nome_personagem, idade_personagem, sexo_personagem, pronomes_personagem, raca_personagem, nacionalidade_personagem, profissao_personagem, importancia_personagem, universo_personagem, alinhamento_personagem, 
            tracos_personagem, pts_fortes, pts_fracos, maneirismos_personagem, social_personagem, mentalidade_personagem, 
            passado_personagem, grupo_personagem, inimigos_personagem, condicoes_saude, objetos_personagem, trivias_personagem) 
            VALUES (:nome, :idade, :sexo, :pronomes, :raca, :nacionalidade, :profissao, :importancia, :universo, 
            :alinhamento, :tracos, :ptsFortes, :ptsFracos, :maneirismos, :social, :mentalidade, :passado, 
            :grupo, :inimigos, :saude, :objetos, :trivias)');
            $stmt->execute([
                ':nome' => $this->nome,
                ':idade' => $this->idade,
                'sexo' => $this->sexo,
                'pronomes'=> $this->pronomes,
                'raca'=> $this->raca,
                'nacionalidade'=> $this->nacionalidade,
                'profissao'=> $this->profissao,
                'importancia'=> $this->importancia,
                'universo'=> $this->universo,
                ':alinhamento' => $this->alinhamento,
                ':tracos' => $this->tracos,
                ':ptsFortes' => $this->ptsFortes,
                ':ptsFracos' => $this->ptsFracos,
                ':maneirismos' => $this->maneirismos,
                ':social' => $this->social,
                ':mentalidade' => $this->mentalidade,
                ':passado' => $this->passado,
                ':grupo' => $this->grupo,
                ':inimigos' => $this->inimigos,
                ':saude' => $this->saude,
                ':objetos' => $this->objetos,
                ':trivias' => $this->trivias
            ]);
            $this->id = $pdo->lastInsertId();
            return true;
    } catch (Exception $e){
        return false;
    }
    }

    //update
    public function update(){
        $pdo = conexao();
        try{
            $stmt = $pdo->prepare('UPDATE personagem SET nome_personagem = :nome, idade_personagem = :idade, sexo_personagem = :sexo, 
            pronomes_personagem = :pronomes, raca_personagem = :raca, nacionalidade_personagem = :nacionalidade, profissao_personagem = :profissao, 
            importancia_personagem = :importancia, universo_personagem = :universo, alinhamento_personagem = :alinhamento, tracos_personagem = :tracos, 
            pts_fortes = :ptsFortes, pts_fracos = :ptsFracos, maneirismos_personagem = :maneirismos, social_personagem = :social, mentalidade_personagem = :mentalidade, 
            passado_personagem = :passado, grupo_personagem = :grupo, inimigos_personagem = :inimigos, condicoes_saude = :saude, objetos_personagem = :objetos, trivias_personagem = :trivias 
            WHERE id_personagem = :id');

            $stmt->execute([
                ':nome' => $this->nome,
                ':idade' => $this->idade,
                'sexo' => $this->sexo,
                'pronomes'=> $this->pronomes,
                'raca'=> $this->raca,
                'nacionalidade'=> $this->nacionalidade,
                'profissao'=> $this->profissao,
                'importancia'=> $this->importancia,
                'universo'=> $this->universo,
                ':alinhamento' => $this->alinhamento,
                ':tracos' => $this->tracos,
                ':ptsFortes' => $this->ptsFortes,
                ':ptsFracos' => $this->ptsFracos,
                ':maneirismos' => $this->maneirismos,
                ':social' => $this->social,
                ':mentalidade' => $this->mentalidade,
                ':passado' => $this->passado,
                ':grupo' => $this->grupo,
                ':inimigos' => $this->inimigos,
                ':saude' => $this->saude,
                ':objetos' => $this->objetos,
                ':trivias' => $this->trivias   
            ]);
            return true;
        } catch (Exception $e){
            return false;
        }

    }
    
    //delete
    public static function delete($id) {
        $pdo = conexao();
        $stmt = $pdo->prepare('DELETE FROM personagem WHERE id_personagem = :id');
        $stmt->execute([':id' => $id]);
    }
    

    //getAll
    public static function getAll(){
        $pdo = conexao();
        $lista = [];
        
        foreach ($pdo->query('SELECT * FROM personagem') as $linha) {
            $personagem = new Personagem();
            
            foreach ($linha as $campo => $valor) {
                $setter = 'set' . str_replace('_', '', ucwords($campo, '_'));
                if (method_exists($personagem, $setter)) {
                    $personagem->$setter($valor);
                }
            }
    
            $lista[] = $personagem;
        }
        
        return $lista;
    }
}
?>