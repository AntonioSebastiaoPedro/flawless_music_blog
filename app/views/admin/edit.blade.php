@extends('templates.default')
@section('container')


@if(isset($dados))
  @section('tittle', 'Editar Música')
  <form method="post" enctype="multipart/form-data" action="<?php echo DIRPAGE.'editMusic/'.$dados[0]->id ?>">

  <div class="form-group row">
    <label for="autor" class="col-sm-2 col-form-label">Autor</label>
    <div class="col-sm-8">
      <input name="autor" type="text" class="form-control" id="autor" placeholder="Nome do autor" value=" {{$dados[0]->autor ?? ''}} ">
    </div>
  </div>

  <div class="form-group row">
    <label for="titulo" class="col-sm-2 col-form-label">Título</label>
    <div class="col-sm-8">
      <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Título da música" value=" {{$dados[0]->titulo ?? ''}} ">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="capa" class="col-sm-2 col-form-label">Capa</label>
    <div class="col-sm-8">
      <input name="capa" type="file" class="form-control-file" id="capa" value=" {{$dados[0]->capa ?? ''}} ">
    </div>
  </div>

  <div class="form-group row">
    <label for="musica" class="col-sm-2 col-form-label">Música</label>
    <div class="col-sm-8">
      <input name="musica" type="file" class="form-control-file" id="musica" value=" {{$dados[0]->musica ?? ''}} "> 
    </div>
  </div>

  <div class="form-group row">
    <label for="participantes" class="col-sm-2 col-form-label">Participantes</label>
    <div class="col-sm-8">
      <input name="participantes" type="text" class="form-control" id="participantes" placeholder="Nome dos participantes" value=" {{$dados[0]->participantes ?? ''}} ">
    </div>
  </div>

  <div class="form-group row">
    <label for="tags" class="col-sm-2 col-form-label">Tags</label>
    <div class="col-sm-8">
      <input name="tags" type="text" class="form-control" id="tags" placeholder="Nome das tags" value=" {{$dados[0]->tags ?? ''}} ">
    </div>
  </div>

  <div class="form-group row">
    <label for="sobre" class="col-sm-2 col-form-label">Sobre</label>
    <div class="col-sm-8">
      <input name="sobre" type="text" class="form-control" id="sobre" placeholder="Informações sobre a música" value=" {{$dados[0]->sobre ?? ''}} ">
    </div>
  </div>

  <div class="form-group row">
    <label for="tamanho" class="col-sm-2 col-form-label">Tamanho</label>
    <div class="col-sm-8">
      <input name="tamanho" type="text" class="form-control" id="tamanho" placeholder="Tamanho do ficheiro" value=" {{$dados[0]->tamanho ?? ''}} ">
    </div>
  </div>

<div class="form-group row">
    <label for="lancamento" class="col-sm-2 col-form-label">Data de lancamento</label>
    <div class="col-sm-8">
      <input name="lancamento" type="date" class="form-control" id="lancamento" placeholder="Data de lançamento da música" value=" {{$dados[0]->lancamento ?? ''}} ">
    </div>
  </div>

<div class="form-group row">
    <label for="hota" class="col-sm-2 col-form-label">Hora de lancamento</label>
    <div class="col-sm-8">
      <input name="hora" type="time" class="form-control" id="hora" placeholder="Hora de lançamento da música" value="<?php date("H:i:s", strtotime($dados[0]->lancamento)); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="publicacao" class="col-sm-2 col-form-label">Data de Publicação</label>
    <div class="col-sm-8">
      <input name="publicacao" type="date" class="form-control" id="publicacao" placeholder="Data de lançamento da música" value=" {{$dados[0]->data ?? ''}} ">
    </div>
  </div>

<div class="form-group row">
    <label for="hota" class="col-sm-2 col-form-label">Hora de Publicação</label>
    <div class="col-sm-8">
      <input name="horapub" type="time" class="form-control" id="horapub" placeholder="Hora de Publicação da música" value="<?php date("H:i:s", strtotime($dados[0]->data)); ?>">
    </div>
  </div>


  <div class="form-group row">
    <center>
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success" name="add">Actualizar</button>
    </div>
    </center>
  </div>
</form>

@else
	redir('admin', false);
@endif
@endsection
