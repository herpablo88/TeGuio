/*contador para que el chatbot vaya preguntando detalles:
 * 1.situacion
 * 2.condicion sonora
 * 3.condicion visual
 */ 
var interaccion_con_chatbot = 0; 
var concatenacion_situacion = "";
var pregunta_realizada = "";//variable usada para gurdar la pregunta del usuario y mandarla si no funciono la respuesta

(function () {
    var Message;
    Message = function (arg) {
        this.text = arg.text, this.message_side = arg.message_side;
        this.draw = function (_this) {
            return function () {
                var $message;
                $message = $($('.message_template').clone().html());
                $message.addClass(_this.message_side).find('.text').html(_this.text);
                $('.messages').append($message);
                return setTimeout(function () {
                    return $message.addClass('appeared');
                }, 0);
            };
        }(this);
        return this;
    };
    $(function () {
        var getMessageText, message_side, sendMessage;
        message_side = 'right';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');
            return $message_input.val();
        };
        sendMessage = function (text,lado) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message_side = lado;
            message = new Message({
                text: text,
                message_side: message_side
            });
            message.draw();
            return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        };
        $('.send_message').click(function (e) {

        	if(interaccion_con_chatbot < 2){
        		concatenacion_situacion = concatenacion_situacion  + '.' + getMessageText(); 
        		if(interaccion_con_chatbot == 0){
            		pregunta_realizada = getMessageText();
        		}
        		sendMessage(getMessageText(),'right');
        		interaccion_con_chatbot = interaccion_con_chatbot + 1;
        		if(interaccion_con_chatbot == 1){
        			return sendMessage('Qué condición de ruido hay?','left');
        		}
        		if(interaccion_con_chatbot == 2){
        			return sendMessage('Qué condición de luz hay?','left');
        		}
        	}
        	
        	sendMessage(getMessageText(),'right');
        	
    		$.ajax({
    		    url:  "Chatbot/chatbox",
    		    type: "POST",
    		    data: {"mensaje":concatenacion_situacion
    		    },
    			success: function(resultado){
                    interaccion_con_chatbot = 0;
						//Hardcodeado para la feria
						if(resultado['mensaje_resultado'] == 'HARCODEO'){
							return sendMessage("<p>No hay Internet. Respuesta modelo:</p><p>La soluci&oacute;n es:</p><p> " + "La luz fluorescente puede estar afectando su audicion, retirarlo del lugar." + "</p>"+ "<p><b>Esta respuesta fue validada por un profesional</b></p>" + "<p>Funcion&oacute;?</p><button value='si' onclick ='EnviarRespuesta(" + '1' + ",1);' >Si</button><button value='no' onclick ='EnviarRespuesta(" + "1" + ",0);'>No</button>",'left');
						}
						
    					if(resultado['mensaje_resultado'] != 'OK'){
    						sendMessage(resultado['mensaje_resultado'],'left');
    						setTimeout(function() { 
        						$('.messages').empty();
        						sendMessage('En que te puedo ayudar? Describeme la situacion','left');
    							}, 3000);
    					}
						
    					var respuesta_medico = "";
    					if(resultado['respuesta_elegida'][0]['flag_medico'] == 1){
    						respuesta_medico = "<p><b>Esta respuesta fue validada por un profesional</b></p>";
    					}
    					
    					sendMessage("<p>La soluci&oacute;n es:</p><p> " + resultado['respuesta_elegida'][0]['texto'] + "</p>"+ respuesta_medico + "<p>Funcion&oacute;?</p><button value='si' onclick ='EnviarRespuesta(" + resultado['respuesta_elegida'][0]['id'] + ",1);' >Si</button><button value='no' onclick ='EnviarRespuesta(" + resultado['respuesta_elegida'][0]['id'] + ",0);'>No</button>",'left');
    			},
    			error: function() {
                        alert("Error, no se pudo enviar el texto.");
                }
    		});
        	
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                return sendMessage(getMessageText(),'right');
            }
        });
        sendMessage('En que te puedo ayudar? Describeme la situacion','left');
    });
}.call(this));

function EnviarRespuesta(id_rta,accion){
	var modo = "POST";
	var comentario = "nocomment";
	if(accion == 0){
		comentario = prompt("Por favor describa cómo resolvió la situación de ser posible", "Pedido de ayuda");
		modo = "DELETE";
	}

	$.ajax({
	    url:  "Chatbot/SetearRating",
	    type: modo,
	    data: { "id":id_rta,
	    		"pregunta_realizada":pregunta_realizada,
	    		"comentario":comentario
	    },
		success: function(resultado){
					alert('Muchas Gracias por su colaboración!');
		},
		error: function() {
                alert("Error, no se pudo enviar el texto.");
        }
	});
	
}