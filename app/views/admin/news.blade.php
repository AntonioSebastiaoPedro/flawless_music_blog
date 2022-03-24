<?php
	if(!isset($_SESSION['logado']) or $_SESSION['logado']==false){
		redir('', false);
	}
?>