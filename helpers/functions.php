<?php
//require 'vendor/autoload.php';

function redir($caminho="", $php = true){
	if ($php) {
		header("Location:".DIRPAGE.$caminho.'.php');
	}else{
		header("Location:".DIRPAGE.$caminho);
	}
}


function dd($var){
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	exit;
}


function getMes($mes = null){
	$data = (is_null($mes)) ? getdate()['mon'] : $mes ;

	switch ($data) {
		case 1:return "Janeiro";break;case 2:return "Fevereiro";break;
		case 3:return "Março";break;case 4:return "Abriu";break;
		case 5:return "Maio";break;case 6:return "Junho";break;
		case 7:return "Julho";break;case 8:return "Agosto";break;
		case 9:return "Setembro";break;case 10:return "Outubro";break;
		case 11:return "Novembro";break;case 12:return "Dezembro";break;
		default:return "Mês inválido";break;
	}
}


function printData($data){
	date('d/m/Y à\s H:i:s', strtotime($data));
	$array = explode('-', $data);
	$dia = explode(' ', $array[2]);
	echo $dia[0]." de ".getMes($array[1])." de ".$array[0];
}


function timeAgo($time){
	if (condition) {
		// code...
	}
}


function UploadM(){
if(isset($_FILES['musica'])){
       if(!empty($_FILES['musica']['name'])){
              $mus =  $upl = Upload::uploadImage($_FILES['musica'],["mp3","ogg","mkv"],"public/musics/");
              if(isset($mus['ok']) == true){
                     
              }else{
                      echo $mus['error'];
              }

       }
 }
}
function addMusic(){
       if(isset($_FILES['photo']) AND isset($_POST['add'])){
              if(!empty($_FILES['photo']['name'])){
                     $up =  $upload = Src\Classes\Upload::uploadImage($_FILES['photo'],["jpg","png","gif"],"public/img/capas/");
                     if(isset($up['ok']) == true){
                            $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
                            $music =  filter_input(INPUT_POST,'music',FILTER_SANITIZE_STRING);;
                            $author = filter_input(INPUT_POST,'author',FILTER_SANITIZE_STRING);;
                            $size = filter_input(INPUT_POST,'size',FILTER_SANITIZE_STRING);;
                            $info = filter_input(INPUT_POST,'info',FILTER_SANITIZE_STRING);;
                            if(App\Models\Music\Music::addMusic($title,$size,$author,$up["dir"],$info,$music)){
                                   echo '
                                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                                          Musica Adicionada Com sucesso
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                 </div>';
                            }else{
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                   Musica Adicionada Com sucesso
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                            </div>';

                            unlink($up["dir"]);
                            }
                     }else{
                             echo $up['error'];
                     }
       
              }
        
       } 
}


























