<?php /* Smarty version 2.6.22, created on 2014-07-29 10:28:18
         compiled from home.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'home.htm', 39, false),array('modifier', 'truncate', 'home.htm', 40, false),)), $this); ?>
<div id="menu-home"> 
    <table style="width:750px;" border="0" cellpadding="0" cellspacing="0">
      <tr> 
        <td><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/treinamento/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_treinamento.jpg" alt="Treinamento" title="Treinamento"/></a></td>
        <td><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/consultoria/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_consultoria.jpg" alt="Consultoria" title="Consultoria"/></a></td>
        <td><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/auditoria/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_auditoria.jpg" alt="Auditoria" title="Auditoria"/></a></td>
        <td><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/software/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_software.jpg" alt="Software" title="Software"/></a></td>
      </tr>
    </table>
</div>

<div id="content-home">
  <table style="width:740px;" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="width:360px;" valign="top"> 
        <table border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td style="width:360px;"><h3>Seja bem vindo a Konrad</h3>
              Porto Alegre, <?php echo $this->_tpl_vars['data']; ?>
 
              <p><?php echo $this->_tpl_vars['content']; ?>
</p></td>
          </tr>
          <tr> 
            <td align="right"><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/a-empresa/">Ver mais</a></td>
          </tr>
          <tr> 
            <td style="height:20px;"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/hr_home.gif" alt=""/></td>
          </tr>
          <tr> 
            <td><h3>Midia</h3></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>
			<table width="100%" border="0" cellspacing="1" cellpadding="1" id="artigos">
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
                <tr> 
                  <td style="width:80px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['artigos'][$this->_sections['i']['index']]['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</td>
                  <td><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/artigos/<?php echo $this->_tpl_vars['artigos'][$this->_sections['i']['index']]['url']; ?>
/"><?php echo ((is_array($_tmp=$this->_tpl_vars['artigos'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></td>
                </tr>
                <?php endfor; endif; ?>
			</table>
			</td>
          </tr>
          <tr> 
            <td align="right">&nbsp;</td>
          </tr>
          <tr> 
            <td align="right"><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/artigos/">Ver mais</a></td>
          </tr>
        </table>
      </td>
      <td valign="top">

            <div id="workshops">
               <div class="roundtop"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/tl-workshops.gif" alt="" width="15" height="15" class="corner" style="display: none"/></div>
                            <table border="0" cellspacing="0" cellpadding="0" id="grid-workshops">
                                <tr><td style="height:50px;"><h3 class="agenda">Agenda de Workshops</h3></td></tr>
                                <tr><td>
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['workshops']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <tr onclick="javascript:Toggle_trGrpHeader('W<?php echo "abertos_".($this->_sections['i']['index']); ?>
');" style="cursor:pointer;">
                                            <td style="width:30px;"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/<?php if (! $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['confirmado']): ?>maximizar<?php else: ?>minimizar<?php endif; ?>.png" id="trGrpHeader<?php echo "abertos_".($this->_sections['i']['index']); ?>
_Img" alt=""/></td>
                                            <td><?php echo $this->_tpl_vars['workshops'][$this->_sections['i']['index']]['curso_nome']; ?>
</td>
                                        </tr>
                                        <tr id="trRowW<?php echo "abertos_".($this->_sections['i']['index']); ?>
"<?php if (! $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['confirmado']): ?> style="display:none;"<?php endif; ?>>
                                            <td>&nbsp;</td>
                                            <td>
                                                <table width="95%" cellpadding="0" cellspacing="0" border="0" style="padding-top:4px;">
                                                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['workshops'][$this->_sections['i']['index']]['turmas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                                                    <tr><td <?php if ($this->_tpl_vars['workshops'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['confirmada'] == 't'): ?>style="background-color:#CCD3DD"<?php endif; ?>>&nbsp;<a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/agenda-de-workshops/<?php echo $this->_tpl_vars['workshops'][$this->_sections['i']['index']]['url']; ?>
/<?php echo $this->_tpl_vars['workshops'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['code']; ?>
/"><?php echo $this->_tpl_vars['workshops'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['cidade']; ?>
 - <?php echo $this->_tpl_vars['workshops'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['data']; ?>
</a></td></tr>
                                                    <?php endfor; endif; ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php endfor; endif; ?>
                                    </table>
                                </td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>
                                <table border="0" cellspacing="0" cellpadding="0" width="95%">
                                <tr>
                                <td><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/workshop_confirmado.gif" alt=""/></td>
                                <td align="right"><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/agenda-de-workshops/">Ver mais</a></td></tr>
                                </table>
                                </td></tr>
                                <tr><td>&nbsp;</td></tr>
                            </table>
               <div class="roundbottom"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/bl-workshops.gif" alt="" width="15" height="15" class="corner" style="display: none"/></div>
            </div>

			<div id="cursos">
			   <div class="roundtop"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/tl-cursos.gif" alt="" width="15" height="15" class="corner" style="display: none"/></div>
							<table border="0" cellspacing="0" cellpadding="0" id="grid-cursos">
								<tr><td style="height:50px;"><h3 class="agenda">Agenda de Treinamentos</h3></td></tr>
								<tr><td>
									<table border="0" cellspacing="0" cellpadding="0" width="100%">
										<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cursos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
										<tr onclick="javascript:Toggle_trGrpHeader('C<?php echo "abertos_".($this->_sections['i']['index']); ?>
');" style="cursor:pointer;">
											<td style="width:30px;"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/<?php if (! $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['confirmado']): ?>maximizar<?php else: ?>minimizar<?php endif; ?>.png" id="trGrpHeader<?php echo "abertos_".($this->_sections['i']['index']); ?>
_Img" alt=""/></td>
											<td><?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['curso_nome']; ?>
</td>
										</tr>
										<tr id="trRowC<?php echo "abertos_".($this->_sections['i']['index']); ?>
"<?php if (! $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['confirmado']): ?> style="display:none;"<?php endif; ?>>
											<td>&nbsp;</td>
											<td>
												<table width="95%" cellpadding="0" cellspacing="0" border="0" style="padding-top:4px;">
													<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
													<tr><td <?php if ($this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['confirmada'] == 't'): ?>style="background-color:#CCD3DD"<?php endif; ?>>&nbsp;<a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/agenda-de-treinamentos/<?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['url']; ?>
/<?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['code']; ?>
/"><?php echo $this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['cidade']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['dt_inicio'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 à <?php echo ((is_array($_tmp=$this->_tpl_vars['cursos'][$this->_sections['i']['index']]['turmas'][$this->_sections['j']['index']]['dt_termino'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</a></td></tr>
													<?php endfor; endif; ?>
												</table>
											</td>
										</tr>
										<?php endfor; endif; ?>
									</table>
								</td></tr>
								<tr><td>&nbsp;</td></tr>
								<tr><td>
								<table border="0" cellspacing="0" cellpadding="0" width="95%">
								<tr>
								<td><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/turma_confirmada.gif" alt=""/></td>
								<td align="right"><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/agenda-de-treinamentos/">Ver mais</a></td></tr>
								</table>
								</td></tr>
								<tr><td>&nbsp;</td></tr>
							</table>
			   <div class="roundbottom"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/bl-cursos.gif" alt="" width="15" height="15" class="corner" style="display: none"/></div>
			</div>
	  </td>
    </tr>
  </table>
</div>
<script type="text/javascript">
//<![CDATA[
if(typeof sIFR == "function"){
	sIFR.replaceElement("h3.agenda","<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/century_gothic.swf", named({sBgColor: "#EFEFEF", sWmode: "transparent"}));
	sIFR.replaceElement("h3", "<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/century_gothic.swf", named({sBgColor: "#FFFFFF", sWmode: "transparent"}));
};
//]]>
</script>