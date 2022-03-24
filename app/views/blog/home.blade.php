@extends('templates.default')
@section('tittle', 'Flawless Music Blog | Página Inicial')
@section('active1', 'active')

@section('banner')
<div id="carouselInd" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo DIRIMG.'blog/banner1.jpg' ?>" alt="Primeiro Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo DIRIMG.'blog/banner2.jpg' ?>" alt="Segundo Slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo DIRIMG.'blog/banner3.jpg' ?>" alt="Terceiro Slide">
    </div>
  </div>
</div>
@endsection

@section('container')

      <header class="card-header text-center">
              <h2 class="card-title">As músicas mais recentes</h1>
            </header>
      <div class="row">

      @foreach($dados as $musica)  

        <div  class="col-md-4">        	
          <article class="card mb-4">
            <header class="card-header">
            </header>
            <a href="<?php echo DIRPAGE.'musica/'.$musica->id ?>">
              <img class="card-img" src="<?php echo DIRIMG.'capas/'.$musica->capa ?>" alt="" />
            </a>
            <div class="card-body">
              <a href="post-image.php">
                <h4 class="card-title">{{$musica->titulo}}</h4>
              </a>
              <div class="card-meta">
                <time class="timeago" datetime="{{$musica->data}}"></time>
              </div>
              <a href="<?php echo DIRPAGE.'musica/'.$musica->id ?>">
                <button class="btn btn-success btn-block">Baixar</button>
              </a>
            </div>
          </article>
        </div>
    @endforeach
        
      </div>
@endsection