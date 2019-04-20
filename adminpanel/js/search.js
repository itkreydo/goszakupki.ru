$(function(){
       

//Живой поиск
$('.smartfinder').bind("change keyup input click", function() {
    if(this.value.length >= 2){
        $.ajax({
            type: 'post',
            url: "ajax/search.php", //Путь к обработчику
            data: {'referal':this.value},
            response: 'text',
            success: function(data){
                $(".search_result").html(data).fadeIn(); //Выводим полученые данные в списке
           }
       });
    }
});
    //При выборе результата поиска, прячем список и заносим выбранный результат в input
$(".search_result").on("click", "li", function(){
    var s_user = $(this).text();
	$(".smartfinder").val(s_user);
    //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
    $(".search_result").fadeOut();
});
$(".search_result").hover(function(){
    $(".smartfinder").blur(); //Убираем фокус с input
});
 

});