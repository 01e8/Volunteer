//Настраивает отступ слева для кнопки профиля
$("#button_profile").css({"margin-left":"calc(98.5vw - "+$("#button_profile").outerWidth() + "px"});
//$("#button_profile").css({"width":$("#button_profile").width()});
//$("#profile_menu").css({"margin-left":"calc(98vw - "+$("#button_profile").outerWidth() + "px"});
$("#div_table").css({"height":$("#left_menu").height() + "px"});
//квадратное фото в КВ
$("#profile_photo").css({"height": $("#profile_photo").width()+ "px"});
$("#profile_photo_img").css({"margin-top": (0 - (($("#profile_photo_img").height() - $("#profile_photo_img").width())/ 2)) + "px"});
close_volcard();
close_ankcard();

//Вызывает функцию при изменении размера окна
$(window).resize(function(){
    //Настраивает отступ слева для кнопки профиля
    $("#button_profile").css({"margin-left":"calc(98.5vw - "+$("#button_profile").outerWidth() + "px"});
    //$("#button_profile").css({"width":$("#button_profile").width()});
    //$("#profile_menu").css({"margin-left":"calc(98vw - "+$("#button_profile").outerWidth() + "px"});
    $("#div_table").css({"height":$("#left_menu").height() + "px"});
    //квадратное фото в КВ
    $("#profile_photo").css({"height": $("#profile_photo").width()+ "px"});
    $("#profile_photo_img").css({"margin-top": (0 - (($("#profile_photo_img").height() - $("#profile_photo_img").width())/ 2)) + "px"});

});

//Действие по нажатию кнопки профиля
$("#button_profile").click(function() {
    //Если меню профиля закрыто
    if( $("#profile_menu").css("display") == 'none'){
        //Изменение значения стилей кнопки
        $("#button_profile").hover(function(){
            $(this).css("background-color", "#1a8952");
            }, function(){
            $(this).css("background-color", "#1a8952");
        });
        $("#button_profile").css({"background-color":"#1a8952"});
        //Появление меню
        $("#profile_menu").css({"display":"block"});
        event.stopPropagation();
    }
});

//Действие если нажать на любую часть экрана, но не на меню профиля
$(document).click( function(event){
    //Если меню профиля открыто
    if( $("#profile_menu").css("display") == 'block'){
        //Если элемент является частью меню, то остановить функцию (Не закрывать меню)
        if( $(event.target).closest("#profile_menu").length ) return;
        //Если элемент не является, то...
        //Закрытие меню
        $("#profile_menu").css({"display":"none"});
        //Возвращение значения стилей кнопки в начальное значение
        $("#button_profile").hover(function(){
            $(this).css("background-color", "#21a061");
            }, function(){
            $(this).css("background-color", "#20ba6d");
        });
        $("#button_profile").css({"background-color":"#20ba6d"});
        event.stopPropagation();
    }
    
    /*
    if ($(event.target).hasClass('VC_img')) {
        open_volcard(event.target.id.substr(2));
    }else if( $("#div_volcard").css("display") == 'block'){
        //Если элемент является частью карты, то остановить функцию (Не закрывать меню)
        if( $(event.target).closest("#div_volcard").length ) return;
        //Если элемент не является, то...
        //Закрытие карты
        close_volcard();
        event.stopPropagation();
    }
    
    if ($(event.target).hasClass('AC_img')) {
        open_ankcard(event.target.id.substr(2));
    }else if( $("#div_ankcard").css("display") == 'block'){
        //Если элемент является частью карты, то остановить функцию (Не закрывать меню)
        if( $(event.target).closest("#div_ankcard").length ) return;
        //Если элемент не является, то...
        //Закрытие карты
        close_ankcard();
        event.stopPropagation();
    }
    */
});

