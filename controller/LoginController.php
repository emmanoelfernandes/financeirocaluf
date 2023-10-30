<?php session_start(); ?>
<?php

include_once "../config/Conexao.php";
include_once "../dao/LoginDAO.php";
include_once "../model/Login.php";
  


$login = new Login();
$logindao = new LoginDAO();



$dados = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição COMPRAAAAA update2
if(isset($_REQUEST['btnlogin'])){

    $login->setEmail($dados['email']);
   // $produto->setPreco($d['preco']);
   
    $login->setSenha($dados['senha']);

    $logindao->validar($login);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}



