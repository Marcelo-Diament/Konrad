<?php
/**
 * @package konrad
 * @version 1.0
 */
/*
Plugin Name: Konrad
Plugin URI: http://www.eitodos.com.br
Description: NÃO DESATIVAR OU EXCLUIR !!! Recursos para o funcionamento do site. 
Author: Vicente Santos
Version: 1.0
Author URI: http://www.eitodos.com.br
*/ 

/* Adiciona o suporte à thumbnails */
add_theme_support('post-thumbnails');

/* Tamanhos para Crop de imagens */
add_image_size( 'admin-thumb', 80, 80, true ); 
add_image_size( 'icones-site', 158, 178, true ); 
add_image_size( 'thumb-area-de-atuacao', 249, 186, true ); 
add_image_size( 'full-area-de-atuacao', 1920, 359, true ); 
add_image_size( 'full-clientes', 172, 101, true ); 
add_image_size( 'full-depoimentos', 456, 316, true ); 
add_image_size( 'thumb-dicas', 248, 228, true ); 
add_image_size( 'full-dicas', 807, 468, true ); 


function custom_remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] ); # Allows for basic post entry
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] ); # Shows you who is linking to you
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] ); # Displays new, updated, and popular WordPress plugins on WordPress.org
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] ); # Highlights entries from the WordPress team on WordPress.org
   unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] ); # Displays stats about your blog
   unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] ); # Displays the most recent comments on your blog
   unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts'] ); # Displays your most recent drafts
   unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] ); # Displays the WordPress Planet feed, which includes blog entries from WordPress.org
   unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] ); # Displays the WordPress Planet feed, which includes blog entries from WordPress.org
   remove_action('welcome_panel', 'wp_welcome_panel');
   wp_add_dashboard_widget(
                 'example_dashboard_widget',         // Widget slug.
                 'Konrad',         // Title.
                 'example_dashboard_widget_function' // Display function.
                 );
}
add_action( 'wp_dashboard_setup', 'custom_remove_dashboard_widgets' );

function example_dashboard_widget_function() {
  // Display whatever it is you want to show.
  echo "Bem vindo ao painel da Konrad. <br><br>Utilize o menu à esquerda para administar as seções do site.<br><br>
  <a href=\"http://www.eitodos.com.br\" target=\"_blank\">eitodos.com.br</a> ";
} 
add_action( 'wp_dashboard_setup', 'custom_remove_dashboard_widgets' );


//Ocultar a barra administrativa ao estar logado no site
add_filter('show_admin_bar', '__return_false'); 

//Excluir o sistema de comentários do menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
  remove_menu_page( 'edit-comments.php' );
}
add_action('init', 'remove_comment_support', 100);

//Excluir o sistema de comentários dos posts
function remove_comment_support() {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'page', 'comments' );
}

//Remover comentários da dashboard
function mytheme_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


function remove_menus(){

  if(!current_user_can( 'update_core' )){
  
    // remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'edit.php' );                   //Posts
    // remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
  } 

  $args = array(
      'sort_order' => 'ASC',
      'sort_column' => 'ID',
      'hierarchical' => 0,
      'exclude' => '',
      'include' => '',
      'meta_key' => '',
      'meta_value' => '',
      'authors' => '',
      'child_of' => 0,
      'parent' => -1,
      'exclude_tree' => '',
      'number' => '',
      'offset' => 0,
      'post_type' => 'page',
      'post_status' => 'publish'
      ); 
    $pages = get_pages($args); 

    $count = 20;
    foreach($pages as $page){
      $edit = "post.php?post=$page->ID&action=edit";
      add_menu_page( $page->post_title, $page->post_title, 'read', $edit, '', 'dashicons-format-aside', $count); 

      $count++;
    }
  
}
add_action( 'admin_menu', 'remove_menus' );

// let's start by enqueuing our styles correctly
function wptutsplus_admin_styles() {
  if(!current_user_can( 'update_core' )){
    wp_register_style( 'wptuts_admin_stylesheet', plugins_url( '/css/estilo.css', __FILE__ ) );
    wp_enqueue_style( 'wptuts_admin_stylesheet' );
  }
}
add_action( 'admin_enqueue_scripts', 'wptutsplus_admin_styles' );





