<form name="ass" action="./gera_img.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8"
		class="formulario_ass">

		<div class="form-row">

			<div class="form-group col-md-6 campo_ass">
				<h5>Secretaria:</h5>
				<select id="secretaria" name="secretaria" onChange="mudaimagem(this.value);" required="required"
					class=" campo_inserir">
					<option value=""></option>
					<option value="SMUL">SMUL - Secretaria Municipal de Urbanismo e Licenciamento</option>
				</select>
			</div>

			<div class="campo_ass_imagem" id="imagens">
			</div>

			<div class="form-group col-md-6 campo_ass">
				<p>ID da rede:</p>
				<input style="background: #ffc;" type="text" name="ID_Usuario" value="" readonly="true"
					class="campo_inserir">
			</div>

			<div class="campo_ass">

			</div>
			<div class="form-group campo_ass">
				<h5>Nome:</h5>
				<input type="text" name="nome" required="required" value="" size="19" class="campo_inserir">
			</div>


			<div></div>
			<div>* Coloque seu nome completo.</div>

			<div class="form-groupcampo_ass">
				Cargo:
			</div>
			<div class="campo_ass"><input type="text" required="required" name="cargo" value="" size="67"
					class="campo_inserir">
			</div>

			<div class="campo_ass">
				Unidade:
			</div>
			<div class="campo_ass">
				<select name="departamento" required="required" class="campo_inserir">
					<option value=""></option>
					<option value="GABINETE">GABINETE</option>
					<option value="ASCOM">ASCOM</option>
					<option value="ATAJ">ATAJ</option>
					<option value="ATECC">ATECC</option>
					<option value="ATIC">ATIC</option>
					<option value="CAEPP">CAEPP</option>
					<option value="CAEPP / DECPP">CAEPP / DECPP</option>
					<option value="CAEPP / DERPP">CAEPP / DERPP</option>
					<option value="CAEPP / DESPP">CAEPP / DESPP</option>
					<option value="CAF">CAF</option>
					<option value="CAF / DGP">CAF / DGP</option>
					<option value="CAF / DLC">CAF / DLC</option>
					<option value="CAF / DOF">CAF / DOF</option>
					<option value="CAF / DRV">CAF / DRV</option>
					<option value="CAF / DSUP">CAF / DSUP</option>
					<option value="CAP">CAP</option>
					<option value="CAP / ARTHUR SABOYA">CAP / ARTHUR SABOYA</option>
					<option value="CAP / DEPROT">CAP / DEPROT</option>
					<option value="CAP / DPCI">CAP / DPCI</option>
					<option value="CAP / DPD">CAP / DPD</option>
					<option value="CAP / NÚCLEO DE ATENDIMENTO">CAP / NÚCLEO DE ATENDIMENTO</option>
					<option value="CASE">CASE</option>
					<option value="CASE / DCAD">CASE / DCAD</option>
					<option value="CASE / DDU">CASE / DDU</option>
					<option value="CASE / DLE">CASE / DLE</option>
					<option value="CEPEUC">CEPEUC</option>
					<option value="CEPEUC / DCIT">CEPEUC / DCIT</option>
					<option value="CEPEUC / DDOC">CEPEUC / DDOC</option>
					<option value="CEPEUC / DVF">CEPEUC / DVF</option>
					<option value="COMIN">COMIN</option>
					<option value="COMIN / DCIGP">COMIN / DCIGP</option>
					<option value="COMIN / DCIMP">COMIN / DCIMP</option>
					<option value="CONTRU">CONTRU</option>
					<option value="CONTRU / DACESS">CONTRU / DACESS</option>
					<option value="CONTRU / DINS">CONTRU / DINS</option>
					<option value="CONTRU / DLR">CONTRU / DLR</option>
					<option value="CONTRU / DSUS">CONTRU / DSUS</option>
					<option value="DEUSO">DEUSO</option>
					<option value="DEUSO / DMUS">DEUSO / DMUS</option>
					<option value="DEUSO / DNUS">DEUSO / DNUS</option>
					<option value="DEUSO / DSIZ">DEUSO / DSIZ</option>
					<option value="GEOINFO">GEOINFO</option>
					<option value="GTEC">GTEC</option>
					<option value="ILUME">ILUME</option>
					<option value="PARHIS">PARHIS</option>
					<option value="PARHIS / DHGP">PARHIS / DHGP</option>
					<option value="PARHIS / DHMP">PARHIS / DHMP</option>
					<option value="PARHIS / DHPP">PARHIS / DHPP</option>
					<option value="PARHIS / DPS">PARHIS / DPS</option>
					<option value="PLANURB">PLANURB</option>
					<option value="PLANURB / DART">PLANURB / DART</option>
					<option value="PLANURB / DMA">PLANURB / DMA</option>
					<option value="PLANURB / DOT">PLANURB / DOT</option>
					<option value="RESID">RESID</option>
					<option value="RESID / DRGP">RESID / DRGP</option>
					<option value="RESID / DRH">RESID / DRH</option>
					<option value="RESID / DRVE">RESID / DRVE</option>
					<option value="SERVIN">SERVIN</option>
					<option value="SERVIN / DSIGP">SERVIN / DSIGP</option>
					<option value="SERVIN / DSIMP">SERVIN / DSIMP</option>
					<option value="STEL">STEL</option>
				</select>
			</div>

			<div class="campo_ass">E-mail:
			</div>
			<div class="campo_ass">
				<input style="background: #ffc;" type="text" value="" name="email" readonly="true" size="67"
					class="campo_inserir">
			</div>


			<div class="campo_ass">Telefone: 55 11
			</div>
			<div class="campo_ass"><input type="tel" pattern="[0-9]{4}.[0-9]{4}" maxlength="9" id="tele1" name="t1"
					onkeypress="formatar_mascara(this,'####.####')" value="" size="9" class="campo_inserir">
			</div>

			<div></div>
			<div>* Preencher apenas com números</div>

			<div class="campo_ass">Endereço:
			</div>
			<div class="campo_ass"><input type="text" name="endereco" rows="1" cols="60" class="campo_inserir"
					value="Rua São Bento, 405 | 22º andar">
			</div>


			<div class="campo_ass">CEP:
			</div>
			<div class="campo_ass"><input style="background: #ffc;" type="text" name="cep" readonly="true" rows="1"
					cols="60" class="campo_inserir" value="01011 100 | São Paulo | SP">
			</div>


			<div class="campo_ass">Site:
			</div>
			<div class="campo_ass"><input style="background: #ffc;" type="text" name="site" readonly="true" size="67"
					value="www.prefeitura.sp.gov.br" class="campo_inserir">
			</div>


			<div class="campo_ass">Data de nascimento:
			</div>
			<div class="campo_ass"><input type="tel" id="nascdia" placeholder="--" min="0" max="31" required="required"
					name="nascdia" maxlength="2" size="2" Value="" class="campo_menor_inserir"> / <input type="tel"
					placeholder="--" min="0" max="12" pattern="[0-1]{1}[0-9]{1}" id="nascmes" name="nascmes"
					required="required" maxlength="2" size="2" Value="" class="campo_menor_inserir">
			</div>

			<div></div>
			<div>* Dia / Mês (Caso não queira preencher, coloque o número 00 nos dois campos)
			</div>


			<div class="campo_ass_botoes">
				<input type="submit" name="gerar" value="Criar" onclick="assina()" class="botao_inserir">
				<input type="reset" value="Limpar" class="botao_inserir">
			</div>
		</div>

	</form>