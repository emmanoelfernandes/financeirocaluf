<?php      session_start() ?> 
<!--ALERTAS-->
<!--<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">-->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<!--<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">-->
<!--JQUERY pra funcionar com o alertas-->
<script   src="https://code.jquery.com/jquery-3.5.1.min.js"  ></script>

<!--estilos-->
<!--<link href="css/bootstrap.css.css" rel="stylesheet">-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="js/bootstrap.min.js.map" >

<?php
include "config/Conexao.php";
include "config/msg.php";


include_once "dao/LoginDAO.php";
include_once "model/Login.php";


include_once "dao/CategoriaDAO.php";
include_once "model/Categoria.php";
$categoria = new Categoria();
$categoriadao = new CategoriaDAO();

include_once "dao/VendaDAO.php";
include_once "model/Venda.php";
$venda = new Venda();
$vendadao = new VendaDAO();

include_once "dao/PagamentoDAO.php";
include_once "model/Pagamento.php";
$pagamento = new pagamento();
$pagamentodao = new PagamentoDAO();


include_once "dao/MovDAO.php";
include_once "model/Mov.php";
$mov = new mov();
$movdao = new MovDAO();

//$SAIR = new sairsair();
//$SAIR->sairde();

foreach ($_REQUEST as $___opt => $___val) {
  $$___opt = $___val;
}        $valor = @$_GET['p'];


//PAGINA DE IMPRIMIR TIRANDO O RODAPÉ
//    if($valor == 'imp'){ include 'admin/imprimir.php'; 
//    exit;
//    }
//if($valor == 'imprimir'){ include 'admin/imprimirPedido.php';
//exit;
//
//}

// LOGIN
//if($valor == 'login') {include('login/login.php');} 
if($valor == 'login') {include('nav/login.php'); exit();} 
if($valor == 'errol') {include('nav/login.php'); exit();} 
if($valor == 'deslogado') {include('nav/login.php'); exit();} 
include "componentes/header.php";


if(empty($valor)) {include('nav/home.php') ; } 

if($valor == 'home') {include('nav/home.php');}
if($valor == 'arq') {include('nav/arquivo.php');}

include "nav/sair.php";

//include "nav/sair.php";

if($valor == 'venda') {include('nav/venda.php');} 
if($valor == 'movimentacao') {include('nav/movimentacao.php');} 
if($valor == 'exchange') {include('nav/exchange.php');} 
if($valor == 'pagamento') {include('nav/pagamento.php');} 
if($valor == 'diarias') {include('nav/diarias.php');} 
//if($valor == 'sair') {include('nav/sair.php');} 

include "componentes/footer.php";




    
    
    

    
    


//PROCESSAMENTO
//

//if($valor == 'procapagarM') {include('proc/proceApagar.php');} 


//FILTRO



//NAVEGAÇÃO

//CLIENTE





?>

    


<!--WHATSAPP-->
<script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "5591984620807", // WhatsApp number
                call_to_action: "Dúvidas, sugestões, críticas ? Envie-me uma mensagem ", // Call to action   
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () {
                WhWidgetSendButton.init(host, proto, options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })();
</script>


 
<!--MÁSCARA DO DINHEIRO-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 

<!--CHAMA MODAL-->
<!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
        
          <script> 
function calcular() {
 var n1 = parseFloat(document.getElementById('dinheiro').value.replace(',', '.'));
  var n2 = parseFloat(document.getElementById('debito').value.replace(',', '.'));
 var n3 = parseFloat(document.getElementById('ticket').value.replace(',', '.'));
  // document.getElementById('resultado').innerHTML = n1 + n2 + n3;
   // document.getElementById('resultado').value = n1 + n2 + n3;
   document.getElementById('picpay').value = ((n1 + n2 + n3)*30/100);
   //document.getElementById('reposicao').value = ((n1 + n2 + n3)-((n1 + n2 + n3)*30/100));


//$(".valor_recibo").each(function() {
//  var num = parseFloat($(this).text().replace(',', '.'));
//  valor_recibo += num;
//});
//
//$('#totalrecibo').html(valor_recibo.toString().replace('.', ','));

}



</script>