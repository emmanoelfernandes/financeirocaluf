<!doctype html>
<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
  <!--        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
            <h2>Venda</h2>
    <!--        <p class="lead">Abaixo temos um exemplo de formulário construído com controles de formulário Bootstrap. Cada campo obrigatório possui um estado de validação que é ativado quando tenta-se enviar o formulário sem completá-lo.</p>-->
        </div>
<!--        <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#cad" > Nova Categoria   </button>                             
            INICIO MODAL CATEGORIA
        <div class="modal fade" id="cad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="./controller/CategoriaController.php" method="POST" >
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="" class="form-control" required >
                                </div>    
                                <div class="invalid-feedback">
                                    É obrigatório inserir um nome válido.
                                </div>
                            </div>                                         
                            <div class="row">
                                <div class="col-md-2">
                                    <br>
                                    <input type="hidden" name="id" value="" />
                                    <button class="btn btn-primary" type="submit" name="cadcat">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
        <!--    FIM MODAL CATEGORIA-->

        <!--    INICIO CADASTRA VENDA-->
        <div class="row">          
            <!--        <div class="col-md-4 order-md-2 mb-4">
                      <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Seu carrinho</span>
                        <span class="badge badge-secondary badge-pill">3</span>
                      </h4>
                      <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Nome do produto</h6>
                            <small class="text-muted">Breve descrição</small>
                          </div>
                          <span class="text-muted">R$12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Segundo produto</h6>
                            <small class="text-muted">Breve descrição</small>
                          </div>
                          <span class="text-muted">R$8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Terceiro item</h6>
                            <small class="text-muted">Breve descrição</small>
                          </div>
                          <span class="text-muted">R$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                          <div class="text-success">
                            <h6 class="my-0">Código de promoção</h6>
                            <small>CODIGOEXEMEPLO</small>
                          </div>
                          <span class="text-success">-R$5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                          <span>Total (BRL)</span>
                          <strong>R$20</strong>
                        </li>
                      </ul>
                      <form class="card p-2">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Código promocional">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Resgatar</button>
                          </div>
                        </div>
                      </form>
                    </div>-->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Cadastre uma Venda</h4>
                <form class="needs-validation"  method="POST" action="./controller/VendaController.php" >
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="primeiroNome">Dinheiro</label>              
                            <input type="text" class="form-control" classe="valor_recibo" onblur="calcular()" value="" id="dinheiro" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  name="dinheiro"   required>
                            <div class="invalid-feedback">
                                É obrigatório inserir um nome válido.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Débito</label>
                            <input type="text" class="form-control"  classe="valor_recibo"  onblur="calcular()" value="" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  id="debito" name="debito"  required>
                            <div class="invalid-feedback">
                                É obrigatório inserir um sobre nome válido.
                            </div>
                        </div>
                    </div>              
                    <!--               <div class="col-md-3 mb-3">
                          <label for="validationCustom05">CEP</label>
                          <input type="text" class="form-control" id="validationCustom05" placeholder="CEP" required>
                          <div class="invalid-feedback">
                            Por favor, informe um CEP válido.
                          </div>
                        </div>-->              
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ticket">Ticket</label>
                            <input type="text" class="form-control valor_recibo" id="ticket"  value="" onblur="calcular()" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  name="ticket"  required>
                            <!--                <div class="invalid-feedback">
                                              É obrigatório inserir um sobre nome válido.
                                            </div>-->
                        </div>
                    </div>              
                    <!--            <div class="mb-3">
                                  <label for="nickname">Nickname</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="nickname" placeholder="Nickname" required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                      Seu nickname é obrigatório.
                                    </div>
                                  </div>
                                </div>-->
                    <!--            <div class="mb-3">
                                  <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                                  <input type="email" class="form-control" id="email" placeholder="fulano@exemplo.com">
                                  <div class="invalid-feedback">
                                    Por favor, insira um endereço de e-mail válido, para atualizações de entrega.
                                  </div>
                                </div>-->
                    <!--            <div class="mb-3">
                                  <label for="endereco">Endereço</label>
                                  <input type="text" class="form-control" id="endereco" placeholder="Rua dos bobos, nº 0" required>
                                  <div class="invalid-feedback">
                                    Por favor, insira seu endereço de entrega.
                                  </div>
                                </div>-->
                    <!--            <div class="mb-3">
                                  <label for="endereco2">Endereço 2 <span class="text-muted">(Opcional)</span></label>
                                  <input type="text" class="form-control" id="endereco2" placeholder="Apartamento ou casa">
                                </div>-->
                    <!--               <div class="row">
                                    <div class="col-md-6 mb-3">
                                    <label for="sobrenome">Total</label>
                                    <input type="text" class="form-control" class="" id="resultado" name="total"   placeholder="" required>
                                     <div id="resultado"></div>
                                    <div class="invalid-feedback">
                                      É obrigatório inserir um sobre nome válido.
                                    </div>
                                  </div>
                                       </div>
                                   <div class="row">
                                    <div class="col-md-6 mb-3">
                                    <label for="sobrenome">Reposição</label>
                                    <input type="text" class="form-control" id="reposicao" name="reposicao" placeholder=""  required>
                                    <div class="invalid-feedback">
                                      É obrigatório inserir um sobre nome válido.
                                    </div>
                                  </div>
                                </div>
                    -->               <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sobrenome">Lucro - 30%</label>
                            <input type="text" class="form-control" id="picpay" name="lucro" placeholder="" readonly="">

                            <div class="invalid-feedback">
                                É obrigatório inserir um sobre nome válido.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--              <div class="col-md-5 mb-3">
                                        <label for="categoria">Categoria</label>
                                        
                                        <select class="custom-select d-block w-100" id="categoria" name="cat" required>
                                         <option value="">Escolha...</option>
                        <?php foreach ($categoriadao->read() as $categoria) : ?>
                                                    
                                                  <option value="<?= $categoria->getId() ?>" ><?= $categoria->getNome() ?></option>
                        <?php endforeach ?>
                                        </select>
                                      
                                        <div class="invalid-feedback">
                                          Por favor, escolha um país válido.
                                        </div>
                                      </div>-->
                        <div class="col-md-5 mb-3">
                            <label for="categoria">Categoria</label>

                            <select class="custom-select d-block w-100" id="categoria" name="cat" required>                    
                                <option value="1" >Venda do Dia</option>   
                                  <option value="9" >iFood</option>  
                            </select>              
                            <div class="invalid-feedback">
                                Por favor, escolha um país válido.
                            </div>
                        </div>          
          <!--<input type="hidden" class="form-control" value="1" id="categoria" name="cat" placeholder="" required>-->
                        <!--                
                                      <div class="col-md-4 mb-3">
                                        <label for="estado">Estado</label>
                                        <select class="custom-select d-block w-100" id="estado" required>
                                          <option value="">Escolha...</option>
                                          <option>Acre</option>
                                        </select>
                                        <div class="invalid-feedback">
                                          Por favor, insira um estado válido.
                                        </div>
                                      </div>-->
                        <div class="col-md-5 mb-3">
                            <label for="data">Data</label>
                            <input type="date" class="form-control" id="data" name="data" placeholder="" required="on">
                            <div class="invalid-feedback">
                                É obrigatório inserir um CEP.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <!--            <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="mesmo-endereco">
                                  <label class="custom-control-label" for="mesmo-endereco">Endereço de entrega é o mesmo que o de cobrança.</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="salvar-info">
                                  <label class="custom-control-label" for="salvar-info">Lembrar desta informação, na próxima vez.</label>
                                </div>
                                <hr class="mb-4">-->
                    <h4 class="mb-3">Tipo</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="entrada" name="tipo" value="entrada" type="radio" class="custom-control-input"  checked required>
                            <label class="custom-control-label"  for="entrada">Entrada</label>
                        </div>
                        <!--              <div class="custom-control custom-radio">
                                          <input id="saida" name="tipo" value="saida"  type="radio" class="custom-control-input"  required>
                                        <label class="custom-control-label" for="saida">Saída</label>
                                      </div>-->
                        <!--              <div class="custom-control custom-radio">
                                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="paypal">PayPal</label>
                                      </div>-->
                    </div>     
                    <!--            <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="cc-nome">Nome no cartão</label>
                        <input type="text" class="form-control" id="cc-nome" placeholder="" required>
                        <small class="text-muted">Nome completo, como mostrado no cartão.</small>
                        <div class="invalid-feedback">
                          O nome que está no cartão é obrigatório.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="cc-numero">Número do cartão de crédito</label>
                        <input type="text" class="form-control" id="cc-numero" placeholder="" required>
                        <div class="invalid-feedback">
                          O número do cartão de crédito é obrigatório.
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 mb-3">
                        <label for="cc-expiracao">Data de expiração</label>
                        <input type="text" class="form-control" id="cc-expiracao" placeholder="" required>
                        <div class="invalid-feedback">
                          Data de expiração é obrigatória.
                        </div>
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                        <div class="invalid-feedback">
                          Código de segurança é obrigatório.
                        </div>
                      </div>
                    </div>-->
                    <!--    FIM CADASTRA VENDA-->
                    <hr class="mb-4">         
                    <button class="btn btn-primary btn-lg btn-block" name="btnvenda" type="submit">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>