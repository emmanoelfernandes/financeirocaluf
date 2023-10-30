<?php session_start(); ?>
<?php
include_once "../config/Conexao.php";
include_once "../dao/PagamentoDAO.php";
include_once "../model/Pagamento.php";
  


$pagamento = new Pagamento();
$pagamentodao = new PagamentoDAO();

    
    $dados = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição COMPRAAAAA update2
if(isset($_REQUEST['cadfunc'])){
       
        $pagamento->setNome($dados['nome']); 
        

   

    $pagamentodao->cadfunc($pagamento);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}
    


if(isset($_REQUEST['btnpag'])){       
//        $pagamento->setNome($dados['nome']); 
        $pagamento->setData($dados['data']); 
         $pagamento->setIdFunci($dados['idfunci']); 
                  
        $valor = $dados['valor'];
        $valor2 = str_replace(',', '.', str_replace('.', '', $valor));
        $valor3 = str_replace(',', '.', str_replace(',', '.', $valor2));
        $valor4 = str_replace(',', '.', str_replace('R$', '', $valor3));
        $pagamento->setTotal($valor4); 
      
   

    $pagamentodao->pagarFunci($pagamento);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}




if(isset($_REQUEST['idDiaria'])){       
//        $pagamento->setNome($dados['nome']); 
        $iddiaria = $_REQUEST['idDiaria'];
    
    $pagamento->setId($iddiaria); 
       
                  
        
    $pagamentodao->deletaDiaria($pagamento);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}
