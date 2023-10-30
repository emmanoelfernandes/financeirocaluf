<?php

class CategoriaDAO{


public function cadcat(Categoria $categoria) {
        try {
            $sql = "INSERT INTO categoria (                   
                  nome)
                  VALUES (
                  :nome)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $categoria->getNome());
        
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=movimentacao'>
				<script type=\"text/javascript\">
					alert(\"Categoria Cadastrada com Sucesso. \");
				</script>";
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Categoria <br>" . $e . '<br>';
        }
    }
    
    
    
    
    
    
public function read() {
        try {
            $sql = "SELECT * FROM categoria order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->UnicaCat($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar Buscar Todos." . $e;
        }
    }

 private function UnicaCat($row) {
        $categoria = new Categoria();
        $categoria->setId($row['id']);
        $categoria->setNome($row['nome']);
        
        return $categoria;
    }
 }
 
