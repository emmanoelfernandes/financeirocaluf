
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Perfeito de Finannças e Caixa">
    <meta name="author" content="Emmanoel Lopes Fernandes">
  <link rel="icon" href="../img/logocaluf.jpg">


    <title>Caluf's Financeiro</title>


    <!-- Estilos customizados para esse template -->
    <link href="pricing.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
       
        <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Arquivos
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <?php   foreach ($movdao->arquivo() as $arquivos) :      
     $ano = $arquivos->getAno();
    $mes = $arquivos->getMes();
            
//            date('d/m/Y', strtotime($datass)); 
        ?>  
      <a class="dropdown-item" href="?p=arq&mes=<?php echo$mes?>&ano=<?php echo$ano?>"><?php echo $mes. "/" .$ano ?></a>
       <?php endforeach; ?>  
   </div>
</div>
        
      <h5 class="my-0 mr-md-auto font-weight-normal"> <a class="p-2 text-dark" href="?p=home">Caluf's Financeiro</a></h5>
    
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="?p=venda">Venda do Dia/IFood</a>
        <a class="p-2 text-dark" href="?p=movimentacao">Entrada-Saída</a>
        <a class="p-2 text-dark" href="?p=exchange">Exchange</a>
        <a class="p-2 text-dark" href="?p=pagamento">Pagamentos</a>
          <a class="p-2 text-dark" href="?p=diarias">Diárias do Entregador</a>
      </nav>
       <form class="needs-validation" novalidate method="POST" action="./controller/MovController.php">
         <button class="btn btn-outline-primary" name="btnsair" type="submit">Sair</button>
          </form>
<!--      <a class="btn btn-outline-primary" href="?p=sair">Sair</a>-->
    </div>