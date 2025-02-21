jQuery(document).ready(function ($) {
    $("#select-acao").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".main-acao-data-criptonews").not(".main-acao-data-" + optionValue).hide();
                $(".main-acao-data-" + optionValue).show();
            }
        });
    }).change();
});