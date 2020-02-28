$(function(){
    var index = -1;
    var max = $('.box-especialidades').length - 1;
    var timer;
    var animationDelay = 2;

    makeAnimation();
    function makeAnimation(){
        $('.box-especialidades').hide();
        timer = setInterval(logicalAnimation, animationDelay * 1000);

        function logicalAnimation(){
            index++;
            if(index > max){
                clearInterval(timer);
                return false;
            }
            $('.box-especialidades').eq(index).fadeIn();
        }
    }




})