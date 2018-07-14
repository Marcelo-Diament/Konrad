<!DOCTYPE html>
<html lang="pt-br" class="treinamento">
<head>
	<?php 

	include('./inc/head.php'); 

	$the_slug = $_GET['nome'];
	$args = array(
	  'name'        => $the_slug,
	  'post_type'   => 'treinamentos',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);
	$treinamento = array_pop(get_posts($args));
	if( !$treinamento ) {
	  header("location: ../404");
	}

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($treinamento->ID), 'icones-site' );
	$url = $thumb['0'];

	//var_dump($treinamento);
	?>

	<title>Treinamento - <?php echo $treinamento->post_title; ?> | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/sample/s2.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it"><?php echo $treinamento->post_title; ?></h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>servicos/" class="im">Serviços</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>servico/treinamentos-e-eventos" class="im">Treinamentos e Eventos</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im"><?php echo $treinamento->post_title; ?></span>
				</div>
			</div>
		</div>
	</div>
	
	<?php $descricaotreinamento = get_field('descricao_de_treinamento', $treinamento->ID); ?>

	<div class="txt-interna bloco-home bloco-treinamento-detalhes border">
		<div class="grid-container">

			<div class="grid-100">
				<h1 class="title ac border">Sobre o <b>Treinamento</b></h1>
			</div>

			<?php 

			foreach($descricaotreinamento as $bloco){ 
				if($bloco['video'] || $bloco['imagem']){

			?>

			<div class="grid-50">
				<h2><?php echo $bloco['titulo']; ?></h2>
				<?php echo $bloco['texto']; ?>
			</div>

			<div class="grid-50 video-treinamento">
				<?php 
					if($bloco['video']){ 
					$partes = explode('?v=', $bloco['video']);
				?>
				<iframe width="560" height="300" src="https://www.youtube.com/embed/<?php echo $partes[1]; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				<?php }else{ ?>
				<?php if($bloco['imagem']){ ?>
						<img src="<?php echo $bloco['imagem']['sizes']['full-depoimentos']; ?>" alt="" class="fullimg">
				<?php } } ?>
			</div>

			<div class="clear"></div>

			<?php }else{ ?>

			<div class="grid-100 bloco-principal">
				<h2><?php echo $bloco['titulo']; ?></h2>
				<?php echo $bloco['texto']; ?>
			</div>

			<?php 
				} 
				} 
			$arquivos = get_field('treinamentos_arquivos', $treinamento->ID);
			if($arquivos){
			?>

			<div class="grid-100">
				<?php 
				
				foreach($arquivos as $arquivo){
				?>
				<a href="<?php echo $arquivo['arquivo']; ?>" class="btn-a mgrb"><?php echo $arquivo['nome'] ?></a>
				<?php } ?>
			</div>

			<?php } ?>

			<div class="grid-100">
				<div class="border-bl"></div>
			</div>
		</div>
	</div>


	<div class="txt-interna bloco-home proximas-turmas border">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="title ac border">Próximas <b>turmas</b></h1>
			</div>

			<?php $turmas = get_field('treinamentos_turmas', $treinamento->ID); ?>
			
			<?php if($turmas){ ?>
			<div class="grid-100 prox-turmas-container">
				<table class="proximas-turmas" id="proximas-turmas">
					<tbody>
						<?php 
						foreach($turmas as $turma){ 

						$turmas_data_de_inicio = get_field('turmas_data_de_inicio', $turma->ID);
						$turmas_data_de_inicio = explode('/', $turmas_data_de_inicio);
						$turmas_cidade = get_field('turmas_cidade', $turma->ID);
						$turmas_uf = get_field('turmas_uf', $turma->ID);
						$turmas_preco_clientes = get_field('turmas_preco_clientes', $turma->ID);

						//var_dump($turmas_data_de_inicio); 



						?>
						<tr>
							<td class="data">
								<p class="dia"><?php echo $turmas_data_de_inicio[0]; ?></p>
								<p class="mes upc"><?php echo $turmas_data_de_inicio[1]; ?></p>
							</td>
							<td class="dados">
								<p class="titulo"><?php echo $turmas_uf; ?> - <?php echo $turmas_cidade; ?></p>
								<p class="subtitulo">
									<?php if($turmas_preco_clientes){ ?>
									A partir de R$ <?php echo $turmas_preco_clientes; ?>
									<?php }else{ ?>
									<b>GRATUITO</b>
									<?php } ?>
								</p>
							</td>
							<td class="info">
								<a href="<?php local(); ?>turma/<?php echo $treinamento->post_name; ?>/<?php echo $turma->post_name ?>" class="btn-a mgrb">Mais informações</a>
								<a href="<?php local(); ?>turma/<?php echo $treinamento->post_name; ?>/<?php echo $turma->post_name ?>" class="btn-a">Inscreva-se</a>
							</td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
			</div>
			<?php }else{ ?>
			<div class="grid-100">
				<p class="ac">Nenhuma turma aberta para este treinamento.</p>
			</div>
			<?php } ?>
		</div>
	</div>


	<div class="txt-interna bloco-home aviso-treinamento">
		<div class="grid-container">
			<div class="grid-100 ac">
				<h2 class="ac">Se preferir, manifeste seu interesse para treinamento aberto ou in-company.</h2>
				<a href="<?php local(); ?>contato/" class="btn-a">solicitar treinamento</a>
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