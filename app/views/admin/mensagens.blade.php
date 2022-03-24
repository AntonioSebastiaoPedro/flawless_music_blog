<?php
	if(!isset($_SESSION['logado']) or $_SESSION['logado']==false){
		redir('', false);
	}
?><h1>Nome: António </h1>
                      <h1>Email: carter@gmail.com</h1>
                      <h1>Mensagem: Testando enviar uma mensagem para ver</h1><br>