<?php
session_start();

if (isset($_POST['zerar'])) {
	include '../conexao.php';
	$sql = "DELETE FROM assinatura.tbl_telefones WHERE id_key > 773";
	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Erro ao inserir registro: " . $conn->error;
	}
}

if (isset($_POST['gera_assinatura'])) {

	$data = $_POST['data'];
	$datas = explode('-', $data);
	$dia = $datas[2];
	$mes = $datas[1];

	$secretaria = 'SMUL';
	$rede = $_SESSION['SesID'];
	$nome = $_POST['nome'];

	if (strlen($nome) > 27) {
		$array = explode(' ', $nome);
		$stringFinal = $array[0] . ' ' . end($array);
		$nome = $stringFinal;
	}

	$cargo = $_POST['cargo'];
	$email = $_SESSION['SesE-mail'];
	$unidade = $_POST['unidade'];
	$telefone = $_POST['telefone'];
	$telefone_completo = 'Tel.: 55 ' . $telefone;
	$fone_semdd = explode(' ', $telefone);
	$fone_sql = $fone_semdd[1];
	$andar = $_POST['endereco'];
	$endereco_completo = 'Rua São Bento, 405 | ' . $andar . '° andar';
	$site = 'www.prefeitura.sp.gov.br';
	$data = $_POST['data'];
	$cep = '01011 100 | São Paulo | SP';

	include '../conexao.php';

	$sql = "INSERT INTO tbl_telefones (cp_usuario_rede, cp_secretaria, cp_nome, cp_departamento, cp_cargo, cp_email, cp_telefone, cp_andar, cp_cep, cp_site, cp_nasc_dia, cp_nasc_mes)
        VALUES ('$rede', '$secretaria', '$nome', '$unidade', '$cargo', '$email', '$fone_sql', '$endereco_completo', '$cep', '$site', '$dia', '$mes')";
	
	$sql_update = "UPDATE tbl_telefones 
	SET cp_secretaria = '$secretaria', 
	cp_nome = '$nome', 
	cp_departamento = '$unidade', 
	cp_cargo = '$cargo', 
	cp_email = '$email', 
	cp_telefone = '$fone_sql', 
	cp_andar = '$endereco_completo', 
	cp_cep = '$cep', 
	cp_site = '$site', 
	cp_nasc_dia = '$dia', 
	cp_nasc_mes = '$mes'
	WHERE cp_usuario_rede = '$rede'";

	$busca = "SELECT cp_usuario_rede FROM tbl_telefones WHERE cp_usuario_rede = '$rede'";

	$result = $conn->query($busca);
	
	if ($result) {
		if ($result->num_rows > 0) {
			$sql_update;
			if ($conn->query($sql_update) === TRUE) {
			} else {
				echo "Erro ao inserir registro: " . $conn->error;
			}
		} else {
			$sql;
			if ($conn->query($sql) === TRUE) {
			} else {
				echo "Erro ao inserir registro: " . $conn->error;
			}
		}
	} else {
		echo "Erro na consulta: " . $conn->error;
	}

	// $colunasArray = array();

	// while ($row = $conn->query($sql) === TRUE) {

	// 	echo $colunasArray[] =  $row['names'];

	// }

}
include '../unidades.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="inc/style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://files.codepedia.info/uploads/iScripts/html2canvas.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
	<script src="https://github.com/RobinHerbots/jquery.inputmask"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.2/jquery.inputmask.bundle.js"></script>

</head>

