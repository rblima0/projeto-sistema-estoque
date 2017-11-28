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

    public function listar() {
        //throw new Exception("Erro ao listar as CATEGORIAS");
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar() {
        //throw new Exception("Erro ao carregar a CATEGORIA");
        $query = "SELECT id, nome FROM categorias WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            $this->nome = $linha["nome"];
        }
    }

    public function inserir($nome) {
        //throw new Exception("Erro ao Inserir CATEGORIA");
        $query = "INSERT INTO categorias (nome) VALUES ('" . $this->nome . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar() {
        //throw new Exception("Erro ao atualizar CATEGORIA");
        $query = "UPDATE categorias set nome = '" . $this->nome . "' WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir(){
        //throw new Exception("Erro ao excluir CATEGORIA");
        $query = "DELETE FROM categorias WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

}