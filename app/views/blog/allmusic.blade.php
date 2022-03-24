@extends('templates.default')
@section('tittle', 'Flawless Music Blog | Todas Músicas')
@section('active2', 'active')

@section('container')
       <header class="card-header text-center">
          <h2 class="card-title">Todas as músicas</h1>
        </header> 


      <div class="row">

      @foreach($dados as $dado)
        <div  class="col-md-4">        	
          <article class="card mb-4">
            <header class="card-header">
            </header>
            <a href="<?php echo DIRPAGE.'musica/'.$dado->id ?>">
              <img class="card-img" src="<?php echo DIRIMG.'capas/'.$dado->capa ?>"/>
            </a>
            <div class="card-body">
              <a href="<?php echo DIRPAGE.'musica/'.$dado->id ?>">
                <h4 class="card-title">{{$dado->titulo}} </h4>
              </a>
              <div class="card-meta">
                <time class="timeago" datetime="{{$dado->data}}"></time>
              </div>
              <a href="<?php echo DIRPAGE.'musica/'.$dado->id ?>">
                <button class="btn btn-success btn-block">Baixar</button>
              </a>
            </div>
          </article>
        </div>
      @endforeach


      </div>
@endsection