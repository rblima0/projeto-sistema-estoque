<?php require_once "global.php"; ?>

<?php
    try{
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $categoria_id = $_POST['categoria_id'];
    
        $produto = new produto($id);
        
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->quantidade = $quantidade;
        $produto->categoria_id = $categoria_id;
        $produto->atualizar();
    
        /* echo $id;
        echo '<br>';
        echo $nome; */
    
        header('Location: produtos.php');
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
    