
	<section>
		<div class="container-fluid">
			<div class="row">
				<img src="<?=base_url('assets/imagens/banner.jpg')?>" width="100%">
			</div>
		</div>
	</section>

	<!-- PESQUISA -->
	<section class="pt-0">
		<div class="container-fluid bg-primary py-5">
			<div class="row py-3">
				<div class="col-12 text-center">
					<h1 class="text-white font-weight-bold">Encontre um projeto para participar:</h1>
				</div>
			</div>
			<div class="row py-3 justify-content-center">
				<div class="col-8">
					<form class="form-inline d-flex justify-content-center md-form form-sm" method="get" action="<?=site_url('/projeto')?>">
					  <input class="form-control form-control-lg mr-3 w-75" name="search" type="text" placeholder="Pesquise por título, instituição ou área de conhecimento" aria-label="Procurar">
					   <button class="btn btn-primary no-hover" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- /PESQUISA -->

	<section class="pt-0 pb-5 bg-light">
		<div class="container-full px-5 py-5">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-12">
							<h3 class="font-weight-bold">Navegue por Área de Conhecimento:</h3>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-md-2 mb-2">
							<a href="" class="btn btn-warning btn-block" role="button" style="border-radius: 0px;">Arquitetura</a>
						</div>
						<div class="col-md-2 mb-2">
							<a href="" class="btn btn-warning btn-block" role="button" style="border-radius: 0px;">Biologia</a>
						</div>
						<div class="col-md-2 mb-2">
							<a href="" class="btn btn-warning btn-block" role="button" style="border-radius: 0px;">Computação</a>
						</div>
						<div class="col-md-2 mb-2">
							<a href="" class="btn btn-warning btn-block" role="button" style="border-radius: 0px;">Engenharia</a>
						</div>
						<div class="col-md-2 mb-2">
							<a href="" class="btn btn-warning btn-block" role="button" style="border-radius: 0px;">Psicologia</a>
						</div>
						<div class="col-md-2 mb-2">
							<a href="" class="btn btn-primary btn-block" role="button" style="border-radius: 0px;">Ver todas</a>
						</div>
					</div>
					<div class="row mt-5 pt-5">
						<div class="col-12">
							<h3 class="font-weight-bold">Projetos em Destaque</h3>
						</div>
					</div>
					<div class="row mt-4">

						<?php if(isset($projetosDestaque) && !empty($projetosDestaque)):?>
					        <?php foreach($projetosDestaque as $pd):?>
					            <div class="col-md-3 col-6 mb-4">
			            			<div class="img-thumbnail mb-2">
			            				<div class="foto-projeto-index" style="background-image: url('<?=base_url('assets/imagens/projeto_01.jpg')?>');"></div>
					            	</div>
			                		<h5><a href="<?=site_url('projeto/visualizar/'.$pd['id_projeto'])?>"><?=$pd['titulo']?></a></h5>
			                		<span>Criado por <a href=""><?=$pd['nome']?></a></span>
					                <a></a>
					            </div>
					        <?php endforeach;?>
					  	<?php endif;?>

					</div>
					<div class="row mt-4">
						<div class="col-12 text-center">
							<a href="<?=site_url('projeto')?>" class="btn btn-primary btn-lg" role="button" style="border-radius: 0px;">Ver mais</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row">
						<div class="col-12 text-center">
							<a href="<?=site_url('ranking')?>"><h5 class="font-weight-bold">Ranking</h5></a>
							<h3 class="pt-2 text-warning">TOP 20 <i class="fas fa-trophy"></i></h3>
							<ul class="list-group mt-4">
								<?php if(isset($usuariosRank) && !empty($usuariosRank)):?>
									<?php foreach($usuariosRank as $ur):?>
										<li class="list-group-item"><a href=""><?=$ur['nome']?></a></li>
									<?php endforeach;?>
								<?php endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>