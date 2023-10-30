<?php

class Login{
    
    private $nome;
    private $senha;
    private $email;
    
     function getNome() {
        return $this->nome;
    }
    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }
    
      function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }


   
    }
    
