
<?php 
//if ((!isset($_SESSION['id'])) AND ( !isset($_SESSION['nome']))) {
//  //  header("Location: ?p=login");
//      echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=?p=login'>
//				<script type=\"text/javascript\">
//					alert(\"Deslogado. ".@$_SESSION['nome']."\");
//				</script>"; 
//}
?>
<!--SAUDAÇÕES-->
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4"><?php
        $data = new DateTime();
         echo "Bem-Vindo " .' <br>' . @$_SESSION['nome'] .'<br>';
        echo $data->format('d-m-Y');
        ?></h1>
<!--      <p class="lead">Construa uma tabela de preços para seus potenciais clientes, com esse exemplo Bootstrap. Além do mais, é feito com componentes padrões, utilitários e um pouquinho de customização.</p>-->
</div>
<!--ÍNICIO MOVIMENTACAO GERAL-->
<div class="container">
    
<!--         <button class="btn btn-success" name="btnwhats" type="submit"><a href="https://api.whatsapp.com/send?phone=5591984620807&text=<?php echo $arquivo ?>">  Enviar Caixa por Whatsapp </a></button>-->
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Movimentações Geral</h4>
            </div>
            <div class="card-body">
                <?php foreach ($vendadao->entradaGeral() as $venda) : ?>
                    <h1 class="card-title pricing-card-title">R$ <?= number_format($venda->getTudao(), 2, ',', '.') ?> <?php $te = $venda->getTudao() ?> <small class="text-muted"> Entradas</small></h1>
                <?php endforeach ?>
                <?php foreach ($vendadao->saida() as $venda) : ?>
                    <h1 class="card-title pricing-card-title">R$ <?= number_format($venda->getTsaida(), 2, ',', '.') ?> <?php $ts = $venda->getTsaida() ?> <small class="text-muted"> Saídas</small></h1>
                <?php endforeach ?>
            </div>
        </div>
           <!--FIM MOVIMENTACAO GERAL-->    
     
        <!--ÍNICIO VENDA-->
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Vendas</h4>
            </div>
            <div class="card-body">
                <?php
                foreach ($vendadao->totalvenda() as $venda) :
                    if ($venda->getTipo() == 'entrada') {
                        @$entrada = $venda->getTotal();
                    }
                    if ($venda->getTipo() == 'saida') {
                        @$saida = $venda->getTotal();
                    }
                    @$vendatotal = $entrada - $saida;
                    ?>
                <?php endforeach ?>

                <h1 class="card-title pricing-card-title">R$ <?= number_format(@$vendatotal, 2, ',', '.') ?> <small class="text-muted"> Diárias</small></h1>
    <!--           <h1 class="card-title pricing-card-title">R$ 22.354,00 <small class="text-muted">/ Lucro</small></h1>-->
        
             <?php
                foreach ($vendadao->totalvendaIfood() as $venda) :
                    if ($venda->getTipo() == 'entrada') {
                        @$entrada = $venda->getTotal();
                    }
                    if ($venda->getTipo() == 'saida') {
                        @$saida = $venda->getTotal();
                    }
                    @$vendatotalifood = $entrada - $saida;
                    ?>
                <?php endforeach ?>

                <h1 class="card-title pricing-card-title">R$ <?= number_format(@$vendatotalifood, 2, ',', '.') ?> <small class="text-muted"> iFoods</small></h1>
            </div>            
        </div>
 <!--FIM VENDA -->
 
 <!--INICIO CAIXA -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Caixa</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php $saldo = $te - $ts ?> R$ <?= number_format($saldo, 2, ',', '.') ?> <small class="text-muted"> Para Compras</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <?php
                    foreach ($vendadao->dinheiro() as $venda) :
                        if ($venda->getTipo() == 'entrada') {
                            @$entrada = $venda->getDinheiro();
                        }
                        if ($venda->getTipo() == 'saida') {
                            @$saida = $venda->getDinheiro();
                        }
                        @$dinheiro = $entrada - $saida;
                        ?>
                    <?php endforeach ?>
                    <li> R$ <?= number_format(@$dinheiro, 2, ',', '.') ?> Em Dinheiro</li> 

                    <?php
                    foreach ($vendadao->debito() as $venda) :
                        if ($venda->getTipo() == 'entrada') {
                            @$entrada = $venda->getDebito();
                        }
                        if ($venda->getTipo() == 'saida') {
                            @$saida = $venda->getDebito();
                        }
                        @$debito = $entrada - $saida;
                        ?>
                    <?php endforeach ?>
                    <li> R$ <?= number_format(@$debito, 2, ',', '.') ?> Em Debito</li> 


                    <?php
                    foreach ($vendadao->ticket() as $venda) :
                        if ($venda->getTipo() == 'entrada') {
                            @$entrada = $venda->getTicket();
                        }
                        if ($venda->getTipo() == 'saida') {
                            @$saida = $venda->getTicket();
                        }
                        @$ticket = $entrada - $saida;
                        ?>
                    <?php endforeach ?>
                    <li> R$ <?= number_format(@$ticket, 2, ',', '.') ?> Em Ticket</li> 

                </ul>
                <!--            <button type="button" class="btn btn-lg btn-block btn-primary">Contate-nos</button>-->
            </div>
        </div>
           <!--FIM CAIXA -->
        
           <!--ÍNICIO LUCRO -->
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Lucro</h4>
            </div>
            <div class="card-body">
                <?php  $totalpicpaygeral = 0;
                foreach ($vendadao->lucro() as $lucro) : ?> 
                    <?php
                    if ($lucro->getCat() == "3") {
                       
                        $totalpicpaygeral =+ $lucro->getDebito();
                    } endforeach


