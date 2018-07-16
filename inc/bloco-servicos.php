<div id="bloco-servicos" class="bloco-home">
	<div class="bg-servicos"></div>
	<div class="grid-container">
		<div class="grid-100">
			<h2 class="title ac border"><a href="<?php local(); ?>servicos/"></a>O que <b>fazemos</b></h2>
		</div>
		<?php 

		$argsServicos = array(
			'post_type' => 'servicos',
			'posts_per_page' => -1
			);

		$queryServicos = new WP_Query( $argsServicos );

		$contador = 1;

		if( $queryServicos->have_posts() ) : while( $queryServicos->have_posts() ) : $queryServicos->the_post();

		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'icones-site' );
		$url = $thumb['0'];

		?>
		<div class="grid-20">
			<div class="bloco-servico ac">
				<a href="<?php local(); ?>servico/<?php echo $post->post_name; ?>" class="bl ac"><img src="<?php echo $url; ?>" alt="" class="im"></a>
				<p class="ac"><i class="fa fa-circle im"></i></p>
				<h2><a href="<?php local(); ?>servico/<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h2>
				<p><a href="<?php local(); ?>servico/<?php echo $post->post_name; ?>"><?php the_field('servicos_resumo'); ?></a></p>
			</div>
		</div>
		<?php 
		 

		if($contador%5 == 0){
			echo '<div class="clear"></div>';
		}

		$contador++; endwhile; 

		else: ?>

		<div class="grid-100">
			<p>Nenhum serviço encontrado.</p>
		</div>

		<?php endif; ?>
	</div>
</div>