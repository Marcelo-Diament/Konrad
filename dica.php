<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br" class="dicas">
<head>
<?php include('./inc/head.php'); 

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 1, 
	'name'  => $_GET['nome']
	); 

$queryDica = new WP_Query( $args );

if( $queryDica->have_posts() ) : while( $queryDica->have_posts() ) : $queryDica->the_post();

$categories = get_the_category();

$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-dicas');
$img = $thumb[0];

$post_atual = $post->ID;

?>
	<title><?php the_title(); ?> | Konrad</title>


<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "c1d78f45-3b0c-43bd-9e0f-e810bea8a608", doNotHash: false, doNotCopy: false, hashAddressBar: false, fbLang: 'pt_BR'});</script>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=1583649618576359";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->

	<?php 
	
	?>
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/common/ico-dicas.png" alt="" class="it ico-interna">
					<h2 class="titulo-pagina it">Blog</h2>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>dicas/" class="im">Blog</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im"><?php the_title(); ?></span>
				</div>
			</div>
		</div>
	</div>


	<div id="conteudo-clientes" class="txt-interna bloco-home">
		<div class="grid-container">

			<div class="grid-75 grid-parent">

				<div class="grid-100">
					<div class="post-detalhes">
						<h1 class="post-title"><?php the_title(); ?></h1>
						<div class="detalhes">
							<span class="im mgr"><img src="<?php local(); ?>img/common/ico-calendario.png" alt="" class="im mgrb"><span class="im"><?php the_date('d.m.Y'); ?></span></span>
							<p class="im cat-container-dicas"><img src="<?php local(); ?>img/common/ico-folder.png" alt="" class="im mgrb">
								<?php

							if($categories){
							foreach($categories as $category) { ?>
								<a href="<?php local(); ?>dicas/categoria/<?php echo $category->slug; ?>" class="im"><?php echo $category->name; ?></a><span class="sep-cat">, </span>
							
							<?php }

							}

							?>
							</p>
						</div>
						<img src="<?php echo $img; ?>" alt="" class="fullimg destaque"/>
						<div class="post-conteudo">
							<?php the_content(); ?>
						</div>

						<div class="compartilhar-dica">
							<span class='st_fblike_hcount' displayText='Facebook Like'></span>
							<span class='st_facebook_hcount' displayText='Facebook'></span>
							<span class='st_twitter_hcount' displayText='Tweet'></span>
							<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
						</div>

						<div class="comentarios-dica">
							<h2>Comentários</h2>
							<div class="comentarios-container">
								<div class="fb-comments" data-href="<?php local(); ?>dica/<?php echo $post->post_name; ?>" data-width="100%" data-numposts="5" data-colorscheme="light" data-version="v2.3"></div>
							</div>
						</div>

						
					</div>
				</div>

				<div class="relacionados">
					<?php 
					$argsVeja = array(
						'post_type' => 'post',
						'posts_per_page' => 3,
						'post__not_in' => array($post_atual),
						'orderby' => 'rand'
					);

					$queryVeja = new WP_Query( $argsVeja );

					if( $queryVeja->have_posts() ) : while( $queryVeja->have_posts() ) : $queryVeja->the_post();
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-dicas');
					$img = $thumb[0];

					//var_dump($queryVeja);
					?>
					<div class="grid-33">
						<div class="dicas-relacionados">
							<a href="<?php local(); ?>dica/<?php echo $post->post_name; ?>" class="bl"><img src="<?php echo $img; ?>" alt="" class="fullimg"></a>
							<h2 class="titulo"><a href="<?php local(); ?>dica/<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h2>
						</div>
					</div>	
					<?php endwhile; else: ?>
					<div class="grid-100">
						<p class="ac">Nenhuma postagem relacionada.</p>
					</div>
					<?php endif; ?>	
					<div class="clear"></div>
				</div>


			</div>



			<div class="grid-25">
				<!-- Sidebar -->
				<?php include('./inc/sidebar-blog.php'); ?>
				<!-- ### -->
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

<?php endwhile; else: header('Location: ../404/'); ?>


<?php endif; ?>