
<!doctype html>


  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
<!--        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
        <h2>Diárias do Entregador (Semanal)</h2>
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
                <input type="text" class="form-control" id="sobrenome" placeholder="" value="30" name="valor" onkeypress="$(this).mask('R$ 999.990,00', {reverse: true});"  required readonly="">
                <div class="invalid-feedback">
                  É obrigatório inserir um sobre nome válido.
                </div>
              </div>
            </div>


            <div class="row">
<!--              <div class="col-md-5 mb-3">
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
              </div>-->
                
                
              <div class="col-md-4 mb-3">
                <label for="estado">Funcionário</label>
                <select class="custom-select d-block w-100"  id="estado" name="idfunci" required>
                  <option value="6">Entregador Diária</option>
                                </select>
                <div class="invalid-feedback">
                  Por favor, insira um estado válido.
                </div>
              </div>
             
            </div>
        
          <div class="row">
 <div class="col-md-3 mb-3">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" placeholder="" required>
                <div class="invalid-feedback">
                  É obrigatório inserir um CEP.
                </div>
              </div>   </div>
          
         
      
            <button class="btn btn-primary btn-lg btn-block" name="btnpag" type="submit">Gravar</button>
          </form>
     
      <hr class="mb-4">
      
      
      
      
     <div class="table-responsive">
  <table class="table">
   <caption>Frequência nesta semana</caption>
  <thead>
    <tr>
      <th scope="col">Dia</th>
      <th scope="col">Valor</th>
      
    </tr>
  </thead>
  <tbody>
       
      
            <?php foreach ($pagamentodao->diaria() as $diaria) : ?>      
        <tr>  
               <?php     if ($diaria->getIdFunci() == "6") {    
                    @$diarias += $diaria->getValor();
                   ?>
      <th scope="row"><?=  ucfirst(utf8_encode(strftime('%A', strtotime($diaria->getData()))));  ?></th>
      <td><?=  $diaria->getValor() ?> </td>
    <td><a href="./controller/PagamentoController.php?idDiaria=<?= $diaria->getId() ?>" name="btndeldi"  class='del-btn btn btn-outline-danger btn-sm' style="text-decoration: none">Deletar</a></td>

      
      
       <?php    } ?>
     
    </tr>
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
  <tr>
     <?php   ?>
                   <?php    endforeach ?>  
      <th scope="row" colspan="">Total  <?=  @$diarias ?></th>
     
    
    </tr
  </tbody>
  </table>
</div>
        </div>
  
