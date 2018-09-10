<? include ROOT.'/views/layouts/header.php';?>

<!--Дополнительное Меню-->
<div id="sub_menu">
    <a href="http://basetest.pkrvtl.ru/volunteer"><div id="sub_menu_vol_button" class="sub_menu_button" >Волонтеры</div></a>
    <a href="http://basetest.pkrvtl.ru/volunteer/statement"><div id="sub_menu_ank_button" class="sub_menu_button sub_menu_button_selected">Заявки</div></a>
</div>
<div id="left_menu">
    <form action="" method="POST" id="sort_ank_form">
    <div class="left_menu_cell">
        <div class="left_menu_tittle">Поиск по атрибутам</div>
        <div id="left_menu_attribute_button_edit"><img id="left_menu_attribute_img_edit" src="/template/img/editing.png"></div>
        <input class="left_menu_input_unchangeable" name="idank" id="left_menu_input_idank" placeholder="Номер анкеты">
        <input class="left_menu_input" name="surname" id="left_menu_input_surname" placeholder="Фамилия"><input type="checkbox" class="checkbox_attribute" name="check_surname" id="check_surname" checked>
        <input class="left_menu_input" name="name" id="left_menu_input_name" placeholder="Имя"><input type="checkbox" class="checkbox_attribute" name="check_name" id="check_name" checked>
        <input class="left_menu_input" name="patronymic" id="left_menu_input_patronymic" placeholder="Отчество"><input type="checkbox" class="checkbox_attribute" name="check_patronymic" id="check_patronymic" checked>
        
        <input class="left_menu_input" name="type_assistance" id="left_menu_input_type_assistance" placeholder="Вид помощи"><input type="checkbox" class="checkbox_attribute" name="check_type_assistance" id="check_type_assistance" checked>
        
        <input class="left_menu_input" name="male" id="left_menu_input_male" placeholder="Пол"><input type="checkbox" class="checkbox_attribute" name="check_male" id="check_male">
        
        <input class="left_menu_input" name="mail" id="left_menu_input_mail" placeholder="Почта"><input type="checkbox" class="checkbox_attribute" name="check_mail" id="check_mail">
        
        <input class="left_menu_input" name="phone" id="left_menu_input_phone" placeholder="Телефон"><input type="checkbox" class="checkbox_attribute" name="check_phone" id="check_phone">
        
        <input class="left_menu_input" name="datebirth" id="left_menu_input_datebirth" placeholder="Дата рождения"><input type="checkbox" class="checkbox_attribute" name="check_datebirth" id="check_datebirth">
        
        <input class="left_menu_input" name="address" id="left_menu_input_address" placeholder="Адрес"><input type="checkbox" class="checkbox_attribute" name="check_address" id="check_address">
        
        <input class="left_menu_input" name="status" id="left_menu_input_status" placeholder="Статус"><input type="checkbox" class="checkbox_attribute" name="check_status" id="check_status"  checked>
        
        <div class="left_menu_button_incell button_green" id="left_menu_attribute_button_save_ank">Сохранить</div>
        <div style="clear: both;"></div>
    </div>
    <div class="left_menu_cell">
        <div class="left_menu_tittle">Сортировать по</div>
        <select name="sort_attribute" class="left_menu_select" id="left_menu_select_sort">
            <option selected disabled hidden></option>
            <option>Номеру анкеты</option>
            <option>Фамилии</option>
            <option>Имени</option>
            <option>Отчеству</option>
            <option>Виду помощи</option>
            <option>Статусу</option>
        </select>
        <select name="sort" class="left_menu_select">
            <option selected disabled hidden></option>
            <option>по убыванию</option>
            <option>по возрастанию</option>
        </select>
    </div>
    <button class="left_menu_button button_green" id="left_menu_ank_button_ank">Применить</button>
    <button class="left_menu_button button_grey" id="left_menu_ank_button_ank_reset">Сбросить</button>
    </form>
</div>
<div id="div_table">
    
</div>
        
<? include ROOT.'/views/layouts/footer.php';?>