<?php /* Smarty version 2.6.22, created on 2009-07-31 05:18:50
         compiled from fazer-reserva.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'fazer-reserva.htm', 1, false),array('modifier', 'date_format', 'fazer-reserva.htm', 6, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<h2>Fazer reserva</h2>
<?php if ($this->_tpl_vars['error']): ?><div id="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php elseif ($this->_tpl_vars['display']): ?><div id="success"><?php echo $this->_tpl_vars['display']; ?>
</div><?php endif; ?><br/>
<div id="reserva">
<h4><?php echo $this->_tpl_vars['turma']['nome_curso']; ?>
</h4>
<h5><?php echo $this->_tpl_vars['turma']['cidade']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 à <?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</h5>
<form method="post" action="">
<table width="100%" border="0" cellpadding="1" cellspacing="1">
	<tr><td colspan="3">&nbsp;</td></tr>
	<tr> 
		<td>* Nome:</td>
		<td>&nbsp;</td>
		<td>* Empresa:</td>
	</tr>
	<tr> 
		<td><input name="nome" type="text" class="fields" value="<?php echo $_POST['nome']; ?>
" tabindex="1"/></td>
		<td>&nbsp;</td>
		<td><input name="empresa" type="text" class="fields" value="<?php echo $_POST['empresa']; ?>
" tabindex="2"/></td>
	</tr>
		<tr> 
		<td>* Cargo:</td>
		<td>&nbsp;</td>
		<td>E-mail:</td>
	</tr>
	<tr> 
		<td><input name="cargo" type="text" class="fields" value="<?php echo $_POST['cargo']; ?>
" tabindex="3"/></td>
		<td>&nbsp;</td>
		<td><input name="email" type="text" class="fields" value="<?php echo $_POST['email']; ?>
" tabindex="4"/></td>
	</tr>
	<tr> 
		<td>* Telefone:</td>
		<td>&nbsp;</td>
		<td>Endereço:</td>
	</tr>
	<tr> 
		<td><input name="telefone" type="text" class="fields" value="<?php echo $_POST['telefone']; ?>
" tabindex="5"/></td>
		<td>&nbsp;</td>
		<td><input name="endereco" type="text" class="fields" value="<?php echo $_POST['endereco']; ?>
" tabindex="6"/></td>
	</tr>
	<tr> 
		<td>* Estado:</td>
		<td>&nbsp;</td>
		<td>* Cidade:</td>
	</tr>
	<tr> 
		<td>
		<select name="estado" tabindex="7">
		<option value="0">Escolha uma op&ccedil;&atilde;o</option>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['estados']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<option value="<?php echo $this->_tpl_vars['estados'][$this->_sections['i']['index']]['extenso']; ?>
" <?php if ($this->_tpl_vars['estados'][$this->_sections['i']['index']]['extenso'] == $_POST['estado']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['estados'][$this->_sections['i']['index']]['extenso']; ?>
</option>
		<?php endfor; endif; ?>
		</select></td>
		<td>&nbsp;</td>
		<td><input name="cidade" type="text" class="fields" value="<?php echo $_POST['cidade']; ?>
" tabindex="8"/></td>
	</tr>
	<tr> 
		<td>CEP:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr> 
		<td><input name="cep" type="text" class="fields" value="<?php echo $_POST['cep']; ?>
" tabindex="9"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr> 
		<td colspan="3">Observa&ccedil;&otilde;es / Coment&aacute;rios :</td>
	</tr>
	<tr> 
		<td colspan="3"><textarea name="obs" class="fields" style="width:100%; height:150px;" tabindex="10"><?php echo $_POST['obs']; ?>
</textarea></td>
	</tr>
	<tr><td colspan="3"><input type="hidden" name="sended" value="1"/><input type="submit" value="  Enviar  " onclick="submit(); this.value='Aguarde...'; this.disabled=true;"/></td></tr>
</table>
</form>
</div>