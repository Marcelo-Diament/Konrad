<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br" class="turma">
<head>
	<?php

	include('./inc/head.php'); 
	$argsTreina = array(
	  'name'        => $_GET['treinamento'],
	  'post_type'   => 'treinamentos',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);

	$treinamento = array_pop(get_posts($argsTreina));

	$argsTurma = array(
	  'name'        => $_GET['nome'],
	  'post_type'   => 'turmas',
	  'post_status' => 'publish',
	  'numberposts' => 1
	);
	$turma = array_pop(get_posts($argsTurma));
	if( !$turma && !$treinamento) {
	  header("location: ../404");
	}

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($turma->ID), 'icones-site' );
	$url = $thumb['0'];

	//var_dump($turma);
	?>
	<title>Turma - <?php echo $turma->post_title; ?> | Konrad</title>
</head>
<body>
	<!-- Header -->
	<?php include('./inc/header.php'); ?>
	<!-- ### -->
	
	<div id="titulo-interna">
		<div id="topo-interna">
			<div class="grid-container">
				<div class="grid-100">
					<img src="<?php local(); ?>img/sample/s2.png" alt="" class="it ico-interna">
					<h1 class="titulo-pagina it"><?php echo $turma->post_title; ?></h1>
				</div>
			</div>
		</div>
		<div id="breadcrumb">
			<div class="grid-container">
				<div class="grid-100">
					<a href="<?php local(); ?>" class="im">Home</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>servicos/" class="im">Serviços</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>servico/treinamentos-e-eventos" class="im">Treinamentos e Eventos</a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<a href="<?php local(); ?>treinamento/<?php echo $treinamento->post_name; ?>" class="im"><?php echo $treinamento->post_title; ?></a>
					<span class="im sep"><i class="fa fa-angle-right im"></i></span>
					<span class="atual im"><?php echo $turma->post_title; ?></span>
				</div>
			</div>
		</div>
	</div>

	<?php 
	$turmas_treinamento_evento = get_field('turmas_treinamento_evento', $turma->ID);
	$turma_duracao = get_field('turma_duracao', $turma->ID);
	$turmas_local = get_field('turmas_local', $turma->ID);
	$turmas_endereco_completo = get_field('turmas_endereco_completo', $turma->ID);
	$turmas_cidade = get_field('turmas_cidade', $turma->ID);
	$turmas_uf = get_field('turmas_uf', $turma->ID);
	$turmas_carga = get_field('turmas_carga', $turma->ID);
	$turmas_horario = get_field('turmas_horario', $turma->ID);
	$turmas_vagas = get_field('turmas_vagas', $turma->ID);
	$turmas_preco_clientes = get_field('turmas_preco_clientes', $turma->ID);
	$turmas_preco_demais = get_field('turmas_preco_demais', $turma->ID);
	$turmas_descontos = get_field('turmas_descontos', $turma->ID);
	$turmas_mais_informacoes = get_field('turmas_mais_informacoes', $turma->ID);
	$turmas_arquivos = get_field('turmas_arquivos', $turma->ID);
	//var_dump($turmas_preco_demais);
	?>
	<div class="txt-interna bloco-home bloco-treinamento-detalhes border">
		<div class="grid-container">
			<div class="grid-100">
				<h2 class="title ac border">Treinamento em <b><?php echo $turmas_cidade; ?></b></h2>
			</div>
			<div class="grid-50">
				<h2>Informações:</h2>
				<ul>
					<li><i class="fa fa-circle"></i><b>Treinamento/Evento:</b> <br><?php echo $treinamento->post_title; ?></li>
					<li><i class="fa fa-circle"></i><b>Duração:</b> <br><?php echo $turma_duracao; ?></li>
					<li><i class="fa fa-circle"></i><b>Endereço:</b> <br><?php echo $turmas_endereco_completo['address']; ?></li>
					<li><i class="fa fa-circle"></i><b>Carga Horária:</b> <br><?php echo $turmas_carga; ?></li>
					<li><i class="fa fa-circle"></i><b>Horário:</b> <br><?php echo $turmas_horario; ?></li>
					<li><i class="fa fa-circle"></i><b>Total de vagas:</b> <br><?php echo $turmas_vagas; ?></li>
				</ul>

				<?php 
				if($turmas_arquivos){ 
					foreach($turmas_arquivos as $arquivo){
				?>
					
				<a href="<?php echo $arquivo['arquivo']; ?>" class="btn-a mgrb"><?php echo $arquivo['nome']; ?></a>
				<?php } } ?>
			</div>

			<div class="grid-50 video-treinamento">
				<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDXbccsVj_cKyLGCUeMB5ENjiUcjrCh5PI&q=<?php echo urlencode($turmas_endereco_completo['address']); ?>" width="600" height="400" frameborder="0" style="border:0" disableDefaultUI="true"></iframe>
			</div>

			<div class="grid-100">
				<div class="border-bl"></div>
			</div>
		</div>
	</div>


	<div class="txt-interna bloco-home">
		<div class="grid-container">
			<div class="grid-100">
				<h2 class="title ac border"><b>Inscreva-se</b></h2>
			</div>

			<form id="inscrever-treinamento" method="POST" action="<?php local() ?>ajax/email-curso.php">

				<div class="grid-100 alerta-form erro obrigatorio">
							<div>
								<span class="fa fa-close im"></span>
								<span class="im msg">Preencha todos os campos!</span>
							</div>
						</div>
			
				<div class="grid-100">
					<h2>1. Treinamento/Evento escolhido:</h2>	
					<div class="bloco-form">
						<div class="grid-50">
							<p>Treinamento/Evento: <b><?php echo $treinamento->post_title; ?></b> <br>
							Cidade: <b><?php echo "$turmas_cidade - $turmas_UF"; ?></b> <br>
							Local: <b><?php echo $turmas_local; ?></b></p>
						</div>
						<div class="grid-50">
							<p>Duração: <b><?php echo $turma_duracao; ?></b> <br>
							Carga: <b><?php echo $turmas_carga; ?></b> <br>
							Horário: <b><?php echo $turmas_horario; ?></b></p>
						</div>
						<div class="clear"></div>
					</div>				
				</div>

				<!-- Inputs escondidos com informações do curso para o formulário -->
				<input type="hidden" name="email-destinatario" value="<?php echo $konrad_email; ?>">

				<input type="hidden" name="treinamentoescolhido" value="<?php echo $treinamento->post_title; ?>">
				<input type="hidden" name="treinamentocidade" value="<?php echo "{$turmas_cidade} - {$turmas_UF}"; ?>">
				<input type="hidden" name="treinamentolocal" value="<?php echo $turmas_local; ?>">
				<input type="hidden" name="treinamentoduracao" value="<?php echo $turma_duracao; ?>">
				<input type="hidden" name="treinamentocarga" value="<?php echo $turmas_carga; ?>">
				<input type="hidden" name="treinamentohorario" value="<?php echo $turmas_horario; ?>">
			
				<div class="grid-100 container-participantes">
					<h2>2. Dados do participante:</h2>	
					<div class="bloco-form participante-bloco">
						<div class="grid-35">
							<label for="turmanome" class="bl">*Nome completo (Para certificado):</label>
							<input type="text" class="fullwd obrigatorio" name="turmanome[]">
						</div>
						<div class="grid-30">
							<label for="turmacpf" class="bl">*CPF (Para certificado):</label>
							<input type="text" class="fullwd obrigatorio" name="turmacpf[]">
						</div>
						<div class="grid-35">
							<label for="turmaemail" class="bl">*Email:</label>
							<input type="text" class="fullwd obrigatorio" name="turmaemail[]">
						</div>
						<div class="clear"></div>
						<div class="grid-35">
							<label for="turmaempresa" class="bl">Empresa:</label>
							<input type="text" class="fullwd" name="turmaempresa[]">
						</div>
						<div class="grid-30">
							<label for="turmacargo" class="bl">Cargo:</label>
							<input type="text" class="fullwd" name="turmacargo[]">
						</div>
						<div class="clear"></div>
						<div class="grid-60">
							<label for="turmaendereco" class="bl">*Endereço:</label>
							<input type="text" class="fullwd obrigatorio" name="turmaendereco[]">
						</div>
						<div class="grid-30">
							<label for="turmatelefone" class="bl">*Telefone:</label>
							<input type="text" class="fullwd obrigatorio" name="turmatelefone[]">
						</div>
						<div class="clear"></div>
					</div>
				
				</div>

				<div class="grid-100">					
					<div class="add-participa ar">
						<a href="#" class="btn-a">Adicionar Participantes</a>
					</div>
				</div>
			
				<div class="grid-100">
					<h2>3. Valor da inscrição por pessoa:</h2>	
					<div class="bloco-form">
						<div class="grid-100">
							<?php if($turmas_preco_clientes){ ?>
							<p><span class="big">R$ <?php echo $turmas_preco_clientes; ?></span> - se sua empresa enquadra-se em alguma dessas categorias:</p><br>
							<?php }else{ ?>
							<p><span class="big" style="color: green;">GRATUITO</span> - se sua empresa enquadra-se em alguma dessas categorias:</p><br>
							<?php } ?>
						</div>

						<div class="grid-20">
							<label for="turmaclienteativo" class="bl"><input type="radio" id="turmaclienteativo" name="turmatipocliente" value="Cliente ativo" class="im mgrb" checked>Cliente ativo</label>
						</div>

						<div class="grid-40">
							<label for="turmaparceiro" class="bl"><input type="radio" id="turmaclienteparceiro" name="turmatipocliente" value="Parceiro" class="im mgrb">Parceiro (especificar):</label>
							<input type="text" class="fullwd" id="turmaparceironome" name="turmaparceironome">
						</div>

						<div class="grid-40">
							<label for="turmaoutrocfe" class="bl"><input type="radio" id="turmaoutrocfe" name="turmatipocliente" value="Outro cfe. de divulgação" class="im mgrb">Outro cfe. de divulgação:</label>
							<input type="text" class="fullwd" id="turmacfenome" name="turmacfenome">
						</div>
						<div class="clear"></div>

						<div class="grid-100">
							<?php if($turmas_preco_demais){ ?>
							<p><span class="big">R$ <?php echo $turmas_preco_demais; ?></span></p> <br>
							<?php }else{ ?>
							<p><span class="big" style="color: green;">GRATUITO</span></p> <br>
							<?php } ?>
							<label for="" class="bl"><input type="radio" class="im mgrb" id="turmademais" name="turmatipocliente" value="Demais interessados">Demais interessados</label>
						</div>
					</div>			
				</div>
			
				<div class="grid-100">
					<h2>4. Política de Valorização de Inscrições:</h2>	
					<div class="bloco-form nobg">
						
						<p>Para inscrições da mesma organização, será concedido desconto da seguinte forma: <br>

						<?php foreach($turmas_descontos as $desconto){ ?>
						<i class="fa fa-circle mgrb"></i><b><?php echo $desconto['titulo']; ?></b> <?php echo $desconto['valor']; ?><br>
						<?php } ?>
						</p>


						<div class="clear"></div>
					</div>			
				</div>
				
				<?php  
				$dadosbancarios_banco = get_field('dadosbancarios_banco', 'option');
				$dadosbancarios_agencia = get_field('dadosbancarios_agencia', 'option');
				$dadosbancarios_conta = get_field('dadosbancarios_conta', 'option');
				?>

				<div class="grid-100">
					<h2>5. Pagamento da Inscrição</h2>	
					<div class="bloco-form nobg">
						<p><b>Após o preenchimento deste formulário</b> será enviado pelo organizador, e-mail confirmando a realização do treinamento/evento, devendo o participante pagar a inscrição por meio de <b>depósito identificado no <?php echo $dadosbancarios_banco; ?>, Ag. <?php echo $dadosbancarios_agencia; ?>, Cc <?php echo $dadosbancarios_conta; ?></b>, antes da realização do evento, enviando ao organizador o comprovante para <a href="mailto:contato@konrad.com.br">contato@konrad.com.br</a></p>

						<div class="clear"></div>
					</div>			
				</div>

				<div class="grid-100">
					<h2>6. Dados para emissão da nota fiscal</h2>	
					<div class="bloco-form">
						<div class="grid-100">
							<label for="turmapessoafisica" class="im mgr upc"><input type="radio" id="turmapessoafisica" name="turmapessoa" value="Pessoa física" class="im mgrb" checked>Pessoa física</label>
							<label for="turmapessoajuridica" class="im mgr upc"><input type="radio" id="turmapessoajuridica" name="turmapessoa" value="Pessoa jurídica" class="im mgrb">Pessoa jurídica</label>
						</div>
						<br>
						<div class="grid-40">
							<label for="turmanotarazao" class="bl">*razão social/nome:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotarazao" name="turmanotarazao">
						</div>
						<div class="grid-30">
							<label for="turmanotacpf" class="bl">*cnpj/cpf:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotacpf" name="turmanotacpf">
						</div>
						<div class="grid-30">
							<label for="turmanotaie" class="bl">Inscrição estadual (se aplicável):</label>
							<input type="text" class="fullwd" id="turmanotaie" name="turmanotaie">
						</div>
						<div class="clear"></div>
						<div class="grid-15">
							<label for="turmanotacep" class="bl">*CEP:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotacep" name="turmanotacep">
						</div>
						<div class="grid-25">
							<label for="turmanotacidade" class="bl">*Cidade:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotacidade" name="turmanotacidade">
						</div>
						<div class="grid-10">
							<label for="turmanotauf" class="bl">*UF:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotauf" name="turmanotauf">
						</div>
						<div class="grid-50">
							<label for="turmanotaendereco" class="bl">*Endereço:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotaendereco" name="turmanotaendereco">
						</div>
						<div class="clear"></div>
						<div class="grid-15">
							<label for="turmanotatelefone" class="bl">*Telefone:</label>
							<input type="text" class="fullwd obrigatorio" id="turmanotatelefone" name="turmanotatelefone">
						</div>
						<div class="clear"></div>
					</div>	

					<div class="bloco-form">
						<div class="grid-100">
							<label for="" class="im mgr upc">*Como prefere receber a nota fiscal? <br><br></label>
						</div>
						<div class="grid-100">
							<label for="turmaentregar" class="im mgr noutc"><input type="radio" id="turmaentregar" name="turmaentreganota" class="im mgrb" value="Entregar para o participante no dia do treinamento." checked>Entregar para o participante no dia do treinamento. <br><br></label>
						</div>
						<div class="grid-100">
							<label for="turmacorreio" class="im mgr noutc"><input type="radio" id="turmacorreio" name="turmaentreganota" class="im mgrb" value="Por correio">Por correio (Os custos da entrega é responsabilidade do participante).<br><br></label>
						</div>

						<div class="grid-15">
							<label for="turmacepnota" class="bl">*CEP:</label>
							<input type="text" class="fullwd obrigatorio" id="turmacepnota" name="turmacepnota">
						</div>
						<div class="grid-25">
							<label for="turmacidadenota" class="bl">*Cidade:</label>
							<input type="text" class="fullwd obrigatorio" id="turmacidadenota" name="turmacidadenota">
						</div>
						<div class="grid-10">
							<label for="turmaufnota" class="bl">*UF:</label>
							<input type="text" class="fullwd obrigatorio" id="turmaufnota" name="turmaufnota">
						</div>
						<div class="grid-50">
							<label for="turmaendereconota" class="bl">*Endereço:</label>
							<input type="text" class="fullwd obrigatorio" id="turmaendereconota" name="turmaendereconota">
						</div>
						<div class="clear"></div>
					</div>			
				</div>

				<div class="grid-100">
					<h2>7. Política para cancelamento de inscrições:</h2>	
					<div class="bloco-form nobg">

						<p><i class="fa fa-circle mgrb"></i>Em caso de cancelamento até <b>10 dias antes</b> do evento, o participante perderá <b>10%</b> da inscrição. <br>
						   <i class="fa fa-circle mgrb"></i>Caso ocorra cancelamento no período que compreende os <b>9 dias</b> antes do treinamento, será cobrado <b>50%</b> do valor de inscrições, sendo devolvido o restante.
						</p>
						<div class="clear"></div>
					</div>			
				</div>

				<div class="grid-100">
					<div class="ar">
							<a href="#" class="btn-a enviar">Finalizar inscrição</a>
						</div>
				</div>

				<div class="grid-100">
					<h2>Para mais informações:</h2>		
				</div>

				<div class="grid-50">
					<div class="bloco-info-treina">
						<h3>Konrad</h3>
						<p>Tel: <b><?php 
								$contador = 1;
								foreach ($konrad_telefones as $telefone) {
									echo $telefone['telefone'];
									if($contador < $totaltel){
										echo ' / ';
									}
								$contador++;
							} ?></b> <br>
						   Email: <a href="mailto:<?php echo $konrad_email; ?>"><?php echo $konrad_email; ?></a> <br>
						   Site: <a href="<?php echo get_home_url(); ?>">www.konrad.com.br</a>
							
						</p>
					</div>
				</div>

				<?php 
				if($turmas_mais_informacoes){ 
					$contador = 2;
					foreach($turmas_mais_informacoes as $info){
				?>

				<div class="grid-50">
					<div class="bloco-info-treina">
						<h3><?php echo $info['empresa']; ?></h3>
						<p>Tel: <b><?php echo $info['telefone']; ?></b> <br>
						   Email: <a href="mailto:<?php echo $info['email']; ?>"><?php echo $info['email']; ?></a> <br>
						   Site: <a href="//<?php echo $info['site']; ?>"><?php echo $info['site']; ?></a>
							
						</p>
					</div>
				</div>

				<?php 
					$contador++;
					if($contador%2 == 0){
						echo '<div class="clear"></div>';
					}
					}
				} ?>

				<div class="clear"></div>
			
			</form>
		</div>
	</div>

	<!-- Contato -->
	<?php include('./inc/bloco-contato.php'); ?>
	<!-- ### -->
	
	<!-- Footer -->
	<?php include('./inc/footer.php'); ?>
	<!-- ### -->
</body>
</html>
<?php ob_end_flush(); ?>