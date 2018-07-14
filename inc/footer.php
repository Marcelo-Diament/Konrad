<footer id="site-footer">



	<div id="mapa-site">

		

		<div class="grid-container">

			<div class="grid-15">

				<h1>Institucional</h1>				

				<a href="<?php local(); ?>empresa/" class="bl <?php checkPage('empresa'); ?>">A Empresa</a>

				<a href="<?php local(); ?>depoimentos/" class="bl <?php checkPage('depoimentos'); ?>">Depoimentos</a>

				<a href="<?php local(); ?>clientes/" class="bl <?php checkPage('clientes'); ?>">Clientes</a>

				<a href="<?php local(); ?>dicas/" class="bl <?php checkPage('dicas'); ?><?php checkPage('dica'); ?>">Dicas</a>

				<a href="<?php local(); ?>contato/" class="bl <?php checkPage('contato'); ?>">Fale conosco</a>

			</div>

			<div class="grid-15">

				<h1>Serviços</h1>

				<?php 



				$argsSer = array(

					'posts_per_page'   => -1,

					'post_type'        => 'servicos',

					'post_status'      => 'publish'

				);

				$postsSer= get_posts( $argsSer ); 

				foreach($postsSer as $ser){

				?>

				<a href="<?php local(); ?>servico/<?php echo $ser->post_name; ?>" class="bl"><?php echo $ser->post_title; ?></a>

				<?php } ?>

			</div>

			<div class="grid-25">

				<h1>Áreas de atuação</h1>

				<?php 



				$argsAr = array(

					'posts_per_page'   => -1,

					'post_type'        => 'areas_de_atuacao',

					'post_status'      => 'publish'

				);

				$postsAr= get_posts( $argsAr ); 

				foreach($postsAr as $area){

				?>

				<a href="<?php local(); ?>area-de-atuacao/<?php echo $area->post_name; ?>" class="bl"><?php echo $area->post_title; ?></a>

				<?php } ?>

			</div>

			<div class="grid-45 grid-parent">

				<div class="grid-100">

					<h1>Contato</h1>

				</div>

					

				<form method="post" id="contato" action="<?php local() ?>ajax/email-footer.php">

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



						<input type="hidden" name="email-destinatario-footer" value="<?php echo $konrad_email; ?>">

						<input type="hidden" name="assunto" value="Konrad | Contato | Rodapé Site">

					<div class="grid-60">

						<label for="nome" class="bl">Nome:</label>

						<input type="text" name="nome" id="nome" class="fullwd">

					</div>

					<div class="grid-40">

						<label for="telefone" class="bl">Telefone:</label>

						<input type="text" name="telefone" id="telefone" class="fullwd">

					</div>

					<div class="clear"></div>

					<div class="grid-100">

						<label for="email" class="bl">Email:</label>

						<input type="text" name="email" id="email" class="fullwd">

					</div>

					<div class="clear"></div>

					<div class="grid-100">

						<label for="mensagem" class="bl">Mensagem:</label>

						<textarea name="mensagem" id="mensagem" class="fullwd"></textarea>

					</div>

					<div class="grid-100 ar">

						<a href="#" class="btn-a envia-contato-pagina"><input type="submit" value="Enviar" class="btn-a envia-contato-pagina" style="margin:0px;padding:0px;"></a>

					</div>

				</form>

			</div>

		</div>



	</div>



	<div id="rodape">

		<div class="grid-container">

			<div class="grid-100">

				<div class="ajfix">

					<div class="im">

						<div class="im social">

							<?php if($konrad_facebook){ ?>

							<a href="<?php echo $konrad_facebook; ?>" target="_blank" class="im"><i class="fa fa-facebook-square"></i></a>

							<?php } ?>

							<?php if($konrad_linkedin){ ?>

							<a href="<?php echo $konrad_linkedin; ?>" target="_blank" class="im"><i class="fa fa-linkedin-square"></i></a>

							<?php } ?>

						</div>

						<div class="hide-mobile im">

							<span class="sep im"><i class="fa fa-circle"></i></span>

							<span class="txt im"><?php 

									$contador = 1;

									foreach ($konrad_telefones as $telefone) {

										echo $telefone['telefone'];

										if($contador < $totaltel){

											echo ' / ';

										}

									$contador++;

								} ?></span>

							<span class="sep im"><i class="fa fa-circle"></i></span>

							<a href="mailto:<?php echo $konrad_email; ?>" class="txt im"><?php echo $konrad_email; ?></a>

						</div>

					</div>

					<a href="http://www.eitodos.com.br" class="im"><img src="<?php local(); ?>img/common/eitodos.png" alt="" class="im"></a>

				</div>

			</div>

		</div>

	</div>
	
	<!-- Código de Acompanhamento RD Station -->
	<script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/ee353f3a-5fe5-4de8-b79d-4380694da0d8-loader.js" ></script>

</footer>



<?php wp_footer(); ?>