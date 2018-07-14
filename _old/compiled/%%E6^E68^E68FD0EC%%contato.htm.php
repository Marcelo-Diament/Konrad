<?php /* Smarty version 2.6.22, created on 2012-04-28 02:02:43
         compiled from contato.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'contato.htm', 1, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<h2>Contato</h2>

<?php if ($this->_tpl_vars['error']): ?><div id="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php elseif ($this->_tpl_vars['display']): ?><div id="success"><?php echo $this->_tpl_vars['display']; ?>
</div><?php endif; ?><br/>
<form method="post" action="">
  <table style="width:300px;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td style="width:25px;"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/phone.gif" alt=""/></td>
            <td><strong>Telefone / Fax:</strong> (51) 3347-7819</td>
          </tr>
          <tr> 
            <td><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/att.gif" alt=""/></td>
            <td><strong>Atendimento:</strong> Das 8:30 &agrave;s 18:00 (segunda 
              a sexta-feira)</td>
          </tr>
          <tr> 
            <td><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/home.gif" alt=""/></td>
            <td><strong>Endere&ccedil;o:</strong><br/>
              Avenida Walter Kaufmann, 360<br/>
              Porto Alegre - RS - Brasil<br/>
              CEP 91220-000</td>
          </tr>
          <tr> 
            <td><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/find.gif" alt=""/></td>
            <td><strong>Localiza&ccedil;&atilde;o: </strong><a href="#" onclick="popupWindow('<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/mapa.htm', 'localizacao', 550, 550);"><br/>Clique aqui para ver o mapa</a></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Nome:</td>
    </tr>
    <tr> 
      <td><input type="text" name="nome" class="fields" maxlength="50" size="50" value="<?php echo $_POST['nome']; ?>
"/></td>
    </tr>
    <tr> 
      <td>E-Mail:</td>
    </tr>
    <tr> 
      <td><input type="text" name="email" class="fields" maxlength="60" size="50" value="<?php echo $_POST['email']; ?>
"/></td>
    </tr>
    <tr> 
      <td>Mensagem:</td>
    </tr>
    <tr> 
      <td><textarea name="mensagem" class="fields" style="width:400px; height:100px;" cols="40" rows="5"><?php echo $_POST['mensagem']; ?>
</textarea></td>
    </tr>
    <tr> 
      <td><input type="hidden" name="sended" value="1"/><input type="submit" name="Submit" value="  Enviar  " onclick="submit(); this.value='Aguarde...'; this.disabled=true;"/></td>
    </tr>
  </table>
</form>