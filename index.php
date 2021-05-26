<?php
require "app/Application.class.php";

$app = new Application();
$operadores = $app->getListaOperadores();
$gerentes = $app->getListaGerentes();

if ($_POST) {
	$tam = count($_POST);
	if ($tam == 5) {
		extract($_POST);

		if (intval($opMatr) > count($operadores)) {
			if ($opNome != "" && $opCPF != "" && $opSlr != "") {
				$novo = new Operador($opMatr, $opNome, $opCPF, $opSlr, $opFnc);
				$app->addOperador($novo);

				$operadores = $app->getListaOperadores();
				$app->salvaListas();
			}
		}
	} else if ($tam == 6) {
		extract($_POST);

		if (intval($grMatr) > count($gerentes)) {
			if ($grNome != "" && $grCPF != "" && $grSlr != "") {
				$novo = new Gerente($grMatr, $grNome, $grCPF, floatval($grSlr), $grDpt, $grBonus);
				$app->addGerente($novo);

				$gerentes = $app->getListaGerentes();
				$app->salvaListas();
			}
		}
	} else {
		echo "OCORREU UM ERRO, VERIFIQUE SEU CADASTRO NOVAMENTE !";
	}
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<title><?= $app->getAppName(); ?></title>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/php-corp.css" rel="stylesheet">
	<script src="js/php-corp.js" type="text/javascript"></script>
</head>

<body>

	<div class="app-container">
		<h1><?= $app->getAppName(); ?></h1>

		<div class="notebook">
			<button class="aba aberta" onclick="abreAba(event, 'aba1')">Lista de Operadores</button>
			<button class="aba" onclick="abreAba(event, 'aba2')">Lista de Gerentes</button>
			<button class="aba" onclick="abreAba(event, 'aba3')">Cadastrar Operador</button>
			<button class="aba" onclick="abreAba(event, 'aba4')">Cadastrar Gerente</button>
		</div>

		<div id="aba1" class="conteudo" style="display: block">
			<h2>Lista de Operadores</h2>
			<div class="lista">
				<div class="cabecalho-lista">
					<p>
						<span>Matrícula</span>
						<span>Nome</span>
						<span>CPF</span>
						<span>Salário</span>
						<span>Função</span>
					</p>
				</div>
				<?php $app->mostraTelaConsulta('operadores') ?>
			</div>
		</div>

		<div id="aba2" class="conteudo">
			<h2>Lista de Gerentes</h2>
			<div class="lista">
				<div class="cabecalho-lista">
					<p>
						<span>Matrícula</span>
						<span>Nome</span>
						<span>CPF</span>
						<span>Departamento</span>
						<span>Salário</span>
					</p>
				</div>
				<?php $app->mostraTelaConsulta('gerentes') ?>
			</div>
		</div>

		<div id="aba3" class="conteudo">
			<h2>Cadastro de Operadores</h2>
			<div>
				<form action="index.php" method="POST">
					<div>
						<label for="opMatr">Matrícula:</label>
						<input type="text" id="opMatr" name="opMatr" readonly value="<?= count($operadores) + 1; ?>"></input>
						<label for="opNome">Nome:</label>
						<input type="text" id="opNome" name="opNome" style="width: 20rem"></input>
					</div>
					<div>
						<label for="opCPF">CPF:</label>
						<input type="text" id="opCPF" name="opCPF"></input>
						<label for="opSlr">Salário:</label>
						<input type="text" id="opSlr" name="opSlr"></input>
						<label for="opFnd">Função:</label>
						<select id="opFnc" name="opFnc">
							<option value="1">Técnico Electricista</option>
							<option value="2">Técnico Mecânico</option>
							<select>
					</div>
					<div>
						<button type="submit" value="Salvar">Salvar</button>
					</div>
				</form>
			</div>
		</div>

		<div id="aba4" class="conteudo">
			<h2>Cadastro de Gerentes</h2>
			<div>
				<form action="index.php" method="POST">
					<div>
						<label for="grMatr">Matrícula:</label>
						<input type="text" id="grMatr" name="grMatr" readonly value="<?= count($gerentes) + 1; ?>"></input>
						<label for="grNome">Nome:</label>
						<input type="text" id="grNome" name="grNome" style="width: 20rem"></input>
					</div>
					<div>
						<label for="grCPF">CPF:</label>
						<input type="text" id="grCPF" name="grCPF"></input>
						<label for="grDpt">Departamento:</label>
						<select id="grDpt" name="grDpt">
							<option value="1">Recursos Humanos</option>
							<option value="2">Suporte</option>
							<option value="3">Marketing</option>
							<option value="4">Inteligencia em Negocios</option>
						</select>
						<label for="grSlr">Salário:</label>
						<input type="text" id="grSlr" name="grSlr"></input>
						<label for="grBonus">Bonus Salarial:</label>
						<input type="text" id="grBonus" name="grBonus"></input>
					</div>
					<div>
						<button type="submit" value="Salvar">Salvar</button>
					</div>
				</form>

			</div>

		</div>

</body>

</html>