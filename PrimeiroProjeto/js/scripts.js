//$() -> tudo dentro dessa função é carregado junto à página
$(function(){
    //Aqui vai todo o código javaScript
    $('nav.mobile').click(function() {
        var menuMobile = $('nav.mobile ul');

        /*
        if(menuMobile.is(':hidden') == true){
            menuMobile.fadeIn();
        }else{
            menuMobile.fadeOut();
        }
        */

        /*
        if(menuMobile.is(':hidden') == true){
            menuMobile.css('display', 'block');
        }else{
            menuMobile.css('display', 'none');
        }
        */

        /*
        if(menuMobile.is(':hidden') == true){
            menuMobile.show();
        }else{
            menuMobile.hide();
        }
        */
        //fas fa-times fas fa-bars

        var botaoMenu = $('.botao-menu-mobile').find('i');

        if(menuMobile.is(':hidden') == true){
            botaoMenu.removeClass('fas fa-bars');
            botaoMenu.addClass('fas fa-times');
            menuMobile.slideToggle();
        }else{
            botaoMenu.removeClass('fas fa-times');
            botaoMenu.addClass('fas fa-bars');
            menuMobile.slideToggle();
        }
    })

    //Animação de scrolldown
    if($('target').length > 0){
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({scrollTop:divScroll},2000);
    }

    var map;
	
    function initialize() {

    var mapProp = {
        center:new google.maps.LatLng(-12.933128045634751,-38.428695201873786),
        zoom:14,
        scrollwheel: false,
        styles: [{
        stylers: [{
        saturation: -100
        }]
        }],
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    map=new google.maps.Map(document.getElementById("map"),mapProp);
    }

    function addMarker(lat,long,icon,content,showInfoWindow,openInfoWindow){
        var myLatLng = {lat:lat,lng:long};

        if(icon === ''){
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon:icon
            });
        }else{
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon:icon
            });
        }

        var infoWindow = new google.maps.InfoWindow({
                    content: content,
                    maxWidth:200
            });

        google.maps.event.addListener(infoWindow, 'domready', function() {

        // Reference to the DIV which receives the contents of the infowindow using jQuery
        var iwOuter = $('.gm-style-iw');

        /* The DIV we want to change is above the .gm-style-iw DIV.
            * So, we use jQuery and create a iwBackground variable,
            * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
            */
        var iwBackground = iwOuter.prev();

        // Remove the background shadow DIV
        iwBackground.children(':nth-child(2)').css({'background' : 'rgb(255,255,255)'}).css({'border-radius':'0px'});

        // Remove the white background DIV
        iwBackground.children(':nth-child(4)').css({'background' : 'rgb(255,255,255)'}).css({'border-radius':'0px'});

        // Moves the shadow of the arrow 76px to the left margin 
            iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'display:none;'});

            // Moves the arrow 76px to the left margin 
            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'display:none;'});

        });
            if(showInfoWindow == undefined){
                google.maps.event.addListener(marker, 'click', function () {
                    infoWindow.open(map, marker);
                });
            }else if(openInfoWindow == true){
                infoWindow.open(map, marker);
            }
    }

    dynamicLoading();
    function dynamicLoading(){ 
        $('[realtime]').click(function(){
            var page = $(this).attr('realtime');
            $('.container-principal').hide();
            $('.container-principal').load(include_path+'pages/'+page+'.php');

            setTimeout(function(){
                initialize();
                addMarker(-12.933128045634751,-38.428695201873786,'',"Minha casa",undefined,true);
            },1000);

            $('.container-principal').fadeIn(1000);
            return false;
        })
    }

})