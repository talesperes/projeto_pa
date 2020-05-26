<div class="container py-5 mt-5 mb-5">
	<div class="row">
		<div class="col-md-3 mb-5">
			<div class="mb-4">
				<img src="<?=base_url('/assets/imagens/usuarios/').$this->session->userdata('id').'/'.$usuario['imagem']?>" width="100%" style="border: 1px solid #ddd; padding: 5px;">
			</div>
			<ul class="list-group">
			  <li class="list-group-item active"><a href="<?=site_url('perfil')?>" class="text-white">Ver Perfil</a></li>
			  <li class="list-group-item"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>">Alterar Perfil</a></li>
			  <li class="list-group-item"><a href="<?=site_url('perfil/projetos')?>">Meus Projetos</a></li>
			  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
			  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
			</ul>
		</div>
		<div class="col-md-9">
			<div class="mb-5">
				<div class="row">
					<div class="col-6">
						<h4 class="text-primary"><b><?=$usuario['nome']?></b>, <?=$usuario['idade']?></h4>
					</div>
					<div class="col-6 text-right">
						<a href="<?=site_url('ranking')?>" class="btn btn-primary btn-sm" role="button">Posição no Ranking: <b><?=$usuario['posicao_rank']?></b></a>
					</div>
				</div>
				<hr>
				<p><i>Biografia</i></p>
				<hr>
				<div class="row">
					<div class="col-4">
						<p><i><i class="fas fa-map-marker-alt"></i> <?=$usuario['cidade']?> / <?=$usuario['estado']?></i></p>
					</div>
					<div class="col-5 text-center">
						<p><i><i class="fas fa-envelope"></i> <?=$usuario['email']?></i></p>
					</div>
					<div class="col-3 text-right">
						<p><i><i class="fas fa-phone"></i> <?=$usuario['telefone']?></i></p>
					</div>
				</div>
			</div>
			<div>
				<h4 class="text-primary font-weight-bold">Formação Acadêmica</h4>
				<hr>
				<article>
					<div class="row">
						<div class="col-6">
							<h6 style="font-size: 12px;">Curso</h6>
							<h5>Nome Curso</h5>
						</div>
						<div class="col-6 text-right">
							<div class="row justify-content-end">
								<div class="col-3">
									<h6 style="font-size: 12px;">Início</h6>
									<h5>2000</h5>
								</div>
								<div class="col-3">
									<h6 style="font-size: 12px;">Conclusão</h6>
									<h5>2005</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<h6 style="font-size: 12px;">Instituição</h6>
							<h5>Nome Instituição</h5>
						</div>
						<div class="col-6 text-right">
							<a href="" class="btn btn-primary btn-sm px-3 mt-3" role="button">Alterar</a>
						</div>
					</div>
				</article>
				<hr>
				<article>
					<div class="row">
						<div class="col-6">
							<h6 style="font-size: 12px;">Curso</h6>
							<h5>Nome Curso</h5>
						</div>
						<div class="col-6 text-right">
							<div class="row justify-content-end">
								<div class="col-3">
									<h6 style="font-size: 12px;">Início</h6>
									<h5>2000</h5>
								</div>
								<div class="col-3">
									<h6 style="font-size: 12px;">Conclusão</h6>
									<h5>2005</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<h6 style="font-size: 12px;">Instituição</h6>
							<h5>Nome Instituição</h5>
						</div>
						<div class="col-6 text-right">
							<a href="" class="btn btn-primary btn-sm px-3 mt-3" role="button">Alterar</a>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>
