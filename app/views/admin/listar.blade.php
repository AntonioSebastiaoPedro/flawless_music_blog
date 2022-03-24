@php

  if(!isset($_SESSION['logado']) or $_SESSION['logado']==false){
    redir('', false);
  }

@endphp


@extends('templates.default')
@section('tittle', 'Listar Músicas')
@section('active2', 'active')

@section('container')
@php echo flash('delete_yes'); @endphp

@if(!empty($dados))
	<div class="row">
      @foreach($dados as $musica)
		  <div class="col-sm-4">
		    <div class="card mb-4">
		      <img style="width: 100%;" class="card-img-top" src="<?php echo DIRIMG.'capas/'.$musica->capa ?>" alt="Imagem de capa do card">
		      <div class="card-body">
		        <h5 class="card-title m-2">Título: <b style="color: darkblue;">{{$musica->titulo}}</b> </h5>
		        <h5 class="card-title m-2">Downloads: <b style="color: darkblue;">{{$musica->downloads}}</b> </h5>
		        <a href="<?php echo DIRPAGE.'editMusic/'.$musica->id ?>" class="btn btn-warning m-2 mr-5">Editar</a>
		        <a role="button" href="#" onclick="getId(<?php echo $musica->id; ?>); " class="btn btn-danger m-2 ml-5" data-toggle="modal" data-target="#modalExemplo">Eliminar</a>
		      </div>
		    </div>
		  </div>
      @endforeach
    </div>	
@else
  <div class="alert alert-danger" role="alert">
    Nenhuma música publicada. <a href="<?php echo DIRPAGE.'postar' ?>" class="alert-link">Poste uma nova música</a>.
  </div>
@endif
@endsection











<!----------------- Modal ------------------->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Música</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Tem certeza de que quer eliminar esta música? </b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
        <a href="" class="btn btn-danger" id="delete-aluno">Sim, Eliminar</a>
      </div>
    </div>
  </div>
</div>
<!----------------- Modal ------------------->

<script>

  function getId(id){

    $("#delete-aluno").attr('href', "deleteMusic/"+id)
    // console.log(id);
  }
</script>