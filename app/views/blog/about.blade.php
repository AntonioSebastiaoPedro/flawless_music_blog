@extends('templates.default')
@section('tittle', 'Flawless Music Blog | Sobre')
@section('active3', 'active')

@section('container')

      <div class="row">
        <div class="col-md-8 mx-auto">

          <article class="card mb-4">
            <header class="card-header text-center">
              <h1 class="card-title">Quem somos?</h1>
            </header>
            <div class="card-body">

              <p><strong>Flawless Music é o nome do nosso grupo.<br>
                Somos um grupo de Rap composto por 4 elementos: António Cárter, Prophet Whant, Walter Lícito e Abel Wonders. Somos angolanos e criamos o grupo no ano de 2021.
              Criamos este blog a fim de facilitar aos nossos ouvintes baixarem as nossas músicas facilitando assim também a sua divulgação.</strong></p>
              <p>Para obter mais informações ou reportar um erro <b style="color: darkblue;"><a href="<?php echo DIRPAGE.'contactos' ?>">Fale connosco</a></b></p>
            </div>

          </article>
        </div>
      </div>
@endsection