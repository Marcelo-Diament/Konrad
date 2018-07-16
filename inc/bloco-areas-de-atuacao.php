<div id="bloco-areas-de-atuacao" class="bloco-home">
	<div class="grid-container">
		<div class="grid-100">
			<h2 class="title ac border"><a href="<?php local(); ?>areas-de-atuacao/"></a>Áreas de <b>Atuação</b></h2>
		</div>
		<?php 

		$argsAreas = array(
			'post_type' => 'areas_de_atuacao',
			'posts_per_page' => -1
			);

		$queryAreas = new WP_Query( $argsAreas );

		$contador = 1;

		if( $queryAreas->have_posts() ) : while( $queryAreas->have_posts() ) : $queryAreas->the_post();

		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-area-de-atuacao' );
		$url = $thumb['0'];

		?>
		<div class="grid-25">
			<div class="bloco-atuacao">
				<a href="<?php local(); ?>area-de-atuacao/<?php echo $post->post_name; ?>" class="bl"><img src="<?php echo $url; ?>" alt="" class="fullimg"></a>
				<h2 class="titulo"><a href="<?php local(); ?>area-de-atuacao/<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h2>
				<p><a href="<?php local(); ?>area-de-atuacao/<?php echo $post->post_name; ?>"><?php the_field('areas_de_atuacao_resumo'); ?></a></p>
			</div>
		</div>
		<?php 
		 

		if($contador%4 == 0){
			echo '<div class="clear"></div>';
		}

		$contador++; endwhile; 

		else: ?>

		<div class="grid-100">
			<p>Nenhuma área de atuação encontrada.</p>
		</div>

		<?php endif; ?>

		<div class="clear"></div>

	</div>
</div>