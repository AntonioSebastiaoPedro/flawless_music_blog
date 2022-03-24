
<?php require 'composer/vendor/autoload.php' ?>
<!DOCTYPE html>
<html lang="pt-br">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('tittle')</title>
  <link rel="shortcut icon" href="<?php echo DIRIMG.'blog/fm.jpg' ?>">

  <link rel="stylesheet" href="<?php echo DIRCSS.'app.css' ?>" >
</head>
<body>

  <!--==============================HEADER--------------------------->
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white absolute-top">
      <div class="container">

        <button class="navbar-toggler order-2 order-md-1" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-left navbar-right" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3 order-md-2" id="navbar-left">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item @yield('active1')">
              <a class="nav-link" href="<?php echo DIRPAGE ?>">Página Inicial</a>
            </li>
            <li class="nav-item @yield('active2')">
              <a class="nav-link" href="<?php echo DIRPAGE.'musicas' ?>">Músicas</a>
            </li>
            
          </ul>
        </div>

        <a class="navbar-brand mx-auto order-1 order-md-3" href="<?php echo DIRPAGE ?>">Flawless Music</a>

        <div class="collapse navbar-collapse order-4 order-md-4" id="navbar-right">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item @yield('active3')">
              <a class="nav-link" href="<?php echo DIRPAGE.'sobre' ?>">Sobre</a>
            </li>
            <li class="nav-item @yield('active4')">
              <a class="nav-link" href="<?php echo DIRPAGE.'contactos' ?>">Fale Connosco</a>
            </li>
          </ul>
          <form class="form-inline" action="<?php echo DIRPAGE.'pesquisar' ?>" role="search">
          </form>
        </div>
      </div>
    </nav>
  </header>
  <!--==============================HEADER--------------------------->
  @yield('alert')

  <?php 
    if(isset($_POST['inscrever'])){
      if (!empty($_POST['email'])) {
        $myfile = fopen(DIRREQ."app/views/admin/news.blade.php", "a") or die("Unable to open file!");
        $email = "<h1>{$_POST['email']}</h1>";
        fwrite($myfile, $email);
        fclose($myfile);
        
        echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Inscrição Feita com sucesso.</h4>
                <p>Obrigado por inscrever-se no nosso blog. Desfrute das nossas músicas.</p>
                <hr>
                <p class="mb-0">Agora sempre que portarmos uma música nova você receberá uma notificação no seu email.</p>
              </div>';
        }
    }
   ?>

  @yield('banner')
  <main class="main pt-4">
    <div class="container">
    	@yield('container')
   </div>
  </main>



<!--==============================FOOTER=================================-->
  <div class="site-newsletter">
    <div class="container">
      <div class="text-center">
        <h3 class="h4 mb-2">Inscreva-se na nossa newsletter</h3>
        <p class="text-muted">Inscrevendo-se na nossa newsletter será sempre notificado por email quando postamos uma música nova.</p>
        <div class="row">
          <div class="col-xs-12 col-sm-9 col-md-7 col-lg-5 ml-auto mr-auto">
            <form method="POST">
            <div class="input-group mb-3 mt-3">
              <input type="email" name="email" class="form-control" placeholder="Insira o teu email" aria-label="Email address" required="">
              <span class="input-group-btn">
                  <button name="inscrever" type="submit" class="btn btn-primary">
                    Inscrever-se
                  </button>
              </span>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-instagram">
    <div class="action">
      <a class="btn btn-light" href="https://free.facebook.com/flawlessmusic2021">
        Siga-nos no Facebook. Clique nas fotos
      </a>
    </div>
    <div class="row no-gutters">
      <div class="col-sm-6">

        <div class="row no-gutters">
          <div class="col-6">
            <a class="photo" href="https://free.facebook.com/costa.coracao" target="_blank">
              <img class="card-img" src="<?php echo DIRIMG.'instagram/b.jpg' ?>" alt="" />
            </a>
          </div>
          <div class="col-6">
            <a class="photo" href="https://free.facebook.com/martipy.mlp" target="_blank">
              <img class="card-img" src="<?php echo DIRIMG.'instagram/a.jpg' ?>" alt="" />
            </a>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="row no-gutters">
          <div class="col-6">
            <a class="photo" href="https://free.facebook.com/profile.php?id=100071039028538" target="_blank">
              <img class="card-img" src="<?php echo DIRIMG.'instagram/c.jpg' ?>" alt="" />
            </a>
          </div>
          <div class="col-6">
            <a class="photo" href="https://free.facebook.com/profile.php?id=100061065848494" target="_blank">
              <img class="card-img" src="<?php echo DIRIMG.'instagram/d.jpg' ?>" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <footer class="site-footer bg-darkest">
    <div class="container">
      <ul class="nav justify-content-center">
      </ul>
      <div class="copy">
        &copy; Flawless Music 2021<br />
        Todos direitos reservados
      </div>
    </div>
  </footer>

  <script src="<?php echo DIRJS.'app.js' ?>"></script>
</body>
</html>









<!----------------- Modal ------------------->
<div class="modal fade" id="modalNews" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalNews" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNews">Newslatter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b><p class="card-text">Inscrição feita com sucesso. Obrigado por inscrever-se no nosso blog.</p></b>
      </div>
      <div class="modal-footer">
        <button onclick="<?php echo $_POST['email'] ?>;" type="button" class="btn btn-success btn-block" data-dismiss="modal">OK</button>
    </div>
  </div>
</div>
<!----------------- Modal ------------------->

