<div id="bloco-contato" class="bloco-home">
	<div class="grid-container">
		<div class="grid-15">
			<img src="<?php local(); ?>img/common/contato-home.png" alt="" class="fullimg"/>
		</div>
		<div class="grid-85">
			<h2><a href="<?php local(); ?>contato/">Entre em <b>contato</b></a></h2>
			<div class="ajfix">
				<span class="ib">Telefones: <b><?php 
								$contador = 1;
								foreach ($konrad_telefones as $telefone) {
									echo $telefone['telefone'];
									if($contador < $totaltel){
										echo ' / ';
									}
								$contador++;
							} ?></b></span>
				<span class="ib">Email: <a href="mailto:<?php echo $konrad_email; ?>"><?php echo $konrad_email; ?></a></span>
				<a href="<?php local(); ?>contato/" class="btn-a ib">Fale conosco</a>
			</div>
		</div>
	</div>
</div>