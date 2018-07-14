<?php /* Smarty version 2.6.22, created on 2012-04-29 19:29:07
         compiled from mapa-do-site.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'mapa-do-site.htm', 1, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<h2>Mapa do Site</h2>
<script type="text/javascript">
	<!--	
	mapa = new dTree('mapa', '<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/tree/');
	mapa.add(0,-1,'Home', '<?php echo $this->_tpl_vars['rootfolder']; ?>
/');
	<?php $_from = $this->_tpl_vars['mapa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
	mapa.add(<?php echo $this->_tpl_vars['id']+1; ?>
,<?php echo $this->_tpl_vars['item']['submenu']; ?>
,'<?php echo $this->_tpl_vars['item']['name']; ?>
', '<?php echo $this->_tpl_vars['rootfolder']; ?>
/<?php echo $this->_tpl_vars['item']['url']; ?>
/');
	<?php endforeach; endif; unset($_from); ?>
	document.write(mapa);
	//-->
</script>