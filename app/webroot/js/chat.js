/*contador para que el chatbot vaya preguntando detalles:
 * 1.situacion
 * 2.condicion sonora
 * 3.condicion visual
 */ 
var interaccion_con_chatbot = 0; 
var concatenacion_situacion = "";

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
        sendMessage = function (text) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message_side = message_side === 'left' ? 'right' : 'left';
            message = new Message({
                text: text,
                message_side: message_side
            });
            message.draw();
            return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 300);
        };
        $('.send_message').click(function (e) {
        	if(interaccion_con_chatbot < 2){
        		concatenacion_situacion = concatenacion_situacion + '.' + getMessageText();        		
        		sendMessage(getMessageText());
        		interaccion_con_chatbot = interaccion_con_chatbot + 1;
        		if(interaccion_con_chatbot == 1){
        			return sendMessage('Qué condición de ruido hay?');
        		}
        		if(interaccion_con_chatbot == 2){
        			return sendMessage('Qué condición de luz hay?');
        		}
        	}
        	
    		$.ajax({
    		    url:  "localhost/TeGuioChatbot/ChatBot.php",
    		    type: "POST",
    		    data: {"mensaje":concatenacion_situacion
    		    },
    			success: function(resultado){
    					alert("OK");	
    			},
    			error: function() {
                        alert("Error, no se pudo enviar el texto.");
                }
    		});
        	
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                return sendMessage(getMessageText());
            }
        });
        sendMessage('En que te puedo ayudar? , describeme la situacion');
        /*setTimeout(function () {
            return sendMessage('Mi hijo no deja de gritar');
        }, 1000);
        
        return setTimeout(function () {
            return sendMessage('hay ruido fuerte?');
        }, 2000);
        setTimeout(function () {
            return sendMessage('Si');
        }, 1000);*/

    });
}.call(this));
