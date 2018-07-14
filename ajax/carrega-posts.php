<?php 

define('WP_USE_THEMES', false);
require('../inc/functions.php');
require('../wp/wp-blog-header.php');


wp_reset_query();

$my_page = @$_POST['pagina'];

if($_POST['categoria']){
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 10, 
        'category_name'  => $_POST['categoria'],
        'paged'          => $my_page
        );
}elseif($_POST['tag']){
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 10, 
        'tag'  => $_POST['tag'],
        'paged'          => $my_page
        );
}elseif($_POST['arquivo']){

    $ano = substr($_POST['arquivo'], 0, 4);
    $mes = substr($_POST['arquivo'], -2);

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

$args = array_merge( $args, @$_POST);

query_posts($args);

if(have_posts()) : while(have_posts()) : the_post();

$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumb');
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

<div>
    <p class="ac">Desculpe, não encontramos posts.</p>
</div>

<?php endif; ?>