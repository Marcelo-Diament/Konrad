<!DOCTYPE html>
<html lang="pt-br" class="empresa">
<head>
	<?php include('./inc/head.php'); ?>
	<title>Quem Somos | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/common/ico-empresa.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it">Quem Somos</h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im">Quem Somos</span>
				</div>
			</div>
		</div>
	</div>


	<div id="conteudo-empresa" class="txt-interna bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h2 class="title ac border">Sobre a <b>Konrad</b></h2>
			</div>
			
			<?php 
			$conteudo = get_field('empresa_conteudo', 2);

			foreach($conteudo as $bloco){

			?>

			<div class="grid-50">
				<?php echo $bloco['conteudo']; ?>

				<img src="<?php echo $bloco['imagem']['url']; ?>" alt="" class="fullimg">
			</div>

			<?php } ?>
		</div>
	</div>


	<!-- Áreas de Atuação -->
	<?php include('./inc/bloco-areas-de-atuacao.php'); ?>
	<!-- ### -->	
	
	<!-- Empresas -->
	<?php include('./inc/bloco-empresas.php'); ?>
	<!-- ### -->

	<!-- Depoimentos -->
	<?php include('./inc/bloco-depoimentos.php'); ?>
	<!-- ### -->

	<!-- Contato -->
	<?php include('./inc/bloco-contato.php'); ?>
	<!-- ### -->
	
	<!-- Footer -->
	<?php include('./inc/footer.php'); ?>
	<!-- ### -->
</body>
</html>