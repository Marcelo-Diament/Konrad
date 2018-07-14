<?php /* Smarty version 2.6.22, created on 2012-04-26 02:01:41
         compiled from conteudos.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'conteudos.htm', 1, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>

<div id="conteudos">
<?php if ($this->_tpl_vars['submenus']): ?>
<ul id="primary-nav">
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['submenus']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<li><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/<?php echo $this->_tpl_vars['getKey'][1]; ?>
/<?php if ($this->_tpl_vars['getKey'][2]): ?><?php echo $this->_tpl_vars['getKey'][2]; ?>
/<?php endif; ?><?php echo $this->_tpl_vars['submenus'][$this->_sections['i']['index']]['url']; ?>
/"><?php echo $this->_tpl_vars['submenus'][$this->_sections['i']['index']]['title']; ?>
</a></li>
<?php endfor; endif; ?>
</ul>
<?php endif; ?>

<div id="conteudo" <?php if (! $this->_tpl_vars['submenus']): ?>style="width:100%;"<?php endif; ?>>
	<h2><?php echo $this->_tpl_vars['conteudo']['title']; ?>
</h2>
	<?php echo $this->_tpl_vars['conteudo']['content']; ?>

</div>

</div>
<div class="clear"></div>