<!DOCTYPE html>
<html lang="pt-br" class="dicas">
<head>
	<?php include('./inc/head.php'); ?>
	<title>Dicas | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/common/ico-dicas.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it">Dicas da Konrad</h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					

					<?php if(!$_GET['arquivo'] && !$_GET['categoria'] && !$_GET['tag']){ ?>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im">Dicas</span>
					<?php }else{ ?>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php bloginfo('url'); ?>/dicas/" class="im">Dicas</a>
					<?php }; ?>

					<?php

					if($_GET['categoria']){

						$idObj = get_category_by_slug($_GET['categoria']); 
						$id = $idObj->term_id;
						$term = get_term( $id, 'category' );

                  		//var_dump($term);

						$finalbdc = 'Arquivo da Categoria: <b>'.$term->name.'</b>';

					}

					if($_GET['tag']){

						$idObj = get_term_by('name', $_GET['tag'], 'post_tag'); 
						$id = $idObj->term_id;
						$term = get_term( $id, 'post_tag' );

                  		//var_dump($term);

						$finalbdc = 'Arquivo da Tag: <b>'.$term->name.'</b>';

					}

					if($_GET['arquivo']){
						$ano = substr($_GET['arquivo'], 0, 4);
						$mes = substr($_GET['arquivo'], -2);

						$finalbdc = 'Arquivo de: <b>'.$mes.'/'.$ano.'</b>';
					}

					?>

					<?php if($_GET['categoria'] || $_GET['arquivo'] || $_GET['tag']){ ?>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im"><?php echo $finalbdc; ?></span>
					<?php }; ?>
				</div>
			</div>
		</div>
	</div>


	<div id="conteudo-clientes" class="txt-interna bloco-home">
		<div class="grid-container">

			<div class="grid-75 grid-parent">

				<input type="hidden" name="postpage" value="1" data-pagina="1" class="paginaatual"/>
				<div class="postssupercontainer">
			<?php 

			wp_reset_query();

			$my_page = get_query_var('paged');

			if($_GET['categoria']){
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 10, 
					'category_name'  => $_GET['categoria'],
					'paged'          => $my_page
					);

			}elseif($_GET['tag']){
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 10, 
					'tag'  => $_GET['tag'],
					'paged'          => $my_page
					);
			}elseif($_GET['arquivo']){

				$ano = substr($_GET['arquivo'], 0, 4);
				$mes = substr($_GET['arquivo'], -2);

				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 10, 
					'year' => $ano,
					'monthnum' => $mes,
					'paged'          => $my_page
					);

			}else{
				$args = array(
					'post_type'      => 'post',
					'posts_per_page' => 10, 
					'paged'          => $my_page
					);
			}

			

			$dicasQuery = new WP_Query($args);

			?>

			<script type="text/javascript">


                    $(document).ready(function() {
                    	
                    
                        function loadMoreContent(){

                        <?php global $wp_query; ?>               

                        var maxpag = <?php echo $wp_query->max_num_pages; ?>;
                        var paginaatual = $('.paginaatual').data('pagina')+1;

                        <?php if($_GET['categoria']){ ?>
                            var cat = <?php echo "'".$_GET['categoria']."';"; ?>
                            var query = 'categoria='+cat+'&pagina='+paginaatual;
                            var ajax = '../../ajax/carrega-posts.php';
                        <?php }; ?>

                        <?php if($_GET['tag']){ ?>
                            var cat = <?php echo "'".$_GET['tag']."';"; ?>
                            var query = 'tag='+cat+'&pagina='+paginaatual;
                            var ajax = '../../ajax/carrega-posts.php';
                        <?php }; ?>

                        <?php if($_GET['arquivo']){ ?>
                            var arquivo = <?php echo "'".$_GET['arquivo']."';"; ?>
                            var query = 'arquivo='+arquivo+'&pagina='+paginaatual;
                            var ajax = '../../ajax/carrega-posts.php';
                        <?php }; ?>

                        <?php if(!$_GET['categoria'] && !$_GET['tag'] && !$_GET['arquivo']){ ?>
                            var query = 'pagina='+paginaatual;
                            var ajax = '../ajax/carrega-posts.php';
                        <?php }; ?>

                        if($('.loading-posts').is(':visible')){
                            return false; 
                        }else{                      

                          if(paginaatual > maxpag){
                            $('.fim-posts').fadeIn(125);
                            return false;                            
                          }else{
                            $('.loading-posts').fadeIn(125);
                            $.ajax({
                              url: ajax,
                              type: 'POST',
                              dataType: 'html',
                              data: query,
                              }).done(function(data) {
                                  $('.postssupercontainer > div:last').next().after(data);
                                  $('.loading-posts').fadeOut(125);
                                  $('.paginaatual').data('pagina', $('.paginaatual').data('pagina')+1);
                              }).fail(function() {
                                  console.log("error");
                              }).always(function() {
                                  console.log("complete");
                              });
                              
                          }                 

                        }
                          
                          

                        };

                        $(window).scroll(function() {
                          // Modify to adjust trigger point. You may want to add content
                          // a little before the end of the page is reached. You may also want
                          // to make sure you can't retrigger the end of page condition while
                          // content is still loading.
                          if ($(window).scrollTop() >= $('.postssupercontainer').offset().top + $('.postssupercontainer').height() - 200) {
                            loadMoreContent();
                          }
                        });
                    
                        });
                </script>


                <?php
                	$count = 1;

			if($dicasQuery->have_posts()) : while($dicasQuery->have_posts()) : $dicasQuery->the_post();

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-dicas');
            $img = $thumb[0];

            $categories = get_the_category();
                ?>

				<div class="post-dicas">
					<div class="grid-33">
						<img src="<?php echo $img; ?>" alt="" class="fullimg">
					</div>
					<div class="grid-66">
						<h2><a href="<?php local(); ?>dica/<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h2>
						<p><?php echo strip_tags(get_the_excerpt()); ?> <a href="<?php local(); ?>dica/<?php echo $post->post_name; ?>">Leia mais</a><br><br></p>

						<span class="bl"><img src="<?php local(); ?>img/common/ico-calendario.png" alt="" class="im mgrb"><span class="im"><?php echo the_date('d.m.Y'); ?></span></span>
						<p class="cat-container-dicas"><img src="<?php local(); ?>img/common/ico-folder.png" alt="" class="im mgrb">
							<?php

							if($categories){
							foreach($categories as $category) { ?>
								<a href="<?php local(); ?>dicas/categoria/<?php echo $category->slug; ?>" class="im"><?php echo $category->name; ?></a><span class="sep-cat">, </span>
							
							<?php }

							}

							?>
						</p>
					</div>
					<div class="grid-100">
						<div class="border"></div>
					</div>
					<div class="clear"></div>
				</div>

				<?php 

				endwhile; else: 

				?>
				<div class="col-1-3 postgrid">
					<p>Desculpe, não encontramos posts.</p>
				</div>
				<?php endif; ?>


			</div>

			<div class="loading-posts">
				<p class="ac">Carregando notícias...</p>
			</div>
			<div class="fim-posts">
				<p class="ac">Não há mais notícias.</p>
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