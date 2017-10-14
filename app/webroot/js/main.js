function initProgressBar(){
	$('.image-progress-bar').css('width',"0%");
	$('.image-progress-bar').css('background-color',"rgba(51,165,57,0)");
	$('.image-progress-bar').html('0%'); 
	$('#modalProgress').modal();
}
function progressHandlingFunction(e){
		var opacity = 0;
		var progressNumber = Math.round(e.loaded / e.total * 100);
		var progressCss = 'width:' + progressNumber + "%";
		$('.image-progress-bar').animate({'width':progressNumber+"%"}, 100);
		opacity = "0." + progressNumber;
		$('.image-progress-bar').css('background-color', 'rgba(51,165,57,'+opacity+')');

		$('.image-progress-bar').html(progressNumber + '%');
		if (progressNumber==100){
			$('.image-progress-bar').html('Guardando imágen...');
		}
}	 

$(document).ready(function() {


	$('[action-redirect]').on('click',function(){
		var obj = $(this);
		var url = baseUrl + obj.attr('btn-controller') + "/" + obj.attr('btn-action') + "/" + obj.attr('btn-data');
		window.location.href = url;

	});

	$('[action-modal=true]').on('click',function(){
		var obj = $(this);
		var objectId = obj.attr('object-id');
		var controller = obj.attr('object-controller');
		var modalTitle = obj.attr('modal-title');
		var modalText = obj.attr('modal-text');
		var modalClass = obj.attr('modal-class');

		$('.'+modalClass).find('.modal-title').html(modalTitle);
		$('.'+modalClass).find('.modal-text').html(modalText);
		$('.'+modalClass).modal();
        
		$btn = $('.'+modalClass).find('.ok-button');
		$btn.on('click',function(){
			window.location.href = baseUrl + controller + "/delete/" + objectId;
		})


	});



})