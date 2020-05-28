<?php if(has_alert()):  
  foreach(has_alert() as $type => $message): ?>  
<div class="alert alert-dismissible <?php echo $type; ?>">  
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
  <?php echo $message; ?>  
</div>
<?php endforeach;  
  endif; ?>
<div class="container-fluid">
	<form class="col-md-4" method="post" action="<?=site_url('redefinir/nova_senha/'.$token)?>">
		<div class="form-group">
			<label for="senha">Nova Senha</label>
			<input type="password" class="form-control" name="senha" placeholder="Insira seu senha">
		</div>
		<div class="form-group">
			<label for="senha_confirm">Confirmar Senha</label>
			<input type="password" class="form-control" name="senha_confirm" placeholder="Insira sua senha">
		</div>
	<input type="submit" class="btn btn-primary btn-block btn-lg" value="Enviar" style="font-size: 16px;">
	</form>
</div>