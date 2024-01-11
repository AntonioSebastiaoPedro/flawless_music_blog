@extends('templates.default')
@section('tittle', 'Flawless Music Blog | Contactos')
@section('active4', 'active')



@section('alert')
  <?php 
    if(isset($_POST['enviar'])){
      if (isset($_POST['nome']) AND isset($_POST['email']) AND isset($_POST['mensagem'])) {
        $myfile = fopen(DIRREQ."app/views/admin/mensagens.blade.php", "a") or die("Unable to open file!");
        $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);
        
        $mensagens = "<h1>Nome: {$nome}</h1>
                      <h1>Email: {$email}</h1>
                      <h1>Mensagem: {$mensagem}</h1><br>";
        fwrite($myfile, $mensagens);
        fclose($myfile);
        
        echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Mensagem enviada com sucesso!</h4>
                <p>Obrigado por entrar em contacto connosco. Responderemos muito em breve.</p>
              </div>';
        }
    }
   ?>
@endsection


@section('container')
      <div class="row">
        <div class="col-md-8 mx-auto">

          <article class="card mb-4">
            <header class="card-header text-center">
              <h1 class="card-title">Contactar</h1>
            </header>
            <div class="card-body">

              <p><strong>Envie mensagem para nós e responderemos muito em breve.</strong><br>
              Abaixa temos as formas possíveis para nos contactar. <b>Clique nas letras azuis!</b></p>

              <p>
                Telefone: <strong>+244936602568</strong><br><br>

                Email: <a href="mailto:flawlessmusic2021@gmail.com?subject=Contactar&body=Escreve aqui o que queres dizer para nós. E entraremos em contacto contigo" title="Flawless Music Blog - Fale Connosco">
                  <strong style="color: darkblue;">
                    flawlessmusic2021@gmail.com
                  </strong>
                  <button type="button" class="btn btn-success btn-sm">Contactar directamente</button></a><br><br>

                Facebook: <strong style="color: darkblue;"><a href="http://free.facebook.com/flawlessmusic2021" target="_blank">F Lawless M Usic</a></strong><br><br>

                Soundcloud: <strong style="color: darkblue;"><a href="https://soundcloud.com/flawless-music-213935159" target="_blank">Flawless Music</a></strong>
              </p><br>

              <form method="POST">
                <p>Enviar mensagem para o nosso email:</p>
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" placeholder="Insira o teu nome" name="nome" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Insira o teu email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="question">Mensagem</label>
                  <textarea name="mensagem" class="form-control" id="message" rows="4" placeholder="Escreva aqui a mensagem" required></textarea>
                </div>
                  <button type="submit" name="enviar" class="btn btn-success btn-block">Enviar</button>
              </form>

            </div>
          </article><!-- /.card -->

        </div>
      </div>
@endsection