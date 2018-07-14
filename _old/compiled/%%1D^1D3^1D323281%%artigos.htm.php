<?php /* Smarty version 2.6.22, created on 2012-04-26 04:57:25
         compiled from artigos.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'artigos.htm', 1, false),array('function', 'pagination', 'artigos.htm', 15, false),array('modifier', 'date_format', 'artigos.htm', 7, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<h2>Artigos</h2>
<div id="artigos">
<?php if ($this->_tpl_vars['getKey'][1]): ?>
<?php if ($this->_tpl_vars['error']): ?><div id="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php elseif ($this->_tpl_vars['display']): ?><div id="success"><?php echo $this->_tpl_vars['display']; ?>
</div><?php endif; ?>
<h3><?php echo $this->_tpl_vars['artigo']['title']; ?>
</h3>
<p class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['artigo']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</p>
<?php echo $this->_tpl_vars['artigo']['description']; ?>

<?php else: ?>
<ul id="artigos-list">
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['artigos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<li><span class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['artigos'][$this->_sections['i']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</span><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/artigos/<?php echo $this->_tpl_vars['artigos'][$this->_sections['i']['index']]['url']; ?>
/"><?php echo $this->_tpl_vars['artigos'][$this->_sections['i']['index']]['title']; ?>
</a></li>
	<?php endfor; endif; ?>
</ul>
<?php echo smarty_function_pagination(array('url' => ($this->_tpl_vars['rootfolder'])."/artigos/",'total' => $this->_tpl_vars['total'],'page' => $_GET['curpage'],'rows' => @ROWS), $this);?>

<?php endif; ?>
</div>