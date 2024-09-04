<?php 

session_start();

class ContaBancaria {
    private $saldo;
    
    public function __construct() {
        $this -> saldo = isset($_SESSION ['saldo'])? $_SESSION['saldo']:0;
    }

    public function setSaldo($saldo) {
        $this -> saldo = $saldo;
        $_SESSION['saldo'] = $this->saldo;
    }

    public function getSaldo() {   
        return $this -> saldo;
    }

    public function sacar($quantidade) {
        if ($quantidade > 0 && $quantidade <= $this -> getSaldo()) {
            $this->setSaldo($this -> getSaldo() - $quantidade);
        } else {
            echo "Saldo Insuficiente para sacar. <br>";
        }
    }

    public function depositar($quantidade) {
        if ($quantidade > 0) {
            $saldoNovo = $this -> saldo + $quantidade;
            $this->setSaldo($saldoNovo);    
        }
    }
}
