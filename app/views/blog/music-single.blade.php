@extends('templates.default')

@section('container')

      
  @foreach($dados as $dado)

    @section('tittle', $dado->autor.' - '.$dado->titulo)

    <div class="row">
        <div class="col-md-8">
          <article class="card mb-4">
            <header class="card-header text-center">
                <h1 class="card-title"> {{$dado->autor}} - {{$dado->titulo}}</h1>
            </header>
            <center>
              <img class="card-img" src="<?php echo DIRIMG.'capas/'.$dado->capa ?>" alt="" />
            </center>
            <div class="card-body">
              <div class="card-meta">
                <h5>Lançado em <?php printData($dado->lancamento) ?></h5>
                <h5>Publicado em <?php printData($dado->data) ?></h5>
              </div>
              <h5> Participantes: {{$dado->participantes}}</h5>
              <h5>Tamanho: {{$dado->tamanho}}</h5>
              <form method="get" action="<?php echo DIRPAGE.'download/'.$dado->id ?>">
                <button class="btn btn-success btn-lg btn-block">Baixar</button>
              </a>
              </form>
            </div>
          </article><!-- /.card -->
        </div>

      </div>



      <div class="col-md-3 ml-auto">
          <aside class="sidebar">
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title">Sobre a Música</h4>
                <p class="card-text">{{$dado->sobre}}</p>
              </div>
            </div><!-- /.card -->
          </aside>

          <aside class="sidebar sidebar-sticky">
            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title">Tags</h4>

            <?php 
              $tarr = explode(',', $dado->tags);
              $ta = count($tarr);
              for ($i=0; $i < $ta ; $i++) { 
                echo "<a class='btn btn-light btn-sm mb-1' href='#'> {$tarr[$i]} </a>";
              }
             ?>
                </div>
              </div><!-- /.card -->
    @endforeach    

            <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title">Músicas Mais baixadas</h4>

          @foreach($baixados as $down)
                <a href="<?php echo DIRPAGE.'musica/'.$down->id ?>" class="d-inline-block">
                  <br>
                  <h4 style="color: darkblue;" class="h6"> {{$down->autor}} - {{$down->titulo}}</h4>
                  <img class="card-img" src="<?php echo DIRIMG.'capas/'.$down->capa ?>"/>
                </a>
          @endforeach


              </div>
            </div><!-- /.card -->

          </aside>
        </div><!-- /.col-3 -->
@endsection