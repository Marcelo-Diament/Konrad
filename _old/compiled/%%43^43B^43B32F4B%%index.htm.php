<?php /* Smarty version 2.6.22, created on 2014-07-29 10:19:11
         compiled from index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'submenus', 'index.htm', 54, false),array('modifier', 'date_format', 'index.htm', 83, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
	<title>Konrad :: Sistemas de Competitividade</title>
	<meta name="author" content="G&ouml;tz &amp; Konrad Ltda."/>
<?php if (! $this->_tpl_vars['getKey'][0]): ?>
	<meta name="description" content="Somos uma empresa de treinamento, consultoria e auditoria em sistemas de gestão normativos e de desempenho." />
	<meta name="Keywords" content="produção enxuta, Lean Manufacturing, Lean Office, Kaizen, sistemas de gestão, iso, bmp, sig, ohsas, SASSMAQ, PBQP-h, certificados de produtos, abnt, ce, treinamento, consultoria, auditoria, software, cursos de gestão, Consultoria CRCC, Consultoria Registro Local, Assessoria Registro Local, Assessoria CRCC, Consultoria ONIP, Assessoria ONIP, Consultoria Petrobras, Consultoria Petronect" />
<?php endif; ?>
	<meta http-equiv="pragma" content="no-cache" />
	<meta name="revisit-after" content="1" />
	<meta name="language" content="pt-br" />
	<meta name="robots" content="all" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="verify-v1" content="kkQDLLiu3rVDroCumwLXl9XlQJHToWBa87VMiYh59WU=" />
	<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/favicon.ico" type="image/x-icon" />
			
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/css/sIFR-screen.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/css/konrad.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/css/menu.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/css/dropdown.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/css/dtree.css" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/css/print.css" />
	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/javascript/konrad.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/javascript/dtree.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/javascript/sifr.js"></script>
	<script type="text/javascript" src="http://www.google-analytics.com/urchin.js"></script>
</head>
<body id="bd">
<div id="container">
	<div id="menu-topo">		
		<a href="#" onclick="javascript: window.open('http://webmail.konrad.com.br');">Webmail</a>
		<img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/point.gif" alt=""/>
		<a href="#" onclick="javascript: window.open('<?php echo $this->_tpl_vars['rootfolder']; ?>
/admin/');">Área Restrita</a>
		<img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/point.gif" alt=""/>
		<a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/mapa-do-site/">Mapa do Site</a>
	</div>
	<div id="main">
		<div id="header">
		<div id="logo"><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/logotipo.jpg" alt=""/></a></div>
		<div id="iso">
			<a href="#" onclick="javascript: window.open('<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/CRCC_25369+01.pdf');">Qualificação da Petrobras para Treinamento, Consultoria e Auditoria em QSMS - CRCC 25.369 [01]</a>
		</div>
	</div>
		<div id="menu">
			<div id="menu-superior"> 
			  <ul id="menu-principal" class="dropdown">
				<li id="botao-empresa"><a class="linkPrincipal" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/a-empresa/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_empresa.gif" alt=""/></a></li>
				<li id="botao-clientes"><a class="linkPrincipal" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/clientes/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_clientes.gif" alt=""/></a></li>
				<li id="botao-atuacao"><a class="linkPrincipal" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/areas-de-atuacao/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_area_atuacao.gif" alt=""/></a> 
				  <ul>
				  	<li class="topo">&nbsp;</li>
					<?php $this->assign('submenu', ((is_array($_tmp=1)) ? $this->_run_mod_handler('submenus', true, $_tmp) : smarty_modifier_submenus($_tmp))); ?>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<li><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/area-de-atuacao/<?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['url']; ?>
/"><?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['title']; ?>
</a></li>
					<?php endfor; endif; ?>
					<li class="final">&nbsp;</li>
				  </ul>
				</li>
				<li id="botao-servicos"><a class="linkPrincipal" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_servicos.gif" alt=""/></a> 
				  <ul>
				  	<li class="topo">&nbsp;</li>
					<?php $this->assign('submenu', ((is_array($_tmp=2)) ? $this->_run_mod_handler('submenus', true, $_tmp) : smarty_modifier_submenus($_tmp))); ?>
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<li><a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/<?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['url']; ?>
/"><?php echo $this->_tpl_vars['submenu'][$this->_sections['i']['index']]['title']; ?>
</a></li>
					<?php endfor; endif; ?>
					<li class="final">&nbsp;</li>
				  </ul>
				</li>
				<li id="botao-contato"><a class="linkPrincipal" href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/contato/"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/btn_contato.gif" alt=""/></a></li>
			  </ul>
			</div>
		</div>
		<div id="content">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['page']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
	</div>
	<div id="rodape">
		<div id="desenvolvedor"><a href="#" onclick="javascript: window.open('http://www.gotz.com.br');"><img src="<?php echo $this->_tpl_vars['rootfolder']; ?>
/media/images/gotz.jpg" alt="Desenvolvedor" title="Desenvolvedor"/></a></div>
		<div id="links">
		<a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/">Home</a> | <a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/a-empresa/">A Empresa</a> | <a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/clientes/">Clientes</a> | <a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/area-de-atuacao/">Área de atuação</a> | <a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/conteudo/servicos/">Serviços</a> | <a href="<?php echo $this->_tpl_vars['rootfolder']; ?>
/contato/">Contato</a>
		<p>&copy; Copyright <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 Konrad - Sistemas de Competitividade<br/>Av. Walter Kaufmann, 360 - Porto Alegre - CEP 91220-000 Fone/Fax: (51) 3347-7819</p>
		</div>
	</div>
</div>
<script type="text/javascript">
	try {
		_uacct = "UA-4224943-7";
		urchinTracker();
	} catch(err) {}
</script>
</body>
</html>