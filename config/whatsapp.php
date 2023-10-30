<?php
//TEXTO PARA ENVIAR AO WHATSAPP
    $arquivo = " _CALUF'S REFEIÇÕES_  %0A%0A";
    $arquivo .= "*-------- MOVIMENTAÇÃO DE CAIXA --------* %0A";
  
     $arquivo .= "*-------- MOVIMENTAÇÃO GERAL --------* %0A";
    $arquivo .= "Entrada: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Saída: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  

   $arquivo .= "*-------- VENDAS --------* %0A";
    $arquivo .= "Total: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  
     $arquivo .= "*-------- CAIXA --------* %0A";
    $arquivo .= "Para Compras: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Em Dinheiro: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
$arquivo .= "Em Débito: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
$arquivo .= "Em Ticket: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  

  $arquivo .= "*-------- LUCRO --------* %0A";
    $arquivo .= "Total: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Já Saiu: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
$arquivo .= "Diárias Semanal(Entregador): *R$ " . number_format($total,2,",",".") . "* %0A%0A";
$arquivo .= "O que temos: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
   
  $arquivo .= "*-------- PAGAMENTOS --------* %0A";
    $arquivo .= "*-------- ERA PRA RECEBER--------* %0A";
  $arquivo .= "Jennifer: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Wesley: *R$ " . number_format($total,2,",",".") . "* %0A%0A";

  
   $arquivo .= "*-------- JÁ RECEBEU--------* %0A";
    $arquivo .= "Jennifer: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Wesley: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Entregador: *R$ " . number_format($total,2,",",".") . "* %0A%0A";

  $arquivo .= "*-------- VAI RECEBER--------* %0A";
   $arquivo .= "Jennifer: *R$ " . number_format($total,2,",",".") . "* %0A%0A";
  $arquivo .= "Wesley: *R$ " . number_format($total,2,",",".") . "* %0A%0A";




//$arquivo .= "*OBRIGADO PELA PREFERÊNCIA, VOLTE SEMPRE, DEUS TE ABENÇOE*";
    ?>