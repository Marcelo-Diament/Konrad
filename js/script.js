$(document).ready(function(){


    $('input[type=text],textarea').click(function(event) {
        event.preventDefault();

        $(this).removeClass('erro-input');
        $('.alerta-form').slideUp(250);
    });

    // contato
    $("form#pagina-contato a.envia-contato-pagina").click(function(e){
      e.preventDefault();

      var nome = $('input[name=nome-contato]');
      var email = $('input[name=email-contato]');
      var assunto = $('input[name=assunto-contato]');
      var telefone = $('input[name=telefone-contato]');
      var mensagem = $('textarea[name=mensagem-contato]');

      var form = $('form#pagina-contato');

      var obrigatorios = [nome, email, telefone, assunto, mensagem];

      if( !nome.val() || !email.val() || !assunto.val() || !telefone.val() || !mensagem.val() ){
        $.each(obrigatorios, function(index, value) {
                var obj = $(this);
                if(!$(obj).val() || $(obj).val().length < 5){
                    $(this).addClass('erro-input');
                }
            });
        $('form#pagina-contato .alerta-form.obrigatorio').slideDown(250, function(){
          var topo = $(this).offset().top;
          $('html,body').animate({scrollTop: topo}, 500);
        });
      }else{
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var mail = email.val();
        if(!re.test(mail)){
            $('form#pagina-contato .alerta-form.mail').slideDown(250);
            $(email).addClass('erro-input');
            return false;
        }else{
            form.submit();
        }    
      }
    });

    // contato
    $("form#contato a.enviar").click(function(e){
      e.preventDefault();

      var nome = $('input[name=nome]');
      var email = $('input[name=email]');
      var assunto = $('input[name=assunto]');
      var telefone = $('input[name=telefone]');
      var mensagem = $('textarea[name=mensagem]');

      var form = $('form#contato');

      var obrigatorios = [nome, email, telefone, assunto, mensagem];

      if( !nome.val() || !email.val() || !assunto.val() || !telefone.val() || !mensagem.val() ){
        $.each(obrigatorios, function(index, value) {
                var obj = $(this);
                if(!$(obj).val() || $(obj).val().length < 5){
                    $(this).addClass('erro-input');
                }
            });
        $('form#contato .alerta-form.obrigatorio').slideDown(250, function(){
          var topo = $(this).offset().top;
          $('html,body').animate({scrollTop: topo}, 500);
        });
      }else{
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var mail = email.val();
        if(!re.test(mail)){
            $('form#contato .alerta-form.mail').slideDown(250);
            $(email).addClass('erro-input');
            return false;
        }else{
            form.submit();
        }    
      }
    });


    // contato
    $("form#inscrever-treinamento a.enviar").click(function(e){
      e.preventDefault();

      var form = $('form#inscrever-treinamento');

      var obrigatorios = $('input.obrigatorio');


      
        $.each(obrigatorios, function(index, value) {
            if( !$(this).val() ){                    
                    $(this).addClass('erro-input');
                    return false;
            }
        });

        if($('.erro-input').length > 0){

            $('form#inscrever-treinamento .alerta-form.obrigatorio').slideDown(250, function(){
              var topo = $(this).offset().top;
              $('html,body').animate({scrollTop: topo}, 500);
            });
            return false;
          }else{
            
            form.submit();
               
          }
        
    });





    $('.add-participa > a').click(function(event) {
        event.preventDefault();

        var formBloco = $('.participante-bloco:first').clone();

        formBloco.find('input').val('');

        $('.container-participantes').append(formBloco);
    });

    $('a.hide-menu').click(function(event) {
        /* Act on the event */
        event.preventDefault();

        $('nav#site-nav').slideToggle(350);
    });

});

