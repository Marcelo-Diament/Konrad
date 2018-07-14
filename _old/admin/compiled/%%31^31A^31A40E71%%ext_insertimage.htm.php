<?php /* Smarty version 2.6.22, created on 2009-05-13 21:50:30
         compiled from ext_insertimage.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'ext_insertimage.htm', 55, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>Inserir imagem</title>
	<script language="JavaScript" type="text/javascript">
		function AddImage() {
			if (document.getElementById("url").value != "" || document.getElementById("imgurl").value != "") {
					var img = (document.getElementById("url").value)?document.getElementById("url").value:"<?php echo $this->_tpl_vars['uploaddir']; ?>
"+document.getElementById("imgurl").value;
					var html = "";
							html += '<img src="' + img + '"';
						if (document.getElementById("border").value != "") {
							html += ' border="' + document.getElementById("border").value + '"';
						}
						if (document.getElementById("hspace").value != "") {
							html += ' hspace="' + document.getElementById("hspace").value + '"';
						}
						if (document.getElementById("vspace").value != "") {
							html += ' vspace="' + document.getElementById("vspace").value + '"';
						}
						if (document.getElementById("align").value != "" && document.getElementById("align").value != "Default" ) {
							html += ' align="' + document.getElementById("align").value + '"';
						}
						if (document.getElementById("alt").value != "") {
							html += ' alt="' + document.getElementById("alt").value + '"';
							html += ' title="' + document.getElementById("alt").value + '"';
						}
							html += ' />';
				window.opener.rteInsertHTML(html);
				window.close();
			} else {
				alert('Selecione uma imagem!');
				return false;
			}
		}
		function previewImg(src) {
			document.getElementById("imgview").src = src;
		}
	</script>
	<style type="text/css">
		body, td { background-color:#EFEFEF; font-family:arial; font-size:11px; }
		input { font-family:arial; font-size:11px; }
		select { font-family:arial; font-size:11px; }
	</style>
	</head>
	<body>
	<fieldset>
	<legend><strong>Inserir image&nbsp;</strong></legend>
	  <form action="" method="post" enctype="multipart/form-data">
	  <input type="hidden" name="option" value="1">
	  <table border="0" cellpadding="0" cellspacing="2" width="90%">
		<tbody>
		  <tr><td colspan="3">&nbsp;</td></tr>
		  <?php if ($this->_tpl_vars['error'] || $this->_tpl_vars['display']): ?>
		  <tr>
			<td colspan="3" valign="top"><?php if ($this->_tpl_vars['error']): ?><?php endif; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['error'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['display']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['display'])); ?>
</td>
		  </tr>
		  <?php endif; ?>
		  <tr><td colspan="3">&nbsp;</td></tr>
		  <tr>
		  	<td>Enviar imagem</td>
			<td colspan="2"><input type="file" name="file" size="50">
			<input type="submit" value=" Ok "></td>
		  </tr>
		  <tr>
			<td width="100">Image URL</td>
			<td colspan="2"><input id="url" size="70" type="text" onChange="previewImg(this.value);" style="background-color:#FFFFFF; border:1px solid #828177; font-family:arial; font-size:11px; color: #003399;"></td>
		  </tr>
		  <tr>
		  	<td>&nbsp;</td>
		  	<td colspan="2">
			<select id="imgurl" name="url" onChange="previewImg('<?php echo $this->_tpl_vars['uploaddir']; ?>
'+this.value);" style="width:300px;">
			<option value="0">&nbsp;</option>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['files']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<option value="<?php echo $this->_tpl_vars['files'][$this->_sections['i']['index']]['filename']; ?>
" <?php if ($_POST['uploaded'] == $this->_tpl_vars['files'][$this->_sections['i']['index']]['filename']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['files'][$this->_sections['i']['index']]['filename']; ?>
</option>
			<?php endfor; endif; ?>
			</select>
			<input type="submit" value=" Excluir " onClick="if(confirm('Deseja excluir este arquivo?')){option.value=2; return true;}else{return false;}">
			</td>
		  </tr>
		  <tr><td colspan="3">&nbsp;</td></tr>
		  <tr>
			<td>Descrição</td>
			<td colspan="2"><input id="alt" size="50" type="text" style="background-color:#FFFFFF; border:1px solid #828177; font-family:arial; font-size:11px; color: #003399;"></td>
		  </tr>
		  <tr>
			<td>Alinhamento</td>
			<td><select id="align" style="width:150px;">
			  <option value="left" selected>Esquerda</option>
			  <option value="right">Direita</option>
			</select>
			</td>
			<td rowspan="4"><img src="images/blank_img.gif" width="80" id="imgview" height="80" align="right"></td>
		  </tr>
		  <tr>
			<td>Borda</td>
			<td><input name="border" type="text" id="border" value="0" size="10" maxlength="3" style="background-color:#FFFFFF; border:1px solid #828177; font-family:arial; font-size:11px; color: #003399;"></td>
		  </tr>
		  <tr>
			<td>HSpace</td>
			<td><input name="hspace" type="text" id="hspace" size="10" maxlength="3" style="background-color:#FFFFFF; border:1px solid #828177; font-family:arial; font-size:11px; color: #003399;"></td>
		  </tr>
		  <tr>
			<td>VSpace</td>
			<td><input name="vspace" type="text" id="vspace" size="10s" maxlength="3" style="background-color:#FFFFFF; border:1px solid #828177; font-family:arial; font-size:11px; color: #003399;"></td>
		  </tr>
		  <tr><td colspan="3">&nbsp;</td></tr>
		  <tr>
			<td colspan="3" align="right"><input type="submit" name="Submit" value="Inserir imagem" onclick="AddImage();"></td>
		  </tr>
	  </table>
	  </form>
	</fieldset>
</body>
</html>