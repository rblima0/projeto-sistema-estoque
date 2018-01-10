<?php

class Categoria
{

    public $id;
    public $nome;

    public function __construct($id = false) {
        if($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar() {
        //throw new Exception("Erro ao listar as CATEGORIAS");
        $query = "SELECT id, nome FROM categorias ORDER BY nome";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar() {
        //throw new Exception("Erro ao carregar a CATEGORIA");
        $query = "SELECT id, nome FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();

        $linha = $stmt->fetch();
        $this->nome = $linha["nome"];
    }

    public function inserir($nome) {
        //throw new Exception("Erro ao Inserir CATEGORIA");
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function atualizar() {
        //throw new Exception("Erro ao atualizar CATEGORIA");
        $query = "UPDATE categorias set nome = :nome WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir(){
        //throw new Exception("Erro ao excluir CATEGORIA");
        $query = "DELETE FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

}