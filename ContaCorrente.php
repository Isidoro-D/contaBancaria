<?php

include_once 'ContaBancaria.php';

class ContaCorrente extends ContaBancaria {
    private $limite;

    public function __construct($limite = 500) {
        parent::__construct();
        $this->limite = isset($_SESSION['limite']) ? $_SESSION['limite']:$limite;
    }

    public function getLimite()
    {
        return $this->limite;
    }

    public function setLimite($limite)
    {
        $this->limite = $limite;
        $_SESSION['limite'] = $this->limite;
    }

    public function sacar($quantidade)
    {
        $saldoDisponivel = $this->getSaldo() + $this->limite;
        if ($quantidade > 0 && $quantidade <= $saldoDisponivel) {
            if ($quantidade > $this->getSaldo()) {
                //calcula a quantidade do limite que será usado
                $valorUsadoDoLimite = $quantidade - $this->getSaldo();
                //subtrair do limite o valor
                $this->setLimite($this->limite - $valorUsadoDoLimite);
                $this->setsaldo(0);
                echo "Saque de R$: $quantidade reais realizado utilizando R$= $valorUsadoDoLimite do limite.<br>";
                echo "limite restante: " . number_format($this->limite, 2, ",", ".") . "<br>";
            } else {
                //se a quantidade estiver dentro do limite
                $this->setSaldo($this->getSaldo() - $quantidade);
                echo "Saque de R$$quantidade reias realizado.<br>";
            }
        } else {
            echo "Saldo e Limite insuficiente para saque.<br>";
        }
    }
}