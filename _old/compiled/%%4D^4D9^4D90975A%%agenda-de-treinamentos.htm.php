<?php /* Smarty version 2.6.22, created on 2012-05-10 17:44:29
         compiled from agenda-de-treinamentos.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'agenda-de-treinamentos.htm', 1, false),array('modifier', 'date_format', 'agenda-de-treinamentos.htm', 13, false),array('modifier', 'nl2br', 'agenda-de-treinamentos.htm', 15, false),array('modifier', 'escape', 'agenda-de-treinamentos.htm', 26, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<?php if ($this->_tpl_vars['getKey'][2]): ?>
<div id="agenda">
	<div id="reserva">
		<ul>
			<li><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/fazer-reserva-curso/<?php echo $this->_tpl_vars['getKey'][2]; ?>
/" class="reserva">Fazer reserva</a></li>
			<li><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/solicitar-informacoes/<?php echo $this->_tpl_vars['getKey'][2]; ?>
/" class="informacoes">Solicitar informações</a></li>
			<?php if ($this->_tpl_vars['turma']['confirmada'] == 't'): ?><li class="confirmada">Turma confirmada</li><?php endif; ?>
		</ul>
	</div>
	<div id="conteudo">
	<h4><?php echo $this->_tpl_vars['turma']['nome_curso']; ?>
</h4>
	<h5><?php echo $this->_tpl_vars['turma']['cidade']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 à <?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</h5>
	<ul>
		<?php if ($this->_tpl_vars['turma']['programa']): ?><li><strong>Programa:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['programa'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['objetivo']): ?><li><strong>Objetivo da aprendizagem:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['objetivo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['metodologia']): ?><li><strong>Metodologia:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['metodologia'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['publico_alvo']): ?><li><strong>Público-alvo:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['publico_alvo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['instrutor']): ?><li><strong>Instrutor:</strong> <?php echo $this->_tpl_vars['turma']['instrutor']; ?>
</li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['minicurriculo']): ?><li><strong>Mini currículo:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['minicurriculo'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['carga_horaria']): ?><li><strong>Carga horária:</strong> <?php echo $this->_tpl_vars['turma']['carga_horaria']; ?>
</li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['investimento']): ?><li><strong>Investimento:</strong> <?php echo $this->_tpl_vars['turma']['investimento']; ?>
</li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['material_incluido']): ?><li><strong>Incluído:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['material_incluido'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['local']): ?><li><strong>Local:</strong><p><?php echo $this->_tpl_vars['turma']['local']; ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['horario']): ?><li><strong>Horário:</strong><p><?php echo $this->_tpl_vars['turma']['horario']; ?>
</p></li><?php endif; ?>
		<?php if ($this->_tpl_vars['turma']['localizacao']): ?><li><strong>Localização:</strong><p><a href="#" onclick="javascript: window.open('<?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['localizacao'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
');">Ver mapa</a></p></li><?php endif; ?>
	</ul>
	<?php if ($this->_tpl_vars['turma']['depoimentos']): ?>
	<img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/hr_home.gif" width="100%" alt=""/>
	<ul>
		<li><strong>Depoimentos:</strong><p><?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['depoimentos'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p></li>
	</ul>
	<?php endif; ?>
	</div>
	<div class="clear"></div>
</div>
<?php else: ?>
<h2>Agenda de treinamentos</h2>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cursos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
  <tr><td><strong><?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['curso_nome']; ?>
</strong></td></tr>
  <tr> 
    <td>
	<table width="95%" cellpadding="0" cellspacing="0" border="0" style="padding-top:4px;">
        <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?> 
        <tr>
          <td <?php if ($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['confirmada'] == 't'): ?>style="background-color:#CCD3DD"<?php endif; ?>>&nbsp;<a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/agenda-de-treinamentos/<?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['url']; ?>
/<?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['code']; ?>
/"><?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['cidade']; ?>
 
            - <?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 à <?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</a></td>
        </tr>
        <?php endfor; endif; ?> </table></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <?php endfor; endif; ?> 
  <tr><td><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/turma_confirmada.gif" alt=""/></td></tr>
</table>
<?php endif; ?>