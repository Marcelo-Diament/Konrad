<?php /* Smarty version 2.6.22, created on 2012-04-26 01:06:29
         compiled from login.htm */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Gerenciador de websites</title>
	<style type="text/css">
	<!--
		@import url("css/admin.css");
	-->
	</style>
</head>
<body>
<table width="100%" style="height:100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
		<script language="JavaScript" type="text/javascript">window.onload = function() {document.login.user.focus();}</script>
		<form name="login" method="post" action="index.php">
		<input type="hidden" name="send" value="1">
		  <table width="365" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
			<tr valign="middle">
			  <td width="365" height="28" class="topo">&nbsp;<?php echo $this->_tpl_vars['error']; ?>
</td>
			</tr>
			<tr>
			  <td height="166"><table width="240" border="0" align="center" cellpadding="1" cellspacing="1">
                <tr> 
                  <td width="72" align="right"><span class="paragrafo">Usu&aacute;rio&nbsp;:&nbsp;</span></td>
                  <td width="168"><input name="user" size="30" maxlength="15" type="text" value="<?php echo $this->_tpl_vars['str_user']; ?>
"></td>
                </tr>
                <tr> 
                  <td align="right"><span class="paragrafo">Senha&nbsp;:&nbsp;</span></td>
                  <td><input name="pass" size="30" maxlength="10" type="password" value="<?php echo $this->_tpl_vars['str_password']; ?>
"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td align="right"><span class="fundo"> 
                    <input type="submit" name="Submit" value="  Login  " onClick="submit(); this.value='Processando...'; this.disabled=true;">
                    </span></td>
                </tr>
              </table></td>
			</tr>
		  </table>
		</form>
	</td>
  </tr>
</table>
</body>
</html>