//                         if($venda->getTipo() == 'entrada' ){
//                            @$entrada = $venda->getPicpay();         
//                             }
//                             if($venda->getTipo() == 'saida' ){
//                            @$saida = $venda->getPicpay();         
//                             }
//                             @$picpay = $entrada - $saida;
                ?>
            
                <h3 class="card-title pricing-card-title">R$  <?= number_format($totalpicpaygeral, 2, ',', '.') ?> <small class="text-muted"> Total</small></h3>

     <?php foreach ($pagamentodao->read() as $funci) : ?> 
                    <?php
                    if ($funci->getIdFunci() <= "4") {
                        @$jasaiu += $funci->getTotal();
                    } endforeach
                ?>
                <h3 class="card-title pricing-card-title">R$  <?= number_format(@$jasaiu, 2, ',', '.') ?> <small class="text-muted"> Já saiu</small></h3>
                            

<small class="text-muted"> Entregador(Semanal)</small>
<?php foreach ($pagamentodao->diaria() as $diariasemana) : ?>    
      
               <?php     if ($diariasemana->getIdFunci() == "6") {          ?>
                <div >       <small class="text-muted"><?=  ucfirst(utf8_encode(strftime('%A', strtotime($diariasemana->getData()))));  ?></small></div>
          
      
       <?php    }  endforeach?>





  <?php foreach ($pagamentodao->readDiaria() as $funci) : ?> 
                    <?php
                    if ($funci->getIdFunci() == "6") {
                        @$diaria += $funci->getTotal();
                    } endforeach
                ?>
                <h3 class="card-title pricing-card-title">R$  <?= number_format(@$diaria, 2, ',', '.') ?> </h3>
                          <?php
                @$oquetemos = ($totalpicpaygeral - $jasaiu) - @$diaria;
                ?>



                <h3 class="card-title pricing-card-title">R$  <?= number_format($oquetemos, 2, ',', '.') ?> <small class="text-muted"> O que temos</small></h3>


