<?php

     class Banco_extrato extends Conexao {
        public $id;
        public $data;
        public $historico;
        public $documento;
        public $valor;

        public function __construct($data = null, $historico = null, $documento = null, $valor = null){
            $this->data = $data;
            $this->historico = $historico;
            $this->documento = $documento;
            $this->valor = $valor;

        }
        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getHistorico(){
            return $this->historico;
        }

        public function setHistorico($historico){
            $this->historico = $historico;
        }
        
        public function getDocumento(){
            return $this->documento;
        }

        public function setDocumento($documento){
            $this->documento = $documento;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setValor($valor){
           $this->valor = $valor; 
        }
    
        public function load() {
            $sql = "
                SELECT *
                FROM tb_extrato
            ";

            $prepare = $this->conectaMySQL()->prepare($sql);
            $prepare->execute();

            return $prepare->fetchAll();
            
            //if(!empty($resultado)) {
            //    $this->nome = $resultado['nome'];
            //    $this->anexo = $resultado['anexo'];
            //    $this->status = $resultado['status'];
            //    $this->data_registro = $resultado['data_registro'];
            //    $this->usuario_id_registro = $resultado['usuario_id_registro'];
            //}
        }

        public function existe() {
            $sql = "
                SELECT *
                FROM tb_extrato where documento = ?
            ";

            $prepare = $this->conectaMySQL()->prepare($sql);
            $prepare->bindValue(1, $this->documento);
            $prepare->execute();

            return $prepare->rowCount() > 0;
        }
         
        public function insert(){
            $sql = "
                INSERT INTO tb_extrato(id, data, historico, documento, valor) 
                VALUES(?, ?, ?, ?, ?)
            ";

            try {
                $pdo = $this->conectaMySQL();

                $prepare = $pdo->prepare($sql);
                $prepare->bindValue(1, $this->id);
                $prepare->bindValue(2, $this->data);
                $prepare->bindValue(3, $this->historico);
                $prepare->bindValue(4, $this->documento);
                $prepare->bindValue(5, $this->valor);
                $pdo->beginTransaction();
   
                $result = $prepare->execute();
                $pdo->commit();

                return $result;

            } catch(Exception $e){
                $pdo->rollBack();
                echo "Linha ".__LINE__." ".__FILE__.": ".$e->__toString();
                die();
            }
        }
     }
    
    
    

?>