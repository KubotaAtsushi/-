/*global $*/
$(function(){
    const moji = $('.animation').text();
    $('.animation').text('');
    let count = 0;
    const text_animation =() =>{
        let word =moji.substr(count, 1);
        console.log(word);
        let span = $('<span>', {text: word});
        $('.animation').append(span);
        count++;
        if(count === moji.length){
            clearInterval(timer);
        }
    }
    
    const timer = setInterval(text_animation, 500);
})