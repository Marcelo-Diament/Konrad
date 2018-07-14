<?php /* Smarty version 2.6.22, created on 2012-04-26 01:06:37
         compiled from home.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'home.htm', 38, false),)), $this); ?>
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
<table width="100%" style="height:100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top">
		<table width="90%" border="0" cellpadding="0" cellspacing="0" class="table">
        <tr valign="middle"> 
          <td height="28" colspan="5" class="topo">
			<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td style="font-weight:bold; color:#FFF;">Administração :: Konrad</td>
                <td align="right"><a href="?page=logoff" onClick="if(!confirm('Deseja sair do sistema ?')){return false} else{return true};" style="color:#FFF">Sair do sistema</a></td>
              </tr>
            </table>		  
		  </td>
        </tr>
        <tr> 
          <td width="15" height="5"></td>
          <td width="66"></td>
          <td width="352"></td>
          <td width="80"></td>
          <td width="10"></td>
        </tr>
        <tr> 
          <td height="22"></td>
          <td colspan="3" align="right" valign="top" class="menuinfo"><strong>&Uacute;ltimo 
            acesso: </strong>
			<?php if ($_SESSION['data']['lastaccess']): ?>
            <?php echo ((is_array($_tmp=$_SESSION['data']['lastaccess'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y - %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y - %H:%M")); ?>
 [ <?php echo $_SESSION['data']['ip']; ?>
 ]
			<?php else: ?>
			sem registros
			<?php endif; ?>
			</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="40"></td>
          <td>&nbsp;</td>
          <td align="center"></td>
          <td></td>
          <td></td>
        </tr>
        <tr> 
          <td height="60">&nbsp;</td>
          <td colspan="3" align="center">
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
?>
		  <a href="?page=<?php echo $this->_tpl_vars['modules'][$this->_sections['i']['index']]['module_code']; ?>
" <?php if ($this->_tpl_vars['modules'][$this->_sections['i']['index']]['target']): ?>target="$modules[i].target"<?php endif; ?> <?php if ($this->_tpl_vars['modules'][$this->_sections['i']['index']]['module_code'] == 'logoff'): ?>onClick="if(!confirm('Deseja sair do gerenciador ?')){ return false} else{return true};"<?php endif; ?>><img src="images/<?php echo $this->_tpl_vars['modules'][$this->_sections['i']['index']]['icon']; ?>
" alt="<?php echo $this->_tpl_vars['modules'][$this->_sections['i']['index']]['name']; ?>
" border="0"></a>
		  <?php endfor; endif; ?>
		  </td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="14"></td>
          <td></td>
          <td></td>
          <td></td>
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