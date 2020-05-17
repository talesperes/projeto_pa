<section class="py-5">
  <div class="container py-5 mt-2 mb-5">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="text-warning">Ranking <i class="fas fa-trophy"></i></h1>
      </div>
    </div>
    <div class="row mt-5 justify-content-center">
      <div class="col-md-10">
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">Posição</th>
              <th scope="col">Nome</th>
              <th scope="col">Pontuação</th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($rankingUsuarios) && !empty($rankingUsuarios)):?>
              <?php foreach($rankingUsuarios as $key => $ru):?>
                <tr>
                  <th scope="row"><?=$key+1?></th>
                  <td><a href="<?=$ru['id_usuario']?>"><?=$ru['nome']?></a></td>
                  <td><?=$ru['pontuacao']?></td>
                </tr>
              <?php endforeach;?>
            <?php endif;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>