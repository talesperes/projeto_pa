<section>
<div class="container py-5 mt-2 mb-5">
	<div class="row justify-content-center">
		<div class="col-md-3 col-5 mb-5">
			<div class="img-thumbnail mb-2">
        		<div class="foto-perfil" style="background-image: url('<?=(!empty($usuario['imagem']) ? base_url('/assets/imagens/usuarios/').$usuario['id_usuario'].'/'.$usuario['imagem'] : base_url('/assets/imagens/foto_usuario.png'))?>');"></div>
        	</div>
				<ul class="list-group">
				  <li class="list-group-item"><a href="<?=site_url('perfil')?>">Ver Perfil</a></li>
				  <li class="list-group-item"><a href="<?=site_url('perfil/alterar_perfil/').$this->session->userdata('id')?>">Alterar Perfil</a></li>
				  <li class="list-group-item active"><a href="<?=site_url('perfil/projetos')?>" class="text-white">Meus Projetos</a></li>
				  <li class="list-group-item"><a href="<?=site_url('solicitacao')?>">Solicitações</a></li>
				  <li class="list-group-item"><a href="<?=site_url('projeto/criar_projeto')?>">Criar Projeto</a></li>
				  <li class="list-group-item"><a href="<?=site_url('inicio/sair')?>">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9 col-7">
				<div class="row mb-3">
					<div class="col-md-3">
						<a href="<?=site_url('projeto/criar_projeto')?>" class="btn btn-success btn-block" role="button">Criar Projeto +</a>
					</div>
					<div class="col-md-9">
						<h5 class="mb-4">Filtrar por:</h5>
						<form class="form-inline justify-content-end" method="get" action="">
						   <select class="form-control mr-3" name="">
						   		<option value="">Todos os projetos</option>
						   		<option value="">Criados por você</option>
						   		<option value="">Projetos que você participa</option>
						   </select>
						  <input type="hidden" name="search" value="">
						   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
				<?php if(isset($projetos) && !empty($projetos)):?>
					<?php foreach($projetos as $p):?>
						<div class="row mb-5">
							<div class="col-md-4">
								<div class="img-thumbnail mb-2">
					        		<div class="foto-projeto-pequena" style="background-image: url('<?=(!empty($p['imagem']) ? base_url('assets/imagens/usuarios/'.$p['id_usuario'].'/projetos/'.$p['imagem']) : base_url('assets/imagens/projeto_default.png'))?>');"></div>
					        	</div>
							</div>
							<div class="col-md-8">
								<a href="<?=site_url('projeto/visualizar/'.$p['id_projeto'])?>"><h3><?=$p['titulo']?></h3></a>
								<p><i><?=(strlen($p['descricao']) > 200 ? substr($p['descricao'], 0, 200).'...' : $p['descricao'] )?></i></p>
								<a href="#" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;"><?=(!empty($p['categoria']) ? $p['categoria'] : 'Outros')?></a>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<div class="row mb-5">
						Você não possui nenhum projeto.
					</div>
				<?php endif;?>

				<div class="row">
					<div class="col-12">
						<nav>
							<?=$links?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
