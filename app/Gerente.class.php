<?php
require_once "funcionario.class.php";

  class Gerente extends Funcionario {
    private $codDepartamento;
    private $bonusGerencia;

    public function __construct(
        String $matricula,
        String $nome,
        String $cpf,
        Float $salario,  
        String $cdg,
        Float $bns
    )
    {
        parent::__construct($matricula, $nome, $cpf, $salario);
        $this->codDepartamento = $cdg;
        $this->bonusGerencia = $bns;
    }

    public function getCodDepartamento() {
        return $this->codDepartamento;
    }

    public function setCodDepartamento(String $cdg) {
        $this->codDepartamento = $cdg;
    }

    public function getBonusGerencia() {
        return $this->bonusGerencia;
    }

    public function setBonusGerencia(Float $bns) {
        $this->bonusGerencia = $bns;
    }


      public function jsonSerialize() {
        return [
            'matricula' => $this->matricula,
            'nome' => $this->nome,
            'CPF' => $this->cpf,
            'salario' => $this->salario,
            'codDepartamento' => $this->codDepartamento,
            'bonusGerencia' => $this->bonusGerencia
        ];
    }
}