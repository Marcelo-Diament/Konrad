<?php /* Smarty version 2.6.22, created on 2012-04-26 01:06:40
         compiled from mod_cursos.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'mod_cursos.htm', 44, false),array('modifier', 'secureurl', 'mod_cursos.htm', 132, false),array('modifier', 'zerofill', 'mod_cursos.htm', 233, false),array('modifier', 'truncate', 'mod_cursos.htm', 234, false),array('modifier', 'addslashes', 'mod_cursos.htm', 236, false),array('modifier', 'date_format', 'mod_cursos.htm', 317, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Gerenciador de websites</title>
	<style type="text/css">
	<!--
		@import url("css/admin.css");
	-->
	</style>
	<script language="JavaScript" type="text/javascript" src="javascript/defaultl.js"></script>
	<script language="JavaScript" type="text/javascript" src="javascript/jquery.js"></script>
	<script language="JavaScript" type="text/javascript" src="javascript/mask.js"></script>
	<script language="JavaScript" type="text/javascript">
		(function($) {
			$(function() {
				$.mask.addPlaceholder('~','[+-]');		
				$('#dt_inicio').mask('99/99/9999');
				$('#dt_termino').mask('99/99/9999');
				$('input[name=dt_workshop]').mask('99/99/9999');
			});
		}) (jQuery);
	</script>
</head>
<body>
<table width="100%" style="height:100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
		<table width="90%" border="0" cellpadding="0" cellspacing="0" class="table">
			<tr valign="middle">
			<td height="28" colspan="5" class="topo"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td style="font-weight:bold; color:#FFF;">Administração :: Konrad</td>
                <td align="right"><a href="." style="color:#FFF">Menu principal</a></td>
              </tr>
            </table></td>
		  </tr>
		  <tr>
			<td width="15" height="10"></td>
			<td width="498"></td>
			<td width="10"></td>
		  </tr>
		  <tr>
			<td height="10"></td>
			<td valign="top" class="<?php if ($this->_tpl_vars['error']): ?>error<?php else: ?>display<?php endif; ?>"><?php if ($this->_tpl_vars['error']): ?><img src="images/alert.gif" align="baseline">&nbsp;<?php endif; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['error'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['display']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['display'])); ?>

			</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="13"></td>
			<td></td>
			<td></td>
		  </tr>
		<?php if (! $_GET['option']): ?>
		  <tr>
			<td height="92"></td>
			<td valign="top">
			<?php if (! $_GET['curso_code']): ?>
			<fieldset>
			<legend><img src="images/thumb_mod_cursos.gif" align="middle">&nbsp;Adicionar novo curso&nbsp;</legend>
			<form action="" method="post" name="add_curso">
			<input type="hidden" name="salvar" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="100">Nome do curso:</td>
				  <td><input name="nome_curso" type="text" size="60" maxlength="100" value="<?php echo $_POST['nome_curso']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100">Ordem:</td>
				  <td><input name="ordem" type="text" size="10" maxlength="2" value="<?php echo $_POST['ordem']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Programa:</td>
				  <td><textarea rows="8" cols="60" name="programa" style="width:90%;"><?php echo $_POST['programa']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Objetivo:</td>
				  <td><textarea rows="4" cols="60" name="objetivo" style="width:90%;"><?php echo $_POST['objetivo']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Metodologia:</td>
				  <td><textarea rows="4" cols="60" name="metodologia" style="width:90%;"><?php echo $_POST['metodologia']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Depoimentos:</td>
				  <td><textarea rows="4" cols="60" name="depoimentos" style="width:90%;"><?php echo $_POST['depoimentos']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100">Público-alvo:</td>
				  <td><input name="publico_alvo" type="text" size="60" maxlength="100" value="<?php echo $_POST['publico_alvo']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100">Carga horária:</td>
				  <td><input name="carga_horaria" type="text" size="60" maxlength="100" value="<?php echo $_POST['carga_horaria']; ?>
"></td>
				 </tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td width="100">Instrutor:</td>
				  <td><input name="instrutor" type="text" size="60" maxlength="100" value="<?php echo $_POST['instrutor']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Minicurrículo:</td>
				  <td><textarea rows="4" cols="60" name="minicurriculo" style="width:90%;"><?php echo $_POST['minicurriculo']; ?>
</textarea></td>
				 </tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td width="100">Investimento:</td>
				  <td><input name="investimento" type="text" size="60" maxlength="100" value="<?php echo $_POST['investimento']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Incluído:</td>
				  <td><textarea rows="4" cols="60" name="incluido" style="width:90%;"><?php echo $_POST['incluido']; ?>
</textarea></td>
				 </tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td width="100" valign="top">Data final:</td>
				  <td><input name="dt_workshop" type="text" size="20" maxlength="10" value="<?php echo $_POST['dt_workshop']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Workshop:</td>
				  <td><textarea rows="4" cols="60" name="workshop" style="width:90%;"><?php echo $_POST['workshop']; ?>
</textarea></td>
				 </tr>
				 <tr>
					 <td>&nbsp;</td>
				 	<td><input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>></td>
				</tr>
			  </table>
		    </form>
			</fieldset>
			<?php else: ?>
			<fieldset>
			<legend><img src="images/thumb_mod_cursos.gif" align="middle">&nbsp;Editar o curso&nbsp;</legend>
			<form action="<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
" method="post" name="update_curso">
			<input type="hidden" name="update" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="100">Nome do curso:</td>
				  <td><input name="nome_curso" type="text" size="60" maxlength="100" value="<?php echo $_POST['nome_curso']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100">Ordem:</td>
				  <td><input name="ordem" type="text" size="10" maxlength="2" value="<?php echo $_POST['ordem']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Programa:</td>
				  <td><textarea rows="8" cols="60" name="programa" style="width:90%;"><?php echo $_POST['programa']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Objetivo:</td>
				  <td><textarea rows="4" cols="60" name="objetivo" style="width:90%;"><?php echo $_POST['objetivo']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Metodologia:</td>
				  <td><textarea rows="4" cols="60" name="metodologia" style="width:90%;"><?php echo $_POST['metodologia']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Depoimentos:</td>
				  <td><textarea rows="4" cols="60" name="depoimentos" style="width:90%;"><?php echo $_POST['depoimentos']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td width="100">Público-alvo:</td>
				  <td><input name="publico_alvo" type="text" size="60" maxlength="100" value="<?php echo $_POST['publico_alvo']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100">Carga horária:</td>
				  <td><input name="carga_horaria" type="text" size="60" maxlength="100" value="<?php echo $_POST['carga_horaria']; ?>
"></td>
				 </tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td width="100">Instrutor:</td>
				  <td><input name="instrutor" type="text" size="60" maxlength="100" value="<?php echo $_POST['instrutor']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Minicurrículo:</td>
				  <td><textarea rows="4" cols="60" name="minicurriculo" style="width:90%;"><?php echo $_POST['minicurriculo']; ?>
</textarea></td>
				 </tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td width="100">Investimento:</td>
				  <td><input name="investimento" type="text" size="60" maxlength="100" value="<?php echo $_POST['investimento']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Incluído:</td>
				  <td><textarea rows="4" cols="60" name="incluido" style="width:90%;"><?php echo $_POST['incluido']; ?>
</textarea></td>
				</tr>
				 <tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td width="100" valign="top">Data final:</td>
				  <td><input name="dt_workshop" type="text" size="20" maxlength="10" value="<?php echo $_POST['dt_workshop']; ?>
"></td>
				 </tr>
				<tr>
				  <td width="100" valign="top">Workshop:</td>
				  <td><textarea rows="4" cols="60" name="workshop" style="width:90%;"><?php echo $_POST['workshop']; ?>
</textarea></td>
				 </tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>
				  <input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>>
				  <input type="button" value="Sair" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">
				  </td>
				</tr>
			  </table>
		    </form>
			</fieldset>
			<?php endif; ?>
			</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="25"></td>
			<td>&nbsp;</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="95"></td>
			<td valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="form">
				<tr>
				  <td width="100%" height="86" valign="top">
					<fieldset>
                  <legend>Cursos&nbsp;</legend>
					<form name="cursos_list" method="post" action="">
					<input type="hidden" name="curso_code">
                    <table border="0" cellpadding="0" cellspacing="0" class="grid">
                      <tr class="ordenado"> 
                        <td width="80">&nbsp;C&oacute;digo</td>
                        <td>Curso</td>
						<td width="25">&nbsp;</td>
                        <td width="20">&nbsp;</td>
                      </tr>
                      <tr><td colspan="4">&nbsp;</td></tr>
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
                      <tr onMouseOver="mOvr(this,'#EFEFEF')" onMouseOut="mOut(this,'<?php if ($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code'] == $_GET['curso_code']): ?>#DBF1FD<?php else: ?>#FFFFFF<?php endif; ?>')" <?php if ($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code'] == $_GET['curso_code']): ?>bgcolor="#DBF1FD"<?php endif; ?>> 
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code'])) ? $this->_run_mod_handler('zerofill', true, $_tmp, 5) : smarty_modifier_zerofill($_tmp, 5)); ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['nome_curso'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</td>
						<td><img src="images/folder_new.gif" alt="" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
');"></td>
                        <td><input name="delete" type="image" onClick="if(!confirm('Deseja remover o curso (<?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['nome_curso'])) ? $this->_run_mod_handler('addslashes', true, $_tmp) : addslashes($_tmp)); ?>
) e suas turmas?')){ return false} else{curso_code.value='<?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code']; ?>
'};" src="images/delete_<?php if ($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code'] != $_GET['curso_code'] && $this->_tpl_vars['permissions']['usrdelete']): ?>true<?php else: ?>false<?php endif; ?>.gif" style="width:15px; height:16px;" <?php if ($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['code'] == $_GET['curso_code'] || ! $this->_tpl_vars['permissions']['usrdelete']): ?>disabled<?php endif; ?>></td>
                      </tr>
                      <?php endfor; else: ?>
                      <tr> 
                        <td colspan="4" align="center">Nenhum curso cadastrado</td>
                      </tr>
                      <?php endif; ?>
                      <tr><td colspan="4">&nbsp;</td></tr>
                    </table>
					</form>
					</fieldset></td>
				</tr>
			  </table></td>
			<td></td>
		  </tr>
		  <?php else: ?>
		  <tr>
			<td height="92"></td>
			<td valign="top">
			<?php if (! $_GET['turma_code']): ?>
			<fieldset>
			<legend><img src="images/thumb_mod_cursos.gif" align="middle">&nbsp;Adicionar nova turma&nbsp;</legend>
			<form action="<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
" method="post" name="add_turma">
			<input type="hidden" name="salvar" value="1">
			<input type="hidden" name="option" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
			    <tr>
				  <td width="100">Cidade:</td>
				  <td><input name="cidade" type="text" size="40" maxlength="80" value="<?php echo $_POST['cidade']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Local:</td>
				  <td><input name="local" type="text" size="40" maxlength="100" value="<?php echo $_POST['local']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Horário:</td>
				  <td><input name="horario" type="text" size="40" maxlength="50" value="<?php echo $_POST['horario']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Localização:</td>
				  <td><input name="localizacao" type="text" size="40" maxlength="100" value="<?php echo $_POST['localizacao']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Data início:</td>
				  <td><input name="dt_inicio" type="text" size="40" maxlength="10" value="<?php echo $_POST['dt_inicio']; ?>
" id="dt_inicio">					
				</tr>
			    <tr>
				  <td width="100">Data término:</td>
				  <td><input name="dt_termino" type="text" size="40" maxlength="10" value="<?php echo $_POST['dt_termino']; ?>
" id="dt_termino">					
				</tr>				
				<tr>
				  <td>&nbsp;</td>
				  <td><input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>></td>
				</tr>
			  </table>
		    </form>
			</fieldset>
			<?php else: ?>
			<fieldset>
			<legend><img src="images/thumb_mod_cursos.gif" align="middle">&nbsp;Editar a turma&nbsp;</legend>
			<form action="<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&turma_code=".($_GET['turma_code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
" method="post" name="update_turma">
			<input type="hidden" name="update" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
			    <tr>
				  <td width="100">Cidade:</td>
				  <td><input name="cidade" type="text" size="40" maxlength="80" value="<?php echo $_POST['cidade']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Local:</td>
				  <td><input name="local" type="text" size="40" maxlength="100" value="<?php echo $_POST['local']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Horário:</td>
				  <td><input name="horario" type="text" size="40" maxlength="50" value="<?php echo $_POST['horario']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Localização:</td>
				  <td><input name="localizacao" type="text" size="40" maxlength="100" value="<?php echo $_POST['localizacao']; ?>
">					
				</tr>
			    <tr>
				  <td width="100">Data início:</td>
				  <td><input name="dt_inicio" type="text" size="40" maxlength="10" value="<?php echo ((is_array($_tmp=$_POST['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
" id="dt_inicio">					
				</tr>
			    <tr>
				  <td width="100">Data término:</td>
				  <td><input name="dt_termino" type="text" size="40" maxlength="10" value="<?php echo ((is_array($_tmp=$_POST['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
" id="dt_termino">					
				</tr>
			    <tr>
				  <td width="100">Confirmada:</td>
				  <td><input name="confirmada" type="checkbox" <?php if ($_POST['confirmada']): ?>checked<?php endif; ?> value="1">					
				</tr>				
				<tr>
				  <td>&nbsp;</td>
				  <td>
				  <input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>>
				  <input type="button" value="Sair" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">
				  </td>
				</tr>
			  </table>
		    </form>
			</fieldset>
			<?php endif; ?>
			</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="25"></td>
			<td>&nbsp;</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="95"></td>
			<td valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="form">
				<tr>
				  <td width="100%" height="86" valign="top">
					<fieldset>
                  <legend>Turmas&nbsp;</legend>
					<form name="turmas_list" method="post" action="">
					<input type="hidden" name="turma_code">
					<input type="hidden" name="option">
                    <table border="0" cellpadding="0" cellspacing="0" class="grid">
                      <tr class="ordenado"> 
                        <td>&nbsp;C&oacute;digo</td>
                        <td>Cidade</td>
                        <td>Local</td>
                        <td>Data de início</td>
						<td>Data de término</td>
                        <td width="20">&nbsp;</td>
                      </tr>
                      <tr><td colspan="6">&nbsp;</td></tr>
                      <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['turmas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <tr onMouseOver="mOvr(this,'#EFEFEF')" onMouseOut="mOut(this,'<?php if ($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'] == $_GET['turma_code']): ?>#DBF1FD<?php else: ?>#FFFFFF<?php endif; ?>')" <?php if ($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'] == $_GET['turma_code']): ?>bgcolor="#DBF1FD"<?php endif; ?>> 
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&turma_code=".($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])) ? $this->_run_mod_handler('zerofill', true, $_tmp, 5) : smarty_modifier_zerofill($_tmp, 5)); ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&turma_code=".($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo $this->_tpl_vars['turmas'][$this->_sections['i']['index']]['cidade']; ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&turma_code=".($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo $this->_tpl_vars['turmas'][$this->_sections['i']['index']]['local']; ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&turma_code=".($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['turmas'][$this->_sections['i']['index']]['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&curso_code=".($_GET['curso_code'])."&turma_code=".($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['turmas'][$this->_sections['i']['index']]['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
                        <td><input name="delete" type="image" onClick="if(!confirm('Deseja remover a turma (<?php echo ((is_array($_tmp=$this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'])) ? $this->_run_mod_handler('zerofill', true, $_tmp, 5) : smarty_modifier_zerofill($_tmp, 5)); ?>
) e suas turmas?')){ return false} else{turma_code.value='<?php echo $this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code']; ?>
'};" src="images/delete_<?php if ($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'] != $_GET['turma_code'] && $this->_tpl_vars['permissions']['usrdelete']): ?>true<?php else: ?>false<?php endif; ?>.gif" style="width:15px; height:16px;" <?php if ($this->_tpl_vars['turmas'][$this->_sections['i']['index']]['code'] == $_GET['turma_code'] || ! $this->_tpl_vars['permissions']['usrdelete']): ?>disabled<?php endif; ?>></td>
                      </tr>
                      <?php endfor; else: ?>
                      <tr> 
                        <td colspan="6" align="center">Nenhuma turma cadastrada</td>
                      </tr>
                      <?php endif; ?>
					<tr><td colspan="6">&nbsp;</td></tr>
                    </table>
					</form>
					</fieldset></td>
				</tr>
			  </table></td>
			<td></td>
		  </tr>
		  <?php endif; ?>
		  <tr>
			<td height="23"></td>
			<td align="right">&nbsp;</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="23"></td>
			<td align="right"><a href="<?php if ($_GET['option']): ?>?page=<?php echo $_GET['page']; ?>
<?php else: ?>.<?php endif; ?>"><img src="images/back.gif" alt="Voltar" width="32" height="32" border="0"></a></td>
			<td></td>
		  </tr>
		  <tr>
			
          <td height="57" colspan="5" valign="middle" class="copyright">
				Resolu&ccedil;&atilde;o m&iacute;nima de 800x600 &copy; Copyright <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
, Konrad<br>
				<a href="http://www.gotz.com.br" target="_blank">Http://www.gotz.com.br</a>
			</td>
		  </tr>
		</table>	</td>
  </tr>
</table>
</body>
</html>