<!--            <h3 class="card-title pricing-card-title">R$21.349,43 <small class="text-muted">/ Para nós</small></h3>-->

                <!--            <button type="button" class="btn btn-lg btn-block btn-primary">Contate-nos</button>-->
            </div>
        </div>
                <!--FIM LUCRO -->   
    </div>
      
             <!--ÍNICIO ERA PRA RECEBER -->
    <?php foreach ($vendadao->picpay() as $venda) : ?> 
        <h2>Era Pra Receber</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
<!--                        <th>Emmanoel</th>-->
                        <th>Jennifer</th>
                        <th>Wesley</th>

                    </tr>
                </thead>
                <tbody>
                    
                     <?php 
                     $picpayadEntregador = 0;
                     foreach ($pagamentodao->read() as $funci) : ?> 
                                                
                         <?php if ($funci->getIdFunci() == "4") { ?>
                                      <?php @$picpayad += $funci->getTotal(); ?>

                            <?php $picpayadEntregador = $picpayad; 

                                  ?>
                                         

                            <?php        
                            
                        }
                    endforeach
                    ?>                                       
                    <tr>                   
    <?php                       
                        $picpaydivJ0 = ($totalpicpaygeral - $picpayadEntregador ) - @$diaria;                        
                        $picpaydivJ = ($picpaydivJ0 * 40 / 100);      ?>
                        <td>R$  <?= number_format($picpaydivJ, 2, ',', '.') ?></td>                         
                                                  <?php                          
                          $picpaydivJ0 = ($totalpicpaygeral - $picpayadEntregador ) - @$diaria;                         
                        $picpaydivW = ($picpaydivJ0 * 60 / 100);      ?>                  

                                  
                        <td>R$  <?= number_format($picpaydivW, 2, ',', '.') ?></td> 
                    </tr>              
                </tbody>
            </table>
        </div>
<?php endforeach ?>
          <!--FIM ERA PRA RECEBER -->
        
          <!--ÍNICIO JÁ RECEBEU -->
    <!--------------------------------------------------------------------------------->
    <h2>Já Recebeu</h2>
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <?php foreach ($pagamentodao->read() as $funci) : ?> 
    <?php if ($funci->getIdFunci() <= "4") { ?>
                            <th><?= $funci->getNome() ?></th>
    <?php }endforeach ?>
                </tr>
            </thead>
            <tbody>
                <tr>  
                    <?php foreach ($pagamentodao->read() as $funci) : ?> 
                        <?php if ($funci->getIdFunci() <= "4") { ?>
                                      <?php $picpayad = $funci->getTotal(); ?>

                            <?php $picpayadEA = $picpayad; ?>

                            <td>R$  <?= number_format($picpayadEA, 2, ',', '.') ?></td>                             

                            <?php
                        }
                    endforeach
                    ?>
                </tr> 
            </tbody>
        </table>
    </div>
      <!--FIM JÁ RECEBEU -->
        <!--------------------------------------------------------------------------------->
      <!--ÍNICIO VAI RECEBER -->
        <h2>Vai Receber</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                 <th>Jennifer</th>
                   <th>Wesley</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php 
//                  $jarecebeuJ = 0;
//                  $picpaydivJ = 0;
                  foreach (@$pagamentodao->read() as $funci) : ?> 
                        <?php if (@$funci->getIdFunci() == "2") { ?>                       
                     <?php $jarecebeuJ = $funci->getTotal();  ?>
                            <?php      }     endforeach             ?>                             
                            <?php     $vaireceberJ =  (@$picpaydivJ - @$jarecebeuJ ) ;       ?>             
                    <td>R$   <?= number_format($vaireceberJ, 2, ',', '.') ?></td>        
                    
                       <?php 
//                       $jarecebeuW = 0;
//                        $picpaydivW = 0;
                  foreach (@$pagamentodao->read() as $funci) : ?> 
                        <?php if (@$funci->getIdFunci() == "3") { ?>                       
                     <?php $jarecebeuW = $funci->getTotal();  ?>
                            <?php      }     endforeach             ?>                             
                            <?php     $vaireceberW =  (@$picpaydivW - @$jarecebeuW);       ?>             
                    <td>R$   <?= number_format($vaireceberW, 2, ',', '.') ?></td> 
                    
                 <?php $_SESSION['$vaireceberW'] =  $vaireceberW ; ?>        
                
                 
                  


                </tr>              
            </tbody>
        </table>
    </div>
    <!--FIM VAI RECEBER -->
    
    

  <!--------------------------------------------------------------------------------->
    
  
