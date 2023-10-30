<?php


class Pagamento{
    
    private $id;
    private $nome;
        private $total;
        private $cat;
          private $data;
                private $valor;
                function getValor() {
                    return $this->valor;
                }

                function setValor($valor) {
                    $this->valor = $valor;
                }

                          function getData() {
              return $this->data;
          }

          function setData($data) {
              $this->data = $data;
          }

                  
        function getCat() {
            return $this->cat;
        }

        function setCat($cat) {
            $this->cat = $cat;
        }

                function getIdFunci() {
            return $this->idFunci;
        }

        function setIdFunci($idFunci) {
            $this->idFunci = $idFunci;
        }

          
        function getTotal() {
            return $this->total;
        }

        function setTotal($total) {
            $this->total = $total;
        }

            function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    }