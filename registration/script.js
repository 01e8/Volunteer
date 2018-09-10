$("#profession").hide();
$("#anketa_select_profession").on('change', function(){
    if($(this).val() == "Другая"){
        $("#profession").show("fast");
        $("#profession").addClass("mandat");
    } else {
        $("#profession").css('border-bottom', '1px solid grey');
        $("#profession").css('padding-bottom', '1px');
        $("#profession").hide("fast");
        $("#profession").removeClass("mandat");
    }
})

$("#support").hide();
$("#anketa_select_support").on('change', function(){
    if($(this).val() == "Другая"){
        $("#support").show("fast");
        $("#support").addClass("mandat");
    } else {
        $("#support").css('border-bottom', '1px solid grey');
        $("#support").css('padding-bottom', '1px');
        $("#support").hide("fast");
        $("#support").removeClass("mandat");
    }
})

$("#messagee").hide();
$("#mess_shadow").hide();

function save_anketa() {
    var msg = $('#anketa_form').serialize();
    $.ajax({
        url: '/verif.php',
        type: 'POST',
        data: msg,
        beforeSend: function(){
            $("#mess_text").text("Ожидается...");
        },
        success: function(data){
            $("#mess_text").html(data);
        }
    });
}
$("#mess_button").click(function(){ 
    $("#messagee").hide();
    $("#mess_shadow").hide();
});

$(document).ready(function() {
    $('#anketa_form').submit(function(e){
        e.preventDefault();
    });
    $("#anketa_button").click(function(){ 
        $('.mandat').css('border-bottom', '1px solid grey');
        $('.mandat').css('padding-bottom', '1px');
        
        var value = $('.mandat').filter(function () {
            return this.value == '';
        });
    
        if (value.length>0) {
            alert("Пожалуйста, заполните пустые поля.");
            check_mandat = true;
            $('.mandat').filter(function(index){
            return this.value == '';
            }).css({
                'border-bottom': '2px solid red',
                'padding-bottom': '0px'
            });
        } else {
            $("#messagee").show();
            $("#mess_shadow").show();
            save_anketa();
            grecaptcha.reset();
            jQuery('#anketa_form')[0].reset();
            check_mandat = false;
        }
    });
});

var check_mandat = false;

$(".mandat").focus(function(eventObject) {
    if(check_mandat && this.value == ''){
        $(this).css('border-bottom', '1px solid grey');
        $(this).css('padding-bottom', '1px');
    }
});
$(".mandat").blur(function(eventObject) {
    if(check_mandat && this.value == ''){
        $(this).css('border-bottom', '2px solid red');
        $(this).css('padding-bottom', '0px');
    }
});

$("#profession").focus(function(eventObject) {
    if(check_mandat && this.value == ''){
        $(this).css('border-bottom', '1px solid grey');
        $(this).css('padding-bottom', '1px');
    }
});
$("#profession").blur(function(eventObject) {
    if(check_mandat && this.value == ''){
        $(this).css('border-bottom', '2px solid red');
        $(this).css('padding-bottom', '0px');
    }
});

$("#support").focus(function(eventObject) {
    if(check_mandat && this.value == ''){
        $(this).css('border-bottom', '1px solid grey');
        $(this).css('padding-bottom', '1px');
    }
});
$("#support").blur(function(eventObject) {
    if(check_mandat && this.value == ''){
        $(this).css('border-bottom', '2px solid red');
        $(this).css('padding-bottom', '0px');
    }
});