// Register Custom Post Type
function registrar_areas_de_atuacao() {

  $labels = array(
    'name'                => _x( 'Áreas de Atuação', 'Post Type General Name', 'konrad' ),
    'singular_name'       => _x( 'Área de Atuação', 'Post Type Singular Name', 'konrad' ),
    'menu_name'           => __( 'Áreas de Atuação', 'konrad' ),
    'name_admin_bar'      => __( 'Áreas de Atuação', 'konrad' ),
    'parent_item_colon'   => __( 'Pai:', 'konrad' ),
    'all_items'           => __( 'Todas', 'konrad' ),
    'add_new_item'        => __( 'Adicionar Nova', 'konrad' ),
    'add_new'             => __( 'Adicionar Nova', 'konrad' ),
    'new_item'            => __( 'Nova', 'konrad' ),
    'edit_item'           => __( 'Editar', 'konrad' ),
    'update_item'         => __( 'Atualizar', 'konrad' ),
    'view_item'           => __( 'Ver', 'konrad' ),
    'search_items'        => __( 'Buscar', 'konrad' ),
    'not_found'           => __( 'Nenhum resultado encontrado', 'konrad' ),
    'not_found_in_trash'  => __( 'Nenhum item na lixeira', 'konrad' ),
  );
  $args = array(
    'label'               => __( 'areas_de_atuacao', 'konrad' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-forms',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'areas_de_atuacao', $args );

}

// Hook into the 'init' action
add_action( 'init', 'registrar_areas_de_atuacao', 0 );

/* -------------------------------------------------------- */


// Register Custom Post Type

function registrar_clientes() {

  $labels = array(
    'name'                => _x( 'Clientes', 'Post Type General Name', 'konrad' ),
    'singular_name'       => _x( 'Cliente', 'Post Type Singular Name', 'konrad' ),
    'menu_name'           => __( 'Clientes', 'konrad' ),
    'name_admin_bar'      => __( 'Clientes', 'konrad' ),
    'parent_item_colon'   => __( 'Pai:', 'konrad' ),
    'all_items'           => __( 'Todos', 'konrad' ),
    'add_new_item'        => __( 'Adicionar Novo', 'konrad' ),
    'add_new'             => __( 'Adicionar Novo', 'konrad' ),
    'new_item'            => __( 'Novo', 'konrad' ),
    'edit_item'           => __( 'Editar', 'konrad' ),
    'update_item'         => __( 'Atualizar', 'konrad' ),
    'view_item'           => __( 'Ver', 'konrad' ),
    'search_items'        => __( 'Buscar', 'konrad' ),
    'not_found'           => __( 'Nenhum resultado encontrado', 'konrad' ),
    'not_found_in_trash'  => __( 'Nenhum item na lixeira', 'konrad' ),
  );
  $args = array(
    'label'               => __( 'clientes', 'konrad' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-groups',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'clientes', $args );

}

// Hook into the 'init' action
add_action( 'init', 'registrar_clientes', 0 );

/* -------------------------------------------------------- */


// Register Custom Post Type

function registrar_servicos() {

  $labels = array(
    'name'                => _x( 'Serviços', 'Post Type General Name', 'konrad' ),
    'singular_name'       => _x( 'Serviço', 'Post Type Singular Name', 'konrad' ),
    'menu_name'           => __( 'Serviços', 'konrad' ),
    'name_admin_bar'      => __( 'Serviços', 'konrad' ),
    'parent_item_colon'   => __( 'Pai:', 'konrad' ),
    'all_items'           => __( 'Todos', 'konrad' ),
    'add_new_item'        => __( 'Adicionar Novo', 'konrad' ),
    'add_new'             => __( 'Adicionar Novo', 'konrad' ),
    'new_item'            => __( 'Novo', 'konrad' ),
    'edit_item'           => __( 'Editar', 'konrad' ),
    'update_item'         => __( 'Atualizar', 'konrad' ),
    'view_item'           => __( 'Ver', 'konrad' ),
    'search_items'        => __( 'Buscar', 'konrad' ),
    'not_found'           => __( 'Nenhum resultado encontrado', 'konrad' ),
    'not_found_in_trash'  => __( 'Nenhum item na lixeira', 'konrad' ),
  );
  $args = array(
    'label'               => __( 'servicos', 'konrad' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-admin-appearance',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'servicos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'registrar_servicos', 0 );

/* -------------------------------------------------------- */


// Register Custom Post Type

function registrar_depoimentos() {

  $labels = array(
    'name'                => _x( 'Depoimentos', 'Post Type General Name', 'konrad' ),
    'singular_name'       => _x( 'Depoimento', 'Post Type Singular Name', 'konrad' ),
    'menu_name'           => __( 'Depoimentos', 'konrad' ),
    'name_admin_bar'      => __( 'Depoimentos', 'konrad' ),
    'parent_item_colon'   => __( 'Pai:', 'konrad' ),
    'all_items'           => __( 'Todos', 'konrad' ),
    'add_new_item'        => __( 'Adicionar Novo', 'konrad' ),
    'add_new'             => __( 'Adicionar Novo', 'konrad' ),
    'new_item'            => __( 'Novo', 'konrad' ),
    'edit_item'           => __( 'Editar', 'konrad' ),
    'update_item'         => __( 'Atualizar', 'konrad' ),
    'view_item'           => __( 'Ver', 'konrad' ),
    'search_items'        => __( 'Buscar', 'konrad' ),
    'not_found'           => __( 'Nenhum resultado encontrado', 'konrad' ),
    'not_found_in_trash'  => __( 'Nenhum item na lixeira', 'konrad' ),
  );
  $args = array(
    'label'               => __( 'depoimentos', 'konrad' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-format-chat',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'depoimentos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'registrar_depoimentos', 0 );

/* -------------------------------------------------------- */


// Register Custom Post Type

function registrar_treinamentos() {

  $labels = array(
    'name'                => _x( 'Treinamentos', 'Post Type General Name', 'konrad' ),
    'singular_name'       => _x( 'Treinamento', 'Post Type Singular Name', 'konrad' ),
    'menu_name'           => __( 'Treinamentos', 'konrad' ),
    'name_admin_bar'      => __( 'Treinamentos', 'konrad' ),
    'parent_item_colon'   => __( 'Pai:', 'konrad' ),
    'all_items'           => __( 'Todos', 'konrad' ),
    'add_new_item'        => __( 'Adicionar Novo', 'konrad' ),
    'add_new'             => __( 'Adicionar Novo', 'konrad' ),
    'new_item'            => __( 'Novo', 'konrad' ),
    'edit_item'           => __( 'Editar', 'konrad' ),
    'update_item'         => __( 'Atualizar', 'konrad' ),
    'view_item'           => __( 'Ver', 'konrad' ),
    'search_items'        => __( 'Buscar', 'konrad' ),
    'not_found'           => __( 'Nenhum resultado encontrado', 'konrad' ),
    'not_found_in_trash'  => __( 'Nenhum item na lixeira', 'konrad' ),
  );
  $args = array(
    'label'               => __( 'treinamentos', 'konrad' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-media-document',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'treinamentos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'registrar_treinamentos', 0 );



// Register Custom Post Type

function registrar_turmas() {

  $labels = array(
    'name'                => _x( 'Turmas', 'Post Type General Name', 'konrad' ),
    'singular_name'       => _x( 'Turma', 'Post Type Singular Name', 'konrad' ),
    'menu_name'           => __( 'Turmas', 'konrad' ),
    'name_admin_bar'      => __( 'Turmas', 'konrad' ),
    'parent_item_colon'   => __( 'Pai:', 'konrad' ),
    'all_items'           => __( 'Todos', 'konrad' ),
    'add_new_item'        => __( 'Adicionar Novo', 'konrad' ),
    'add_new'             => __( 'Adicionar Novo', 'konrad' ),
    'new_item'            => __( 'Novo', 'konrad' ),
    'edit_item'           => __( 'Editar', 'konrad' ),
    'update_item'         => __( 'Atualizar', 'konrad' ),
    'view_item'           => __( 'Ver', 'konrad' ),
    'search_items'        => __( 'Buscar', 'konrad' ),
    'not_found'           => __( 'Nenhum resultado encontrado', 'konrad' ),
    'not_found_in_trash'  => __( 'Nenhum item na lixeira', 'konrad' ),
  );
  $args = array(
    'label'               => __( 'turmas', 'konrad' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-groups',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'turmas', $args );

}

// Hook into the 'init' action
add_action( 'init', 'registrar_turmas', 0 );

/* -------------------------------------------------------- */


// if(function_exists("register_field_group"))
// {
//   register_field_group(array (
//     'id' => 'acf_areas-de-atuacao',
//     'title' => 'Áreas de Atuação',
//     'fields' => array (
//       array (
//         'key' => 'field_55563b3e1eef7',
//         'label' => 'Cor Primária',
//         'name' => 'areas_de_atuacao_cor_primaria',
//         'type' => 'color_picker',
//         'instructions' => 'Selecione a cor primária para títulos.',
//         'required' => 1,
//         'default_value' => '',
//       ),
//       array (
//         'key' => 'field_55563b7d1eef8',
//         'label' => 'Cor secundária',
//         'name' => 'areas_de_atuacao_cor_secundaria',
//         'type' => 'color_picker',
//         'instructions' => 'Selecione a cor secundária para botões e detalhes.',
//         'default_value' => '',
//       ),
//       array (
//         'key' => 'field_555639ec54a79',
//         'label' => 'Resumo',
//         'name' => 'areas_de_atuacao_resumo',
//         'type' => 'textarea',
//         'instructions' => 'Insira aqui uma descrição curta sobre a área de atuação.',
//         'default_value' => '',
//         'placeholder' => '',
//         'maxlength' => '',
//         'rows' => '',
//         'formatting' => 'br',
//       ),
//       array (
//         'key' => 'field_55551988f9bf6',
//         'label' => 'Subtítulo',
//         'name' => 'areas_de_atuacao_subtitulo',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o subtítulo da Área de Atuação.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555519abf9bf7',
//         'label' => 'Descrição',
//         'name' => 'areas_de_atuacao_descricao',
//         'type' => 'wysiwyg',
//         'instructions' => 'Insira aqui a descrição da Área de atuação.',
//         'default_value' => '',
//         'toolbar' => 'basic',
//         'media_upload' => 'no',
//       ),
//       array (
//         'key' => 'field_55551a0af9bf8',
//         'label' => 'Serviços',
//         'name' => 'areas_de_atuacao_servicos',
//         'type' => 'repeater',
//         'instructions' => 'Selecione aqui os serviços que serão exibidos para esta área de atuação.',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_55551a2cf9bf9',
//             'label' => 'Serviço',
//             'name' => 'servico',
//             'type' => 'post_object',
//             'column_width' => '',
//             'post_type' => array (
//               0 => 'servicos',
//             ),
//             'taxonomy' => array (
//               0 => 'all',
//             ),
//             'allow_null' => 1,
//             'multiple' => 0,
//           ),
//           array (
//             'key' => 'field_55551a47f9bfa',
//             'label' => 'Descrição',
//             'name' => 'descricao',
//             'type' => 'textarea',
//             'instructions' => 'Insira aqui uma breve descriçaõ sobre o serviço.',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'maxlength' => '',
//             'rows' => '',
//             'formatting' => 'br',
//           ),
//         ),
//         'row_min' => '',
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar',
//       ),
//       array (
//         'key' => 'field_55563eebe5f3a',
//         'label' => 'Treinamentos - Descrição',
//         'name' => 'areas_de_atuacao_treinamentos_descricao',
//         'type' => 'textarea',
//         'instructions' => 'Insira aqui a descrição dos Treinamentos prestados para esta Área de Atuação.',
//         'default_value' => '',
//         'placeholder' => '',
//         'maxlength' => '',
//         'rows' => '',
//         'formatting' => 'br',
//       ),
//       array (
//         'key' => 'field_55551a79599f1',
//         'label' => 'Treinamentos',
//         'name' => 'areas_de_atuacao_treinamentos',
//         'type' => 'post_object',
//         'instructions' => 'Selecione aqui os treinamentos referentes à esta área de atuação.',
//         'post_type' => array (
//           0 => 'treinamentos',
//         ),
//         'taxonomy' => array (
//           0 => 'all',
//         ),
//         'allow_null' => 0,
//         'multiple' => 1,
//       ),
//       array (
//         'key' => 'field_55551b67b3c7d',
//         'label' => 'Clientes',
//         'name' => 'areas_de_atuacao_clientes',
//         'type' => 'post_object',
//         'instructions' => 'Selecione aqui os clientes relacionados à esta área de atuação.',
//         'post_type' => array (
//           0 => 'clientes',
//         ),
//         'taxonomy' => array (
//           0 => 'all',
//         ),
//         'allow_null' => 0,
//         'multiple' => 1,
//       ),
//       array (
//         'key' => 'field_555640b2c41e8',
//         'label' => 'Imagem da chamada inferior',
//         'name' => 'areas_de_atuacao_imagem_chamada',
//         'type' => 'image',
//         'instructions' => 'Insira aqui a imagem da chamada inferior. <br>
//   Resolução recomendada: 1920 x 359 pixels (largura x altura).',
//         'save_format' => 'object',
//         'preview_size' => 'thumbnail',
//         'library' => 'all',
//       ),
//       array (
//         'key' => 'field_55564168c41e9',
//         'label' => 'Descrição da chamada',
//         'name' => 'areas_de_atuacao_descricao_chamada',
//         'type' => 'textarea',
//         'instructions' => 'Insira aqui a descrição da chamada.',
//         'default_value' => '',
//         'placeholder' => '',
//         'maxlength' => '',
//         'rows' => '',
//         'formatting' => 'none',
//       ),
//       array (
//         'key' => 'field_555a62099cbb5',
//         'label' => 'Depoimentos',
//         'name' => 'areas_de_atuacao_depoimentos',
//         'type' => 'post_object',
//         'instructions' => 'Selecione aqui os depoimentos que deverão ser exibidos para esta área de atuação.',
//         'post_type' => array (
//           0 => 'depoimentos',
//         ),
//         'taxonomy' => array (
//           0 => 'all',
//         ),
//         'allow_null' => 0,
//         'multiple' => 1,
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'areas_de_atuacao',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_clientes',
//     'title' => 'Clientes',
//     'fields' => array (
//       array (
//         'key' => 'field_5553c6e82d40f',
//         'label' => 'Descrição',
//         'name' => 'clientes_descricao',
//         'type' => 'textarea',
//         'instructions' => 'Insira aqui a descrição sobre o cliente. <br>
  
//   A imagem deve ser inserida em <b>Imagem Destacada</b>, com resolução recomendada de 154 x 101 pixels (largura x altura), com <b>fundo branco</b>.',
//         'default_value' => '',
//         'placeholder' => '',
//         'maxlength' => '',
//         'rows' => '',
//         'formatting' => 'br',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'clientes',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'acf_after_title',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//         0 => 'permalink',
//         1 => 'the_content',
//         2 => 'excerpt',
//         3 => 'custom_fields',
//         4 => 'discussion',
//         5 => 'comments',
//         6 => 'revisions',
//         7 => 'slug',
//         8 => 'author',
//         9 => 'format',
//         10 => 'categories',
//         11 => 'tags',
//         12 => 'send-trackbacks',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_depoimentos',
//     'title' => 'Depoimentos',
//     'fields' => array (
//       array (
//         'key' => 'field_5554f37c8f6a1',
//         'label' => 'Depoimentoo',
//         'name' => 'depoimentos_depoimento',
//         'type' => 'wysiwyg',
//         'instructions' => 'Insira aqui o texto do depoimento.',
//         'default_value' => '',
//         'toolbar' => 'basic',
//         'media_upload' => 'no',
//       ),
//       array (
//         'key' => 'field_5554f3a58f6a2',
//         'label' => 'Nome do cliente/Empresa',
//         'name' => 'depoimentos_nome_do_cliente',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o nome do cliente ou empresa.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_5554f4968f6a3',
//         'label' => 'Serviço prestado',
//         'name' => 'depoimentos_servico_prestado',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o serviço prestado pelo cliente.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_5554f5d11f526',
//         'label' => 'Endereço do Vídeo',
//         'name' => 'depoimentos_endereco_do_video',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o endereço completo do video no youtube.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'depoimentos',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'acf_after_title',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//         0 => 'permalink',
//         1 => 'the_content',
//         2 => 'excerpt',
//         3 => 'custom_fields',
//         4 => 'discussion',
//         5 => 'comments',
//         6 => 'revisions',
//         7 => 'slug',
//         8 => 'author',
//         9 => 'format',
//         10 => 'featured_image',
//         11 => 'categories',
//         12 => 'tags',
//         13 => 'send-trackbacks',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_empresa',
//     'title' => 'Empresa',
//     'fields' => array (
//       array (
//         'key' => 'field_55551c3e4caf7',
//         'label' => 'Conteúdo da Página Empresa',
//         'name' => 'empresa_conteudo',
//         'type' => 'repeater',
//         'instructions' => 'Insira aqui o conteúdo (cada bloco adicionado é uma coluna).',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_55551c7c4caf8',
//             'label' => 'Conteúdo',
//             'name' => 'conteudo',
//             'type' => 'wysiwyg',
//             'column_width' => '',
//             'default_value' => '',
//             'toolbar' => 'basic',
//             'media_upload' => 'no',
//           ),
//           array (
//             'key' => 'field_55551c8e4caf9',
//             'label' => 'Imagem',
//             'name' => 'imagem',
//             'type' => 'image',
//             'column_width' => '',
//             'save_format' => 'object',
//             'preview_size' => 'thumbnail',
//             'library' => 'all',
//           ),
//         ),
//         'row_min' => 1,
//         'row_limit' => 2,
//         'layout' => 'row',
//         'button_label' => 'Adicionar bloco',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'page',
//           'operator' => '==',
//           'value' => '2',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//         0 => 'permalink',
//         1 => 'the_content',
//         2 => 'excerpt',
//         3 => 'custom_fields',
//         4 => 'discussion',
//         5 => 'comments',
//         6 => 'revisions',
//         7 => 'slug',
//         8 => 'author',
//         9 => 'format',
//         10 => 'categories',
//         11 => 'tags',
//         12 => 'send-trackbacks',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_opcoes',
//     'title' => 'Opções',
//     'fields' => array (
//       array (
//         'key' => 'field_555bae970ba63',
//         'label' => 'Empresa',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_55562b294e34b',
//         'label' => 'Telefones',
//         'name' => 'konrad_telefones',
//         'type' => 'repeater',
//         'instructions' => 'Insira aqui os números de telefone da Konrad que serão exibidos no site. <br>
//   Obs.: o primeiro telefone cadastrado será exibido na página de turma (treinamentos).',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_55562b834e34c',
//             'label' => 'Telefone',
//             'name' => 'telefone',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//         ),
//         'row_min' => '',
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar Telefone',
//       ),
//       array (
//         'key' => 'field_55562b9b4e34d',
//         'label' => 'Horário de Atendimento',
//         'name' => 'konrad_horario_de_atendimento',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o horário de atendimento.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_55562bb54e34e',
//         'label' => 'Email',
//         'name' => 'konrad_email',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o email.<br>
//   Obs.: O email cadastrado aqui receberá as mensagens do formulário de contato.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'html',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555d13fbaf54e',
//         'label' => 'Facebook - Fanpage',
//         'name' => 'konrad_facebook',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555d1402af54f',
//         'label' => 'Linkedin - Perfil',
//         'name' => 'konrad_linkedin',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'html',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_55562bca4e34f',
//         'label' => 'Endereço',
//         'name' => 'konrad_endereco',
//         'type' => 'google_map',
//         'instructions' => 'Localize através deste mapa o endereço correto da Konrad.',
//         'center_lat' => '',
//         'center_lng' => '',
//         'zoom' => '',
//         'height' => '',
//       ),
//       array (
//         'key' => 'field_555bae9e0ba64',
//         'label' => 'Dados Bancários',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_555baeaa0ba65',
//         'label' => 'Banco',
//         'name' => 'dadosbancarios_banco',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o nome do banco.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555baec30ba66',
//         'label' => 'Agência',
//         'name' => 'dadosbancarios_agencia',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o número da agência.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555baed60ba67',
//         'label' => 'Conta',
//         'name' => 'dadosbancarios_conta',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o número da conta.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'options_page',
//           'operator' => '==',
//           'value' => 'acf-options',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'default',
//       'hide_on_screen' => array (
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_servicos',
//     'title' => 'Serviços',
//     'fields' => array (
//       array (
//         'key' => 'field_555674a00bda0',
//         'label' => 'Resumo do serviço',
//         'name' => 'servicos_resumo',
//         'type' => 'textarea',
//         'instructions' => 'Insira aqui um breve resumo sobre o serviço.',
//         'default_value' => '',
//         'placeholder' => '',
//         'maxlength' => '',
//         'rows' => '',
//         'formatting' => 'br',
//       ),
//       array (
//         'key' => 'field_555518454feb0',
//         'label' => 'Treinamento',
//         'name' => 'servicos_treinamento',
//         'type' => 'true_false',
//         'instructions' => 'Marque esta caixa se o serviço é relacionado a treinamentos.',
//         'message' => 'Os treinamentos serão exibidos na página de detalhes deste serviço.',
//         'default_value' => 0,
//       ),
//       array (
//         'key' => 'field_5555179431acb',
//         'label' => 'Conteúdo do Serviço',
//         'name' => 'servicos_conteudo',
//         'type' => 'repeater',
//         'instructions' => 'Insira aqui os blocos de conteúdo do Serviço. <br>
//   Existem três opções: texto com foto, texto com vídeo ou apenas texto. <br>
//   Resolução recomendada para a imagem: 528x297 pixels (largura x altura).',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_5555180131acc',
//             'label' => 'Título',
//             'name' => 'titulo',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_5555180831acd',
//             'label' => 'Descrição',
//             'name' => 'descricao',
//             'type' => 'wysiwyg',
//             'column_width' => '',
//             'default_value' => '',
//             'toolbar' => 'basic',
//             'media_upload' => 'no',
//           ),
//           array (
//             'key' => 'field_5555182d31ace',
//             'label' => 'Vídeo',
//             'name' => 'video',
//             'type' => 'text',
//             'instructions' => 'Insira a url completa do Youtube.',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_555518dbf026d',
//             'label' => 'Imagem',
//             'name' => 'imagem',
//             'type' => 'image',
//             'column_width' => '',
//             'save_format' => 'object',
//             'preview_size' => 'thumbnail',
//             'library' => 'all',
//           ),
//         ),
//         'row_min' => 1,
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar bloco',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'servicos',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_treinamentos',
//     'title' => 'Treinamentos',
//     'fields' => array (
//       array (
//         'key' => 'field_5554f6e27298d',
//         'label' => 'Descrição de Treinamento',
//         'name' => 'descricao_de_treinamento',
//         'type' => 'repeater',
//         'instructions' => 'Neste campo você pode inserir vários blocos descritivos sobre o treinamento. <br>
//   Existem três alternativas: apenas texto, texto com vídeo ou texto com imagem. O vídeo sempre terá prioridade.
//   ',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_5554f72f7298e',
//             'label' => 'Título',
//             'name' => 'titulo',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_5554f7367298f',
//             'label' => 'Texto',
//             'name' => 'texto',
//             'type' => 'wysiwyg',
//             'column_width' => '',
//             'default_value' => '',
//             'toolbar' => 'basic',
//             'media_upload' => 'no',
//           ),
//           array (
//             'key' => 'field_5554f74272990',
//             'label' => 'Vídeo',
//             'name' => 'video',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_5554f74a72991',
//             'label' => 'Imagem',
//             'name' => 'imagem',
//             'type' => 'image',
//             'column_width' => '',
//             'save_format' => 'object',
//             'preview_size' => 'thumbnail',
//             'library' => 'all',
//           ),
//         ),
//         'row_min' => 1,
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar bloco',
//       ),
//       array (
//         'key' => 'field_555500ab4f051',
//         'label' => 'Turmas',
//         'name' => 'treinamentos_turmas',
//         'type' => 'post_object',
//         'instructions' => 'Marque aqui as turmas cadastradas para este treinamento.',
//         'post_type' => array (
//           0 => 'turmas',
//         ),
//         'taxonomy' => array (
//           0 => 'all',
//         ),
//         'allow_null' => 0,
//         'multiple' => 1,
//       ),
//       array (
//         'key' => 'field_555a741c9e001',
//         'label' => 'Arquivos do Treinamento',
//         'name' => 'treinamentos_arquivos',
//         'type' => 'repeater',
//         'instructions' => 'Insira aqui os arquivos referentes ao treinamento. <br>Formatos sugeridos: PDF, DOC e DOCX.',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_555a7a54e67d9',
//             'label' => 'Nome',
//             'name' => 'nome',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_555a747f9e002',
//             'label' => 'Arquivo',
//             'name' => 'arquivo',
//             'type' => 'file',
//             'column_width' => '',
//             'save_format' => 'url',
//             'library' => 'all',
//           ),
//         ),
//         'row_min' => '',
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar arquivo',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'treinamentos',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//         0 => 'permalink',
//         1 => 'the_content',
//         2 => 'excerpt',
//         3 => 'custom_fields',
//         4 => 'discussion',
//         5 => 'comments',
//         6 => 'revisions',
//         7 => 'slug',
//         8 => 'author',
//         9 => 'format',
//         10 => 'featured_image',
//         11 => 'categories',
//         12 => 'tags',
//         13 => 'send-trackbacks',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
//   register_field_group(array (
//     'id' => 'acf_turmas',
//     'title' => 'Turmas',
//     'fields' => array (
//       array (
//         'key' => 'field_555503c58b5ea',
//         'label' => 'Detalhes',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_5555014bc3661',
//         'label' => 'Treinamento/Evento',
//         'name' => 'turmas_treinamento_evento',
//         'type' => 'text',
//         'instructions' => 'Insira aqui o título da Turma.',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555505277b393',
//         'label' => 'Data de início',
//         'name' => 'turmas_data_de_inicio',
//         'type' => 'date_picker',
//         'date_format' => 'dd/M',
//         'display_format' => 'dd/mm/yy',
//         'first_day' => 0,
//       ),
//       array (
//         'key' => 'field_5555017bc3662',
//         'label' => 'Duração',
//         'name' => 'turma_duracao',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555bb99ef24f1',
//         'label' => 'Local',
//         'name' => 'turmas_local',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'html',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_5555019bc3663',
//         'label' => 'Endereço completo',
//         'name' => 'turmas_endereco_completo',
//         'type' => 'google_map',
//         'instructions' => 'Selecione no mapa o endereço.',
//         'center_lat' => '',
//         'center_lng' => '',
//         'zoom' => '',
//         'height' => '',
//       ),
//       array (
//         'key' => 'field_555501b6c3664',
//         'label' => 'Cidade',
//         'name' => 'turmas_cidade',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_55550254c3665',
//         'label' => 'UF',
//         'name' => 'turmas_uf',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => 2,
//       ),
//       array (
//         'key' => 'field_55550281c3666',
//         'label' => 'Carga Horária',
//         'name' => 'turmas_carga',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_55550295c3667',
//         'label' => 'Horário',
//         'name' => 'turmas_horario',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555502b8c3668',
//         'label' => 'Total de Vagas',
//         'name' => 'turmas_vagas',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => '',
//         'append' => '',
//         'formatting' => 'html',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_555503d18b5eb',
//         'label' => 'Valores',
//         'name' => '',
//         'type' => 'tab',
//       ),
//       array (
//         'key' => 'field_55550337cdf0b',
//         'label' => 'Preço para clientes/parceiros/cfe. de divulgação',
//         'name' => 'turmas_preco_clientes',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => 'R$',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_55550375cdf0c',
//         'label' => 'Preço para demais interessados',
//         'name' => 'turmas_preco_demais',
//         'type' => 'text',
//         'default_value' => '',
//         'placeholder' => '',
//         'prepend' => 'R$',
//         'append' => '',
//         'formatting' => 'none',
//         'maxlength' => '',
//       ),
//       array (
//         'key' => 'field_5555057f81987',
//         'label' => 'Política de Valorização de Inscrições',
//         'name' => 'turmas_descontos',
//         'type' => 'repeater',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_5555059d81988',
//             'label' => 'Título',
//             'name' => 'titulo',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_555505a481989',
//             'label' => 'Valor',
//             'name' => 'valor',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'html',
//             'maxlength' => '',
//           ),
//         ),
//         'row_min' => '',
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar valor',
//       ),
//       array (
//         'key' => 'field_55550614a0377',
//         'label' => 'Mais informações',
//         'name' => 'turmas_mais_informacoes',
//         'type' => 'repeater',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_55550629a0378',
//             'label' => 'empresa',
//             'name' => 'empresa',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_55550638a0379',
//             'label' => 'Telefone',
//             'name' => 'telefone',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'html',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_5555063da037a',
//             'label' => 'Email',
//             'name' => 'email',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'html',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_55550641a037b',
//             'label' => 'Site',
//             'name' => 'site',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'html',
//             'maxlength' => '',
//           ),
//         ),
//         'row_min' => '',
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar parceiro',
//       ),
//       array (
//         'key' => 'field_555a8277454d8',
//         'label' => 'Arquivos da Turma de Treinamento',
//         'name' => 'turmas_arquivos',
//         'type' => 'repeater',
//         'instructions' => 'Insira aqui os arquivos/documentos para esta turma. <br>Formatos recomendados: PDF, DOC e DOCX.',
//         'sub_fields' => array (
//           array (
//             'key' => 'field_555a82c651231',
//             'label' => 'Nome',
//             'name' => 'nome',
//             'type' => 'text',
//             'column_width' => '',
//             'default_value' => '',
//             'placeholder' => '',
//             'prepend' => '',
//             'append' => '',
//             'formatting' => 'none',
//             'maxlength' => '',
//           ),
//           array (
//             'key' => 'field_555a82aa454d9',
//             'label' => 'Arquivo',
//             'name' => 'arquivo',
//             'type' => 'file',
//             'column_width' => '',
//             'save_format' => 'url',
//             'library' => 'all',
//           ),
//         ),
//         'row_min' => '',
//         'row_limit' => '',
//         'layout' => 'table',
//         'button_label' => 'Adicionar arquivo',
//       ),
//     ),
//     'location' => array (
//       array (
//         array (
//           'param' => 'post_type',
//           'operator' => '==',
//           'value' => 'turmas',
//           'order_no' => 0,
//           'group_no' => 0,
//         ),
//       ),
//     ),
//     'options' => array (
//       'position' => 'normal',
//       'layout' => 'no_box',
//       'hide_on_screen' => array (
//         0 => 'permalink',
//         1 => 'the_content',
//         2 => 'excerpt',
//         3 => 'custom_fields',
//         4 => 'discussion',
//         5 => 'comments',
//         6 => 'revisions',
//         7 => 'slug',
//         8 => 'author',
//         9 => 'format',
//         10 => 'featured_image',
//         11 => 'categories',
//         12 => 'tags',
//         13 => 'send-trackbacks',
//       ),
//     ),
//     'menu_order' => 0,
//   ));
// }

function nome_do_mes($month)
        {
            $months = array(
                1   =>  'Janeiro',
                2   =>  'Fevereiro',
                3   =>  'Março',
                4   =>  'Abril',
                5   =>  'Maio',
                6   =>  'Junho',
                7   =>  'Julho',
                8   =>  'Agosto',
                9   =>  'Setembro',
                10  =>  'Outubro',
                11  =>  'Novembro',
                12  =>  'Dezembro'
            );

            return $months[$month];
        }

function wp_custom_archive($args = '') {
    global $wpdb, $wp_locale;
    $defaults = array(
        'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1
    );
    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );
    if ( '' != $limit ) {
        $limit = absint($limit);
        $limit = ' LIMIT '.$limit;
    }
    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;
    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';
    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';
    if ( !$archive_date_format_over_ride ) {
        $archive_day_date_format = get_option('date_format');
        $archive_week_start_date_format = get_option('date_format');
        $archive_week_end_date_format = get_option('date_format');
    }
    //filters
    $where = apply_filters('customarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
    $join = apply_filters('customarchives_join', "", $r);
        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC $limit";
        $key = md5($query);
        $cache = wp_cache_get( 'wp_custom_archive' , 'general');
        if ( !isset( $cache[ $key ] ) ) {
            $arcresults = $wpdb->get_results($query);
            $cache[ $key ] = $arcresults;
            wp_cache_set( 'wp_custom_archive', $cache, 'general' );
        } else {
            $arcresults = $cache[ $key ];
        }

        //echo '<pre>';
        //print_r($ano);
        //echo '</pre>';

        
        

        foreach($arcresults as $result){
          $tratando[] = get_object_vars($result);
        }

        foreach($tratando as $trat){

          $mes = nome_do_mes($trat['month']);

          $ano[$trat['year']]['meses'][] = $trat['month'];
        }

        //echo '<pre>';
        //print_r($ano);
        //echo '</pre>';

        $contador = 0;

        echo '<h3 class="archive-title"><i class="fa fa-caret-down"></i>';

        foreach($ano as $k => $v){

          echo "$k</h3><ul class='dropdown'>";

          foreach($ano[$k] as $mes){
            foreach($mes as $m){
            if($m < 10){
              $mb = '0'.$m;
            }else{
              $mb = $m;
            }

            echo "<li><a href='".get_bloginfo('url')."/dicas/arquivo/".$k.$mb."'>".nome_do_mes($m)."</a></li>";
            }
          }

          echo '</ul></li>';

          $contador++;

        }

        echo '</ul>';
}


function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    echo '';
}

add_action( 'admin_menu', 'revcon_change_post_label' );