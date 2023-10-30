<?php


class Venda{
    
    private $dinheiro;
    private $debito;
    private $ticket;
    private $total;
    private $cat;
    private $reposicao;
    private $picpay;
    private $desc;
    private $tipo;
    private $tentrada;
    private $tsaida;
    private $data;
      private $tudao;

        function getTudao() {
            return $this->tudao;
        }

        function setTudao($tudao) {
            $this->tudao = $tudao;
        }

    function getDinheiro() {
        return $this->dinheiro;
    }

    function getDebito() {
        return $this->debito;
    }

    function getTicket() {
        return $this->ticket;
    }

    function getTotal() {
        return $this->total;
    }

    function getCat() {
        return $this->cat;
    }

    function getReposicao() {
        return $this->reposicao;
    }

    function getPicpay() {
        return $this->picpay;
    }

    function getDesc() {
        return $this->desc;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getTentrada() {
        return $this->tentrada;
    }

    function getTsaida() {
        return $this->tsaida;
    }

    function getData() {
        return $this->data;
    }

    function setDinheiro($dinheiro) {
        $this->dinheiro = $dinheiro;
    }

    function setDebito($debito) {
        $this->debito = $debito;
    }

    function setTicket($ticket) {
        $this->ticket = $ticket;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setCat($cat) {
        $this->cat = $cat;
    }

    function setReposicao($reposicao) {
        $this->reposicao = $reposicao;
    }

    function setPicpay($picpay) {
        $this->picpay = $picpay;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTentrada($tentrada) {
        $this->tentrada = $tentrada;
    }

    function setTsaida($tsaida) {
        $this->tsaida = $tsaida;
    }

    function setData($data) {
        $this->data = $data;
    }


    }