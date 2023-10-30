<?php




class LoginDAO{
    
    public function validar(Login $login) {
      
            $query_usuario = "SELECT id, nome, email, senha from usuarios  WHERE email = :email and senha = :senha  LIMIT 1 ";
            $result_usuario = Conexao::getConexao()->prepare($query_usuario);
           $result_usuario->bindValue(':email', $login->getEmail());   
            $result_usuario->bindValue(':senha', $login->getSenha()); 
           $result_usuario->execute();
           
           if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
               $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);            
//            if(password_verify($login->getSenha(), $row_usuario['senha'])){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];     
                $_SESSION['senha'] = $row_usuario['senha'];
                $_SESSION['email'] = $row_usuario['email'];
//                header("Location: https://www.bet365.com/#/MB/");
                  $_SESSION['bemvindo'] = "bemvindo";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=home'>";
//				<script type=\"text/javascript\">
//					alert(\"Bem-Viiindoooo. ".$_SESSION['nome']."\");
//				</script>";
              } else {
                   $_SESSION['errologin'] = "errologin";
                  echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../index.php?p=errol'>";
                      
//				<script type=\"text/javascript\">
//					alert(\"Login ou Senha Invalido.\");
//				</script>"; 
            }
               
         
           
           
              
       
          
         
          
        
       
   
        }  }

