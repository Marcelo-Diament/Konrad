<?php /* Smarty version 2.6.22, created on 2012-04-26 20:01:12
         compiled from a-empresa.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'a-empresa.htm', 1, false),array('modifier', 'blog_content', 'a-empresa.htm', 3, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<h2>A Empresa</h2>
<?php echo ((is_array($_tmp=$this->_tpl_vars['content'])) ? $this->_run_mod_handler('blog_content', true, $_tmp) : smarty_modifier_blog_content($_tmp)); ?>