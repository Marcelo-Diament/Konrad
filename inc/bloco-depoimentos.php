<div id="bloco-depoimentos" class="bloco-home">
	<div class="grid-container">
		<div class="grid-100">
			<h1 class="titulo"><a href="<?php local(); ?>depoimentos/">O que nossos <b>clientes</b> dizem</a></h1>
		</div>
		
		

		<div class="carousel">
			<div class="carousel-container">

				<?php 

				$argsDepoimentos = array(
					'post_type' => 'depoimentos',
					'posts_per_page' => 10,
					'orderby' => 'RAND'
					);

				$queryDepoimentos = new WP_Query( $argsDepoimentos );

				if( $queryDepoimentos->have_posts() ) : while( $queryDepoimentos->have_posts() ) : $queryDepoimentos->the_post();

				?>
				<div class="grid-50">
					<div class="bloco-depoimento">
						<p><i class="fa fa-quote-left fl"></i><?php echo strip_tags(get_field('depoimentos_depoimento')); ?></p>
						<div class="clear"></div>
						<h2><?php the_field('depoimentos_nome_do_cliente'); ?></h2>
						<h3><?php the_field('depoimentos_servico_prestado'); ?></h3>
					</div>
				</div>

				<?php endwhile; else: ?>
				
				<div class="grid-100">
					<p>Nenhum depoimento encontrado.</p>
				</div>

				<?php endif; ?>
			</div>
			<div class="clear"></div>
			<div class="carousel-pager ac">
				
			</div>
		</div>
	</div>		
</div>