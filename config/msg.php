
 <?php 
      if(isset(     $_SESSION['cadastradocomsucesso']) ){
          ?>
      <div class="flash-data" data-flashdata="<?php echo      @$_SESSION['cadastradocomsucesso'] ?>"> </div>          
        <?php         
            unset($_SESSION['cadastradocomsucesso']);
      } ?>      
               <script>                   
                          
//                    $('#butao').on('click', function(){                 
//        Swal.fire('SweetAlert2 is working!')
//                 })
                     
           
                   
//                  const flashdata = $('.flash-data').data('flashdata')
//              if(flashdata){            
//                  Swal.fire({
//                      type : 'Sucesso!',
//                      title : 'Deletar Movimentação!',
//                      text : 'Foi deletado com Sucesso!'
//                  })
                     
                     
                  const flashdata = $('.flash-data').data('flashdata')
              if(flashdata){            
                  Swal.fire('Cadastrado com Sucesso!')    
                     
    }
                </script>
                
                
                
                
<!--<button id="butao" class="btn">click</button>

      $('#butao').on('click', function(){                 
        Swal.fire('SweetAlert2 is working!')
               })-->
               
  <?php       if(isset($_GET['p']) && ($_GET['p'] == "deslogado") ){          ?>
      <div class="flash-datad" data-flashdatad="<?php echo      @$_GET['p'] ?>"> </div>          
       <?php       } ?>      
               <script>                 
                          
                  const deslogado = $('.flash-datad').data('flashdatad')
              if(deslogado){            
                  Swal.fire('Deslogando.....!')                         
    }
    
    
                </script>
                <!--FIM ALERTAS-->
                
      
                
                                          
  <?php       if(isset($_SESSION['cadastradocomsucessomov']) ){          ?>
      <div class="cadastradocomsucessomov" data-cadastradocomsucessomov="<?php echo $_SESSION['cadastradocomsucessomov']?>"> </div>          
       <?php     unset($_SESSION['cadastradocomsucessomov']);     } ?>      
               <script>                 
                          
                  const cadastradocomsucessomov = $('.cadastradocomsucessomov').data('cadastradocomsucessomov')
              if(cadastradocomsucessomov){            
                  Swal.fire('Movimentação Cadastrado com Sucesso!')                         
    }
    
    
                </script>
                
                
                <!--FIM ALERTAS-->
                
                             
  <?php       if(isset($_SESSION['bemvindo']) ){          ?>
      <div class="flash-datab" data-flashdatab="<?php echo $_SESSION['bemvindo']?>"> </div>          
       <?php     unset($_SESSION['bemvindo']);     } ?>      
               <script>                 
                          
                  const bemvindo = $('.flash-datab').data('flashdatab')
              if(bemvindo){            
                  Swal.fire('Bem-Vido! <?= $_SESSION['nome']?>')                         
    }
    
    
                </script>
                
                
                <!--FIM ALERTAS-->
                
                
             <?php       if(isset($_GET['p']) && ($_GET['p'] == "errol") ){          ?>
      <div class="flash-dataerrol" data-flashdata="<?php echo      @$_GET['p'] ?>"> </div>          
       <?php       } ?>      
               <script>                 
                          
                  const errol = $('.flash-dataerrol').data('flashdata')
              if(errol){            
                  Swal.fire('Login ou Senha estão errados!')                         
    }
    
    
                </script>
                <!--FIM ALERTAS-->
                
                
                                           
  <?php       if(isset($_SESSION['errologin']) ){          ?>
      <div class="errologin" data-errologin="<?php echo $_SESSION['errologin']?>"> </div>          
       <?php     unset($_SESSION['errologin']);     } ?>      
               <script>                 
                          
                  const errologin = $('.errologin').data('errologin')
              if(errologin){            
                  Swal.fire('Erro no login ou senha!')                         
    }
    
    
                </script>
                
                
                 <?php    
            
                 if(!isset($_SESSION['nome']) &&  ($_GET['p'] == "login")){          ?>
      <div class="fazerlogin" data-fazerlogin="<?php echo @$_GET['p'] == "login"?>"> </div>          
       <?php         } ?>      
               <script>                 
                          
                  const fazerlogin = $('.fazerlogin').data('fazerlogin')
              if(fazerlogin){            
                  Swal.fire('Faça login para entrar no sistema!')                         
    }
    
    
                </script>
             
                
                 
                 <?php       if(isset($_SESSION['vendacad'])){          ?>
      <div class="vendacad" data-vendacad="<?php echo $_SESSION['vendacad']?>"> </div>          
       <?php       unset($_SESSION['vendacad']);    } ?>      
               <script>                 
                          
                  const vendacad = $('.vendacad').data('vendacad')
              if(vendacad){            
                  Swal.fire('Venda e Lucro cadastrado com sucesso!')                         
    }
    
    
                </script>
                
                
                
                
                
    
                <script>
//        $('.del-btn').on('click',function(e){
//            e.preventDefault();
//            const href = $(this).attr('href') 
//            Swal.fire({
//                title: 'Tem Certeza que quer deletar?',
//                text: "Não haverá volta!",
//                icon: 'Aviso',
//                showCancelButton: true,
//                confirmButtonColor: '#3085d6',
//                cancelButtonColor: '#d33',
//                confirmButtonText: 'Sim, Tenho Certeza!'
//                }).then((result) => {
//                    if (result.value) {
//                        document.location.href = href;
//                        
//                    }
//                })
//         })
//
//         const flashdata = $('.flash-data').data('flashdata')
//         if(flashdata){
//             swal.fire({
//                 type : 'success',
//                 title : 'Record Deleted',
//                 text : 'Record has been deleted'
//             })
//         }
    </script>
    
    
     <?php       if(isset($_SESSION['deletado'])){          ?>
    <div class="deletado"  data-deletado="<?php echo $_SESSION['deletado']?>"> </div>          
       <?php       unset($_SESSION['deletado']);    } ?>  
                                          <script>
     

        const deletado = $('.deletado').data('deletado')
         if(deletado){
             swal.fire({
                 type : 'Sucesso',
                title : 'Deletado',
                 text : 'Deletado com Sucesso'
            })
        }
    </script>
    
    
    
          <?php       if(isset($_SESSION['moveditado'])){          ?>
      <div class="moveditado" data-moveditado="<?php echo $_SESSION['moveditado']?>"> </div>          
       <?php       unset($_SESSION['moveditado']);    } ?>      
               <script>                 
                          
                  const moveditado = $('.moveditado').data('moveditado')
              if(moveditado){            
                  Swal.fire('Editado com sucesso!')                         
    }
    
    
                </script>