<?php
require_once "Operador.class.php";
require_once "Gerente.class.php";
require_once "helper.lib.php";

class Application {
  private $listaGerentes = [];
  private $listaOperadores = [];
  private $listaFuncoes = [1 => 'Técnico Eletricista', 2 => 'Técnico Mecânico'];
  private $listaDepartamentos = [1 => 'Recursos Humanos', 2 => 'Suporte', 3 => 'Marketing', 4 => 'Inteligencia em Negocios'];
  private $appName = "PHP Corporate Manager";

  public function __construct() {
    $this->carregaListas();
  }

  public function getAppName() {
    return $this->appName;
  }

  public function addGerente(Funcionario $grt) {
    array_push($this->listaGerentes, $grt);
  }

  public function addOperador(Funcionario $opr) {
    array_push($this->listaOperadores, $opr);
  }

  public function getListaGerentes() {
    return $this->listaGerentes;
  }

  public function getListaOperadores() {
    return $this->listaOperadores;
  }

  public function mostraTelaHome() {

  }

  public function mostraTelaCadastro() {

  }

  public function mostraTelaConsulta(string $categoria) {
    switch($categoria) {
      case "operadores":
        $operadores = $this->getListaOperadores();
        foreach($operadores as $op) {
          echo "<div class=\"item-lista\">\n";
          echo "<p>\n";
          echo "<span>" . $op->getMatricula() . "</span>\n";
          echo "<span>" . $op->getNome() . "</span>\n";
          echo "<span>" . formataCPF($op->getCPF()) . "</span>\n";
          echo "<span>R$ " . number_format($op->getSalario(), 2) . "</span>\n";
          echo "<span>" . $this->listaFuncoes[$op->getCodFuncao()] . "</span>\n";
          echo "</p>\n";
          echo "</div>\n";
        }
        break;
      case "gerentes":
        $gerentes = $this->getListaGerentes();
        foreach($gerentes as $ge) {
          echo "<div class=\"item-lista\">\n";
          echo "<p>\n";
          echo "<span>" . $ge->getMatricula() . "</span>\n";
          echo "<span>" . $ge->getNome() . "</span>\n";
          echo "<span>" . formataCPF($ge->getCPF()) . "</span>\n";
          echo "<span>" . $this->listaDepartamentos[$ge->getcodDepartamento()] . "</span>\n";
          echo "<span>R$ " . number_format($ge->getSalario(), 2) . "</span>\n";
          echo "</p>\n";
          echo "</div>\n";
        }
        break;
      default:
        echo "<div><p>Opção Inválida</p></div>";
        break;
    }
  }
  private function carregaListas() {
    $arquivo = file_get_contents(__DIR__."/funcionarios.json");

    if($arquivo) {
      $fncs = json_decode($arquivo);
  
      foreach($fncs->operadores as $op) {
        $novo = new Operador($op->matricula, $op->nome, $op->CPF, $op->salario, $op->funcao);
        $this->addOperador($novo);
      }

      foreach($fncs->gerentes as $ge) {
      $novoGerente = new Gerente($ge->matricula, $ge->nome, $ge->CPF, $ge->salario, $ge->codDepartamento, $ge->bonusGerencia);
        $this->addGerente($novoGerente);
      }
 }
}
  public function salvaListas() {
    $funcs = [ "operadores" => [], "gerentes" => [] ];


    foreach($this->listaOperadores as $op) {
      array_push($funcs["operadores"], $op);
    }

    foreach($this->listaGerentes as $gr) {
      array_push($funcs["gerentes"], $gr);
    }
    
    $json = json_encode($funcs, JSON_PRETTY_PRINT);
    
    $fp = fopen(__DIR__."/funcionarios.json", "w");
    fwrite($fp, $json);
    fclose($fp); 
 }  
}
