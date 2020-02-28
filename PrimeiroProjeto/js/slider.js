$(function(){ 

    var currentSlide = 0;
    var dlay = 4;
    var maxSlide = $('.banner-single').length-1;

    initSlider();
    changeSlide();

    function initSlider(){
        $('.banner-single').hide();
        $('.banner-single').eq(0).show();
        var content = $('.bullets').html();
        for(var cont = 0; cont < maxSlide+1; cont++){
            if(cont == 0)
                content += '<span class="active-slider"></span>';
            else
                content += '<span></span>';
            $('.bullets').html(content);    
        }
    }

    function changeSlide(){
        setInterval(function(){
            $('.banner-single').eq(currentSlide).stop().fadeOut(2000);
            currentSlide++;
            if(currentSlide > maxSlide)
                currentSlide = 0;
            $('.banner-single').eq(currentSlide).stop().fadeIn(2000);
            //trocar bullets de navegação do slider
            $('.bullets span').removeClass('active-slider');
            $('.bullets span').eq(currentSlide).addClass('active-slider');  
         },dlay * 1000);
    }

    //função "on" primeiro parâmetro: ação, segundo parâmetro: elemento, terceiro parâmetro: o que vai fazer (function).    
    $('body').on('click','.bullets span',function(){ 
        var currentBullet = $(this);
        $('.banner-single').eq(currentSlide).stop().fadeOut(1000);
        currentSlide = currentBullet.index();
        $('.banner-single').eq(currentSlide).stop().fadeIn(1000);
        $('.bullets span').removeClass('active-slider');
        currentBullet.addClass('active-slider');
    });
 })