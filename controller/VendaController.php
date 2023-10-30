<?php session_start(); ?>
<?php

include_once "../config/Conexao.php";
include_once "../dao/VendaDAO.php";
include_once "../model/Venda.php";
  


$venda = new Venda();
$vendadao = new VendaDAO();



$dados = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição COMPRAAAAA update2
if(isset($_REQUEST['btnvenda'])){
        $di = $dados['dinheiro'];
        $di2 = str_replace(',', '.', str_replace('.', '', $di));
        $di3 = str_replace(',', '.', str_replace(',', '.', $di2));
        $di4 = str_replace(',', '.', str_replace('R$', '', $di3));
        $venda->setDinheiro($di4);
     
       $de = $dados['debito'];
        $de2 = str_replace(',', '.', str_replace('.', '', $de));
        $de3 = str_replace(',', '.', str_replace(',', '.', $de2));
        $de4 = str_replace(',', '.', str_replace('R$', '', $de3)); 
        $venda->setDebito($de4);
        
        $valor = $dados['ticket'];
        $number = str_replace(',', '.', str_replace('.', '', $valor));
        $numberr = str_replace(',', '.', str_replace(',', '.', $number));
        $numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
        $venda->setTicket($numberrr);
    
         $total = $di4 + $de4 + $numberrr;    
         $venda->setTudao($total);
         
         
         
         $pic = ($total * 30) / 100;
         $venda->setPicpay($pic);
         
       
         
         $repo = $total - $pic;
         $venda->setReposicao($repo);
         
         
           $totalrepor =  $total - $pic;
          $venda->setTotal($totalrepor);
//   $venda->setDesc($dados['desc']);
//   $venda->setTentrada($dados['tentrada']);
//   $venda->setTsaida($dados['tsaida']);
         $venda->setData($dados['data']);
         $venda->setTipo($dados['tipo']);  
         $venda->setCat($dados['cat']);
         
         
   

    $vendadao->venda($venda);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}
if(isset($_REQUEST['btnvenda'])){
        $di = $dados['dinheiro'];
        $di2 = str_replace(',', '.', str_replace('.', '', $di));
        $di3 = str_replace(',', '.', str_replace(',', '.', $di2));
        $di4 = str_replace(',', '.', str_replace('R$', '', $di3));
        $venda->setDinheiro($di4);
     
        $de = $dados['debito'];
        $de2 = str_replace(',', '.', str_replace('.', '', $de));
        $de3 = str_replace(',', '.', str_replace(',', '.', $de2));
        $de4 = str_replace(',', '.', str_replace('R$', '', $de3)); 
        $venda->setDebito($de4);
        
        $valor = $dados['ticket'];
        $number = str_replace(',', '.', str_replace('.', '', $valor));
        $numberr = str_replace(',', '.', str_replace(',', '.', $number));
        $numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
        $venda->setTicket($numberrr);
    
         $total = $di4 + $de4 + $numberrr;    
         $venda->setTudao($total);
         
         
         
         $pic = ($total * 30) / 100;
         $venda->setPicpay($pic);
         
       
         
         $repo = $total - $pic;
         $venda->setReposicao($repo);
         
         
           $totalrepor =  $total - $pic;
          $venda->setTotal($totalrepor);
//   $venda->setDesc($dados['desc']);
//   $venda->setTentrada($dados['tentrada']);
//   $venda->setTsaida($dados['tsaida']);
         $venda->setData($dados['data']);
         $venda->setTipo($dados['tipo']);  
         $venda->setCat($dados['cat']);
         
         
   

    $vendadao->venda2($venda);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}

