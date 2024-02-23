<?php

 
// importa o Arquivo da classe
require ('../classes/Connection.class.php');
require ('../lib/biblioteca.php');
 
    // Cria uma instancia do tipo Connection passando o IP e porta como parametros.
    $socket = new Connection(IP,PORTA);

    // Inicia a conexão
	$socket -> connection();
   
 // $_POST recebe a informação enviada tipo POST pelo Jquery.
switch ($_POST['acao']) {
	 //  Filtra a mensagem recebida como parametro e apenas envia para o Arduino
	    case 'enviar':
					$msg = filter_input(INPUT_POST,'mensagem');
					//$msg = $_POST['mensagem'];
					$socket->setMessage($msg);
		break;
	
	//  Envia a mensagem para o Arduino e aguardo retorno para informar Jquery	
		case 'atualizar':
					$msg = filter_input(INPUT_POST,'mensagem');
					$socket->setMessage($msg);
					printf('%s',$socket->getMessage());
					
		break;
		default:
		
		break;
}

// fecha conexão.
$socket ->fechar();
?>