<?php 

global $konrad_telefones,$konrad_horario_de_atendimento,$konrad_email,$konrad_facebook,$konrad_linkedin,$konrad_endereco;

$konrad_telefones = get_field('konrad_telefones', 'options');
$konrad_horario_de_atendimento = get_field('konrad_horario_de_atendimento', 'options');
$konrad_email = get_field('konrad_email', 'options');
$konrad_facebook = get_field('konrad_facebook', 'options');
$konrad_linkedin = get_field('konrad_linkedin', 'options');
$konrad_endereco = get_field('konrad_endereco', 'options');

$totaltel = count($konrad_telefones);
?>
<header id="site-header">
	<div class="grid-container">
		<div class="grid-100">
			<div class="ajfix">
				<a href="<?php local(); ?>" class="logo im">
					<img src="<?php local(); ?>img/common/logo.png" alt="" class="it logo-desk">
					<img src="<?php local(); ?>img/common/logo-mobile.png" alt="" class="it logo-mobile">
				</a>

				<div class="it">
					<div class="contato ar">
						<span class="im">
							<?php 
								$contador = 1;
								foreach ($konrad_telefones as $telefone) {
									echo $telefone['telefone'];
									if($contador < $totaltel){
										echo ' / ';
									}
								$contador++;
							} ?>
						</span>
						<span class="im sep"><i class="fa fa-circle im"></i></span>
						<a href="mailto:<?php echo $konrad_email; ?>" class="im"><?php echo $konrad_email; ?></a>
						<span class="im sep"><i class="fa fa-circle im"></i></span>
						<?php if($konrad_facebook){ ?>
						<a target="_blank" href="<?php echo $konrad_facebook; ?>" class="im"><i class="fa fa-facebook-square im"></i></a>
						<?php } ?>
						<?php if($konrad_linkedin){ ?>
						<a target="_blank" href="<?php echo $konrad_linkedin; ?>" class="im"><i class="fa fa-linkedin-square im"></i></a>
						<?php } ?>

					</div>

					<nav id="site-nav" class="ar">
						<a href="<?php local(); ?>" class="im <?php checkPage('index'); ?>">Home</a>
						<a href="<?php local(); ?>empresa/" class="im <?php checkPage('empresa'); ?>">Quem Somos</a>
						<a href="<?php local(); ?>servicos/" class="im <?php checkPage('servico'); ?><?php checkPage('servicos'); ?><?php checkPage('treinamento'); ?><?php checkPage('turma'); ?>">Serviços</a>
						<a href="<?php local(); ?>areas-de-atuacao/" class="im <?php checkPage('area-de-atuacao'); ?><?php checkPage('areas-de-atuacao'); ?>">Áreas de Atuação</a>
						<a href="<?php local(); ?>clientes/" class="im <?php checkPage('clientes'); ?>">Clientes</a>
						<a href="<?php local(); ?>dicas/" class="im <?php checkPage('dicas'); ?><?php checkPage('dica'); ?>">Blog</a>
						<a href="<?php local(); ?>contato/" class="im <?php checkPage('contato'); ?>">Contato</a>
					</nav>
				</div>

				<a href="#" class="open-menu im hide-menu"><i class="fa fa-bars"></i></a>
			</div>
		</div>
	</div>
</header>