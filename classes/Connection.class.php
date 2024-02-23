<?php

	
 Class Connection
 {
 	private $ip;
	private $porta;
	private $conn;
	
	// Construtor da Classe onde define o IP e Porta parametros obrigatórios
	function __construct($ip, $porta)
	{
		$this -> ip = $ip;
		$this -> porta = $porta;
	}
	
	// Função que configura e cria a conexão via Socket
	function connection ()
	{
		$this->conn = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		socket_connect($this->conn, $this->ip, $this->porta);
	}
	
	// Envia a mensagem passada como paramentro para o socket
	function setMessage ($msg)
	{
		socket_write($this->conn, $msg, strlen($msg));
	}
	
	// Aguardo o recebimento de uma mensagem de tamanho de 10 caracteres
	function getMessage()
	{
		return socket_read($this->conn,9);
	}
	
	// fecha conexão
	function fechar()
	{
		socket_close($this->conn);
	}

 }


?>

