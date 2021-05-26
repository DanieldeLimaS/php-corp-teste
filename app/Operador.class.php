<?php
require_once "Funcionario.class.php";

class Operador extends Funcionario {
    private $codFuncao;

    
    public function __construct(
        string $matricula,
        string $nome,
        string $cpf,
        float  $salario,
        string $codFunc
    )
    {
        parent::__construct($matricula, $nome, $cpf, $salario);
        $this->codFuncao = $codFunc;
    }

    public function getCodFuncao() {
        return $this->codFuncao;
    }

    public function setCodFuncao(string $codFunc) {
        $this->codFuncao = $codFunc;
    }

    public function jsonSerialize() {
        return [
            'matricula' => $this->matricula,
            'nome' => $this->nome,
            'CPF' => $this->cpf,
            'salario' => $this->salario,
            'funcao' => $this->codFuncao
        ];
    }
}