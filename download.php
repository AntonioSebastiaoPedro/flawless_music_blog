<?php
require 'composer/vendor/autoload.php';

$arquivo = $_GET["arquivo"];
   if(isset($arquivo) && file_exists($arquivo)){
   // faz o teste se a variavel não esta vazia e se o arquivo realmente existe
      switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){
      // verifica a extensão do arquivo para pegar o tipo
         case "mp3": $tipo="audio/mpeg"; break;
         case "php": // deixar vazio por seurança
         case "htm": // deixar vazio por seurança
         case "html": // deixar vazio por seurança
      }

      // informa o tipo do arquivo ao navegador
      header("Content-Type: ".$tipo); 
      
      // informa o tamanho do arquivo ao navegador
      header("Content-Length: ".filesize($arquivo));
      
      // informa ao navegador que é tipo anexo e faz abrir a janela de download,
      //tambem informa o nome do arquivo
      header("Content-Disposition: attachment; filename=".basename($arquivo));
      
      // lê o arquivo
      readfile($arquivo); 

      // aborta pós-ações
      exit; 
   }
?>




