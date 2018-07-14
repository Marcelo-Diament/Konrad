<?php /* Smarty version 2.6.22, created on 2014-07-07 16:21:40
         compiled from settings.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'settings.htm', 32, false),array('modifier', 'date_format', 'settings.htm', 93, false),)), $this); ?>
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
			<fieldset>
			<legend><img src="images/thumb_settings.gif" align="middle">&nbsp;Configurações&nbsp;</legend>
			<form action="" method="post" name="edit_configs">
			<input type="hidden" name="update" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="90">Nome :</td>
				  <td><input name="name" type="text" size="40" maxlength="100" value="<?php echo $_POST['name']; ?>
"></td>
				</tr>
				<tr>
				  <td>E-mail :</td>
				  <td><input name="email" type="text" size="40" maxlength="60" value="<?php echo $_POST['email']; ?>
"></td>
				</tr>
				<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				  <td>Usuário :</td>
				  <td>
				  <input type="hidden" name="user" value="<?php echo $_POST['user']; ?>
">
				  <input type="text" size="30" maxlength="15" value="<?php echo $_POST['user']; ?>
" disabled></td>
				</tr>
				<tr>
				  <td>Senha :</td>
				  <td><input name="password" type="password" size="30" maxlength="15" value="<?php echo $_POST['password']; ?>
"></td>
				</tr>
				<tr>
				  <td>Repetir senha :</td>
				  <td><input name="rpassword" type="password" size="30" maxlength="15" value="<?php echo $_POST['rpassword']; ?>
"></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;"></td></tr>
			  </table>
		    </form>
			</fieldset>
			</td>
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