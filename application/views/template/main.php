<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title><?=(!empty($title) ? $title : 'Projeto PA')?></title>
	<!-- BOOTSTRAP -->
  <link href="<?=site_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?=site_url('assets/css/stepper.css')?>" rel="stylesheet">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- JAVASCRIPT -->
  <script src="<?=site_url('assets/js/jquery-3.4.1.js')?>"></script>
  <script src="<?=site_url('assets/js/bootstrap.js')?>"></script>
  <script src="<?=site_url('assets/js/stepper.js')?>"></script>
</head>
<body>
	
<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning py-0">

  <a class="navbar-brand" href="index.php">
  	<img src="<?=site_url('assets/imagens/logo.png')?>">
  </a>

  <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-auto mb-2 mb-lg-0">
      <a class="nav-link" href="<?=site_url('inicio')?>">
      	<li class="nav-item active text-center">
        	HOME
      	</li>
      </a>
      <a class="nav-link" href="#">
      	<li class="nav-item text-center">
        	PROJETOS
      	</li>
      </a>
      <a class="nav-link" href="#">
      	<li class="nav-item text-center">
        	PESQUISAS
      	</li>
      </a>
      <a class="nav-link" href="#">
      	<li class="nav-item text-center">
        	SOBRE
      	</li>
      </a>
    </ul>

    <?php if(!$this->session->userdata('logado')):?>
      <ul class="navbar-nav ml-auto mt-lg-0 mt-md-0 mr-lg-4">
        	<li class="nav-item text-center mb-2">
        		<a href="<?=site_url('cadastro')?>" class="btn btn-primary text-white" role="button"><span style="letter-spacing: 1px; font-size: 12px;">CADASTRE-SE <i class="fas fa-feather-alt"></i></span></a>
        	</li>
        	<li class="nav-item text-center mb-2">
        		<button type="button" class="btn btn-light" data-toggle="modal" data-target="#login">
  			  <span style="letter-spacing: 1px; font-size: 12px;">LOGIN <i class="fas fa-sign-in-alt"></i></span>
  			</button>
        	</li>
      </ul>
    <?php endif;?>
  </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content pb-3" style="border-radius: 0.5rem;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div style="border: 2px solid #e3e7f0; border-radius: 10px; padding: 30px 20px; margin: 0px 20px;">
	        <h3 class="font-weight-bold text-center text-primary">Login</h3>
	        <form class="mt-4" method="post" action="<?=site_url('inicio/acessar')?>">
			  <div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email_login" name="email" placeholder="Insira seu email">
			  </div>
			  <div class="form-group">
			    <label for="senha">Senha</label>
			    <input type="password" class="form-control" id="senha_login" name="senha" placeholder="Insira sua senha">
			  </div>
			  <center><input type="submit" name="botao_entrar" class="btn btn-primary btn-block btn-lg" value="Entrar" style="font-size: 16px;"></center>
			  <a href="" class="text-center" style="text-decoration: none;"><small class="form-text text-muted font-weight-bold mt-2">Esqueceu sua senha?</small></a>
			</form>
		</div>
		<div class="mt-4">
			<p class="text-center">Não tem uma conta? <a href="<?=site_url('cadastro')?>" class="btn btn-warning ml-1" role="button"><span style="font-size: 14px; font-weight: bold;">Cadastre-se</span></a></p>
		</div>	
      </div>
    </div>
  </div>
</div>
<!-- /HEADER -->
<?=$contents?>
</body>
</html>