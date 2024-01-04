<html>

<head>


	<link rel="stylesheet" href="css/style.css">

</head>

<body>

	<form method="post" action="ldap.php" name="form" AUTOCOMPLETE='ON' onSubmit="return valida()" class="formulario">

		<div class="formulario" id="container_formulario">
			<div class="form-contatos">
				<p>Usuário de rede:</p>
				<input type="text" name="usuario" maxlength="7" class="campo-pesquisa-contatos" id="user">
			</div>
			<div class="form-contatos">

				<p>Senha de rede:&nbsp;&nbsp;</p>
				<input type="password" name="senha" id="pass" class="campo-pesquisa-contatos" maxlength="30">

				<img src="olho (1).png" id="olho" class="olho" alt="Clique para visualizar a senha.">


			</div>
		</div>
		<div class="botao_inserir">
			<button type="submit" data-tooltip="Digite usuario e senha validos" id="bnt_entrar" name="bnt_entrar" class="carregar_btn" disabled>Entrar</button>
		</div>
	</form>

	<br>






	<script language="JavaScript" type="text/javascript" src="funcs.js"></script>

	<script type="text/javascript">
		document.getElementById('olho').addEventListener('mousedown', function() {
			document.getElementById('pass').type = 'text';
		});

		document.getElementById('olho').addEventListener('mouseup', function() {
			document.getElementById('pass').type = 'password';
		});

		// Para que o password não fique exposto apos mover a imagem.
		document.getElementById('olho').addEventListener('mousemove', function() {
			document.getElementById('pass').type = 'password';
		});


		function mudaimagem(item) {
			var img = document.getElementById('imagens');
			img.innerHTML = '<img src="img/' + item + '/logo.png" width=200px >';

			//    document.getElementById('site').value='https://'+'www.capital.sp.gov.br';
		}


			const inputUsuario = document.getElementById('user');
			const inputSenha = document.getElementById('pass');
			const bntEntrar = document.getElementById('bnt_entrar');

			document.addEventListener('input', () => {
				const tamanhoInputUser = inputUsuario.value.length;
				const tamanhoInputSenha = inputSenha.value.length;

				const inputValidoUser = tamanhoInputUser > 5;
				const inputValidoSenha = tamanhoInputSenha > 5;

				if (inputValidoUser && inputValidoSenha) {
					bntEntrar.removeAttribute('disabled');
					bntEntrar.removeAttribute('data-tooltip');
					return;
				}

				bntEntrar.setAttribute('disabled', true);
			});
	</script>

</body>

</html>