<!--  
  <h2>Diárias do Entregador</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                 <th>Segunda</th>
                   <th>Terça</th>
                   <th>Quarta</th>
                   <th>Quinta</th>
                   <th>Sexta</th>
              <th>Sábado</th>                 
                </tr>
            </thead>
            <tbody>
                <tr>                             
                    <td><label>Sim</label>   <input type="radio" name="Segunda" value="Sim" />
                            <label>Não</label>  <input type="radio" name="Segunda" value="Não" /></td>  
                    
                    <td><label>Sim</label>   <input type="radio" name="Terça" value="Sim" />
                            <label>Não</label>  <input type="radio" name="Terça" value="Não" /></td> 
                    
                    <td><label>Sim</label>   <input type="radio" name="Quarta" value="Sim" />
                            <label>Não</label>  <input type="radio" name="Quarta" value="Não" /></td> 
                    
                    <td><label>Sim</label>   <input type="radio" name="Quinta" value="Sim" />
                            <label>Não</label>  <input type="radio" name="Quinta" value="Não" /></td> 
                    
                    <td><label>Sim</label>   <input type="radio" name="Sexta" value="Sim" />
                            <label>Não</label>  <input type="radio" name="Sexta" value="Não" /></td> 
                    
                    <td><label>Sim</label>   <input type="radio" name="Sábado" value="Sim" />
                            <label>Não</label>  <input type="radio" name="Sábado" value="Não" /></td> 
                    
                    </tr>              
            </tbody>
        </table>
    </div>-->
    
    


<!--    <button type="submit" name="final" class="btn btn-success" ><a href="https://api.whatsapp.com/send?phone=5591984620807&text=<?php echo $arquivo ?>" style="color: white; text-decoration: none;">
            Confirmar e Enviar Pelo Whatsapp
        </a></button>
         <button class="btn btn-success" name="btnwhats" type="submit"><a href="https://api.whatsapp.com/send?phone=5591984620807&text=<?php echo $arquivo ?>">  Enviar Caixa por Whatsapp </a></button>-->

<?php

//TEXTO PARA ENVIAR AO WHATSAPP
    $arquivo = " _CALUF'S REFEIÇÕES_  %0A%0A";
    $arquivo .= "*-------- MOVIMENTAÇÃO DE CAIXA --------* %0A";
  
     $arquivo .= "*-------- MOVIMENTAÇÃO GERAL --------* %0A";
    $arquivo .= "Entrada: *R$ " . number_format($te ,2,",",".") . "* %0A";
  $arquivo .= "Saída: *R$ " . number_format($ts ,2,",",".") . "* %0A%0A";
  

   $arquivo .= "*-------- VENDAS --------* %0A";
    $arquivo .= "Total: *R$ " . number_format(@$vendatotal,2,",",".") . "* %0A%0A";
  
     $arquivo .= "*-------- CAIXA --------* %0A";
    $arquivo .= "Para Compras: *R$ " . number_format($saldo,2,",",".") . "*%0A";
  $arquivo .= "Em Dinheiro: *R$ " . number_format(@$dinheiro, 2,",",".") . "*%0A";
$arquivo .= "Em Débito: *R$ " . number_format(@$debito,2,",",".") . "* %0A";
$arquivo .= "Em Ticket: *R$ " . number_format(@$ticket,2,",",".") . "* %0A%0A";
  

  $arquivo .= "*-------- LUCRO --------* %0A";
    $arquivo .= "Total: *R$ " . number_format(@$totalpicpaygeral,2,",",".") . "*%0A";
  $arquivo .= "Já Saiu: *R$ " . number_format(@$jasaiu,2,",",".") . "* %0A";
    $arquivo .= "O que temos: *R$ " . number_format(@$oquetemos,2,",",".") . "* %0A%0A";
  
   $arquivo .= "*-------- ENTREGADOR --------* %0A";