$(window).load(function(){
    // Using custom configuration
    $('.carousel .carousel-container').carouFredSel({
                circular: true,         // Determines whether the carousel should be circular.
                infinite: true,         // Determines whether the carousel should be infinite. Note: It is possible to create a non-circular, infinite carousel, but it is not possible to create a circular, non-infinite carousel.
                responsive: true,      // Determines whether the carousel should be responsive. If true, the items will be resized to fill the carousel.
                direction: "left",      // The direction to scroll the carousel. Possible values: "right", "left", "up" or "down".
                width: 'variable',            // The width of the carousel. Can be null (width will be calculated), a number, "variable" (automatically resize the carousel when scrolling items with variable widths), "auto" (measure the widest item) or a percentage like "100%" (only applies on horizontal carousels)
                height: 'variable',           // The height of the carousel. Can be null (width will be calculated), a number, "variable" (automatically resize the carousel when scrolling items with variable heights), "auto" (measure the tallest item) or a percentage like "100%" (only applies on vertical carousels)
                align: false,        // Whether and how to align the items inside a fixed width/height. Possible values: "center", "left", "right" or false.
                padding: null,          // Padding around the carousel (top, right, bottom and left). For example: [10, 20, 30, 40] (top, right, bottom, left) or [0, 50] (top/bottom, left/right).
                synchronise: null,      // Selector and options for the carousel to synchronise: [string selector, boolean inheritOptions, boolean sameDirection, number deviation] For example: ["#foo2", true, true, 0]
                cookie: false,          // Determines whether the carousel should start at its last viewed position. The cookie is stored until the browser is closed. Can be a string to set a specific name for the cookie to prevent multiple carousels from using the same cookie.          // Function that will be called after the carousel has been created. Receives a map of all data.    
                swipe: {
                    onTouch: true
                },
                auto: {
                    play: false
                },             
                scroll : {
                    items           : 1,
                    duration        : 500
                }, 
                items : {
                        //width: 'variable',
                        height: 'variable',
                        visible     : {
                            min         : 1,
                            max         : 2
                        }

                    },
                    pagination : {
                        container: '.carousel .carousel-pager',
                        anchorBuilder: function(nr, item) {
                            return '<a href="#'+nr+'" class="im"></a>';
                        },
                        items : {
                            visible :{
                                min         : 1,
                                max         : 3  
                            }
                        },
                    },
                    onCreate: function () {
                        // $(window).on('resize', function () {
                        //     $(".car-news > .car > div").parent().add($(".car-news > .car > div")).height($(".car-news > .car > div").children().first().height());
                        // }).trigger('resize');
                    }

                });

    // var itemsTotal = $('#conteudo-site > div').length;

    // $('#frota .prev').click(function(e){
    //     e.preventDefault();
    //     $(this).parent().parent().parent().parent().parent().parent().find('.cycle-slideshow').cycle('prev');
    // });

    // $('#frota .next').click(function(e){
    //     e.preventDefault();
    //     $(this).parent().parent().parent().parent().parent().parent().find('.cycle-slideshow').cycle('next');
    // });

    // $('.carousel-clientes').carouFredSel({
    //     width: '100%',
    //     responsive: false,
    //     infinite: false,
    //     auto : {
    //         play            :false,
    //     },
    //     items: {
    //     	start: -1,
    //         visible: {
    //         	min: 1,
    //         	max: 5
    //         }

    //     },
    //     scroll: {
    //         items: 1,
    //         duration: 1000,
    //         timeoutDuration: false,
    //         pauseOnHover    : true
    //     },
    //     pagination: {
    //         container: '#nav-carclientes',
    //         deviation: 1,
    //         anchorBuilder: function(nr) { 
    //         	return '<a href="#" class="im"></a>'; 
    //         }
    //     }
    // });

});



$(window).on('scroll resize load', function(){

    if($(window).width() > 1023){
        $('nav#site-nav').removeAttr('style');
    }
    
    // var headerSize = $('#site-header').outerHeight();
    // var scrollPos = $(window).scrollTop();
    // var topoSis = $('#conteudo-site').offset().top - headerSize;

    // $('#sld-home').css('margin-top', headerSize+'px');

    // if(scrollPos >= topoSis){       

    //     $('.bloco-conteudo').each(function() {
    //         var headerSize = $('#site-header').outerHeight() + 30;
    //         var post = $(this);
    //         var position = post.offset().top - $(window).scrollTop() - headerSize;
    //         var ind = $(this).index() + 1;

    //         var titulo = post.data('titulo');
            
    //         if (position <= 0) {
    //             $('#site-menu > .links-nav > a').removeClass('atual');
    //             window.atualItem = post.index();
    //             $('#site-menu > .links-nav > a:eq('+atualItem+')').addClass('atual');
    //         } else {
    //             var positionLast = $('#site-footer').offset().top - $(window).scrollTop();
    //             if (positionLast <= 0) {
    //                 window.atualItem = 7;
    //             }else{
    //                 $('#conteudo-site > div').removeClass('selected');
    //             }
    //         }
    //     });

    // }else{
    //     $('#site-menu > .links-nav > a').removeClass('atual');
    // }









})


