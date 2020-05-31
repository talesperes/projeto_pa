<section>
	<div class="container py-5 mt-2 mb-5">
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-primary font-weight-bold">Notificações</h4>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12">
				
				<?php if(isset($notificacoes) && !empty($notificacoes)):?>
					<?php foreach($notificacoes as $not):?>
						<div class="mb-2" style="border: 1px solid #ddd; border-radius: 5px; padding: 10px;">
							<div class="row">
								<div class="col-9">
									<?php if($not['qtd'] > 1):?>
										<p><?=$not['qtd']?> pessoas querem participar do seu projeto <a href="<?=site_url('projeto/visualizar/'.$not['id_projeto'])?>"><?=$not['titulo']?></a>.</p>
									<?php else:?>
										<p><?=$not['qtd']?> pessoa quer participar do seu projeto <a href="<?=site_url('projeto/visualizar/'.$not['id_projeto'])?>"><?=$not['titulo']?></a>.</p>
									<?php endif;?>
								</div>
								<div class="col-3">
									<div class="row">
										<div class="col-md-12 mb-1">
											<a href="<?=site_url('projeto/visualizar/'.$not['id_projeto'])?>" class="btn btn-primary btn-block" role="button">Ver</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				<?php else:?>
					<i>Você não possui nenhuma notificação.</i>
				<?php endif;?>

			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<nav>
					<?=$links?>
				</nav>
			</div>
		</div>
	</div>
</section>