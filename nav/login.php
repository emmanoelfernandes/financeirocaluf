<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Perfeito de Finannças e Caixa">
    <meta name="author" content="Emmanoel Lopes Fernandes">
    <link rel="icon" href="../img/logocaluf.jpg">

    <title>Caluf's Financeiro</title>

 
    
    <!-- Estilos customizados para esse template -->
 <link href="css/signin.css" rel="stylesheet">
  </head>
  
    

    <!-- Estilos customizados para esse template -->
   

    <!--ALERTAS-->
   <!--<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">-->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<!--<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">-->
<!--JQUERY pra funcionar com o alertas-->
<script   src="https://code.jquery.com/jquery-3.5.1.min.js"  ></script>    
   

    
<?php include "./config/msg.php"; ?>
    

  <body class="text-center">
      <form class="form-signin" method="POST" action="./controller/LoginController.php">
      
          <img class="mb-4 " src="../img/logocaluf.jpg" alt="Caluf Logo" width="300" height="172">
      <h1 style="text-align: center" class="h3 mb-3 font-weight-normal">Faça login</h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Seu email"  name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="btnlogin" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted" style="text-align: center">&copy; 2023</p>
    </form>
  </body>

