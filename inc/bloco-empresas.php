<div id="bloco-empresas" class="bloco-home">
	<div class="grid-container">
		<div class="grid-100">
			<h2 class="subtitle ac"><a href="<?php local(); ?>clientes/"></a>Algumas empresas que trabalharam conosco</h2>
				
				<?php 

				$argsClientes = array(
					'post_type' => 'clientes',
					'posts_per_page' => 6,
					'orderby' => 'RAND'
					);

				$queryClientes = new WP_Query( $argsClientes );

				if( $queryClientes->have_posts() ) : while( $queryClientes->have_posts() ) : $queryClientes->the_post();

				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-clientes' );
				$url = $thumb['0'];

				?>
				<div class="grid-16 grid-parent mobile-grid-33">
					<a href="<?php local(); ?>clientes/" class="bl"><img src="<?php echo $url; ?>" alt="" class="fullimg"></a>
				</div>

				<?php endwhile; else: ?>

				<div class="grid-100">
					<p>Nenhum cliente encontrado.</p>
				</div>

				<?php endif; ?>
				<div class="clear"></div>
				
		</div>
	</div>
</div>