<!DOCTYPE html>
<html lang="pt-br" class="home">
<head>
	<?php include('./inc/head.php'); ?>
	<title>Serviços | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->

	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/sample/s3.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it">Serviços</h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im">Serviços</span>
				</div>
			</div>
		</div>
	</div>

	<!-- Serviços -->
	<?php include('./inc/bloco-servicos.php'); ?>
	<!-- ### -->

	<!-- Áreas de Atuação -->
	<?php include('./inc/bloco-areas-de-atuacao.php'); ?>
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