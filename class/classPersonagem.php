<?php
include_once("ClassConexao.php");

class Personagem extends Conexao {

    public function cadastrarPersonagem($nome_personagem = '', $id_tipo_atq = '', $id_raca = '', $id_despertavel = '', $id_elemento = '', $biografia = '', $id_ranque = '', $hab_acao = '', $limit_burst = '', $hab_passiva = '', $img_personagem = ''){

        $personagem = "INSERT INTO personagens (nome_personagem, id_tipo_atq, id_raca, id_despertavel, id_elemento, biografia, id_ranque, hab_acao, limit_burst, hab_passiva, img_personagem)
        VALUES (:nome_personagem, :id_tipo_atq, :id_raca, :id_despertavel, :id_elemento, :biografia, :id_ranque, :hab_acao, :limit_burst, :hab_passiva, :img_personagem)";
        $personagem = $this->pdo->prepare($personagem);
        $personagem->bindValue(":nome_personagem", $nome_personagem);
        $personagem->bindValue(":id_tipo_atq", $id_tipo_atq);
        $personagem->bindValue(":id_raca", $id_raca);
        $personagem->bindValue(":id_despertavel", $id_despertavel);
        $personagem->bindValue(":id_elemento", $id_elemento);
        $personagem->bindValue(":biografia", $biografia);
        $personagem->bindValue(":id_ranque", $id_ranque);
        $personagem->bindValue(":hab_acao", $hab_acao);
        $personagem->bindValue(":limit_burst", $limit_burst);
        $personagem->bindValue(":hab_passiva", $hab_passiva);
        $personagem->bindValue(":img_personagem", $img_personagem);
        $personagem->execute();
    }

    public function filtroPersonagens($filtropersonagem = '', $filtroatq = '') {
        $sql = "SELECT * FROM personagens 
                INNER JOIN tipoatq on personagens.id_tipo_atq=tipoatq.id_tipo_atq
                INNER JOIN raca on personagens.id_raca=raca.id_raca
                INNER JOIN ranque on personagens.id_ranque=ranque.id_ranque";

        if(!empty($_POST['filtropersonagem'])) {
            $nome = $_POST['filtropersonagem'];
            $sql .= " WHERE personagens.nome_personagem LIKE '%".$nome."%' ORDER BY ranque.id_ranque";

            $buscapersonagem = $this->pdo->prepare($sql);
            $buscapersonagem->bindValue("nome_personagem", ":nome_personagem");
            $buscapersonagem->execute();

                if($buscapersonagem->rowCount()> 0) {
                    return $buscapersonagem->fetchAll();
                } else {
                    return array();
                }
                
        } if(!empty($_POST['filtroatq'])) {
            $filtro = $_POST['filtroatq'];
            $sql .= " WHERE personagens.id_tipo_atq = '.$filtro.' ORDER BY ranque.id_ranque";

            $buscapersonagem = $this->pdo->prepare($sql);
            $buscapersonagem->bindValue("id_tipo_atq", ":id_tipo_atq");
            $buscapersonagem->execute();

                if($buscapersonagem->rowCount()> 0) {
                        return $buscapersonagem->fetchAll();
                    } else {
                        return array();
                    }
        } else {
            $sql .= " ORDER BY ranque.id_ranque";
            $buscapersonagem = $this->pdo->prepare($sql);
            $buscapersonagem->execute();
                if($buscapersonagem->rowCount()> 0) {
                    return $buscapersonagem->fetchAll();
                } else {
                    return array();
                }
        }
    }

    

    /* public function buscaPorNome($filtropersonagem = '') {

        if(!empty($_POST['filtropersonagem'])) {
            $nome = $_POST['filtropersonagem'];
            $buscapersonagem = "SELECT * FROM personagens 
                                INNER JOIN tipoatq on personagens.id_tipo_atq=tipoatq.id_tipo_atq
                                INNER JOIN raca on personagens.id_raca=raca.id_raca
                                INNER JOIN ranque on personagens.id_ranque=ranque.id_ranque 
                                WHERE personagens.nome_personagem LIKE '%".$nome."%'";
            $buscapersonagem = $this->pdo->prepare($buscapersonagem);
            $buscapersonagem->bindValue("nome_personagem", ":nome_personagem");
            $buscapersonagem->execute();

                if($buscapersonagem->rowCount()> 0) {
                    return $buscapersonagem->fetchAll();
                } else {
                    return array();
                }

        } else {
            $buscapersonagem = "SELECT * FROM personagens 
                                INNER JOIN tipoatq on personagens.id_tipo_atq=tipoatq.id_tipo_atq
                                INNER JOIN raca on personagens.id_raca=raca.id_raca
                                INNER JOIN ranque on personagens.id_ranque=ranque.id_ranque";
            $buscapersonagem = $this->pdo->prepare($buscapersonagem);
            $buscapersonagem->execute();
                if($buscapersonagem->rowCount()> 0) {
                    return $buscapersonagem->fetchAll();
                } else {
                    return array();
                }
        }
    } */
}