<?php session_start(); ?>
<?php
include_once "../config/Conexao.php";
include_once "../dao/CategoriaDAO.php";
include_once "../model/Categoria.php";
  


$categoria = new Categoria();
$categoriaDAO = new CategoriaDAO();

    
    $dados = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição COMPRAAAAA update2
if(isset($_REQUEST['cadcat'])){
       
        $categoria->setNome($dados['nome']); 
         
      
   

    $categoriaDAO->cadcat($categoria);
//              header("https://mail.google.com/mail/u/0/#inbox");
//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php?p=finalizar'>";
}
    

