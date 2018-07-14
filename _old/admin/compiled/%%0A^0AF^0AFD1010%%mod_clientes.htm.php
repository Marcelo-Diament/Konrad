<?php /* Smarty version 2.6.22, created on 2012-06-06 07:53:48
         compiled from mod_clientes.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'mod_clientes.htm', 32, false),array('modifier', 'secureurl', 'mod_clientes.htm', 116, false),array('modifier', 'escape', 'mod_clientes.htm', 117, false),array('modifier', 'addslashes', 'mod_clientes.htm', 118, false),array('modifier', 'date_format', 'mod_clientes.htm', 149, false),)), $this); ?>
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
			<?php if (! $_GET['cliente_code']): ?>
			<fieldset>
			<legend><img src="images/thumb_mod_users.gif" align="middle">&nbsp;Adicionar novo cliente&nbsp;</legend>
			<form action="" method="post" name="add_cliente">
			<input type="hidden" name="salvar" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
			    <tr>
				  <td width="100">Nome :</td>
				  <td ><input name="nome" type="text" size="60" maxlength="100" value="<?php echo $_POST['nome']; ?>
">					
				</tr>
				<tr>
				  <td valign="top">Descrição :</td>
				  <td><textarea style="width:100%; height:200px;" name="descricao"><?php echo $_POST['descricao']; ?>
</textarea></td>
				 </tr>
				<tr><td align="right" colspan="2"><input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>></td></tr>
			  </table>
		    </form>
			</fieldset>
			<?php else: ?>
			<fieldset>
			<legend><img src="images/thumb_mod_users.gif" align="middle">&nbsp;Editar o cliente&nbsp;</legend>
			<form action="" method="post" name="update_cliente">
			<input type="hidden" name="update" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
			    <tr>
				  <td width="100">Nome :</td>
				  <td ><input name="nome" type="text" size="60" maxlength="100" value="<?php echo $_POST['nome']; ?>
">					
				</tr>
				<tr>
				  <td valign="top">Descrição :</td>
				  <td><textarea style="width:100%; height:200px;" name="descricao"><?php echo $_POST['descricao']; ?>
</textarea></td>
				 </tr>
				<tr><td align="right" colspan="2">
				<input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrupdate']): ?>disabled<?php endif; ?>>
				<input type="button" value="Sair" onClick="redirect('?page=<?php echo $_GET['page']; ?>
&grupo_code=<?php echo $_GET['grupo_code']; ?>
&option=1')">
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
                  <legend>Clientes&nbsp;</legend>
					<form name="clientes_list" method="post" action="">
					<input type="hidden" name="cliente_code">
					<input type="hidden" name="option">
                    <table border="0" cellpadding="0" cellspacing="0" class="grid">
                      <tr class="ordenado"> 
                        <td width="100">&nbsp;C&oacute;digo</td>
                        <td>Nome</td>
                        <td width="20">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
                      </tr>
                      <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['clientes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <tr onMouseOver="mOvr(this,'#EFEFEF')" onMouseOut="mOut(this,'<?php if ($this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code'] == $_GET['cliente_code']): ?>#DBF1FD<?php else: ?>#FFFFFF<?php endif; ?>')" <?php if ($this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code'] == $_GET['cliente_code']): ?>bgcolor="#DBF1FD"<?php endif; ?>> 
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&cliente_code=".($this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo $this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code']; ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&cliente_code=".($this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['clientes'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
                        <td><input name="delete" type="image" onClick="if(!confirm('Deseja remover o cliente (<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['clientes'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('addslashes', true, $_tmp) : addslashes($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
) ?')){ return false} else{cliente_code.value='<?php echo $this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code']; ?>
';option.value=1};" src="images/delete_<?php if ($this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code'] != $_GET['cliente_code'] && $this->_tpl_vars['permissions']['usrdelete']): ?>true<?php else: ?>false<?php endif; ?>.gif" style="width:15px; height:16px;" <?php if ($this->_tpl_vars['clientes'][$this->_sections['i']['index']]['code'] == $_GET['cliente_code'] || ! $this->_tpl_vars['permissions']['usrdelete']): ?>disabled<?php endif; ?>></td>
                      </tr>
                      <?php endfor; else: ?>
                      <tr> 
                        <td colspan="3" align="center">Nenhum cliente cadastrado</td>
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