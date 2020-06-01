<section class="py-5">
	<div class="container-fluid px-5">
		<div class="row pt-3">
			<div class="col-md-9">
				<div class="row mb-5">

					<?php if($this->session->userdata('logado')):?>
						<div class="col-md-3 mb-2">
							<a href="<?=site_url('projeto/criar_projeto')?>" class="btn btn-success btn-block" role="button">Criar Projeto +</a>
						</div>
					<?php endif;?>

					<div class="col-md-9">
						<form class="form-inline" method="get" action="<?=site_url('/projeto')?>">
						  <input class="form-control mr-3 w-75" name="search" type="text" value="<?=(isset($filtros['search']) ? $filtros['search'] : '')?>" placeholder="Pesquise por título, instituição ou área de conhecimento" aria-label="Procurar">
						  <input type="hidden" name="order" value="<?=$this->input->get('order')?>">
						  <input type="hidden" name="area" value="<?=$this->input->get('area')?>">
						   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
				<?php if(!empty($projetos) && isset($projetos)):?>
					<?php foreach($projetos as $p):?>
						<div class="row mb-5">
							<div class="col-md-4">
								<div class="img-thumbnail mb-2">
					        		<div class="foto-projeto" style="background-image: url('<?=(!empty($p['imagem']) ? base_url('assets/imagens/usuarios/'.$p['id_usuario'].'/projetos/'.$p['imagem']) : base_url('assets/imagens/projeto_default.png') )?>');"></div>
					        	</div>
							</div>
							<div class="col-md-8">
								<a href="<?=site_url('projeto/visualizar/'.$p['id_projeto'])?>"><h3><?=$p['titulo']?></h3></a>
								<p><i><?=(strlen($p['descricao']) > 200 ? substr($p['descricao'], 0, 200).'...' : $p['descricao'] )?></i></p>
								<p>Criado por <a href="<?=site_url('perfil/index/'.$p['id_usuario'])?>"><?=$p['nome']?></a></p>
								<a href="#" class="btn btn-warning mr-1" role="button" style="border-radius: 0px;"><?=(!empty($p['categoria']) ? $p['categoria'] : 'Outros')?></a>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					Não foi encontrado nenhum projeto.
				<?php endif;?>
				<div class="row">
					<div class="col-12">
						<nav>
						  <?=$links?>
						</nav>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="col-12 text-right">
						<h5 class="mb-4">Filtrar por:</h5>
						<form class="form-inline justify-content-end" method="get" action="<?=site_url('projeto')?>">
						   <select class="form-control mr-3" name="order">
						   		<option <?=($this->input->get('order') == 'alfabetica' ? 'selected' : '' )?> value="alfabetica">Ordem Alfabética</option>
						   		<option <?=($this->input->get('order') == 'novo' ? 'selected' : '' )?> value="novo">Mais Novo</option>
						   		<option <?=($this->input->get('order') == 'antigo' ? 'selected' : '' )?> value="antigo">Mais Antigo</option>
						   </select>
						  <input type="hidden" name="search" value="<?=$this->input->get('search')?>">
						  <input type="hidden" name="area" value="<?=$this->input->get('area')?>">
						   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
						</form>
						<h5 class="font-weight-bold text-primary mt-4">Área</h5>
						<ul class="list-group list-group-flush">
						  <li class="list-group-item <?=($this->input->get('area') == 'arquitetura' ? 'active': '' )?>"><a class="<?=($this->input->get('area') == 'arquitetura' ? 'text-white': '' )?>" href="<?=site_url('projeto?area=arquitetura')?>">Arquitetura</a></li>
						  <li class="list-group-item <?=($this->input->get('area') == 'biologia' ? 'active': '' )?>"><a class="<?=($this->input->get('area') == 'biologia' ? 'text-white': '' )?>" href="<?=site_url('projeto?area=biologia')?>">Biologia</a></li>
						  <li class="list-group-item <?=($this->input->get('area') == 'computacao' ? 'active': '' )?>"><a class="<?=($this->input->get('area') == 'computacao' ? 'text-white': '' )?>" href="<?=site_url('projeto?area=computacao')?>">Computação</a></li>
						  <li class="list-group-item <?=($this->input->get('area') == 'engenharia' ? 'active': '' )?>"><a class="<?=($this->input->get('area') == 'engenharia' ? 'text-white': '' )?>" href="<?=site_url('projeto?area=engenharia')?>">Engenharia</a></li>
						  <li class="list-group-item <?=($this->input->get('area') == 'psicologia' ? 'active': '' )?>"><a class="<?=($this->input->get('area') == 'psicologia' ? 'text-white': '' )?>" href="<?=site_url('projeto?area=psicologia')?>">Psicologia</a></li>
						  <li class="list-group-item <?=($this->input->get('area') == '' ? 'active': '' )?>"><a href="<?=site_url('projeto')?>" class="<?=($this->input->get('area') == '' ? 'text-white': '' )?>">Ver todas</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>