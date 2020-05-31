<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(isset($usuariosProjeto) && !empty($usuariosProjeto)):?>
				<?php foreach($usuariosProjeto as $up):?>
					<div class="col-md-5">
						<p><?=$up['nome']?></p>
						<input type="hidden" name="id_usuario[]" value="<?=$up['id_usuario']?>">
						<select class="form-control" name="nota[]">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</div>