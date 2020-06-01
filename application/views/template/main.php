<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="<?=base_url('assets/imagens/book.png')?>">
  <title><?=(!empty($title) ? $title : 'Projeto PA')?></title>
  <!-- BOOTSTRAP -->
  <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/stepper.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
  <!-- FONT AWESOME -->
  <!-- <link href="<?=base_url('assets/css/fontawesome.css')?>" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- JAVASCRIPT -->
  <script src="<?=base_url('assets/js/jquery-3.4.1.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
  <script src="<?=base_url('assets/js/stepper.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery.nicescroll.js')?>"></script>
</head>
<body>
  
<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning py-0">

  <a class="navbar-brand d-block d-md-block d-lg-none" href="<?=site_url('inicio')?>">
    <img src="<?=base_url('assets/imagens/logo.png')?>" width="200">
  </a>

  <a class="navbar-brand d-none d-md-none d-lg-block" href="<?=site_url('inicio')?>">
    <img src="<?=base_url('assets/imagens/logo.png')?>">
  </a>

  <?php if($this->session->userdata('logado')):?>
    <ul class="navbar-nav ml-auto mr-2 d-block d-md-block d-lg-none">
      <li class="nav-item">
      <a href="<?=site_url('perfil/notificacao')?>"><span class="badge badge-dark badge-pill py-2 px-3"><i class="fas fa-bell fa-lg mr-1"></i> <span class="num_not">0</span></span></a>
      </li>
    </ul>
  <?php endif;?>

  <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
      <a class="nav-link" href="<?=site_url('inicio')?>">
        <li class="nav-item active text-center">
          HOME
        </li>
      </a>
      <a class="nav-link" href="<?=site_url('projeto')?>">
        <li class="nav-item text-center">
          PROJETOS
        </li>
      </a>
      <a class="nav-link" href="<?=site_url('sobre')?>">
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
    <?php else:?>
      <ul class="navbar-nav ml-auto mt-lg-0 mt-md-0 mr-lg-4">
        <li class="nav-item text-center mb-2 d-none d-md-none d-lg-block" style="margin-top: 5px;">
          <a href="<?=site_url('perfil/notificacao')?>"><span class="badge badge-dark badge-pill py-2 px-3"><i class="fas fa-bell fa-lg mr-1"></i> <span class="num_not">0</span> </span></a>
        </li>
        <li class="nav-item text-center mb-2">
          <a href="<?=site_url('perfil')?>" class="btn btn-primary text-white" role="button"><span style="letter-spacing: 1px; font-size: 12px;"><i class="fas fa-user-alt mr-1"></i> MEU PERFIL</span></a>
        </li>
        <li class="nav-item text-center mb-2">
          <a href="<?=site_url('inicio/sair')?>">
            <button type="button" class="btn btn-light">
              <span style="letter-spacing: 1px; font-size: 12px;">SAIR <i class="fas fa-sign-out-alt"></i></span>
            </button>
          </a>
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

        <div id="section-login" style="border: 2px solid #e3e7f0; border-radius: 10px; padding: 30px 20px; margin: 0px 20px;">
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
          <span id="open-reset-password" class="text-center" style="cursor: pointer;"><small class="form-text text-muted font-weight-bold mt-2">Esqueceu sua senha?</small></span>
          </form>
        </div>

        <div id="section-reset-password" style="border: 2px solid #e3e7f0; border-radius: 10px; padding: 30px 20px; margin: 0px 20px; display: none" >
          <h3 class="font-weight-bold text-center text-primary">Redefinir Senha</h3>
          <div class="form-group">
            <label for="email_reset">Seu Email</label>
            <input type="email" class="form-control" id="email_reset" name="email_reset" placeholder="Insira seu email">
          </div>
          <center><input type="submit" id="btn_reset_password" name="botao_entrar" class="btn btn-primary btn-block btn-lg" value="Enviar" style="font-size: 16px;"></center>
          <span id="open-login" class="text-center" style="cursor: pointer;"><small class="form-text text-muted font-weight-bold mt-2">Já possui uma conta? Clique para entrar</small></span>

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
<div class="container-fluid bg-primary py-3">
  <div class="row">
    <div class="col-md-6 py-5 pl-5">
      <p class="mb-0 text-white">Desenvolvido pelos alunos do curso de Sistemas de Informação da FHO.</p>
      <a href="#" class="text-warning">Saiba Mais.</a>
    </div>
    <div class="col-md-6 text-right">
      <img src="<?=base_url('assets/imagens/logo_branco.png')?>">
    </div>
  </div>
</div>
</body>
</html>
<?php if($this->session->userdata('logado')):?>
<script type="text/javascript">
  $(document).ready(function() { 
    $(function() {  
        $("body").niceScroll({cursorcolor: "#1657ce"});
    });
  });
</script>
<script type="text/javascript">
  function getNumNotificacao() {
    $.ajax({ 
        url: '<?=site_url('inicio/getNumNotificacao')?>', 
        success: function(data) { 
          data = $.parseJSON(data); 
          $('.num_not').html(data.num);
        } 
    });
  }
  getNumNotificacao();
  setInterval(getNumNotificacao, 1000 * 60 * 3);

</script>
<?php endif;?>
<script type="text/javascript" charset="utf-8">

  $('#login').on('shown.bs.modal', function () {
    $("#section-reset-password").hide();
    $("#section-login").show();
  })

  $("#open-login").click(function() {
    $("#section-reset-password").hide();
    $("#section-login").show();
  });

  $("#open-reset-password").click(function() {
    $("#section-reset-password").show();
    $("#section-login").hide();
  });

  $("#btn_reset_password").click(function() {

    $("#btn_reset_password").val('Enviando...');

    var sendData = {};

    sendData.email = $("#email_reset").val();

    $.ajax({
      type:"POST",
        cache:false,
        url:"<?=site_url('Redefinir/senha')?>",
        data: sendData,
        success: function (response) {
          alert(response);
          $("#email_reset").val('');
          $("#btn_reset_password").val("Enviar");
        },
        error: function () {
          alert('#Error#');
          $("#btn_reset_password").val("Enviar");
      }
    });

  });

</script>