$arquivo .= "Diárias a receber: *R$ " . number_format(@$diaria,2,",",".") . "*%0A";
  foreach ($pagamentodao->diaria() as $diariasemana) :
           if ($diariasemana->getIdFunci() == "6") {       
      $arquivo .=  "*" .   ucfirst(utf8_encode(strftime('%A', strtotime($diariasemana->getData())))) . "*%0A";
          
      
          }  endforeach;

$arquivo .= "%0A";
   
  $arquivo .= "*-------- PAGAMENTOS --------* %0A";
    $arquivo .= "*-------- ERA PRA RECEBER--------* %0A";
  $arquivo .= "Jennifer: *R$ " . number_format(@$picpaydivJ,2,",",".") . "* %0A";
  $arquivo .= "Wesley: *R$ " . number_format(@$picpaydivW,2,",",".") . "* %0A%0A";
  
  
   $arquivo .= "*-------- JÁ RECEBEU--------* %0A";  
        foreach ($pagamentodao->read() as $funci) : 
     if ($funci->getIdFunci() <= "4") { 
                 //  $arquivo .=       $funci->getNome() ."%0A" ;
              }endforeach ;            
                  foreach ($pagamentodao->read() as $funci) : 
                  if ($funci->getIdFunci() <= "4") { 
                         $picpayad = $funci->getTotal();
                        $picpayadEA = $picpayad; 
                              $arquivo .=       $funci->getNome()  ;
                  $arquivo .=  " *R$ " .     number_format($picpayadEA, 2, ',', '.'). "* %0A";
                        }
                    endforeach;       
           
   $arquivo .=       "%0A" ; 
   
//    $arquivo .= "Jennifer: *R$ " . number_format($picpayadEA,2,",",".") . "* %0A%0A";
//  $arquivo .= "Wesley: *R$ " . number_format($picpayadEA,2,",",".") . "* %0A%0A";
//  $arquivo .= "Entregador: *R$ " . number_format($picpayadEA,2,",",".") . "* %0A%0A";

  $arquivo .= "*-------- VAI RECEBER--------* %0A";
   $arquivo .= "Jennifer: *R$ " . number_format($vaireceberJ,2,",",".") . "* %0A";
  $arquivo .= "Wesley: *R$ " . number_format($vaireceberW,2,",",".") . "* %0A%0A";

 $arquivo .= "*-------- ÚLTIMA ATUALIZAÇÃO:  " .  date('d/m/Y H:i:s') ."--------* %0A";


//$arquivo .= "*OBRIGADO PELA PREFERÊNCIA, VOLTE SEMPRE, DEUS TE ABENÇOE*";
    ?>

<div class="text-center">
    <button  type="submit" name="final"  class="btn btn-success" ><a target="_blank" href="https://api.whatsapp.com/send?phone=5591984620807&text=<?php echo $arquivo ?>" style="color: white; text-decoration: none;">
             Enviar Pelo Whatsapp
        </a></button>


  
   

</div>


 <!--ÍNICIO MOVIMENTACAO -->    
