
<!--<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css
" rel="stylesheet">-->

<?php 
/*
    Criação da classe Usuario com o CRUD
*/
class MovDAO{
    public function mov(Mov $mov) {
        try {
//        if($mov->getCat() == '3'){
//            $sql = " INSERT INTO pagamento (                   
//                  valor,data,id_func, cat)
//                  VALUES (
//                 :debito,:data,'5','Lucro' )";
//            $p_sql = Conexao::getConexao()->prepare($sql);     
//             $p_sql->bindValue(":debito", $mov->getDebito());
           
////          $p_sql->bindValue(":descricao", $venda->getDesc());
//                
//                       $p_sql->bindValue(":data", $mov->getData());  
//                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>
//				<script type=\"text/javascript\">
//					alert(\"Cadstrado a movimentação. ".@$_SESSION['nome']."\");
//				</script>"; 
//                  return $p_sql->execute();
//           
//        }
        
       
//        else{
            
             $sql = " INSERT INTO mov (                   
                  dinheiro,debito,ticket,valortotal,valorTotalTudao,categoria,reposicao,picpay,descricao,tipo,data)
                  VALUES (
                 :dinheiro,:debito,:ticket,:valortotal,:valorTotalTudao,:categoria,:reposicao,:picpay,'x',:tipo,:data )";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":dinheiro", $mov->getDinheiro());
             $p_sql->bindValue(":debito", $mov->getDebito());
               $p_sql->bindValue(":ticket", $mov->getTicket());
               $p_sql->bindValue(":valortotal", $mov->getTotal());
               $p_sql->bindValue(":valorTotalTudao", $mov->getTudao());
                   $p_sql->bindValue(":categoria", $mov->getCat());
                 $p_sql->bindValue(":reposicao", $mov->getReposicao());
                   $p_sql->bindValue(":picpay", $mov->getPicpay());
//          $p_sql->bindValue(":descricao", $venda->getDesc());
                   $p_sql->bindValue(":tipo", $mov->getTipo());
                       $p_sql->bindValue(":data", $mov->getData());
                            $_SESSION['cadastradocomsucessomov'] = "cadastradocomsucessomov";
                             echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=movimentacao'>";
//                       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
//  <strong>Oloco, meu!</strong> Olha esse alerta animado, como é chique!
//  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//    <span aria-hidden='true'>&times;</span>
//  </button>
//</div>";                       
   
                  return $p_sql->execute();             
            //      <script type=\"text/javascript\">
		   //  			alert(\"Cadstrado a movimentação. \");
		   //  		</script>  }
                
        } catch (Exception $e) {
            print "Erro ao Inserir uma venda kkkk"
            . " <br>" . $e . '<br>';
        }      
        }       
            public function exchanger(Mov $mov) {
        try {
            
             $sql = " INSERT INTO mov (                   
                  dinheiro,debito,ticket,valortotal,valorTotalTudao,categoria,reposicao,picpay,descricao,tipo,data)
                  VALUES (
                 :dinheiro,:debito,:ticket,:valortotal,:valorTotalTudao,:categoria,:reposicao,:picpay,'x',:tipo,:data )";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":dinheiro", $mov->getDinheiro());
             $p_sql->bindValue(":debito", $mov->getDebito());
               $p_sql->bindValue(":ticket", $mov->getTicket());
               $p_sql->bindValue(":valortotal", $mov->getTotal());
               $p_sql->bindValue(":valorTotalTudao", $mov->getTudao());
                   $p_sql->bindValue(":categoria", $mov->getCat());
                 $p_sql->bindValue(":reposicao", $mov->getReposicao());
                   $p_sql->bindValue(":picpay", $mov->getPicpay());
//          $p_sql->bindValue(":descricao", $venda->getDesc());
                   $p_sql->bindValue(":tipo", $mov->getTipo());
                       $p_sql->bindValue(":data", $mov->getData());  
                        $_SESSION['cadastradocomsucesso'] = "cadastradocomsucesso";
                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=exchange'>"; 
//				<script type=\"text/javascript\">
//					alert(\"Cadstrado a exchanger. \");
//				</script>
                  return $p_sql->execute();             
                   
        } catch (Exception $e) {
            print "Erro ao Inserir uma venda kkkk"
            . " <br>" . $e . '<br>';
        }     
        
        }
        
        
        
        
        
        

    public function read() {
        try {
            $sql = "SELECT * FROM usuario order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaUsuarios($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    public function update(Usuario $usuario) {
        try {
            $sql = "UPDATE usuario set
                
                  nome=:nome,
                  sobrenome=:sobrenome,
                  idade=:idade,
                  sexo=:sexo                  
                                                                       
                  WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $p_sql->bindValue(":idade", $usuario->getIdade());
            $p_sql->bindValue(":sexo", $usuario->getSexo());
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar fazer Update<br> $e <br>";
        }
    }

    public function delete(Usuario $usuario) {
        try {
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
        }
    }


    

    private function listaUsuarios($row) {
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNome($row['nome']);
        $usuario->setSobrenome($row['sobrenome']);
        $usuario->setIdade($row['idade']);
        $usuario->setSexo($row['sexo']);

        return $usuario;
    }
    
    
    
    public function movimentacao() {
        try {
                $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, (m.id) as idmov  FROM mov m INNER JOIN categoria c"
                            . " ON m.categoria = c.id "
                . "WHERE MONTH(m.data) = $mes  && YEAR(m.data) = $ano "
//                    . "INNER JOIN pagamento p"
//               . " ON m.categoria = p.id_func " 
//                        . " WHERE p.cat = '3'"
//                    . " GROUP BY m.id"
                    . " ORDER BY  m.data DESC,  idmov DESC ";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listMov($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    private function listMov($row) {
        $movimentacao = new Mov();
         
        
        $movimentacao->setId($row['idmov']);

$movimentacao->setNome($row['nome']);
$movimentacao->setTotal($row['valorTotalTudao']);
$movimentacao->setData($row['data']);
$movimentacao->setTipo($row['tipo']);
$movimentacao->setCat($row['categoria']);


$movimentacao->setDinheiro($row['dinheiro']);
$movimentacao->setDebito($row['debito']);
$movimentacao->setTicket($row['ticket']);
        return $movimentacao;
    }

 
 
 
 
 
 
   public function sair () {
 
  //  header("Location: ?p=login");
        @$_SESSION['deslogando'] = "deslogando";
      echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=deslogado'>"; 
//				<script type=\"text/javascript\">
//					alert(\"Deslogado... \");
//				</script>"; 
       
    
      unset($_SESSION['id']);
      session_destroy();
      
      
       }

       
         public function deletarmov45(Mov $mov) {
        try {
            $sql = "DELETE FROM mov WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $mov->getId());
          $_SESSION['deletado'] = "deletado";
             echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>"; 
//				<script type=\"text/javascript\">
//					alert(\"Movimentação excluída com sucesso... \");
//				</script>"; 
               return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
            
                 echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>
				<script type=\"text/javascript\">
					alert(\"Errooo. \");
				</script>"; 
        }
    }
       
      public function movalt(Mov $mov) {
                try {
     $sql = "UPDATE  mov SET                   
                  dinheiro = :dinheiro,
                  debito = :debito, 
                  ticket = :ticket,
                  valorTotal = :valorTotal,
                  valorTotalTudao = :valorTotalTudao,
                 categoria = :categoria,
                 reposicao = :reposicao,
                 picpay = :picpay,
                  descricao = :descricao,
                  tipo = :tipo,
                  data = :data
                  
                  WHERE  id = :id";
   //     $s = 0;
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":dinheiro", $mov->getDinheiro());
             $p_sql->bindValue(":debito", $mov->getDebito());
               $p_sql->bindValue(":ticket", $mov->getTicket());
                $p_sql->bindValue(":valorTotal", $mov->getTotal());    
                $p_sql->bindValue(":valorTotalTudao", $mov->getTudao());
                $p_sql->bindValue(":categoria", $mov->getCat());
                $p_sql->bindValue(":reposicao", $mov->getReposicao());
                  $p_sql->bindValue(":picpay", $mov->getPicpay());
                 $p_sql->bindValue(":descricao", $mov->getDesc());
                   $p_sql->bindValue(":tipo", $mov->getTipo());
                      $p_sql->bindValue(":data", $mov->getData());
                       
                        $p_sql->bindValue(":id", $mov->getId());
                        
                        
                            $_SESSION['moveditado'] = "moveditado";
                             echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>";
//                       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
//  <strong>Oloco, meu!</strong> Olha esse alerta animado, como é chique!
//  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
//    <span aria-hidden='true'>&times;</span>
//  </button>
//</div>";                       
   
                  return $p_sql->execute();             
            //      <script type=\"text/javascript\">
		   //  			alert(\"Cadstrado a movimentação. \");
		   //  		</script>  }
                
        } catch (Exception $e) {
            echo "Erro ao Excluir usuario<br> $e <br>";
            
                 echo "<meta HTTP-EQUIV='refresh' CONTENT='20;URL=../index.php?p=home'>
				<script type=\"text/javascript\">
					alert(\"Errooo.  $e \");
				</script>"; 
        }  } 
            
         
       
       
         public function arquivo() {
        try {
//                $mes = date("m");
//            $ano = date("Y");
            $sql = "SELECT *, MONTH(data) as 'mes', YEAR(data) as 'ano'  FROM mov "
                                    . " GROUP BY  mes "
                                    . " ORDER BY    ano DESC, mes DESC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaArquivo($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    private function listaArquivo($row) {
        $movimentacao = new Mov();
  
$movimentacao->setAno($row['ano']);
$movimentacao->setMes($row['mes']);

        return $movimentacao;
    }
       
     
    
    
        public function movimentacaoArq() {
        try {
            $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *, (m.id) as idmov  FROM mov m INNER JOIN categoria c"
                            . " ON m.categoria = c.id "
                . "WHERE MONTH(m.data) = $mes  && YEAR(m.data) = $ano "
//                    . "INNER JOIN pagamento p"
//               . " ON m.categoria = p.id_func " 
//                        . " WHERE p.cat = '3'"
//                    . " GROUP BY m.id"
                    . " ORDER BY  m.data DESC,  idmov DESC ";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listMovArq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    private function listMovArq($row) {
        $movimentacao = new Mov();
         
        
        $movimentacao->setId($row['idmov']);

$movimentacao->setNome($row['nome']);
$movimentacao->setTotal($row['valorTotalTudao']);
$movimentacao->setData($row['data']);
$movimentacao->setTipo($row['tipo']);
$movimentacao->setCat($row['categoria']);


$movimentacao->setDinheiro($row['dinheiro']);
$movimentacao->setDebito($row['debito']);
$movimentacao->setTicket($row['ticket']);
        return $movimentacao;
    }
       
       
        }

 ?>