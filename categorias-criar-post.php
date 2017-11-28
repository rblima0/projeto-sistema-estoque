<?php
    require_once 'global.php';

    try{
        $categoria = new Categoria();
        $nome = $_POST['nome']; // Buscando o nome do input (a chave desse campo é o name do input)
        $categoria->nome = $nome; // Adicionamos no atributo nome da categoria
        $categoria->inserir($nome); // Chamamos o metodo
    
        header('Location: categorias.php');
    } catch(Exception $e) {
        Erro::trataErro($e);
    }

    