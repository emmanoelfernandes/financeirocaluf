
<!doctype html>


  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
<!--        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
        <h2>Exchange</h2>
<!--        <p class="lead">Abaixo temos um exemplo de formulário construído com controles de formulário Bootstrap. Cada campo obrigatório possui um estado de validação que é ativado quando tenta-se enviar o formulário sem completá-lo.</p>-->
      </div>

      <div class="row">
  
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Cadastre uma Exchange</h4>
          <form class="needs-validation"  method="POST" action="./controller/MovController.php">
            <div class="row">
              <div class="col-md-6 mb-3">
                <h4 class="mb-3">De onde ?</h4>
               <div class="row">
              <div class="col-md-6 mb-3">
                <label for="primeiroNome">Dinheiro</label>
                <input type="text" class="form-control" id="primeiroNome" value="" placeholder="" value=""  name="dinheiro" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um nome válido.
                </div>
              </div>
            </div>
              
              <div class="row">
                <div class="col-md-6 mb-3">
                <label for="sobrenome">Débito</label>
                <input type="text" class="form-control" id="sobrenome" value="" placeholder="" value="" name="debito" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
            </div>

               <div class="row">
                <div class="col-md-6 mb-3">
                <label for="sobrenome">Ticket</label>
                <input type="text" class="form-control" id="sobrenome" value="" placeholder="" value="" name="ticket" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
            </div>
              </div>
            </div>
              
        <h4 class="mb-3">Tipo</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                  <input id="entrada" name="tipo" type="radio" class="custom-control-input" value="entrada" required>
                <label class="custom-control-label" for="entrada">Entrada</label>
              </div>
              <div class="custom-control custom-radio">
                  <input id="saida" name="tipo" type="radio" class="custom-control-input" value="saida"  required>
                <label class="custom-control-label" for="saida">Saída</label>
              </div>
<!--              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">PayPal</label>
              </div>-->
            </div>

            
               <hr class="mb-4">
              
          
         

          
         

            
 
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" name="btnex" type="submit">Cadastrar</button>
          </form>
        </div>
      </div>

    </div>

  
