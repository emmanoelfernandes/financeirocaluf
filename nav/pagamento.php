
<!doctype html>


  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
<!--        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
        <h2>Pagamento</h2>
<!--        <p class="lead">Abaixo temos um exemplo de formulário construído com controles de formulário Bootstrap. Cada campo obrigatório possui um estado de validação que é ativado quando tenta-se enviar o formulário sem completá-lo.</p>-->
      </div>

   
<button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#cad" > Nova Funcionário
                                </button>
<!--    INICIO MODAL-->
         <div class="modal fade" id="cad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Funcionário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./controller/PagamentoController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="" class="form-control" required />
                                                </div>
                                               
                                            </div>
                                         
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="" />
                                                    <button class="btn btn-primary" type="submit" name="cadfunc">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

      

 <div class="row">
      <form action="./controller/PagamentoController.php" method="POST">
                <div class="col-md-10 mb-3">
                <label for="sobrenome">Valor</label>
                <input type="text" class="form-control" id="sobrenome" placeholder="" name="valor" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required>
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="categoria">Colaborador</label>
                <select class="custom-select d-block w-100" id="categoria" name="idfunci" required>
                 <option value="">Escolha...</option>
                    <?php foreach ($pagamentodao->readColaborador() as $colaborador) : ?>
                    
                  <option value="<?= $colaborador->getId() ?>" ><?= $colaborador->getNome() ?></option>
                   <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                  Por favor, escolha um país válido.
                </div>
              </div>
                
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
             
            </div>
        
          <div class="row">
 <div class="col-md-3 mb-3">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" placeholder="" required>
                <div class="invalid-feedback">
                  É obrigatório inserir um CEP.
                </div>
              </div>   </div>
            <hr class="mb-4">
         
      
            <button class="btn btn-primary btn-lg btn-block" name="btnpag" type="submit">Gravar</button>
          </form>
        </div>
      </div>
