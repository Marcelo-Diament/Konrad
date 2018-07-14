<!DOCTYPE html>
<html lang="pt-br" class="depoimentos">
<head>
	<?php include('./inc/head.php'); ?>
	<title>Depoimentos | Konrad</title>

	<script type="text/javascript">

		$(window).load(function(){
			var container = $('.container-depoimentos');
			// initialize
			container.masonry({
			  columnWidth: ".grid-50",
			  itemSelector: '.grid-50',
			  percentPosition: true
			});
		})

	</script>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/common/ico-depoimentos.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it">Depoimentos</h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im">Depoimentos</span>
				</div>
			</div>
		</div>
	</div>


	<div id="conteudo-clientes" class="txt-interna bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="title ac border">O que nossos <b>clientes</b> dizem</h1>
			</div>
		</div>

		<div class="grid-container">

		<div class="grid-container grid-parent container-depoimentos">


			<?php 
			$argsDepoimentos = array(
				'post_type' => 'depoimentos',
				'posts_per_page' => -1
			);

			$queryDepoimentos = new WP_Query( $argsDepoimentos );

			if( $queryDepoimentos->have_posts() ) : while( $queryDepoimentos->have_posts() ) : $queryDepoimentos->the_post();

			$depoimentos_endereco_do_video = get_field('depoimentos_endereco_do_video', $post->ID);

			?>
			<div class="grid-50 mgtcol">
				<div>
					<div class="bloco-depoimento">
						<div class="conteudo-depoimento">
							<i class="fa fa-quote-left fl"></i><?php the_field('depoimentos_depoimento'); ?>
						</div>
						<div class="clear"></div>
						<h2><?php the_field('depoimentos_nome_do_cliente'); ?></h2>
						<h3><?php the_field('depoimentos_servico_prestado'); ?></h3>

						<?php 
						if($depoimentos_endereco_do_video){ 
						$partes = explode('?v=', $depoimentos_endereco_do_video);
						//var_dump($partes);
						?>
						<iframe class="mgtcol" width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $partes['1']; ?>" frameborder="0" allowfullscreen></iframe>
						<?php } ?>

						<?php 

						?>
					</div>
				</div>
			</div>
			<?php endwhile; else: ?>
			<div class="grid-100">
				<p class="ac">Nenhum depoimento encontrado.</p>
			</div>
			<?php endif; ?>
		</div>

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