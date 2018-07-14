<?php /* Smarty version 2.6.22, created on 2014-07-22 10:46:09
         compiled from mod_artigos.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'mod_artigos.htm', 48, false),array('modifier', 'date_format', 'mod_artigos.htm', 74, false),array('modifier', 'freerte', 'mod_artigos.htm', 77, false),array('modifier', 'secureurl', 'mod_artigos.htm', 104, false),array('modifier', 'truncate', 'mod_artigos.htm', 142, false),array('modifier', 'addslashes', 'mod_artigos.htm', 143, false),)), $this); ?>
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
				$('#date').mask('99/99/9999');
			});
		}) (jQuery);
		
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
			<?php if (! $_GET['artigo_code']): ?>
			<fieldset>
			<legend><img src="images/thumb_mod_news.gif" align="middle">&nbsp;Adicionar artigo&nbsp;</legend>
			<script src="javascript/editor/js/richtext.js" type="text/javascript" language="javascript"></script>
			<script src="javascript/editor/js/config.js" type="text/javascript" language="javascript"></script>
			<form action="" method="post" name="add_artigo">
			<input type="hidden" name="salvar" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="60">Título :</td>
				  <td><input name="title" type="text" size="50" maxlength="255" value="<?php echo $_POST['title']; ?>
"></td>
				</tr>
			    <tr>
				  <td width="100">Data:</td>
				  <td><input name="date" type="text" size="40" maxlength="10" value="<?php if (! $_POST['salvar']): ?><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
<?php else: ?><?php echo $_POST['date']; ?>
<?php endif; ?>" id="date">					
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
			<legend><img src="images/thumb_mod_news.gif" align="middle">&nbsp;Editar o artigo&nbsp;</legend>
			<script src="javascript/editor/js/richtext.js" type="text/javascript" language="javascript"></script>
			<script src="javascript/editor/js/config.js" type="text/javascript" language="javascript"></script>
			<form action="" method="post" name="update_artigo">
			<input type="hidden" name="update" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="60">Título :</td>
				  <td><input name="title" type="text" size="50" maxlength="255" value="<?php echo $_POST['title']; ?>
"></td>
				</tr>
			    <tr>
				  <td width="100">Data:</td>
				  <td><input name="date" type="text" size="40" maxlength="10" value="<?php echo ((is_array($_tmp=$_POST['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
" id="date">					
				</tr>				
				<tr>
					<td colspan="2"><script language="JavaScript" type="text/javascript">initRTE('<?php echo ((is_array($_tmp=$_POST['description'])) ? $this->_run_mod_handler('freerte', true, $_tmp) : smarty_modifier_freerte($_tmp)); ?>
', 'css/editor.css');</script></td>
				</tr>
				<tr><td align="right" colspan="2">
				<input type="submit" value="Salvar" onClick="iebugfix(); submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrupdate']): ?>disabled<?php endif; ?>>
				<input type="button" value="Sair" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
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
					<fieldset>
					<legend>Artigos &nbsp;</legend>
					<form name="artigos_list" method="post" action="">
					<input type="hidden" name="artigo_code">
                    <table border="0" cellpadding="0" cellspacing="0" class="grid">
                      <tr class="ordenado"> 
                        <td width="80">&nbsp;C&oacute;digo</td>
                        <td>Título</td>
                        <td width="20">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
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
                      <tr onMouseOver="mOvr(this,'#EFEFEF')" onMouseOut="mOut(this,'<?php if ($this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code'] == $_GET['artigo_code']): ?>#DBF1FD<?php else: ?>#FFFFFF<?php endif; ?>')" <?php if ($this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code'] == $_GET['artigo_code']): ?>bgcolor="#DBF1FD"<?php endif; ?>> 
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&artigo_code=".($this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo $this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code']; ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&artigo_code=".($this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['artigos'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</td>
                        <td><input name="delete" type="image" onClick="if(!confirm('Deseja remover o artigo (<?php echo ((is_array($_tmp=$this->_tpl_vars['artigos'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('addslashes', true, $_tmp) : addslashes($_tmp)); ?>
) ?')){ return false} else{artigo_code.value='<?php echo $this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code']; ?>
'};" src="images/delete_<?php if ($this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code'] != $_GET['artigo_code'] && $this->_tpl_vars['permissions']['usrdelete']): ?>true<?php else: ?>false<?php endif; ?>.gif" style="width:15px; height:16px;" <?php if ($this->_tpl_vars['artigos'][$this->_sections['i']['index']]['code'] == $_GET['artigo_code'] || ! $this->_tpl_vars['permissions']['usrdelete']): ?>disabled<?php endif; ?>></td>
                      </tr>
                      <?php endfor; else: ?>
                      <tr> 
                        <td colspan="3" align="center">Nenhum artigo cadastrado</td>
                      </tr>
                      <?php endif; ?>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
                      </tr>
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