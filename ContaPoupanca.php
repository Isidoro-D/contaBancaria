<?php

require_once 'contaBancaria.php';

class ContaPoupanca extends ContaBancaria {

    private $taxaDeJuros;

    public function __construct($taxaDeJuros = 0.05) {
        parent::__construct();
        $this->taxaDeJuros = $taxaDeJuros;
    }
    public function aplicarJuros() {
        $juros = round($this->getSaldo() * $this->taxaDeJuros, 2);
        $this->depositar($juros);
        echo"Juros de $juros reais aplicados.<br>";
    }
    
}