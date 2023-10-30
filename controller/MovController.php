<?php session_start(); ?>

<?php

include_once "../config/Conexao.php";
include_once "../dao/MovDAO.php";
include_once "../model/Mov.php";
  


$mov = new Mov();
$movdao = new MovDAO();



$dados = filter_input_array(INPUT_POST);



   

//se a operação for gravar entra nessa condição COMPRAAAAA update2
if(isset($_REQUEST['btnmov'])){

   $di = $dados['dinheiro'];
        $di2 = str_replace(',', '.', str_replace('.', '', $di));
        $di3 = str_replace(',', '.', str_replace(',', '.', $di2));
        $di4 = str_replace(',', '.', str_replace('R$', '', $di3));
        $mov->setDinheiro(@$di4);
     
        $de = $dados['debito'];
        $de2 = str_replace(',', '.', str_replace('.', '', $de));
        $de3 = str_replace(',', '.', str_replace(',', '.', $de2));
        $de4 = str_replace(',', '.', str_replace('R$', '', $de3)); 
        $mov->setDebito(@$de4);
        
         $valor = $dados['ticket'];
        $number = str_replace(',', '.', str_replace('.', '', $valor));
        $numberr = str_replace(',', '.', str_replace(',', '.', $number));
        $numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
        $mov->setTicket($numberrr);
    
         @$total = $di4 + $de4 + $numberrr;    
         $mov->setTudao($total);
         
         
         
         @$pic = 0;
         $mov->setPicpay($pic);
         
       
         
         @$repo = 0;
         $mov->setReposicao($repo);
         
         
          @$totalrepor = $total;    
          $mov->setTotal($totalrepor);
//   $venda->setDesc($dados['desc']);
//   $venda->setTentrada($dados['tentrada']);
//   $venda->setTsaida($dados['tsaida']);
         $mov->setData($dados['data']);
         $mov->setTipo($dados['tipo']);  
         $mov->setCat($dados['cat']);
         
         
   

    $movdao->mov($mov);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}
if(isset($_REQUEST['btnex'])){

   $di = $dados['dinheiro'];
        $di2 = str_replace(',', '.', str_replace('.', '', $di));
        $di3 = str_replace(',', '.', str_replace(',', '.', $di2));
        $di4 = str_replace(',', '.', str_replace('R$', '', $di3));
        $mov->setDinheiro(@$di4);
     
        $de = $dados['debito'];
        $de2 = str_replace(',', '.', str_replace('.', '', $de));
        $de3 = str_replace(',', '.', str_replace(',', '.', $de2));
        $de4 = str_replace(',', '.', str_replace('R$', '', $de3)); 
        $mov->setDebito(@$de4);
        
         $valor = $dados['ticket'];
        $number = str_replace(',', '.', str_replace('.', '', $valor));
        $numberr = str_replace(',', '.', str_replace(',', '.', $number));
        $numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
        $mov->setTicket($numberrr);
    
         @$total = $di4 + $de4 + $numberrr;    
         $mov->setTudao($total);
         
         
         
         @$pic = 0;
         $mov->setPicpay($pic);
         
       
         
         @$repo = 0;
         $mov->setReposicao($repo);
         
         
          @$totalrepor = $total;    
          $mov->setTotal($totalrepor);
//   $venda->setDesc($dados['desc']);
//   $venda->setTentrada($dados['tentrada']);
//   $venda->setTsaida($dados['tsaida']);
          $data = date("Y-m-d");
          
          $mov->setData($data);
         $mov->setTipo($dados['tipo']);  
   $categoriaa = "16";
         $mov->setCat($categoriaa);
         
         
   

    $movdao->exchanger($mov);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}

if(isset($_REQUEST['btnsair'])){
   $sair =  $dados['btnsair'];
 $movdao->sair($sair);

    
    }
    

 if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
      $mov->setId($id );
       
        $movdao->deletarmov45($mov);
        
    
}



if(isset($_REQUEST['btnaltmov'])){
    $mov->setId($dados['idmov']);
   
   $di = $dados['dinheiro'];
        $di2 = str_replace(',', '.', str_replace('.', '', $di));
        $di3 = str_replace(',', '.', str_replace(',', '.', $di2));
        $di4 = str_replace(',', '.', str_replace('R$', '', $di3));
        $mov->setDinheiro(@$di4);
     
        $de = $dados['debito'];
        $de2 = str_replace(',', '.', str_replace('.', '', $de));
        $de3 = str_replace(',', '.', str_replace(',', '.', $de2));
        $de4 = str_replace(',', '.', str_replace('R$', '', $de3)); 
        $mov->setDebito(@$de4);
        
         $valor = $dados['ticket'];
        $number = str_replace(',', '.', str_replace('.', '', $valor));
        $numberr = str_replace(',', '.', str_replace(',', '.', $number));
        $numberrr = str_replace(',', '.', str_replace('R$', '', $numberr));
        $mov->setTicket($numberrr);
    
         @$total = $di4 + $de4 + $numberrr;    
       $mov->setTudao($total);
//         
//         
//         
         @$pic = 0;
         $mov->setPicpay($pic);
//         
//       
//         
       @$repo = 0;
       $mov->setReposicao($repo);
//         
//         
         @$totalrepor = $total;    
        $mov->setTotal($total);
         $desc = "x";            $mov->setDesc($desc);
//   $venda->setTentrada($dados['tentrada']);
//   $venda->setTsaida($dados['tsaida']);
         $mov->setData($dados['data']);
         $mov->setTipo($dados['tipo']);  
         $mov->setCat($dados['cat']);
         
         
   

    $movdao->movalt($mov);
    
}