
servico = ''; // objeto de serviço Automático de atualização da Interface

jQuery(function($){

				var $apresentacao = $('.apresentacao');


				jQuery(document).ready(function($) {
					 $('#gallery-ilumin').fadeIn('fast');							
					
				});
						
				
				var pointer = 168; // Responsável por movimentar ponteiro na interface
				$(this).Atualizar("AA#"); // Envia mensagem para Arduino
			   
				// Quando clicar no menu
				$('.opcoes li').click(function(){
					var $opcao = $(this).attr('id'); // Verifica o ID da Tag
					//$apresentacao.fadeOut(500); // Fecha tela de aprensentação
					
					// Animando ponteiro de acordo com opção selecionada
					$('.ponteiro').animate({'top':pointer+(42* $opcao)+'px' },500,function(){
						$('.ponteiro').fadeIn(1000); // Mosta ponteiro com tempo de 1s
					});

				// Criando animação para fechar uma opção e carregar outra selecionada no menu
				switch($opcao){
					case '0':  
						// Fecha a div responsável pelos Ambiente 1
						$('#gallery-ventila').fadeOut(500,function(){
							$('#gallery-ilumin').fadeIn(2000); // Abre ambiente 2
						});
							
					break;
					case '1': 
						// Fecha a div responsável pelo ambiente 2
						 $('#gallery-ilumin').fadeOut(500,function(){
							$('#gallery-ventila').fadeIn(2000); // abre ambiente 1
						 });
					break;
				}

			})

			// Mostra todas as opções
			$('#geral').click(function(){
				$apresentacao.fadeOut(500);
				$('#gallery-ilumin').fadeIn(2000);
				$('#gallery-ventila').fadeIn(2000);
				$('.ponteiro').fadeOut(1000);
			})

			// Envia mensagem para Arduino e acordo com item selecionado
			$('.dashboard li').click(function(){
				var id = $(this).attr('id');
				var value = $(this).attr('value');
				var final_mensagem = "B#";
				$(this).enviaMensagem(id+value+final_mensagem);
				
			});

		
})

/*
* Função Responsável pelo envio das mensagens e atualização do Status
*/
$.fn.enviaMensagem = function(msg){

	if (msg.trim() != ''){
		$.post('controller/socket.php',{ // acessa Arquivo .php passando paramentros via POST
				mensagem : msg,
				acao : 'enviar'
			},
			function(){
				$(this).Atualizar("AA#"); // Envia mensagem de atualização para Arduino.
			}
		);
	}
	 
};

/*
*  Atualizando Interace de acordo com o retorno.
*/
$.fn.Atualizar = function(msg){
		
		Stop(); // para Serviço de atualização Automática
		$(".load").show(); // abre o modal Atualizando...

		$.post('controller/socket.php',{ // Acessa o arquivo .php passando parametros via POST
	 	  acao : 'atualizar',
	 	  mensagem:msg	 	
	 		},function(retorno){
				retorno = retorno.trim(); // retira espaços em branco
               	$(this).AtualizaInterface(retorno); // Chama função passando a mensagem como parametro
               	$(".load").hide(); // fecha o modal Atualizando...
               	Play(); // Cria novo serviço que executará periodicamente o envio de mensagem para atualizar o Status atual das portas
            });
}

/*
 	Função Responsável por atualizar a Interface de acordo com Protocolo Recebido.
*/	

$.fn.AtualizaInterface = function (retorno)
{
	/*
	  Percorre todas as TAGs img para atualizar o status na interface de acordo com a mensagem recebido do Arduino
	*/
	$(".dashboard li").each(
		function(index,value){
				 
				 var msg = $(this).attr('value');
				 var id = $(this).attr('id');

				if(retorno[parseInt(id)] == '1'){
	 				$(this).find('img').css('background','#f19700');
					$(this).attr('value','0');
	        	 } else {
	 		 			$(this).find('img').css('background','#61533b');
						$(this).attr('value','1');
	        	 }
    });
	
}

function Play(){
	servico = setInterval(function(){ $(this).Atualizar("AA#"); }, 5000); // Cria Serviço de atualização da Interface
}

function Stop(){
	clearInterval(servico); // Limpa serviços
}

function exists (selector) {
	 return $(selector).length > 0 ? true : false;
}




