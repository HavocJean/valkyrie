<?php
include_once("ClassConexao.php");

class Armas extends Conexao {

    public function cadastrarArma($nome_arma = '', $id_tipo_atq = '', $hp = '', $atq = '', $atqm = '', $def = '', $defm = '', $vel = '', $prec = '', $id_raca = '', $nota = '', $desc_habilidade = '', $onde_conseguir = '', $img_arma = '') {
        
        $arma = "INSERT INTO armas (nome_arma, id_tipo_atq, hp, atq, atqm, def, defm, vel, prec, id_raca, nota, desc_habilidade, onde_conseguir, img_arma)
        VALUES (:nome_arma, :id_tipo_atq, :hp, :atq, :atqm, :def, :defm, :vel, :prec, :id_raca, :nota, :desc_habilidade, :onde_conseguir, :img_arma)";
        $arma = $this->pdo->prepare($arma);
        $arma->bindValue(":nome_arma", $nome_arma);
        $arma->bindValue(":id_tipo_atq", $id_tipo_atq);
        $arma->bindValue(":hp", $hp);
        $arma->bindValue(":atq", $atq);
        $arma->bindValue(":atqm", $atqm);
        $arma->bindValue(":def", $def);
        $arma->bindValue(":defm", $defm);
        $arma->bindValue(":vel", $vel);
        $arma->bindValue(":prec", $prec);
        $arma->bindValue(":id_raca", $id_raca);
        $arma->bindValue(":nota", $nota);
        $arma->bindValue(":desc_habilidade", $desc_habilidade);
        $arma->bindValue(":onde_conseguir", $onde_conseguir);
        $arma->bindValue(":img_arma", $img_arma);
        $arma->execute();
    }

    public function buscarArmas($filtroarmamento = '', $filtroatq = '') {
        $sql = "SELECT * FROM armas 
        INNER JOIN tipoatq on armas.id_tipo_atq=tipoatq.id_tipo_atq
        INNER JOIN raca on armas.id_raca=raca.id_raca";

        if(!empty($_POST['filtroarmamento'])) {
            $nome = $_POST['filtroarmamento'];
            $sql .= " WHERE armas.nome_arma LIKE '%".$nome."%'";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->bindValue("nome_arma", ":nome_arma");
            $buscararma->execute();
            return $buscararma->fetchAll();

        } if(!empty($_POST['filtroatq'])){
                $sql .= " WHERE armas.id_tipo_atq = ".$_POST['filtroatq']."";
                $buscararma = $this->pdo->prepare($sql);
                $buscararma->execute();
                return $buscararma->fetchAll();    
        } if(!empty($_POST['hp'])){
            $sql .= " WHERE armas.hp > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();

        } if(!empty($_POST['atq'])){
            $sql .= " WHERE armas.atq > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();
            
        } if(!empty($_POST['atqm'])){
            $sql .= " WHERE armas.atqm > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();
            
        } if(!empty($_POST['def'])){
            $sql .= " WHERE armas.def > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();
            
        } if(!empty($_POST['defm'])){
            $sql .= " WHERE armas.defm > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();
            
        } if(!empty($_POST['vel'])){
            $sql .= " WHERE armas.vel > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();
            
        } if(!empty($_POST['prec'])){
            $sql .= " WHERE armas.prec > 0";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();
            
        } if(!empty($_POST['racas'])) {
            $racas = $_POST['racas'];
            $sql .= " WHERE armas.id_raca = '.$racas.'";
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
            return $buscararma->fetchAll();

        } else {
            $buscararma = $this->pdo->prepare($sql);
            $buscararma->execute();
                if($buscararma->rowCount()> 0) {
                    return $buscararma->fetchAll();
                } else {
                    return array();
                }
        }
    }

    public function buscarRaca() {
        $sql = "SELECT * FROM raca";
        $buscaraca = $this->pdo->prepare($sql);
        $buscaraca->execute();
        return $buscaraca->fetchAll();
    }


    
    

}