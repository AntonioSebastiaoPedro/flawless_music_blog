<?php
#arquivos directórios raízes
$PastaInterna = "flawless_music_blog/";
define("DIRPAGE", "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");
if (substr("{$_SERVER['DOCUMENT_ROOT']}", -1) === '/') {
	define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
}else{define("DIRREQ", "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");}


#DIRECTÓRIOS ESPECÍFICOS
define("DIRIMG", DIRPAGE."public/img/");
define("DIRCSS", DIRPAGE."public/css/");
define("DIRJS", DIRPAGE."public/js/");
define("DIRBSCSS", DIRPAGE."public/bootstrap/css/");
define("DIRBSJS", DIRPAGE."public/bootstrap/js/");
define("DIRMUSICS", DIRPAGE."public/musics/");

#CONSTANTES DA BD
define("HOST", "localhost");
define("DBNAME", "mvc_fm");
define("USER", "root");
define("PASS", "");