function edit_attribute() {
    //Появление кнопки сохранения и анимация
    $("#left_menu_attribute_button_save").css({"display":"block"});
    $("#left_menu_attribute_button_save").animate({opacity:1}, 500);
    $("#left_menu_attribute_button_save_ank").css({"display":"block"});
    $("#left_menu_attribute_button_save_ank").animate({opacity:1}, 500);
    //Анимация кнопки редактироваия
    $("#left_menu_attribute_button_edit").removeClass('scale1');
    $("#left_menu_attribute_button_edit").addClass('scale0');
    $("#left_menu_attribute_img_edit").removeClass('rotate360');
    //$("#left_menu_attribute_button_edit").css({"display":"none"});
    //Появление чекбоксов
    $(".checkbox_attribute").css({"display":"block"});
    $(".checkbox_attribute").animate({opacity:1}, 400);
    //Появление полей ввода каждого атрибута
    $(".left_menu_input").each(function(){
        $(this).css({"display":"inline"});
        $(this).animate({opacity:1}, 400)
        $(this).css({"width":"calc(90% - 0.3vw)"});
    });
}

function save_vol_attribute() {
    //Анимация кнопки редактироваия
    //$("#left_menu_attribute_button_edit").css({"display":"block"});
    $("#left_menu_attribute_button_edit").removeClass('scale0');
    $("#left_menu_attribute_button_edit").addClass('scale1');
    $("#left_menu_attribute_img_edit").addClass('rotate360');
    //Отключение кнопки сохраниения
    $("#left_menu_attribute_button_save").css({"opacity":"0"});
    $("#left_menu_attribute_button_save").css({"display":"none"});
    //Отключение чекбоксов
    $(".checkbox_attribute").css({"opacity":"0"});
    $(".checkbox_attribute").css({"display":"none"});
    //Изменение ширины полей ввода
    $(".left_menu_input").each(function(){
        $(this).css({"width":"calc(100% - 0.3vw)"});
    });
    //Удаление вариантов сортировки
    $("#left_menu_select_sort option").remove();
    //Проверка чекбоксов каждого атрибута. Если чекбокс не отмечен, то содеражние поля ввода данного атрибута удаляется, а затем отключается само поле.
    //Если чекбокс отмечен, то в список вариантов сортировки добавляется отмеченный атрибут. 
    $('#left_menu_select_sort').append('<option selected disabled hidden></option>');
    $('#left_menu_select_sort').append($('<option>', { text: 'Номеру карточки' }));
    if($("#check_surname").is(":not(:checked)")) {
        $("#left_menu_input_surname").val('');
        $("#left_menu_input_surname").css({"opacity":"0"});
        $("#left_menu_input_surname").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Фамилии' }));}
    if($("#check_name").is(":not(:checked)")) {
        $("#left_menu_input_name").val('');
        $("#left_menu_input_name").css({"opacity":"0"});
        $("#left_menu_input_name").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Имени' }));}
    if($("#check_patronymic").is(":not(:checked)")) {
        $("#left_menu_input_patronymic").val(''); 
        $("#left_menu_input_patronymic").css({"opacity":"0"});
        $("#left_menu_input_patronymic").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Отчеству' }));}
    if($("#check_depart").is(":not(:checked)")) {
        $("#left_menu_input_depart").val('');
        $("#left_menu_input_depart").css({"opacity":"0"});
        $("#left_menu_input_depart").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Отделу' }));}
    if($("#check_mail").is(":not(:checked)")) {
        $("#left_menu_input_mail").val('');
        $("#left_menu_input_mail").css({"opacity":"0"});
        $("#left_menu_input_mail").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Почте' }));}
    if($("#check_phone").is(":not(:checked)")) {
        $("#left_menu_input_phone").val('');
        $("#left_menu_input_phone").css({"opacity":"0"});
        $("#left_menu_input_phone").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Телефону' }));}
    if($("#check_datatest").is(":not(:checked)")) {
        $("#left_menu_input_datatest").val('');
        $("#left_menu_input_datatest").css({"opacity":"0"});
        $("#left_menu_input_datatest").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Дате тестирования' }));}
    if($("#check_age").is(":not(:checked)")) {
        $("#left_menu_input_age").val('');
        $("#left_menu_input_age").css({"opacity":"0"});
        $("#left_menu_input_age").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Возрасту' }));}
    if($("#check_datebirth").is(":not(:checked)")) {
        $("#left_menu_input_datebirth").val('');
        $("#left_menu_input_datebirth").css({"opacity":"0"});
        $("#left_menu_input_datebirth").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Дате рождения' }));}
    if($("#check_passport").is(":not(:checked)")) {
        $("#left_menu_input_passport").val('');
        $("#left_menu_input_passport").css({"opacity":"0"});
        $("#left_menu_input_passport").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Паспорту' }));}
    if($("#check_address").is(":not(:checked)")) {
        $("#left_menu_input_address").val('');
        $("#left_menu_input_address").css({"opacity":"0"});
        $("#left_menu_input_address").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Адресу' }));}
    
}

function save_ank_attribute() {
    //Анимация кнопки редактироваия
    //$("#left_menu_attribute_button_edit").css({"display":"block"});
    $("#left_menu_attribute_button_edit").removeClass('scale0');
    $("#left_menu_attribute_button_edit").addClass('scale1');
    $("#left_menu_attribute_img_edit").addClass('rotate360');
    //Отключение кнопки сохраниения
    $("#left_menu_attribute_button_save_ank").css({"opacity":"0"});
    $("#left_menu_attribute_button_save_ank").css({"display":"none"});
    //Отключение чекбоксов
    $(".checkbox_attribute").css({"opacity":"0"});
    $(".checkbox_attribute").css({"display":"none"});
    //Изменение ширины полей ввода
    $(".left_menu_input").each(function(){
        $(this).css({"width":"calc(100% - 0.3vw)"});
    });
    //Удаление вариантов сортировки
    $("#left_menu_select_sort option").remove();
    //Проверка чекбоксов каждого атрибута. Если чекбокс не отмечен, то содеражние поля ввода данного атрибута удаляется, а затем отключается само поле.
    //Если чекбокс отмечен, то в список вариантов сортировки добавляется отмеченный атрибут. 
    $('#left_menu_select_sort').append('<option selected disabled hidden></option>');
    $('#left_menu_select_sort').append($('<option>', { text: 'Номеру анкеты' }));
    if($("#check_surname").is(":not(:checked)")) {
        $("#left_menu_input_surname").val('');
        $("#left_menu_input_surname").css({"opacity":"0"});
        $("#left_menu_input_surname").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Фамилии' }));}
    if($("#check_name").is(":not(:checked)")) {
        $("#left_menu_input_name").val('');
        $("#left_menu_input_name").css({"opacity":"0"});
        $("#left_menu_input_name").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Имени' }));}
    if($("#check_patronymic").is(":not(:checked)")) {
        $("#left_menu_input_patronymic").val(''); 
        $("#left_menu_input_patronymic").css({"opacity":"0"});
        $("#left_menu_input_patronymic").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Отчеству' }));}
    if($("#check_type_assistance").is(":not(:checked)")) {
        $("#left_menu_input_type_assistance").val(''); 
        $("#left_menu_input_type_assistance").css({"opacity":"0"});
        $("#left_menu_input_type_assistance").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Виду помощи' }));}
    if($("#check_male").is(":not(:checked)")) {
        $("#left_menu_input_male").val('');
        $("#left_menu_input_male").css({"opacity":"0"});
        $("#left_menu_input_male").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Полу' }));}
    if($("#check_mail").is(":not(:checked)")) {
        $("#left_menu_input_mail").val('');
        $("#left_menu_input_mail").css({"opacity":"0"});
        $("#left_menu_input_mail").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Почте' }));}
    if($("#check_phone").is(":not(:checked)")) {
        $("#left_menu_input_phone").val('');
        $("#left_menu_input_phone").css({"opacity":"0"});
        $("#left_menu_input_phone").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Телефону' }));}
    if($("#check_datebirth").is(":not(:checked)")) {
        $("#left_menu_input_datebirth").val('');
        $("#left_menu_input_datebirth").css({"opacity":"0"});
        $("#left_menu_input_datebirth").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Дате рождения' }));}
    if($("#check_address").is(":not(:checked)")) {
        $("#left_menu_input_address").val('');
        $("#left_menu_input_address").css({"opacity":"0"});
        $("#left_menu_input_address").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Адресу' }));}
    if($("#check_status").is(":not(:checked)")) {
        $("#left_menu_input_status").val('');
        $("#left_menu_input_status").css({"opacity":"0"});
        $("#left_menu_input_status").css({"display":"none"});
    }else {$('#left_menu_select_sort').append($('<option>', { text: 'Статусу' }));}
    
}

//Действие по нажатию кнопки редактирвоания атрибутов поиска
$("#left_menu_attribute_button_edit").click(function() {edit_attribute();});

//Действие по нажатию кнопки сохранения атрибутов поиска
$("#left_menu_attribute_button_save").click(function(){save_vol_attribute();});

$("#left_menu_attribute_button_save_ank").click(function(){save_ank_attribute();});

function create_vol_table() {
    var msg = $('#sort_form').serialize(); //Передаем все данные формы
    $.ajax({
        url: '/volunteer/getVolunteers',
        type: 'POST',
        data: msg,
        beforeSend: function(){ //Перед отправкой выводим сообщение
            $("#div_table").text("Ожидается...");
        },
        success: function(data){
            $("#div_table").html(data); //Выводим полученные данные в #there
        }
    });
}

function create_ank_table() {
    var msg = $('#sort_ank_form').serialize(); //Передаем все данные формы
    $.ajax({
        url: '/volunteer/getStatements',
        type: 'POST',
        data: msg,
        beforeSend: function(){ //Перед отправкой выводим сообщение
            $("#div_table").text("Ожидается...");
        },
        success: function(data){
            $("#div_table").html(data); //Выводим полученные данные в #there
        }
    });
}

//Действие по нажатию на кнопку Применить
$(document).ready(function() {
    if ($("#sub_menu_vol_button").hasClass("sub_menu_button_selected")) {create_vol_table();}
    if ($("#sub_menu_ank_button").hasClass("sub_menu_button_selected")) {create_ank_table();}
    
    $('#sort_form').submit(function(e){
        e.preventDefault(); //Отменяем действие Submit у формы
    });
    $("#left_menu_button").click(function(){ 
         if( $("#left_menu_attribute_button_save").css("display") == 'block'){
            save_vol_attribute();
         }
        create_vol_table();
    });
    
    $('#sort_ank_form').submit(function(e){
        e.preventDefault(); //Отменяем действие Submit у формы
    });
    $("#left_menu_ank_button_ank").click(function(){ 
         if( $("#left_menu_attribute_button_save_ank").css("display") == 'block'){
            save_ank_attribute();
         }
        create_ank_table();
    });
});

$("#left_menu_ank_button_ank_reset").click(function(){
    $('#sort_ank_form').trigger( 'reset' );
    //if( $("#left_menu_attribute_button_save_ank").css("display") == 'block'){
        save_ank_attribute();
    //} else { edit_attribute(); save_ank_attribute(); }
    create_ank_table();
    
});

$("#left_menu_button_reset").click(function(){
    $('#sort_form').trigger( 'reset' );
    //if( $("#left_menu_attribute_button_save").css("display") == 'block'){
        save_vol_attribute();
    //} else { edit_attribute(); save_vol_attribute(); }
    create_vol_table();
    
});
//$('#sort_form').trigger( 'reset' );

function close_volcard(){
    $("#div_volcard").css({"display":"none"});
    $("#div_shadow").css({"display":"none"});
};

function close_ankcard(){
    $("#div_ankcard").css({"display":"none"});
    $("#div_shadow").css({"display":"none"});
};

function open_volcard(id){
    var col = 3;
    $("#div_volcard").css({
        "width": col*20 + "vw",
        "margin-left": (100-col*20)/2 + "vw"
    });
    $("#div_volcard").css({"display":"block"});
    $("#div_shadow").css({"display":"block"});
    
    // id - требуемый номер карточки волонтера
    //Загрузка данных
    var res = {};
    res["vol_id"] = parseInt(id); 
    $.ajax({
        url: '/volunteer/getVolunteerCard=' + res["vol_id"],
        type: 'POST',
        data: res,
        beforeSend: function(){ //Перед отправкой выводим сообщение
            $("#div_volcard").text("Ожидается...");
        },
        success: function(data){
            $("#div_volcard").html(data);
            
            $("#profile_photo_img").bind('load', function () {
            $("#profile_photo").css({"height": $("#profile_photo").width()+ "px"});
            $("#profile_photo_img").css({"margin-top": (0 - (($("#profile_photo_img").height() - $("#profile_photo_img").width())/ 2)) + "px"});
            });
        }
    });
$("#profile_photo_img").css({"margin-top": (0 - (($("#profile_photo_img").height() - $("#profile_photo_img").width())/ 2)) + "px"});
};

function open_ankcard(id){
    var col = 2;
    $("#div_ankcard").css({
        "width": col*20 + "vw",
        "margin-left": (100-col*20)/2 + "vw"
    });
    $("#div_ankcard").css({"display":"block"});
    $("#div_shadow").css({"display":"block"});
    //Загрузка данных
    var res = {};
    res["ank_id"] = parseInt(id); 
    $.ajax({
        url: '/volunteer/statement/getStatementCard=' + res["ank_id"],
        type: 'POST',
        data: res,
        beforeSend: function(){ //Перед отправкой выводим сообщение
            $("#div_ankcard").text("Ожидается...");
        },
        success: function(data){
            $("#div_ankcard").html(data);
        }
    });
};

function edit_volcard(){
    $("#div_volcard").find(".card_val").css({"display":"none"});
    $("#div_volcard").find(".card_input").removeClass("disp_none");
    
    $("#div_volcard").find("#volcard_bottom_edit").css({"display":"none"});
    $("#div_volcard").find("#volcard_bottom_save").removeClass("disp_none");
};

function save_volcard(id){
    var msg = $('#volcard_form').serialize();
    $.ajax({
        url: '/volunteer/getVolunteerCard=' + id,
        type: 'POST',
        data: msg,
        beforeSend: function(){ //Перед отправкой выводим сообщение
            $("#div_volcard").text("Ожидается...");
        },
        success: function(data){
            open_volcard(parseInt(id));
        }
    });
};

$('#div_table').on('click', '.VC_img', function(event){
    open_volcard(event.target.id.substr(2));
});

$('#div_table').on('click', '.AC_img', function(event){
    open_ankcard(event.target.id.substr(2));
});

$("#div_shadow").click(function() {
    close_volcard();
    close_ankcard();
});

$('#div_volcard').on('click', '#volcard_head_exit', function(){
    close_volcard();
});

$('#div_volcard').on('click', '#volcard_bottom_exit', function(){
    close_volcard();
});

$('#div_volcard').on('click', '#volcard_bottom_edit', function(){
    edit_volcard();
});

$('#div_volcard').on('click', '#volcard_bottom_save', function(){
    $('#volcard_form').submit(function(e){
        e.preventDefault(); //Отменяем действие Submit у формы
    });
    save_volcard($("#volcard_input_id").val());
});



$('#div_ankcard').on('click', '#ankcard_head_exit', function(){
    close_ankcard();
});

$('#div_ankcard').on('click', '#ankcard_bottom_exit', function(){
    close_ankcard();
});