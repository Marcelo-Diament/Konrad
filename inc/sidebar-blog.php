<div class="sidebar">

	<?php if(isset($_GET['categoria']) || isset($_GET['tag']) || isset($_GET['arquivo']) || isset($_GET['nome'])) : ?>
	<div class="widget">
		<a href="<?php local(); ?>dicas/" class="bl ac btn-a">Voltar para Blog</a>
	</div>
	<?php endif; ?>
	<div class="widget">
		<h3 class="widget-title">Categorias</h3>

		<ul>

			<?php 

			wp_reset_query();

			$catargs = array(
					'type'                     => 'post',
					'orderby'                  => 'name',
					'hide_empty'               => 1,
					'hierarchical'             => 1
				);

			$categories = get_categories($catargs);

			foreach($categories as $category) { ?>

			<li class="<?php seCatArq($category->slug); ?>"><a href="<?php echo get_bloginfo( 'url' ); ?>/dicas/categoria/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>

			<?php } ?>
		</ul>
	</div>
	
	<div class="widget">
		<h3 class="widget-title">Assuntos</h3>

		<?php 

		$tags = get_tags();
		foreach ( $tags as $tag ) {
			$tag_link = get_bloginfo('url');
			
			$html = "<a href='{$tag_link}/dicas/tag/{$tag->slug}' title='{$tag->name} Tag' class='{$tag->slug}'>";
			$html .= "{$tag->name}</a>";
		}
		echo $html;
		?>

		<!-- <a href="#">Alimentos, Comercial, Empresas, FSC 22000,    Indústria brasileira, ISO 22000, Marketing, Gestão, Treinamento, Alimentos,   Comercial, Construtora
FSC 22000, Indústria Brasileira, ISO 9001   Marketing, Gestão, Consultoria</a> -->
	</div>
	
	<div class="widget">
		<h3 class="widget-title">Arquivo</h3>

		<?php wp_custom_archive(); ?>

		<!-- <h3 class="archive-title"><i class="fa fa-caret-down"></i>2015</h3>

		<ul class="archive-list">
			<li><a href="#">Maio</a></li>
			<li><a href="#">Abril</a></li>
			<li><a href="#">Março</a></li>
			<li><a href="#">Fevereiro</a></li>
			<li><a href="#">Janeiro</a></li>
		</ul> -->
	</div>

</div>