<body>

	<div class="container_principal">
		<div class="container_imagens ">
			<div id="container-img" class="inabilitado container-img">
				<div class="div_img">
					<img src="../img_assinatura.png" alt="imagem prefeitura" class="naoselecionar">
				</div>
				<div class="container-conteudo">
					<div class="conteudo">
						<div class="pessoa">
							<h1 id="nome-img" class="naoselecionar"><?php echo $nome ?? $_SESSION['SesNome']; ?></h1>
							<div class="setor-cargo">
								<p id="setor" class="naoselecionar"><?php echo $_POST['unidade'] ?? ''; ?> / </p>
								<p id="cargo-img" class="naoselecionar"><?php echo $_POST['cargo'] ?? ''; ?></p>
							</div>
						</div>
						<div class="informações">
							<p id="email" class="naoselecionar"><a href=""><?php echo $_SESSION['SesE-mail'] ?></a></p>
							<p id="telefone-img" class="naoselecionar">Tel.: 55 <?php echo $_POST['telefone'] ?? ''; ?></p>
							<p id="local-img" class="naoselecionar">Rua São Bento, 405 | <?php echo $_POST['endereco'] ?? ''; ?>° andar</p>
							<p id="cep" class="naoselecionar">01011 100 | São Paulo | SP</p>
							<p id="site" class="naoselecionar"><a href="http://www.prefeitura.sp.gov.br">www.prefeitura.sp.gov.br</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="container-botao">
				<button onclick="downloadimage()" id="botao-download" class="botao-download" disabled>Exportar como imagem</button>
			</div>
		</div>
	</div>

	<div class="container">
		<form method="post" class="formulario">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nome">Nome:</label>
					<input type="text" onKeyPress="preencheCampos()" onKeyUp="preencheCampos()" class="form-control" id="nome" name="nome" placeholder="Coloque seu nome completo" value="<?php echo $_POST['nome'] ?? $_SESSION['SesNome']; ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="email">E-mail:</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['SesE-mail']; ?>" readonly>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="phone-number">Telefone:</label>
					<input class="form-control" id="telefone" name="telefone" onKeyPress="preencheCampos()" onKeyUp="preencheCampos()" value="<?php echo $_POST['telefone'] ?? ''; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label for="endereco">Andar:</label>
					<input class="form-control" id="endereco" name="endereco" onKeyPress="preencheCampos()" onKeyUp="preencheCampos()" value="<?php echo $_POST['endereco'] ?? ''; ?>" required maxlength="2">
				</div>
				<div class="form-group col-md-4">
					<label for="site">Data de nacimento:</label>
					<input type="date" class="form-control" id="data" name="data" value="<?php echo $_POST['data'] ?? ''; ?>" placeholder="Caso não queira preencher 00/00." required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="unidade">Dia:</label>
					<select onclick="inserir_textoSelect()" class="form-control">
						<?php
						for ($i = 1; $i <= 31; $i++) {
							echo '<option value="' . $i . '">' . $i . '</option>';
						}
						?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="unidade">Unidade:</label>
					<select onclick="inserir_textoSelect()" class="form-control">
						<option selected></option>
					</select>
				</div>
			</div>
			<div class="form-row">

				<div class="form-group col-md-6">
					<label for="unidade">Unidade:</label>
					<select id="unidade" onclick="inserir_textoSelect()" name="unidade" class="form-control" required>
						<option selected><?php echo $_POST['unidade'] ?? ''; ?></option>
						<?php getunidades(); ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="cargo">Cargo:</label>
					<input type="text" onKeyPress="preencheCampos()" onKeyUp="preencheCampos()" value="<?php echo $_POST['cargo'] ?? ''; ?>" class="form-control" id="cargo" name="cargo" required>
				</div>
			</div>


			<button type="submit" onclick="validarAssinatura()" class="btn btn-primary" name="gera_assinatura" id="gera_assinatura">Verificar Assinatura</button>
			<button type="submit" class="btn btn-primary" name="zerar" id="zerar">Zerar</button>
		</form>
	</div>
</body>


<script>
	function validarAssinatura() {
		sessionStorage.setItem("recarregou", "true");
	}

	function validacao() {
		var elements = document.querySelectorAll("a, p, h1, img");
		var id = document.getElementById("container-img");
		var disabled_teste = document.getElementById("botao-download");

		elements.forEach(function(element) {
			element.classList.add("naoselecionar");
		});
		id.classList.add("inabilitado");
		disabled_teste.setAttribute("disabled", "disabled");
	}

	function downloadimage() {
		var container = document.getElementById("container-img");
		html2canvas(container, {
			allowTaint: true
		}).then(function(canvas) {
			var link = document.createElement("a");
			document.body.appendChild(link);
			link.download = "html_image.jpg";
			link.href = canvas.toDataURL();
			link.target = "_blank";
			link.click();
		});
	}

	function preencheCampos() {
		var valores = document.getElementById("nome").value;
		var valores_unidade = document.getElementById("cargo").value;
		var valores_telefone = document.getElementById("telefone").value;
		var valores_andar = document.getElementById("endereco").value;

		var lblValue = document.getElementById("nome-img");
		lblValue.innerText = valores;

		var setor = document.getElementById("cargo-img");
		setor.innerText = valores_unidade;

		var telefone = document.getElementById("telefone-img");
		telefone.innerText = "Tel.: 55 " + valores_telefone;

		var andar = document.getElementById("local-img");
		andar.innerText = "Rua São Bento, 405 | " + valores_andar + "° andar";

		validacao();
	}

	function setupPhoneMaskOnField(selector) {
		var inputElement = $(selector);

		setCorrectPhoneMask(inputElement);
		inputElement.on('input, keyup', function() {
			setCorrectPhoneMask(inputElement);
		});
	}

	function setCorrectPhoneMask(phone) {
		if (phone.inputmask('unmaskedvalue').length > 10) {
			phone.inputmask('remove');
			phone.inputmask('99 9999.9999')
		} else {
			phone.inputmask('remove');
			phone.inputmask({
				mask: '99 9999.9999',
				greedy: false
			})
		}
	}

	$(document).ready(function() {
		var recarregou = sessionStorage.getItem("recarregou");
		if (recarregou) {
			var elements = document.querySelectorAll("a, p, h1, img, #container-img, #botao-download");

			elements.forEach(function(element) {
				element.classList.remove("naoselecionar");
				element.classList.remove("inabilitado");
				element.removeAttribute('disabled');
			});
		}
		sessionStorage.removeItem("recarregou");
		setupPhoneMaskOnField('#telefone');
	});
</script>