<!DOCTYPE html>
<html lang="pt-br" class="home">
<head>
	<?php include('./inc/head.php'); ?>
	<title>Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<!-- Banner Home -->
	<div id="banner-home">
		<div class="grid-container">
			<div class="grid-100 ac">
				<h1 class="upc">Especialistas em <b>Negócios</b></h1>
				<h2><b>Consultoria para empresas de diversos segmentos</b></h2>
				<a href="<?php local(); ?>servicos/" class="btn-a">Nossos serviços</a>
				<a href="<?php local(); ?>areas-de-atuacao/" class="btn-a">Áreas de Atuação</a>
				<a href="<?php local(); ?>contato/" class="btn-a">Fale Conosco</a>
			</div>
		</div>		
	</div>	
	<!-- ### -->
	
	<!-- Serviços -->
	<?php include('./inc/bloco-servicos.php'); ?>
	<!-- ### -->	
	
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