<!--         <form class="needs-validation"  method="POST" action="./controller/MovController.php" >      
                                    <input  type="text" name="iddelmov" value="12">
                                 <button type="submit" name="btndelmov" class="btn btn-danger">Excluir</button>
                                       </form>-->
       <h2>Movimenações</h2>
       <div class="table-responsive-sm">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Data</th>
          <!--      <th scope="col">Descrição</th>-->
                <th scope="col">Categoria</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($movdao->movimentacao() as $mov) : ?>          
                <tr>
                    <?php
                    if ($mov->getTipo() == "saida" ) {
                        $datas = new DateTime($mov->getData());
                        ?>
                        <th scope="row" style="color: red">     <?= $datas->format('d/m/Y') ?>  </th>
                        <td style="color: red">   <?= $mov->getNome() ?></td>
                        <td style="color: red">R$  <?= number_format($mov->getTotal(), 2, ',', '.') ?></td>
<!--                                   <td >     <a href="./controller/MovController.php?iddelmov=<?= $mov->getId() ?>">xx </a>-->
<!--                             <td > 
                                       <form class="needs-validation"  method="POST" action="./controller/MovController.php" >      
                                    <input  type="hidden" name="iddelmov" value="<?= $mov->getId() ?>">
             <button style="font-size:10px; color:#666" onclick="return confirm('Tem certeza que deseja apagar categoria ?')" title="apagar" id="apagar" name="btndelmov" class="btn btn-lg btn-danger" type="submit">Excluir</button>

                              
                                       </form>
                                       </td>-->
                                       
                                       
                        <td><a href="./controller/MovController.php?id=<?= $mov->getId() ?>" name="btndelmov"  class='del-btn btn btn-outline-danger btn-sm' style="text-decoration: none">Deletar</a></td>
<!--                        <td>
                            <form action="./controller/MovController.php" method="POST">  
                                <a class="btn-danger btn-lg" data-toggle="modal" data-target="#myModal<?= $mov->getId() ?>" >Editar</a>
                                <input type="hidden" name="ideditar" value="<?= $mov->getId() ?>">                            
                            </form>
                        </td>-->
                          <?php      if ($mov->getCat() != "1" && $mov->getCat() != "3" ) {   ?>   
                        <td>  <a class="btn btn-primary btn-sm btn btn-outline-warning" data-toggle="modal" data-target="#myModal<?= $mov->getId() ?>" >Editar</a></td>
                     <?php } ?>   
       <!-- Modal EDITAR MOVIMENTACAO SAIDA -->
                <div id="myModal<?= $mov->getId() ?>" class="modal fade" role="dialog">
       
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Movimentação    </h4>
                    </div>
                      <form class="needs-validation"  method="POST" action="./controller/MovController.php">
                    <div class="modal-body">
                       

       
          <h4 class="mb-3"> Entrada ou Saída</h4>
        
           
              <div class="col-md-6 mb-3">
                <label for="primeiroNome">Dinheiro</label>
                <input type="text" class="form-control" id="primeiroNome" placeholder="" value="<?= $mov->getDinheiro() ?>"  name="dinheiro" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um nome válido.
                </div>
              </div>
           
              
             
                <div class="col-md-6 mb-3">
                <label for="sobrenome">Débito</label>
                <input type="text" class="form-control" id="sobrenome"  placeholder="" value="<?= $mov->getDebito() ?>" name="debito" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
         
               
                <div class="col-md-6 mb-3">
                <label for="sobrenome">Ticket</label>
                <input type="text" class="form-control" id="sobrenome" placeholder="" value="<?= $mov->getTicket() ?>" name="ticket" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
          


              <div class="row">
              <div class="col-md-5 mb-3">
                <label for="categoria">Categoria</label>
                
                <select class="custom-select d-block w-100" id="categoria" name="cat" required>
                 <option value="">Escolha...</option>
                    <?php  $catid  = $mov->getCat() ?>
                    <?php foreach ($categoriadao->read() as $categoria) : ?>
                    
                   <option <?php if (isset($catid) && $catid == $categoria->getId()) echo "selected=selected" ?> value="<?php echo $categoria->getId() ?>"><?php echo $categoria->getNome(); ?>  </option>
                   <?php endforeach ?>
                </select>
              
                <div class="invalid-feedback">
                  Por favor, escolha um país válido.
                </div>
              </div>
       
              <div class="col-md-5 mb-3">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" placeholder="" value="<?= $mov->getData() ?>" name="data" required>
                <div class="invalid-feedback">
                  É obrigatório inserir um CEP.
                </div>
              </div>
            </div>

            <h4 class="mb-3">Tipo</h4>         
              <div class="custom-control custom-radio">
                                   <label for="entrada" style="color:#030"><input type="radio" name="tipo" value="entrada" id="entrada" required="on" <?php echo ($mov->getTipo() == "entrada") ? "checked" : null; ?>/> Entrada!</label>&nbsp; 
             
              </div>
            
            
              <div class="custom-control custom-radio">
                                   <label for="saida" style="color:#030"><input type="radio" name="tipo" value="saida" id="entrada" required="on" <?php echo ($mov->getTipo() == "saida") ? "checked" : null; ?>/> Saída!</label>&nbsp; 

              </div>
            
                    </div>           
                    <div class="modal-footer">                       
            <hr class="mb-4">
            <input type="hidden" value="<?= $mov->getId() ?>" name="idmov">
            <button class="btn btn-primary btn-lg btn-block" name="btnaltmov" type="submit">Alterar</button>
                                     
                    </div>
                        
                          </form>         
                </div>    
            </div>
        </div>
             <!-- FIM EDITAR MOVIMENTACAO SAIDA-->
             
               <!--  EDITAR MOVIMENTACAO ENTRADA -->

 <?php } ?>
                    <?php
                    if ($mov->getTipo() == "entrada") {
                        $datae = new DateTime($mov->getData());
                        ?>
                        <th scope="row" style="color: green">     <?= $datae->format('d/m/Y') ?>  </th>
                        <td style="color: green">   <?= $mov->getNome   () ?></td>
                        <td style="color: green">R$  <?= number_format($mov->getTotal(), 2, ',', '.') ?></td>
                          <td><a href="./controller/MovController.php?id=<?= $mov->getId() ?>" name="btndelmov"  class='del-btn btn btn-outline-danger btn-sm' style="text-decoration: none">Deletar</a></td>
<!--                             <td > 
                                       <form class="needs-validation"  method="POST" action="./controller/MovController.php" >      
                                    <input  type="hidden" name="iddelmov" value="<?= $mov->getId() ?>">
             <button style="font-size:10px; color:#666" onclick="return confirm('Tem certeza que deseja apagar categoria ?')" title="apagar" id="apagar" name="btndelmov" class="btn btn-lg btn-danger"  type="submit">Excluir</button>

                              
                                       </form>
                                       </td>-->
                  <?php      if ($mov->getCat() != "1" && $mov->getCat() != "3" ) {   ?>   
                        <td>  <a class="btn btn-primary btn-sm btn btn-outline-warning" data-toggle="modal" data-target="#myModal<?= $mov->getId() ?>" >Editar</a></td>
                     <?php } ?>  
                   
       <!-- Modal EDITAR MOVIMENTACAO ENTRADA -->
                <div id="myModal<?= $mov->getId() ?>" class="modal fade" role="dialog">
       
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Movimentação    </h4>
                    </div>
                      <form class="needs-validation"  method="POST" action="./controller/MovController.php">
                    <div class="modal-body">
                       

       
          <h4 class="mb-3"> Entrada ou Saída</h4>
        
           
              <div class="col-md-6 mb-3">
                <label for="primeiroNome">Dinheiro</label>
                <input type="text" class="form-control" id="primeiroNome" placeholder="" value="<?= $mov->getDinheiro() ?>"  name="dinheiro" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um nome válido.
                </div>
              </div>
           
              
             
                <div class="col-md-6 mb-3">
                <label for="sobrenome">Débito</label>
                <input type="text" class="form-control" id="sobrenome"  placeholder="" value="<?= $mov->getDebito() ?>" name="debito" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
         
               
                <div class="col-md-6 mb-3">
                <label for="sobrenome">Ticket</label>
                <input type="text" class="form-control" id="sobrenome" placeholder="" value="<?= $mov->getTicket() ?>" name="ticket" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
          


              <div class="row">
              <div class="col-md-5 mb-3">
                <label for="categoria">Categoria</label>
                
                <select class="custom-select d-block w-100" id="categoria" name="cat" required>
                 <option value="">Escolha...</option>
                    <?php  $catid  = $mov->getCat() ?>
                    <?php foreach ($categoriadao->read() as $categoria) : ?>
                    
                   <option <?php if (isset($catid) && $catid == $categoria->getId()) echo "selected=selected" ?> value="<?php echo $categoria->getId() ?>"><?php echo $categoria->getNome(); ?>  </option>
                   <?php endforeach ?>
                </select>
              
                <div class="invalid-feedback">
                  Por favor, escolha um país válido.
                </div>
              </div>
       
              <div class="col-md-5 mb-3">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" placeholder="" value="<?= $mov->getData() ?>" name="data" required>
                <div class="invalid-feedback">
                  É obrigatório inserir um CEP.
                </div>
              </div>
            </div>

            <h4 class="mb-3">Tipo</h4>         
              <div class="custom-control custom-radio">
                                   <label for="entrada" style="color:#030"><input type="radio" name="tipo" value="entrada" id="entrada" required="on" <?php echo ($mov->getTipo() == "entrada") ? "checked" : null; ?>/> Entrada!</label>&nbsp; 
             
              </div>
            
            
              <div class="custom-control custom-radio">
                                   <label for="saida" style="color:#030"><input type="radio" name="tipo" value="saida" id="entrada" required="on" <?php echo ($mov->getTipo() == "saida") ? "checked" : null; ?>/> Saída!</label>&nbsp; 

              </div>
            
                    </div>   
                    <div class="modal-footer">                       
            <hr class="mb-4">
            <input type="hidden" value="<?= $mov->getId() ?>" name="idmov">
            <button class="btn btn-primary btn-lg btn-block" name="btnaltmov" type="submit">Alterar</button>
                                     
                    </div>
                          </form>         
                </div>    
            </div>
        </div>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>  
                  <!-- FINAL Modal EDITAR MOVIMENTACAO ENTRADA -->
                
        <td> <h5>Pagamentos  </h5></td>

        <?php foreach ($pagamentodao->readPicpay() as $mov) : ?>          
            <tr>             
                <?php      
                $datae = new DateTime($mov->getData());
                ?>
                <th scope="row" style="color: red">     <?= $datae->format('d/m/Y') ?>  </th>
                <td style="color: red">   <?= $mov->getCat() ?></td>
                <td style="color: red">R$  <?= number_format($mov->getTotal(), 2, ',', '.') ?></td>
<!--                <td><a href="./controller/MovController.php?id=<?= $mov->getId() ?>" name="btndelmov"  class='del-btn btn-danger btn-lg' style="text-decoration: none">Deletar</a></td>-->
<!--                   <td > 
                                       <form class="needs-validation"  method="POST" action="./controller/MovController.php" >      
                                    <input  type="hidden" name="iddelmov" value="<?= $mov->getId() ?>">
             <button style="font-size:10px; color:#666" onclick="return confirm('Tem certeza que deseja apagar categoria ?')" title="apagar" id="apagar" name="btndelmov" class="btn btn-lg btn-warning " type="submit">Excluir</button>

                              
                                       </form>
                                       </td>-->
            </tr>                                
            <?php endforeach ?>  
        </tbody>
    </table>
           </div>
         <script>
        $('.del-btn').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href') 
            Swal.fire({
                title: 'Tem Certeza que quer deletar?',
                text: "Não haverá volta!",
                icon: 'Aviso',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, Tenho Certeza!'
                }).then((result) => {
                    if (result.value) {
                        document.location.href = href;                        
                    }
                })
         })

//         const flashdata = $('.flash-data').data('flashdata')
//         if(flashdata){
//             swal.fire({
//                 type : 'Sucesso',
//                 title : 'Deletado',
//                 text : 'Deletado com Sucesso'
//             })
//         }
    </script>
                                       
             
          <!--FIM MOVIMENTACAO -->
          
          
          
          </div>