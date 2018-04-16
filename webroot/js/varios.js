function showPassword() {
    
    var key_attr = $('#password').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#password').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#password').attr('type', 'password');
        
    }
    
}


$(window).on('load', function(){
	// se ejecuta cuando la página completa está completamente cargado,
	// incluyendo todos los marcos, objetos e imágenes
	$('#loader').fadeOut();
	//modal
	
	});

