@php

  if(isset($_SESSION['logado']) AND $_SESSION['logado']==true){
    redir('postar', false);
  }

@endphp

<?php require 'composer/vendor/autoload.php' ?>
<!DOCTYPE html>
<html lang="pt-br">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Flawless Music Blog | Entrar</title>
  <link rel="shortcut icon" href="<?php echo DIRIMG.'blog/fm.jpg' ?>">

  <link rel="stylesheet" href="<?php echo DIRBSCSS.'style.css' ?>" >
</head>
<body>
	<div class="container">

		<div class="jumbotron">
		  <h1 class="display-4">Entrar no Blog</h1>
		  <p class="lead"></p>
		  <hr class="my-4">
		  <a class="btn btn-primary btn-lg" href="<?php echo DIRPAGE.'' ?>" role="button">Página Inicial</a>
		</div>

		@if(!empty($erros))
			@foreach($erros as $erro)
				<ul class="nav flex-column">
				  <li class="nav-item">
				  	<div class="alert alert-danger" role="alert">
						<b> {{$erro}} </b>
					</div>
				  </li>
				</ul>
			@endforeach
		@endif

		<form method="POST" action="<?php echo DIRPAGE.'login' ?>">
		  <div class="form-group">
		    <label for="email">Endereço de email</label>
		    <input type="email" class="form-control" id="email" placeholder="Digite o Seu email" name="email">
		  </div>
		  <div class="form-group">
		    <label for="senha">Senha</label>
		    <input type="password" class="form-control" id="senha" placeholder="Insira a tua Senha" name="senha">
		  </div>
		  <button type="submit" class="btn btn-success btn-block">Entrar</button>
		</form>

    </div>
	<script src="<?php echo DIRBSJS.'jquery-slim.min.js' ?>"></script>
    <script src="<?php echo DIRBSJS.'popper.min.js' ?>"></script>
    <script src="<?php echo DIRBSJS.'bootstrap.min.js' ?>"></script>
  </body>
</html>