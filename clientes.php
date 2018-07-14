<!DOCTYPE html>
<html lang="pt-br" class="clientes">
<head>
	<?php include('./inc/head.php'); ?>
	<title>Clientes | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/common/ico-clientes.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it">Clientes</h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im">Clientes</span>
				</div>
			</div>
		</div>
	</div>


	<div id="conteudo-clientes" class="txt-interna bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="title ac border">Conheça nossos <b>clientes</b></h1>
			</div>
			<div class="grid-100">
				<p class="ac">Consultoria e Treinamentos para construtoras, indústrias de alimentos, laboratórios entre outros segmentos.</p>
			</div>
			

			<?php 
			$argsClientes = array(
				'post_type' => 'clientes',
				'posts_per_page' => -1
			);

			$queryClientes = new WP_Query( $argsClientes );

			$contador = 1;

			if( $queryClientes->have_posts() ) : while( $queryClientes->have_posts() ) : $queryClientes->the_post();

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-clientes' );
			$url = $thumb['0'];

			?>

			<div class="grid-50 mgtcol">
				<div class="bloco-empresa-det">
					<div class="grid-40 grid-parent">
						<img src="<?php echo $url; ?>" alt="" class="fullimg"/>
					</div>
					<div class="grid-60">
						<h2><?php the_title(); ?></h2>
						<p><?php the_field('clientes_descricao'); ?></p>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php if($contador%2 == 0){ ?>
			<div class="clear"></div>
			<?php } ?>

			<?php $contador++; endwhile; else: ?>
			<div class="grid-100">
				<p class="ac">Nenhum cliente encontrado.</p>
			</div>
			<?php endif; ?>

			

			<div class="clear"></div>
		</div>
	</div>

	<!-- Contato -->
	<?php include('./inc/bloco-contato.php'); ?>
	<!-- ### -->
	
	<!-- Footer -->
	<?php include('./inc/footer.php'); ?>
	<!-- ### -->
</body>
</html>