<?php require DIRREQ.'composer/vendor/autoload.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo DIRIMG.'blog/fm.jpg' ?>">

    <link rel="stylesheet" href="<?php echo DIRBSCSS.'style.css' ?>">

    <title>@yield('tittle')</title>
  </head>
  <body>
  <div class="container">

    <div>
    <nav class="nav nav-pills flex-column flex-sm-row mt-3">
      <a class="flex-sm-fill text-sm-center nav-link @yield('active1')" href="<?php echo DIRPAGE.'postar' ?>">Postar Música</a>
      <a class="flex-sm-fill text-sm-center nav-link @yield('active2')" href="<?php echo DIRPAGE.'listar' ?>">Listar Músicas</a>
      <a class="flex-sm-fill text-sm-center nav-link @yield('active3')" href="<?php echo DIRPAGE.'news' ?>">Inscritos</a>
      <a class="flex-sm-fill text-sm-center nav-link @yield('active4')" href="<?php echo DIRPAGE.'messages' ?>">Mensagens</a>
      <a class="flex-sm-fill text-sm-center nav-link" href="<?php echo DIRPAGE.'logout' ?>">Sair</a>
    </div>
    <hr>
    
    @yield('container')


    <script src="<?php echo DIRBSJS.'jquery-slim.min.js' ?>"></script>
    <script src="<?php echo DIRBSJS.'popper.min.js' ?>"></script>
    <script src="<?php echo DIRBSJS.'bootstrap.min.js' ?>"></script>
  </div>
  </body>
</html>