<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br" class="area-de-atuacao">
<head>
	<?php 

	include('./inc/head.php'); 

	$the_slug = $_GET['nome'];
	$args = array(
	  'name'        => $the_slug,
	  'post_type'   => 'areas_de_atuacao',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);
	$areadeatuacao = array_pop(get_posts($args));

	if( !$areadeatuacao ) {
	  header("location: ../404");
	}
	

	$corPrimaria = get_field('areas_de_atuacao_cor_primaria', $areadeatuacao->ID); 
	$corSecundaria = get_field('areas_de_atuacao_cor_secundaria', $areadeatuacao->ID);

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($areadeatuacao->ID), 'full-area-de-atuacao' );
	$url = $thumb['0'];

	?>

	<title>Área de Atuação - <?php echo $areadeatuacao->post_title; ?> | Konrad</title>

	<style type="text/css">
		
		h1.title.border::after{
			background-color: <?php echo $corSecundaria; ?>;
		}
		
		#breadcrumb a,
		#servicos-area h2{
			color: <?php echo $corSecundaria; ?>;
		}

		.bloco-treinamento h2{
			color: <?php echo $corSecundaria; ?>;
		}

		.btn-a{
			background-color: <?php echo $corPrimaria; ?>;
		}
	</style>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<?php //var_dump($areadeatuacao); ?>

	<div id="topo-area-de-atuacao" style="background-color: <?php echo $corPrimaria; ?>;">
		<img src="<?php echo $url; ?>" alt="" class="fullimg">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="titulo-area"><?php echo $areadeatuacao->post_name; ?></h1>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>areas-de-atuacao/" class="im">Áreas de Atuação</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im"><?php echo $areadeatuacao->post_title; ?></span>
				</div>
			</div>
		</div>
	</div>	

	<?php 
	$subtitulo = get_field('areas_de_atuacao_subtitulo', $areadeatuacao->ID);
	$descricao = get_field('areas_de_atuacao_descricao', $areadeatuacao->ID);
	?>

	<div id="conteudo-areas" class="txt-interna bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h2 class="title ac border"><b class="lpc"><?php echo $areadeatuacao->post_title; ?></b></h2>
			</div>
			<div class="grid-100">
				<p class="ac">
					<?php if($subtitulo): ?>
					<span class="subtit"><?php echo $subtitulo; ?></span><br><br>
					<?php endif; ?>
				</p>
				<?php echo $descricao; ?>
			</div>
		</div>
	</div>
	

	<?php 

	$servicos = get_field('areas_de_atuacao_servicos', $areadeatuacao->ID); 
	//var_dump($servicos);

	?>
	<div id="servicos-area" class="txt-interna bloco-home">
		<div class="grid-container">

			<?php 
			$contador = 1;
			foreach($servicos as $servico){ 
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($servico['servico']->ID), 'icones-site' );
			//var_dump($servico);
			$url = $thumb['0'];
			?>

			<div class="grid-50 grid-parent">
				<div class="grid-33 max-img-cont">
					<img src="<?php echo $url; ?>" alt="" class="fullimg">
				</div>
				<div class="grid-66">
					<h2><?php echo $servico['servico']->post_title; ?></h2>
					<p><?php echo $servico['descricao']; ?></p>
					<a href="<?php local(); ?>servico/<?php echo $servico['servico']->post_name; ?>" class="btn-a" style="background-color: <?php echo $corPrimaria; ?>;">Saiba mais</a>
				</div>
				<div class="clear"></div>
			</div>
			
			<?php if($contador%2 == 0){ ?>
			<div class="clear"></div>
			<div class="margem"></div>
			<?php } ?>

			<?php $contador++; } ?>

			
			<div class="clear"></div>
		</div>
	</div>

	<div class="txt-interna bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h2 class="title ac border">Treinamentos na área de <b class="lpc"><?php echo $areadeatuacao->post_name; ?></b></h2>
			</div>
			<div class="grid-100">
				<p class="ac"><?php echo get_field('areas_de_atuacao_treinamentos_descricao', $areadeatuacao->ID); ?></p>
			</div>
		</div>
	</div>

	<?php 

	$treinamentos = get_field('areas_de_atuacao_treinamentos', $areadeatuacao->ID); 
	//var_dump($servicos);

	?>
	<div class="txt-interna bloco-home pt0">
		<div id="treinamentos" class="grid-container">

			<?php 
			$contador = 1;
			foreach($treinamentos as $treinamento){ 
			?>
			<div class="grid-50">
				<div class="bloco-treinamento">
					<h2><a href="<?php local(); ?>treinamento/<?php echo $treinamento->post_name; ?>"><?php echo $treinamento->post_title; ?></a></h2>
					<a href="<?php local(); ?>treinamento/<?php echo $treinamento->post_name; ?>" class="btn-a">ver detalhes e datas disponíveis</a>
				</div>
			</div>
			<?php if($contador%2 == 0){ ?>
			<div class="clear"></div>
			<?php } ?>
			<?php $contador++; } ?>
			<div class="clear"></div>
		</div>
	</div>

	<?php 
	$imagemchamada = get_field('areas_de_atuacao_imagem_chamada', $areadeatuacao->ID);
	$textochamada = get_field('areas_de_atuacao_descricao_chamada', $areadeatuacao->ID);

	?>
	<div class="destaque-maior-area" style="background-image: url(<?php echo $imagemchamada['sizes']['full-area-de-atuacao']; ?>);">
		<div class="txt-destaque-area">
			<div class="grid-container">
				<div class="grid-100">
					<div class="block fullwd ac">
						<div class="im ac">
							<?php 
							$newchamada = explode("\n", $textochamada); 
							foreach($newchamada as $chamada){
							?>
							<h3 class="im"><?php echo $chamada; ?></h3><br>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $clientes = get_field('areas_de_atuacao_clientes', $areadeatuacao->ID); ?>
	<div id="bloco-empresas" class="bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h3 class="subtitle ac">Empresas de <?php echo $areadeatuacao->post_title; ?> que trabalharam conosco</h2>

				<?php 
				$contador = 1;
				foreach($clientes as $cliente){ 
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($cliente->ID), 'full-clientes' );
				$url = $thumb['0'];
				?>
				<div class="grid-16 grid-parent mobile-grid-33">
					<img src="<?php echo $url; ?>" alt="" class="fullimg">
				</div>
				<?php if($contador%6 == 0){
						echo '<div class="clear"></div>';
					  }
					$contador++; 
				} 
				?>
					
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<!-- Depoimentos -->
	<div id="bloco-depoimentos" class="bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h2 class="titulo"><a href="<?php local(); ?>depoimentos/">O que nossos <b>clientes</b> dizem</a></h2>
			</div>
			
			

			<div class="carousel">
				<div class="carousel-container">

					<?php 
					$depoimentos = get_field('areas_de_atuacao_depoimentos', $areadeatuacao->ID);
					foreach($depoimentos as $depoimento){
					?>
					<div class="grid-50">
						<div class="bloco-depoimento">
							<p><i class="fa fa-quote-left fl"></i><?php echo strip_tags(get_field('depoimentos_depoimento', $depoimento->ID)); ?></p>
							<div class="clear"></div>
							<h2><?php echo get_field('depoimentos_nome_do_cliente', $depoimento->ID); ?></h2>
							<h3><?php echo get_field('depoimentos_servico_prestado', $depoimento->ID); ?></h3>
						</div>
					</div>

					<?php } ?>
				</div>
				<div class="clear"></div>
				<div class="carousel-pager ac">
					
				</div>
			</div>
		</div>		
	</div>
	<!-- ### -->

	<!-- Contato -->
	<?php include('./inc/bloco-contato.php'); ?>
	<!-- ### -->

	<!-- Footer -->
	<?php include('./inc/footer.php'); ?>
	<!-- ### -->
</body>
</html>