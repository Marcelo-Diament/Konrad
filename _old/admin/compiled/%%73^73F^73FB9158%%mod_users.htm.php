<?php /* Smarty version 2.6.22, created on 2015-03-02 14:37:39
         compiled from mod_users.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'mod_users.htm', 33, false),array('modifier', 'secureurl', 'mod_users.htm', 115, false),array('modifier', 'date_format', 'mod_users.htm', 240, false),array('function', 'counter', 'mod_users.htm', 134, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Gerenciador de websites</title>
	<style type="text/css">
	<!--
		@import url("css/admin.css");
		@import url("css/dtree.css");
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
			<?php if (! $_GET['user_code']): ?>
			<fieldset>
			<legend><img src="images/thumb_mod_users.gif" align="middle">&nbsp;Adicionar usuário&nbsp;</legend>
			<form action="" method="post" name="add_user">
			<input type="hidden" name="salvar" value="1">
			  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
				<tr>
				  <td width="60">Nome :</td>
				  <td><input name="name" type="text" size="40" maxlength="100" value="<?php echo $_POST['name']; ?>
"></td>
				</tr>
				<tr>
				  <td>E-mail :</td>
				  <td><input name="email" type="text" size="40" maxlength="60" value="<?php echo $_POST['email']; ?>
"></td>
				</tr>
				<tr>
				  <td>Usuário :</td>
				  <td><input name="user" type="text" size="40" maxlength="15" value="<?php echo $_POST['user']; ?>
"></td>
				</tr>
				<tr>
				  <td>Senha :</td>
				  <td><input name="password" type="password" size="40" maxlength="15" value="<?php echo $_POST['password']; ?>
"></td>
				</tr>
				<tr>
				  <td>Ativo :</td>
				  <td><input type="checkbox" name="enabled" value="1" <?php if ($_POST['enabled'] || ! $_POST['salvar']): ?>checked<?php endif; ?>></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>></td>
				</tr>
			  </table>
		    </form>
			</fieldset>
			<?php elseif ($_GET['user_code'] && ! $_GET['option']): ?>
			<fieldset>
			<legend><img src="images/thumb_mod_users.gif" align="middle">&nbsp;Editar a usuário&nbsp;</legend>
			<form action="" method="post" name="update_user">
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
				<tr>
				  <td>Ativo :</td>
				  <td><input type="checkbox" name="enabled" value="1" <?php if ($_POST['enabled']): ?>checked<?php endif; ?>></td>
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
				<td>
				<input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>>
				<input type="button" value="Sair" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">
				</td></tr>
			  </table>
		    </form>
			</fieldset>
			<?php else: ?>
			<fieldset>
			<legend><img src="images/thumb_mod_users.gif" align="middle">&nbsp;Setar permissões&nbsp;</legend>
			<script language="JavaScript" type="text/javascript" src="javascript/dtree.js"></script>
			<form action="" method="post" name="set_permissions">
			<input type="hidden" name="salvar" value="1">
			 <table width="100%" border="0" cellpadding="1" cellspacing="1" class="form">
			  <tr> 
				<td>
				<div class="dtree"> 
				  <script type="text/javascript">
						<!--
						menu = new dTree('menu');
						menu.add(0,-1,'Módulos admiistrativos');
						<?php echo smarty_function_counter(array('start' => 0,'print' => false,'assign' => 'id'), $this);?>

						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['modules']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><?php echo smarty_function_counter(array(), $this);?>
<?php $this->assign('sid', $this->_tpl_vars['id']); ?>
						<?php $this->assign('modulecode', $this->_tpl_vars['modules'][$this->_sections['i']['index']]['code']); ?>
						menu.add(<?php echo $this->_tpl_vars['id']; ?>
,0,'<?php echo $this->_tpl_vars['modules'][$this->_sections['i']['index']]['name']; ?>
','','','','','page.gif');<?php echo smarty_function_counter(array(), $this);?>

						menu.add(<?php echo $this->_tpl_vars['id']; ?>
,<?php echo $this->_tpl_vars['sid']; ?>
,"<label for='inpt<?php echo $this->_tpl_vars['id']; ?>
'><input type=checkbox name='per[<?php echo $this->_tpl_vars['modulecode']; ?>
][INSERT]' value='1' id='inpt<?php echo $this->_tpl_vars['id']; ?>
' class=\'inputFields\' <?php if ($this->_tpl_vars['mpermissions'][$this->_tpl_vars['modulecode']]['insert']): ?>checked<?php endif; ?>> Insert</label>",'','','','','key.gif');<?php echo smarty_function_counter(array(), $this);?>

						menu.add(<?php echo $this->_tpl_vars['id']; ?>
,<?php echo $this->_tpl_vars['sid']; ?>
,"<label for='inpt<?php echo $this->_tpl_vars['id']; ?>
'><input type=checkbox name='per[<?php echo $this->_tpl_vars['modulecode']; ?>
][UPDATE]' value='1' id='inpt<?php echo $this->_tpl_vars['id']; ?>
' class=\'inputFields\' <?php if ($this->_tpl_vars['mpermissions'][$this->_tpl_vars['modulecode']]['update']): ?>checked<?php endif; ?>> Update</label>",'','','','','key.gif');<?php echo smarty_function_counter(array(), $this);?>

						menu.add(<?php echo $this->_tpl_vars['id']; ?>
,<?php echo $this->_tpl_vars['sid']; ?>
,"<label for='inpt<?php echo $this->_tpl_vars['id']; ?>
'><input type=checkbox name='per[<?php echo $this->_tpl_vars['modulecode']; ?>
][DELETE]' value='1' id='inpt<?php echo $this->_tpl_vars['id']; ?>
' class=\'inputFields\' <?php if ($this->_tpl_vars['mpermissions'][$this->_tpl_vars['modulecode']]['delete']): ?>checked<?php endif; ?>> Delete</label>",'','','','','key.gif');<?php echo smarty_function_counter(array(), $this);?>

						menu.add(<?php echo $this->_tpl_vars['id']; ?>
,<?php echo $this->_tpl_vars['sid']; ?>
,"<label for='inpt<?php echo $this->_tpl_vars['id']; ?>
'><input type=checkbox name='per[<?php echo $this->_tpl_vars['modulecode']; ?>
][VIEW]' value='1' id='inpt<?php echo $this->_tpl_vars['id']; ?>
' class=\'inputFields\' <?php if ($this->_tpl_vars['mpermissions'][$this->_tpl_vars['modulecode']]): ?>checked<?php endif; ?>> View</label>",'','','','','key.gif');
						<?php endfor; endif; ?>
						menu.draw();
						//-->
					</script>
				</div>				
				</td>
			  </tr>
			  	<tr><td colspan="2">&nbsp;</td></tr>
				<tr>
				<td>
				<input type="submit" value="Salvar" onClick="submit(); this.value='Processando...'; this.disabled=true;" <?php if (! $this->_tpl_vars['permissions']['usrinsert']): ?>disabled<?php endif; ?>>
				<input type="button" value="Sair" onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">
				</td>
				<td>&nbsp;</td>
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
					<legend>Usuários cadastrados &nbsp;</legend>
					<form name="users_list" method="post" action="">
					<input type="hidden" name="user_code">
                    <table border="0" cellpadding="0" cellspacing="0" class="grid">
                      <tr class="ordenado"> 
                        <td width="80">&nbsp;C&oacute;digo</td>
                        <td>Nome</td>
						<td width="50">Status</td>
						<td width="20">&nbsp;</td>
                        <td width="20">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
                      </tr>
                      <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <tr onMouseOver="mOvr(this,'#EFEFEF')" onMouseOut="mOut(this,'#FFFFFF')"> 
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&user_code=".($this->_tpl_vars['users'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['code']; ?>
</td>
                        <td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&user_code=".($this->_tpl_vars['users'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['name']; ?>
</td>
						<td onClick="redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&user_code=".($this->_tpl_vars['users'][$this->_sections['i']['index']]['code']))) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')">&nbsp;<?php if (( $this->_tpl_vars['users'][$this->_sections['i']['index']]['enabled'] )): ?><?php if (! $this->_tpl_vars['users'][$this->_sections['i']['index']]['permissions']): ?><img src="images/status_yellow.gif"><?php else: ?><img src="images/status_green.gif"><?php endif; ?><?php else: ?><img src="images/status_red.gif"><?php endif; ?></td>
						<td><img onClick="if(!confirm('Deseja editar as permissões de (<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['name']; ?>
) ?')){ return false} else{redirect('<?php echo ((is_array($_tmp="?page=".($_GET['page'])."&user_code=".($this->_tpl_vars['users'][$this->_sections['i']['index']]['code'])."&option=1")) ? $this->_run_mod_handler('secureurl', true, $_tmp) : smarty_modifier_secureurl($_tmp)); ?>
')};" src="images/permissions_<?php if (! $this->_tpl_vars['permissions']['usrdelete'] || $this->_tpl_vars['users'][$this->_sections['i']['index']]['code'] == 1 && $_SESSION['data']['usrcode'] != 1): ?>false<?php else: ?>true<?php endif; ?>.gif" width="15" height="16" border="0" <?php if (! $this->_tpl_vars['permissions']['usrdelete'] || $_SESSION['data']['usrcode'] != 1): ?>disabled<?php endif; ?>></td>
                        <td><input name="delete" type="image" onClick="if(!confirm('Deseja remover o usuário (<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['name']; ?>
) ?')){ return false} else{user_code.value='<?php echo $this->_tpl_vars['users'][$this->_sections['i']['index']]['code']; ?>
'};" src="images/delete_<?php if (! $this->_tpl_vars['permissions']['usrdelete'] || $this->_tpl_vars['users'][$this->_sections['i']['index']]['code'] == 1): ?>false<?php else: ?>true<?php endif; ?>.gif" style="width:15px; height:16px;" <?php if (! $this->_tpl_vars['permissions']['usrdelete'] || $this->_tpl_vars['users'][$this->_sections['i']['index']]['code'] == 1): ?>disabled<?php endif; ?>></td>
                      </tr>
                      <?php endfor; else: ?>
                      <tr> 
                        <td colspan="5" align="center">Nenhum usuário cadastrado</td>
                      </tr>
                      <?php endif; ?>
                      <tr> 
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
                        <td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
                      </tr>
                    </table>
					</form>
					</fieldset>
					<table>
						<tr><td>&nbsp;</td></tr>
						<tr><td>&nbsp;<img src="images/status_green.gif" align="top">&nbsp;Ativo</td></tr>
						<tr><td>&nbsp;<img src="images/status_red.gif" align="top">&nbsp;Desativado</td></tr>
						<tr><td>&nbsp;<img src="images/status_yellow.gif" align="top">&nbsp;Sem permissões</td></tr>
					</table>					
					</td>
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