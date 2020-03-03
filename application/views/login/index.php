<?=form_open('logon')?>
	<?=form_label('Email','email')?>
	<?=form_input(array('name' => 'email', 'id' => 'email'))?>
	<?=form_label('Senha','senha')?>
	<?=form_input(array('name' => 'senha', 'id' => 'senha'))?>
	<?=form_submit('acessar', 'Acessar')?>
<?=form_close()?>
