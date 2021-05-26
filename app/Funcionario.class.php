<?php

abstract class Funcionario implements JsonSerializable {
    protected $matricula;
    protected $nome;
    protected $cpf;
    protected $salario;

    public function __construct(
        string $matricula,
        string $nome,
        string $cpf,
        Float  $salario)
    {
        $this->matricula = $matricula;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula(string $matricula) {
        $this->matricula = $matricula;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function setCPF(string $cpf) {
        // Validar o CPF
        $this->cpf = $cpf;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setSalario(float $slr) {
        $this->salario = $slr;
    }

    abstract public function jsonSerialize();
}