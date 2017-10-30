function ValidarRespuesta(id_rta,validacion){
	$.ajax({
	    url:  "SetearValidacion",
	    type: 'POST',
	    data: { "id":id_rta,
	    		"validacion":validacion
	    },
		success: function(resultado){
			alert("Validación realizada");	
			location.reload(); 
		},
		error: function() {
                alert("Error, no se pudo enviar el texto.");
        }
	});
}