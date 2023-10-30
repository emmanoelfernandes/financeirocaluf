<?php
// session_start();
//ob_start();
class VendaDAO{
    
    public function venda(Venda $venda) {
        try {
            $sql = " INSERT INTO mov (                   
                  dinheiro,debito,ticket,valortotal,valorTotalTudao,categoria,reposicao,picpay,descricao,tipo,data)
                  VALUES (
                 :dinheiro,:debito,:ticket,:valortotal,:valorTotalTudao,:categoria,:reposicao,:picpay,'x',:tipo,:data )";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":dinheiro", $venda->getDinheiro());
             $p_sql->bindValue(":debito", $venda->getDebito());
               $p_sql->bindValue(":ticket", $venda->getTicket());
               $p_sql->bindValue(":valortotal", $venda->getTotal());
               $p_sql->bindValue(":valorTotalTudao", $venda->getTudao());
                   $p_sql->bindValue(":categoria", $venda->getCat());
                 $p_sql->bindValue(":reposicao", $venda->getReposicao());
                   $p_sql->bindValue(":picpay", $venda->getPicpay());
//          $p_sql->bindValue(":descricao", $venda->getDesc());
                   $p_sql->bindValue(":tipo", $venda->getTipo());
                       $p_sql->bindValue(":data", $venda->getData());  
                                      $_SESSION['vendacad'] = "vendacad";
                       
                       
                       
                       
                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>"; 
//				<script type=\"text/javascript\">
//					alert(\"Venda do Dia Cadastrado com Sucesso.\");
//				</script>"; 
                  return $p_sql->execute();
           
        } catch (Exception $e) {
            print "Erro ao Inserir uma venda kkkk"
            . " <br>" . $e . '<br>';
        }    }
        
        
        
        
          public function venda2(Venda $venda) {
        try {
          
                        
                       
                       
                         $sql = " INSERT INTO mov (                   
                  dinheiro,debito,ticket,valortotal,valorTotalTudao,categoria,reposicao,picpay,descricao,tipo,data)
                  VALUES (
                 '0',:lucro,'0',:lucro,:lucro,'3','0','0','x','saida',:data )";
            $p_sql = Conexao::getConexao()->prepare($sql);
 //            $p_sql->bindValue(":dinheiro", $venda->getDinheiro());
             $p_sql->bindValue(":lucro", $venda->getPicpay());
    //            $p_sql->bindValue(":ticket", $venda->getTicket());
          //      $p_sql->bindValue(":lucro", $venda->getTotal());
           //     $p_sql->bindValue(":lucro", $venda->getTudao());
        //            $p_sql->bindValue(":categoria", $venda->getCat());
         //          $p_sql->bindValue(":reposicao", $venda->getReposicao());
    //                $p_sql->bindValue(":picpay", $venda->getPicpay());
//          $p_sql->bindValue(":descricao", $venda->getDesc());
             //        $p_sql->bindValue(":tipo", $venda->getTipo());
                       $p_sql->bindValue(":data", $venda->getData());                        
                       
                       
//                       echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>"; 
//				<script type=\"text/javascript\">
//					alert(\"Lucro Cadastrado com Sucesso. \");
//				</script>"; 
                  return $p_sql->execute();
           
        } catch (Exception $e) {
            print "Erro ao Inserir uma venda kkkk"
            . " <br>" . $e . '<br>';
        }    }        
        
        
        
        

    public function entradaGeral() {
        try {
                $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT SUM(valortotaltudao) as entradageral FROM mov WHERE tipo = 'entrada'"
                    . " AND MONTH(data) = $mes  && YEAR(data) = $ano ";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEntradaGeral($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    

    private function listaEntradaGeral($row) {
        $venda = new Venda();
        $venda->setTudao($row['entradageral']);
       

        return $venda;
    }
    
    
    
    
     public function totalvenda() {
        try { $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *,SUM(VALORTOTALTUDAO) as valortotal FROM mov WHERE categoria = '1' "
                  . " AND MONTH(data) = $mes  && YEAR(data) = $ano  GROUP BY tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEntrada($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
         public function totalvendaIfood() {
        try { $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *,SUM(VALORTOTALTUDAO) as valortotal FROM mov WHERE categoria = '9' "
                  . " AND MONTH(data) = $mes  && YEAR(data) = $ano  GROUP BY tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEntrada($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    

    private function listaEntrada($row) {
        $venda = new Venda();
        $venda->setTotal($row['valortotal']);
        $venda->setTipo($row['tipo']);

        return $venda;
    }
    
    
    
     public function saida() {
        try { $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT SUM(valortotal) as saida FROM mov WHERE tipo = 'saida'"
              . " AND MONTH(data) = $mes  && YEAR(data) = $ano ";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaSaida($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    

    private function listaSaida($row) {
        $venda = new Venda();
        $venda->setTsaida($row['saida']);
       

        return $venda;
    }
    
    
    
    public function dinheiro() {
        try { $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, SUM(dinheiro) as dinheiro FROM mov"
            . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listadinheiro($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listadinheiro($row) {
        $venda = new Venda();
            $venda->setTipo($row['tipo']);
            $venda->setDinheiro($row['dinheiro']);
       

        return $venda;
    }
     
 public function debito() {
        try {
             $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, SUM(debito) as debito FROM mov "
                 . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listadebito($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listadebito($row) {
        $venda = new Venda();
       $venda->setTipo($row['tipo']);
        $venda->setDebito($row['debito']);
          $venda->setCat($row['categoria']);
       

        return $venda;
    }
    
     
     public function ticket() {
        try { $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, SUM(ticket) as ticket FROM mov "
             . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaticket($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listaticket($row) {
        $venda = new Venda();
                 
         $venda->setTipo($row['tipo']);
            $venda->setTicket($row['ticket']);
       

        return $venda;
    }
    
    public function picpay() {
        try {
             $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, SUM(picpay) as picpay FROM mov WHERE tipo = 'entrada' "
                    . "AND MONTH(data) = $mes  && YEAR(data) = $ano    group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listapicpay($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listapicpay($row) {
        $venda = new Venda();
            $venda->setTipo($row['tipo']);
            $venda->setPicpay($row['picpay']);
       

        return $venda;
    }
    
    public function lucro() {
        try {
             $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, SUM(debito) as debito FROM mov "
                 . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by categoria";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listalucro($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listalucro($row) {
        $venda = new Venda();
       $venda->setTipo($row['tipo']);
        $venda->setDebito($row['debito']);
          $venda->setCat($row['categoria']);
       

        return $venda;
    }
    
    
    
    
    
//    ARQUIVO
    
      public function entradaGeralarq() {
        try {
                $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT SUM(valortotaltudao) as entradageral FROM mov WHERE tipo = 'entrada'"
                    . " AND MONTH(data) = $mes  && YEAR(data) = $ano ";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEntradaGeralarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    

    private function listaEntradaGeralarq($row) {
        $venda = new Venda();
        $venda->setTudao($row['entradageral']);
       

        return $venda;
    }
    
       public function saidaarq() {
        try { $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT SUM(valortotal) as saida FROM mov WHERE tipo = 'saida'"
              . " AND MONTH(data) = $mes  && YEAR(data) = $ano ";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaSaidaarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
    

    private function listaSaidaarq($row) {
        $venda = new Venda();
        $venda->setTsaida($row['saida']);
       

        return $venda;
    }
    
    
    
        public function totalvendaarq() {
        try {  $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *,SUM(VALORTOTALTUDAO) as valortotal FROM mov WHERE categoria = '1' "
                  . " AND MONTH(data) = $mes  && YEAR(data) = $ano  GROUP BY tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEntrada($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
     
         public function totalvendaIfoodarq() {
        try {  $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *,SUM(VALORTOTALTUDAO) as valortotal FROM mov WHERE categoria = '9' "
                  . " AND MONTH(data) = $mes  && YEAR(data) = $ano  GROUP BY tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaEntradaarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }
    

    private function listaEntradaarq($row) {
        $venda = new Venda();
        $venda->setTotal($row['valortotal']);
        $venda->setTipo($row['tipo']);

        return $venda;
    }
    
    
    
    
    
     public function dinheiroarq() {
        try {  $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *, SUM(dinheiro) as dinheiro FROM mov"
            . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listadinheiroarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listadinheiroarq($row) {
        $venda = new Venda();
            $venda->setTipo($row['tipo']);
            $venda->setDinheiro($row['dinheiro']);
       

        return $venda;
    }
     
 public function debitoarq() {
        try {
             $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *, SUM(debito) as debito FROM mov "
                 . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listadebitoarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listadebitoarq($row) {
        $venda = new Venda();
       $venda->setTipo($row['tipo']);
        $venda->setDebito($row['debito']);
          $venda->setCat($row['categoria']);
       

        return $venda;
    }
    
     
     public function ticketarq() {
        try {  $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *, SUM(ticket) as ticket FROM mov "
             . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaticketarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listaticketarq($row) {
        $venda = new Venda();
                 
         $venda->setTipo($row['tipo']);
            $venda->setTicket($row['ticket']);
       

        return $venda;
    }
    
    public function picpayarq() {
        try {
             $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *, SUM(picpay) as picpay FROM mov WHERE tipo = 'entrada' "
                    . "AND MONTH(data) = $mes  && YEAR(data) = $ano    group by tipo";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listapicpayarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listapicpayarq($row) {
        $venda = new Venda();
            $venda->setTipo($row['tipo']);
            $venda->setPicpay($row['picpay']);
       

        return $venda;
    }
    
    public function lucroarq() {
        try {
            $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $sql = "SELECT *, SUM(debito) as debito FROM mov "
                 . " WHERE MONTH(data) = $mes  && YEAR(data) = $ano group by categoria";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listalucroarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }    

    private function listalucroarq($row) {
        $venda = new Venda();
       $venda->setTipo($row['tipo']);
        $venda->setDebito($row['debito']);
          $venda->setCat($row['categoria']);
       

        return $venda;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
 }

 ?>