<?php /* Smarty version 2.6.22, created on 2012-06-11 15:17:18
         compiled from mod_conteudos.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'mod_conteudos.htm', 39, false),array('modifier', 'secureurl', 'mod_conteudos.htm', 56, false),array('modifier', 'freerte', 'mod_conteudos.htm', 64, false),array('modifier', 'truncate', 'mod_conteudos.htm', 128, false),array('modifier', 'addslashes', 'mod_conteudos.htm', 130, false),array('modifier', 'date_format', 'mod_conteudos.htm', 157, false),)), $this); ?>
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
	<script language="JavaScript" type="text/javascript">		
		function iebugfix() {
			rteModeType('rte_code_mode');
			rteModeType('rte_design_mode');
		}
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
		  <tr>
			<td height="92"></td>
			<td valign="top">
			<?php if (! $_GET['conteudo_code']): ?>
			<fieldset>
			<legend><img src="images/folder_new.gif" align="middle">&nbsp;Adicionar conteúdo&nbsp;</legend>
			<script src="javascript/editor/js/richtext.js" type="text/javascript" language="javascript"></script>
			<script src="javascript/editor/js/config.js" type="text/javascript" language="javascript"></script>
			<form action="<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&root_content=".($_GET['root_content']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
" method="post" name="add_conteudo">
			<input type="hidden" name="salvar" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="60">Título :</td>
				  <td><input name="title" type="text" size="50" maxlength="255" value="<?php echo $_POST['title']; ?>
"></td>
				</tr>				
				<tr>
					<td colspan="2"><script language="JavaScript" type="text/javascript">initRTE('<?php echo ((is_array($_tmp=$_POST['description'])) ? $this->_run_mod_handler('freerte', true, $_tmp) : smarty_modifier_freerte($_tmp)); ?>
', 'css/editor.css');</script></td>
				</tr>
				<tr><td align="right" colspan="2"><input type="submit" value="Salvar" onClick="iebugfix(); submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>></td></tr>
			  </table>
		    </form>
			</fieldset>
			<?php else: ?>
			<fieldset>
			<legend><img src="images/folder_new.gif" align="middle">&nbsp;Editar o conteúdo&nbsp;</legend>
			<script src="javascript/editor/js/richtext.js" type="text/javascript" language="javascript"></script>
			<script src="javascript/editor/js/config.js" type="text/javascript" language="javascript"></script>
			<form action="<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&root_content=".($_GET['root_content'])."&conteudo_code=".($_GET['conteudo_code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
" method="post" name="update_conteudo">
			<input type="hidden" name="update" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="60">Título :</td>
				  <td><input name="title" type="text" size="50" maxlength="255" value="<?php echo $_POST['title']; ?>
"></td>
				</tr>				
				<tr>
					<td colspan="2"><script language="JavaScript" type="text/javascript">initRTE('<?php echo ((is_array($_tmp=$_POST['description'])) ? $this->_run_mod_handler('freerte', true, $_tmp) : smarty_modifier_freerte($_tmp)); ?>
', 'css/editor.css');</script></td>
				</tr>
				<tr><td align="right" colspan="2">
				<input type="submit" value="Salvar" onClick="iebugfix(); submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrupdate']): ?>disabled<?php endif; ?>>
				<input type="button" value="Sair" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&root_content=".($_GET['root_content']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">
				</td></tr>
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
					<p>
					<strong><a href="<?php echo "?page=".($_GET['page']); ?>
">Root</a></strong>
					<?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
					&rsaquo; <a href="<?php echo "?page=".($_GET['page'])."&root_content=".($this->_tpl_vars['link']['code']); ?>
"><?php echo $this->_tpl_vars['link']['title']; ?>
</a>
					<?php endforeach; endif; unset($_from); ?>
					</p>
					<fieldset>
					<legend>Conteúdos &nbsp;</legend>
					<form name="conteudos_list" method="post" action="">
					<input type="hidden" name="conteudo_code">
                    <table border="0" cellpadding="0" cellspacing="0" class="grid">
                      <tr class="ordenado"> 
                        <td width="80">&nbsp;C&oacute;digo</td>
                        <td>Título</td>
                        <td width="25">&nbsp;</td>
						<td width="25">&nbsp;</td>
                      </tr>
                      <tr><td colspan="4">&nbsp;</td></tr>
                      <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['conteudos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <tr onMouseOver="mOvr(this,'#EFEFEF')" onMouseOut="mOut(this,'<?php if ($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code'] == $_GET['conteudo_code']): ?>#DBF1FD<?php else: ?>#FFFFFF<?php endif; ?>')" <?php if ($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code'] == $_GET['conteudo_code']): ?>bgcolor="#DBF1FD"<?php endif; ?>> 
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&conteudo_code=".($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code'])."&root_content=".($_GET['root_content']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
');">&nbsp;<?php echo $this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code']; ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&conteudo_code=".($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code'])."&root_content=".($_GET['root_content']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
');">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</td>
						<td><?php if ($this->_tpl_vars['nivel'] < 3): ?><img src="images/folder_new.gif" alt="" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&root_content=".($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
');"><?php else: ?>&nbsp;<?php endif; ?></td>
                        <td><input name="delete" type="image" onClick="if(!confirm('Deseja remover o conteudo (<?php echo ((is_array($_tmp=$this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('addslashes', true, $_tmp) : addslashes($_tmp)); ?>
) ?')){ return false} else{conteudo_code.value='<?php echo $this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code']; ?>
'};" src="images/delete_<?php if ($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code'] != $_GET['conteudo_code'] && $this->_tpl_vars['permissions']['usrdelete'] && $_GET['root_content']): ?>true<?php else: ?>false<?php endif; ?>.gif" style="width:15px; height:16px;" <?php if ($this->_tpl_vars['conteudos'][$this->_sections['i']['index']]['code'] == $_GET['conteudo_code'] || ! $_GET['root_content'] || ! $this->_tpl_vars['permissions']['usrdelete']): ?>disabled<?php endif; ?>></td>
                      </tr>
                      <?php endfor; else: ?>
                      <tr> 
                        <td colspan="4" align="center">Nenhum conteúdo cadastrado</td>
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
		  <tr>
			<td height="23"></td>
			<td align="right">&nbsp;</td>
			<td></td>
		  </tr>
		  <tr>
			<td height="23"></td>
			<td align="right"><a href="."><img src="images/back.gif" alt="Voltar" width="32" height="32" border="0"></a></td>
			<td></td>
		  </tr>
				<tr> 
			<td height="57" colspan="5" valign="middle" class="copyright">
				Resolu&ccedil;&atilde;o m&iacute;nima de 800x600 &copy; Copyright <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
, Konrad<br>
				<a href="http://www.gotz.com.br" target="_blank">Http://www.gotz.com.br</a>
			</td>
        </tr>
		</table>
	</td>
  </tr>
</table>
</body>
</html>