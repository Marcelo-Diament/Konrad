<?php /* Smarty version 2.6.22, created on 2012-04-27 01:36:25
         compiled from solicitar-informacoes.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'menuinterno', 'solicitar-informacoes.htm', 1, false),array('modifier', 'date_format', 'solicitar-informacoes.htm', 16, false),)), $this); ?>
<h1><?php echo smarty_function_menuinterno(array(), $this);?>
</h1>
<h2>Solicitar informações</h2>
<?php if ($this->_tpl_vars['error']): ?><div id="error"><?php echo $this->_tpl_vars['error']; ?>
</div><?php elseif ($this->_tpl_vars['display']): ?><div id="success"><?php echo $this->_tpl_vars['display']; ?>
</div><?php endif; ?><br/>
<form method="post" action="">
  <table style="width:300px;" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td><strong>Curso:</strong></td>
    </tr>
    <tr> 
      <td><?php echo $this->_tpl_vars['turma']['nome_curso']; ?>
</td>
    </tr>
    <tr> 
      <td><strong>Cidade / Data:</strong></td>
    </tr>
    <tr> 
      <td><?php echo $this->_tpl_vars['turma']['cidade']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 à <?php echo ((is_array($_tmp=$this->_tpl_vars['turma']['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
    </tr>
	<tr><td>&nbsp;</td></tr>
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