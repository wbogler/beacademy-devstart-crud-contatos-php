<?php

function login(){
    include "telas/login.php";
}

function home(){
    include "telas/home.php";
}

function cadastro(){
    if ($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone= $_POST['telefone'];

        $arquivo = fopen('telas/dados/dados.csv', 'a+');
        fwrite($arquivo, "{$nome};{$email};{$telefone}".PHP_EOL);
        fclose($arquivo);

        $mensagem = "Cadastro realizaso!";

        include "telas/mensagem.php";
    }
    include "telas/cadastro.php";
}

function listar(){
    $contatos = file('telas/dados/dados.csv');

    include "telas/listar.php";
}

function erro404(){
    include "telas/error404.php";
}

function excluir(){

    $id = $_GET['id'];

    $contatos2 = file('telas/dados/dados.csv');

    unset($contatos2[$id]);

    unlink('telas/dados/dados.csv');

    $arquivo = fopen('telas/dados/dados.csv','a+');

    foreach($contatos2 as $cadaContato){
        fwrite($arquivo,$cadaContato);
    }
    $mensagem = "Contato excluído";
    include "telas/mensagem.php";
}

function editar(){
    $id = $_GET['id'];
    $contatos1 = file('telas/dados/dados.csv');
    if($_POST){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        $contatos1[$id] = "{$nome};{$email};{$telefone}".PHP_EOL;

        unlink ('telas/dados/dados.csv');

        $arquivo = fopen('telas/dados/dados.csv', 'a+');
        foreach($contatos1 as $cadaContato){
            fwrite($arquivo, $cadaContato);
        }

        fclose($arquivo);
        $mensagem = "Contato atualizado";
        include "telas/mensagem.php";

    }


    $dados = explode(";", $contatos1[$id]);




    include "telas/editar.php";
}
