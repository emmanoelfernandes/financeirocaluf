
<?php

class PagamentoDAO{


public function cadfunc(Pagamento $pagamento) {
        try {
            $sql = "INSERT INTO funcionario (                   
                  nome)
                  VALUES (
                  :nome)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $pagamento->getNome());
                              $_SESSION['cadastradocomsucesso'] = "cadastradocomsucesso";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../?p=pagamento'>";
//				<script type=\"text/javascript\">
//					alert(\"Funcionário Cadastrado com Sucesso. \");
//				</script>";
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Funcionario <br>" . $e . '<br>';
        }
    }
    
    
    
   
public function pagarFunci(Pagamento $pagamento) {
        try {
            $sql = "INSERT INTO pagamento (                   
                  valor, data, id_func, cat)
                  VALUES (
                  :valor,  :data,  :id_func ,  'Funcionários')";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":data", $pagamento->getData());
               $p_sql->bindValue(":valor", $pagamento->getTotal());
                  $p_sql->bindValue(":id_func", $pagamento->getIdFunci());
           $_SESSION['cadastradocomsucesso'] = "cadastradocomsucesso";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../?p=home'>";
//				<script type=\"text/javascript\">
//					alert(\"Funcionário pago com sucesso. \");
//				</script>";
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Funcionario <br>" . $e . '<br>';
        }
    } 
    
    
public function read() {
        try {
             $mes = date("m");
            $ano = date("Y");
            
            $sql = "SELECT *, SUM(p.valor) as total FROM pagamento p INNER JOIN funcionario f "
                            . " ON p.id_func = f.id "
                    . "WHERE MONTH(p.data) = $mes  && YEAR(p.data) = $ano"
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                            . " GROUP BY p.id_func ORDER BY f.nome ASC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoFunci($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoFunci($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
        $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
            $funci->setIdFunci($row['id_func']);
        return $funci;
    }
    
    
    
    
    public function readDiaria() {
        try {
             $mes = date("m");
            $ano = date("Y");
            
            $sql = "SELECT *, SUM(p.valor) as total FROM pagamento p INNER JOIN funcionario f "
                            . " ON p.id_func = f.id "
                    . "WHERE MONTH(p.data) = $mes  && YEAR(p.data) = $ano "
                    . " &&   DATE_SUB(p.data, INTERVAL DAYOFWEEK(p.data)-1 DAY) = DATE_SUB(CURRENT_DATE, INTERVAL DAYOFWEEK(CURRENT_DATE)-1 DAY) "
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                            . " GROUP BY p.id_func ORDER BY f.nome ASC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoFunciDiaria($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoFunciDiaria($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
        $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
          $funci->setValor($row['valor']);
            $funci->setIdFunci($row['id_func']);
             $funci->setData($row['data']);
        return $funci;
    }
    
    
    
     public function diaria() {
        try {
             $mes = date("m");
            $ano = date("Y");
            
            $sql = "SELECT *, p.id as idDiaria FROM pagamento p INNER JOIN funcionario f "
                            . " ON p.id_func = f.id "
                    . "WHERE MONTH(p.data) = $mes  && YEAR(p.data) = $ano "
                    . " &&   DATE_SUB(p.data, INTERVAL DAYOFWEEK(p.data)-1 DAY) = DATE_SUB(CURRENT_DATE, INTERVAL DAYOFWEEK(CURRENT_DATE)-1 DAY) "
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                            . "  ORDER BY p.data ASC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoDiaria($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoDiaria($row) {
        $funci = new Pagamento();
        $funci->setId($row['idDiaria']);
        $funci->setNome($row['nome']);
//         $funci->setTotal($row['total']);
          $funci->setValor($row['valor']);
           $funci->setIdFunci($row['id_func']);
             $funci->setData($row['data']);
        return $funci;
    }
    
    
    
    public function readPicpay() {
        try {
               $mes = date("m");
            $ano = date("Y");
            $sql = "SELECT *, SUM(valor) as total FROM pagamento "
                    . "WHERE MONTH(data) = $mes  && YEAR(data) = $ano  && id_func <= 5 "
//                            . " ON p.id_func = f.id"
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                          . " GROUP BY data ASC"
                    ;
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoFunciPic($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoFunciPic($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
//        $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
            $funci->setIdFunci($row['id_func']);
               $funci->setData($row['data']);
                 $funci->setCat($row['cat']);
        return $funci;
    }
    
    
    
    
    
       public function readColaborador() {
        try {
            $sql = "SELECT * FROM funcionario "
//                            . " ON p.id_func = f.id"
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                          . " GROUP BY nome ASC"
                    ;
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->func($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function func($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
       $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
            $funci->setIdFunci($row['id_func']);
               $funci->setData($row['data']);
                 $funci->setCat($row['cat']);
        return $funci;
    }
    
//    ARQUIVO
        
public function readarq() {
        try {
             $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            
            $sql = "SELECT *, SUM(p.valor) as total FROM pagamento p INNER JOIN funcionario f "
                            . " ON p.id_func = f.id "
                    . "WHERE MONTH(p.data) = $mes  && YEAR(p.data) = $ano"
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                            . " GROUP BY p.id_func ORDER BY f.nome ASC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoFunciarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoFunciarq($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
        $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
            $funci->setIdFunci($row['id_func']);
        return $funci;
    }
 

 public function readDiariaarq() {
        try {
             $mes = $_GET['mes'];
            $ano =  $_GET['ano'];
            
            $sql = "SELECT *, SUM(p.valor) as total FROM pagamento p INNER JOIN funcionario f "
                            . " ON p.id_func = f.id "
                    . "WHERE MONTH(p.data) = $mes  && YEAR(p.data) = $ano "
                    . " &&   DATE_SUB(p.data, INTERVAL DAYOFWEEK(p.data)-1 DAY) = DATE_SUB(CURRENT_DATE, INTERVAL DAYOFWEEK(CURRENT_DATE)-1 DAY) "
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                            . " GROUP BY p.id_func ORDER BY f.nome ASC";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoFunciDiariaarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoFunciDiariaarq($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
        $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
            $funci->setIdFunci($row['id_func']);
        return $funci;
    }
    
    public function readPicpayarq() {
        try {
                  $mes = $_GET['mes'];
            $ano =  $_GET['ano'];
            $sql = "SELECT *, SUM(valor) as total FROM pagamento "
                    . "WHERE MONTH(data) = $mes  && YEAR(data) = $ano  && id_func <= 5 "
//                            . " ON p.id_func = f.id"
//                            . " WHERE c.categoria_id = $cat1 AND p.produto_ativo = 1"
                          . " GROUP BY data ASC"
                    ;
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicoFunciPicarq($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicoFunciPicarq($row) {
        $funci = new Pagamento();
        $funci->setId($row['id']);
//        $funci->setNome($row['nome']);
         $funci->setTotal($row['total']);
            $funci->setIdFunci($row['id_func']);
               $funci->setData($row['data']);
                 $funci->setCat($row['cat']);
        return $funci;
    }
    
    
     public function deletaDiaria(Pagamento $pagamento) {
        try {
            $sql = "DELETE FROM pagamento WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $pagamento->getId());
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
    
    
    
    
}