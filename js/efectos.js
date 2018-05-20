$(document).ready(function(){

    $('.menu a').each(function(index, elemento){
        $(this).css({
                'top' : '-200px'
        });
        $(this).animate({
            top: '0'
        },2000+(index * 500));
    });

    if($(window).width() > 800){
        $('header .textos').css({
            opacity: 0,
            marginTop: 0
        });
        $('header .textos').animate({
            opacity: 1,
            marginTop: '-52px'
        },1500);

    }

    var acercaDe = $('#acerca-de').offset().top,
        Busqueda = $('#Busqueda').offset().top,
        galeria = $('#galeria').offset().top,
        ubicacion = $('#ubicacion').offset().top;


    $('#btn-acerca-de').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: acercaDe -230
		}, 500);
	});

    $('#btn-Busqueda').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: Busqueda +600
		}, 500);
    });

    $('#btn-galeria').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: galeria
		}, 500);
    });

    $('#btn-ubicacion').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
			scrollTop: ubicacion
		}, 500);
    });
    //Boton para ir al inicio
    $("#arriba").click(function(){
        $("html").animate ({
            scrollTop:'0px'
        }, 1000);
     });
     $(window).scroll(function(){
         if($(this).scrollTop()>0){
             $("#arriba").fadeIn('slow');
        } else{
            $("#arriba").fadeOut('slow');
        }
     });
     $(window).load(function(){

    $(function() {
        $('#file-input').change(function(e) {
            addImage(e); 
        });
    
        function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }
        
        function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida').attr("src",result);
        }
        });
        });
});