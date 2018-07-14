<!DOCTYPE html>

<html lang="pt-br" class="contato">

<head>

	<?php include('./inc/head.php'); ?>

	<title>Contato | Konrad</title>

</head>

<body>

	<!-- Header -->

	<?php include('./inc/header.php'); ?>

	<!-- ### -->

	

	<div id="titulo-interna">

		<div id="topo-interna">

			<div class="grid-container">

				<div class="grid-100">

					<img src="<?php local(); ?>img/common/ico-contato.png" alt="" class="it ico-interna">

					<h1 class="titulo-pagina it">Contato</h1>

				</div>

			</div>

		</div>

		<div id="breadcrumb">

			<div class="grid-container">

				<div class="grid-100">

					<a href="<?php local(); ?>" class="im">Home</a>

					<span class="im sep"><i class="fa fa-angle-right im"></i></span>

					<span class="atual im">Contato</span>

				</div>

			</div>

		</div>

	</div>





	<div id="conteudo-clientes" class="txt-interna bloco-home">

		<div class="grid-container">

			<div class="grid-100">

				<h1 class="title ac border">Fale com a <b>Konrad</b></h1>

			</div>

			<div class="grid-100">

				<p class="ac">Entre em contato conosco através do formulário abaixo, ou telefone <span><?php 

								$contador = 1;

								foreach ($konrad_telefones as $telefone) {

									echo $telefone['telefone'];

									if($contador < $totaltel){

										echo ' / ';

									}

								$contador++;

							} ?></span> e email <a href="mailto:<?php echo $konrad_email; ?>"><?php echo $konrad_email; ?></a></p>

			</div>





			<div class="grid-50 mgtcol">

				<form id="pagina-contato" method="POST" action="<?php local() ?>ajax/email-contato.php">



					<div class="grid-100 alerta-form erro obrigatorio">

							<div>

								<span class="fa fa-close im"></span>

								<span class="im msg">Preencha todos os campos!</span>

							</div>

						</div>



					<div class="grid-100 alerta-form erro mail">

							<div>

								<span class="fa fa-close im"></span>

								<span class="im msg">Email inválido!</span>

							</div>

						</div>

						<div class="grid-100 alerta-form enviado">

							<div>

								<span class="fa fa-check im"></span>

								<span class="im msg">Mensagem enviada com sucesso!</span>

							</div>

						</div>



					<input type="hidden" name="email-destinatario" value="<?php echo $konrad_email; ?>">

					<div class="grid-60">

						<label for="nome-contato" class="bl">Nome:</label>

						<input type="text" name="nome-contato" id="nome-contato" class="fullwd">

					</div>

					<div class="grid-40">

						<label for="telefone-contato" class="bl">Telefone:</label>

						<input type="text" name="telefone-contato" id="telefone-contato" class="fullwd">

					</div>



					<div class="clear"></div>



					<div class="grid-100">

						<label for="email" class="bl">Email:</label>

						<input type="email" name="email-contato" id="email" class="fullwd">

					</div>



					<div class="grid-100">

						<label for="assunto-contato" class="bl">Assunto:</label>

						<input type="text" name="assunto-contato" id="assunto-contato" class="fullwd">

					</div>



					<div class="grid-100">

						<label for="mensagem-contato" class="bl">Mensagem:</label>

						<textarea type="text" name="mensagem-contato" id="mensagem-contato" class="fullwd"></textarea>

					</div>



					<div class="grid-100 ar">

						<a href="#" class="btn-a envia-contato-pagina"><input type="submit" value="Enviar" class="btn-a envia-contato-pagina" style="margin:0px;padding:0px;"></a>


					</div>

				</form>

			</div>



			<div class="grid-50 mgtcol">

				<div id="bloco-contato-pagina">

					<p>

						<img src="<?php local(); ?>img/common/ico-fone.png" alt="" class="fl"/>

						<span>Telefones:</span><br>

						<?php 

								$contador = 1;

								foreach ($konrad_telefones as $telefone) {

									echo $telefone['telefone'];

									if($contador < $totaltel){

										echo ' / ';

									}

								$contador++;

							} ?>

					</p>

					<div class="clear"></div>

					<p>

						<img src="<?php local(); ?>img/common/ico-relogio.png" alt="" class="fl"/>

						<span>Atendimento:</span><br>

						<?php echo $konrad_horario_de_atendimento; ?>

					</p>

					<div class="clear"></div>

					<p>

						<img src="<?php local(); ?>img/common/ico-carta.png" alt="" class="fl"/>

						<span>Email:</span><br>

						<a href="mailto:<?php echo $konrad_email; ?>"><?php echo $konrad_email; ?></a>

					</p>

					<div class="clear"></div>

					<p>

						<img src="<?php local(); ?>img/common/ico-pin.png" alt="" class="fl"/>

						<span>Endereço:</span><br>

						<?php echo $konrad_endereco['address']; ?>

					</p>

					<div class="clear"></div>



					<p>	

						<?php if($konrad_facebook){ ?>

						<a href="<?php echo $konrad_facebook; ?>" target="_blank" class="im"><i class="fa fa-facebook-square"></i></a>

						<?php } ?>

						<?php if($konrad_linkedin){ ?>

						<a href="<?php echo $konrad_linkedin; ?>" target="_blank" class="im"><i class="fa fa-linkedin-square"></i></a>

						<?php } ?>

					</p>

				</div>

			</div>



			<div class="clear"></div>





			<div id="mapa-contato" class="grid-100">

				<div class="mgtcol">

					<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDXbccsVj_cKyLGCUeMB5ENjiUcjrCh5PI&q=<?php echo urlencode($konrad_endereco['address']); ?>" width="100%" height="460" frameborder="0" style="border:0" disableDefaultUI="true"></iframe>

				</div>

			</div>



		</div>

	</div>

	

	<!-- Footer -->

	<?php include('./inc/footer.php'); ?>

	<!-- ### -->

</body>

</html>