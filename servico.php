<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br" class="servico">
<head>
	<?php 

	include('./inc/head.php'); 

	$the_slug = $_GET['nome'];
	$args = array(
	  'name'        => $the_slug,
	  'post_type'   => 'servicos',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);
	$servico = array_pop(get_posts($args));
	if( !$servico ) {
	  header("location: ../404");
	}

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($servico->ID), 'icones-site' );
	$url = $thumb['0'];

	//var_dump($servico);
	?>

	<title>Serviço - <?php echo $servico->post_title; ?> | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	

	

	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php echo $url; ?>" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it"><?php echo $servico->post_title; ?></h1>
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
					<span class="atual im"><?php echo $servico->post_title; ?></span>
				</div>
			</div>
		</div>
	</div>

	<?php 
	$conteudo = get_field('servicos_conteudo', $servico->ID);
	$checktreinamento = get_field('servicos_treinamento', $servico->ID);

	//var_dump($checktreinamento);

	foreach($conteudo as $bloco){

		if(!$bloco['video'] & !$bloco['imagem']){
	?>


	<div class="txt-interna bloco-home border">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="title ac border"><b><?php echo $bloco['titulo']; ?></b></h1>
			</div>
			<div class="grid-100">
				<?php echo $bloco['descricao']; ?>
			</div>

			<div class="grid-100">
				<div class="border-bl"></div>
			</div>
		</div>
	</div>

	<?php }else{ ?>


	<div class="txt-interna bloco-home border">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="title ac border"><b><?php echo $bloco['titulo']; ?></b></h1>
			</div>
			<div class="grid-50">
				<?php echo $bloco['descricao']; ?>
			</div>
			<div class="grid-50">
				<?php if($bloco['imagem']){ ?>
				<img src="<?php echo $bloco['imagem']['sizes']['full-depoimentos']; ?>" alt="" class="fullimg">
				<?php } ?>
				<?php 
				if($bloco['video']){ 
				$parts = parse_url($bloco['video']);
				parse_str($parts['v'], $query);
				//echo $query['v'];
				?>
				<iframe class="mgtcol" width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $query['v']; ?>" frameborder="0" allowfullscreen></iframe>
				
				<?php } ?>
			</div>
			<div class="grid-100">
				<div class="border-bl"></div>
			</div>
		</div>
	</div>

	<?php } } ?>


	
	<?php if($checktreinamento){ ?>

	<div class="txt-interna bloco-home border">
		<div class="grid-container">
			<div class="grid-100">
				<h1 class="title ac border"><b>Treinamentos</b></h1>
			</div>
		</div>
	</div>

	<div class="txt-interna bloco-home border">
		<div id="treinamentos" class="grid-container">

			<?php 

			$argsTreinamentos = array(
				'post_type' => 'treinamentos',
				'posts_per_page' => -1
			);

			$queryTreinamentos = new WP_Query( $argsTreinamentos );

			$contador = 1;

			if( $queryTreinamentos->have_posts() ) : while( $queryTreinamentos->have_posts() ) : $queryTreinamentos->the_post();

			?>

			<div class="grid-50">
				<div class="bloco-treinamento">
					<h2><a href="<?php local();  ?>treinamento/<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h2>
					<a href="<?php local();  ?>treinamento/<?php echo $post->post_name; ?>" class="btn-a">ver detalhes e datas disponíveis</a>
				</div>
			</div>

			<?php 

			if($contador%2 == 0){
				echo '<div class="clear"></div>';
			}

			$contador++;
			endwhile; else: 

			?>

			<div class="grid-100">
				<p class="ac">Nenhum treinamento cadastrado.</p>
			</div>
			<?php endif; ?>

		

			<div class="clear"></div>

			<div class="grid-100">
				<div class="border-bl"></div>
			</div>
		</div>
	</div>

	<?php } ?>


	<!-- Áreas de Atuação -->
	<?php include('./inc/bloco-areas-de-atuacao.php'); ?>
	<!-- ### -->

	<!-- Contato -->
	<?php include('./inc/bloco-contato.php'); ?>
	<!-- ### -->
	
	<!-- Footer -->
	<?php include('./inc/footer.php'); ?>
	<!-- ### -->
</body>
</html>