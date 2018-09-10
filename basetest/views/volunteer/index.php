<? include ROOT.'/views/layouts/header.php';?>

<!--Дополнительное Меню-->
<div id="sub_menu">
    <a href="http://basetest.pkrvtl.ru/volunteer"><div id="sub_menu_vol_button" class="sub_menu_button sub_menu_button_selected" >Волонтеры</div></a>
    <a href="http://basetest.pkrvtl.ru/volunteer/statement"><div id="sub_menu_ank_button" class="sub_menu_button">Заявки</div></a>
</div>
<div id="left_menu">
    <form action="" method="POST" id="sort_form">
    <div class="left_menu_cell">
        <div class="left_menu_tittle">Поиск по атрибутам</div>
        <div id="left_menu_attribute_button_edit"><img id="left_menu_attribute_img_edit" src="/template/img/editing.png"></div>
        <input class="left_menu_input_unchangeable" name="idkart" id="left_menu_input_idkart" placeholder="Номер карточки">
        <input class="left_menu_input" name="surname" id="left_menu_input_surname" placeholder="Фамилия"><input type="checkbox" class="checkbox_attribute" name="check_surname" id="check_surname" checked>
        <input class="left_menu_input" name="name" id="left_menu_input_name" placeholder="Имя"><input type="checkbox" class="checkbox_attribute" name="check_name" id="check_name" checked>
        <input class="left_menu_input" name="patronymic" id="left_menu_input_patronymic" placeholder="Отчество"><input type="checkbox" class="checkbox_attribute" name="check_patronymic" id="check_patronymic" checked>
        <input class="left_menu_input" name="depart" id="left_menu_input_depart" placeholder="Отдел"><input type="checkbox" class="checkbox_attribute" name="check_depart" id="check_depart" checked>
        
        <input class="left_menu_input" name="mail" id="left_menu_input_mail" placeholder="Почта"><input type="checkbox" class="checkbox_attribute" name="check_mail" id="check_mail">
        
        <input class="left_menu_input" name="phone" id="left_menu_input_phone" placeholder="Телефон"><input type="checkbox" class="checkbox_attribute" name="check_phone" id="check_phone">
        
        <input class="left_menu_input" name="datatest" id="left_menu_input_datatest" placeholder="Дата тестирования"><input type="checkbox" class="checkbox_attribute" name="check_datatest" id="check_datatest">
        
        <input class="left_menu_input" name="age" id="left_menu_input_age" placeholder="Возраст"><input type="checkbox" class="checkbox_attribute" name="check_age" id="check_age">
        
        <input class="left_menu_input" name="datebirth" id="left_menu_input_datebirth" placeholder="Дата рождения"><input type="checkbox" class="checkbox_attribute" name="check_datebirth" id="check_datebirth">
        
        <input class="left_menu_input" name="passport" id="left_menu_input_passport" placeholder="Паспорт"><input type="checkbox" class="checkbox_attribute" name="check_passport" id="check_passport">
        
        <input class="left_menu_input" name="address" id="left_menu_input_address" placeholder="Адрес"><input type="checkbox" class="checkbox_attribute" name="check_address" id="check_address">
        
        <div class="left_menu_button_incell button_green" id="left_menu_attribute_button_save">Сохранить</div>
        <div style="clear: both;"></div>
    </div>
    <div class="left_menu_cell">
        <div class="left_menu_tittle">Сортировать по</div>
        <select name="sort_attribute" class="left_menu_select" id="left_menu_select_sort">
            <option selected disabled hidden></option>
            <option>Номеру карточки</option>
            <option>Фамилии</option>
            <option>Имени</option>
            <option>Отчеству</option>
            <option>Телефону</option>
            <option>Отделу</option>
        </select>
        <select name="sort" class="left_menu_select">
            <option selected disabled hidden></option>
            <option>по убыванию</option>
            <option>по возрастанию</option>
        </select>
    </div>
    <div class="left_menu_cell">
        <div class="left_menu_tittle">Подбор по времени</div>
        <select class="left_menu_select">
            <option selected disabled hidden>День</option>
            <option>Понедельник</option>
            <option>Вторник</option>
            <option>Среда</option>
            <option>Четверг</option>
            <option>Пятница</option>
            <option>Суббота</option>
            <option>Воскресенье</option>
        </select>
        <div class="left_menu_text">От</div>
        <select class="left_menu_select_time_hour">
            <option selected disabled hidden>Час</option>
            <option>00</option><option>01</option><option>02</option><option>03</option>
            <option>04</option><option>05</option><option>06</option><option>07</option>
            <option>08</option><option>09</option><option>10</option><option>11</option>
            <option>12</option><option>13</option><option>14</option><option>15</option>
            <option>16</option><option>17</option><option>18</option><option>19</option>
            <option>20</option><option>21</option><option>22</option><option>23</option>
        </select>
        <select class="left_menu_select_time_min">
            <option selected disabled hidden>Минута</option>
            <option>00</option><option>05</option>
            <option>10</option><option>15</option>
            <option>20</option><option>25</option>
            <option>30</option><option>35</option>
            <option>40</option><option>45</option>
            <option>50</option><option>55</option>
        </select>
        <div class="left_menu_text">До</div>
        <select class="left_menu_select_time_hour">
            <option selected disabled hidden>Час</option>
            <option>00</option><option>01</option><option>02</option><option>03</option>
            <option>04</option><option>05</option><option>06</option><option>07</option>
            <option>08</option><option>09</option><option>10</option><option>11</option>
            <option>12</option><option>13</option><option>14</option><option>15</option>
            <option>16</option><option>17</option><option>18</option><option>19</option>
            <option>20</option><option>21</option><option>22</option><option>23</option>
        </select>
        <select class="left_menu_select_time_min">
            <option value="" selected disabled hidden>Минута</option>
            <option>00</option><option>05</option>
            <option>10</option><option>15</option>
            <option>20</option><option>25</option>
            <option>30</option><option>35</option>
            <option>40</option><option>45</option>
            <option>50</option><option>55</option>
        </select>
        <div style="clear: both;"></div>
    </div>
    <button class="left_menu_button button_green" id="left_menu_button">Применить</button>
    <button class="left_menu_button button_grey" id="left_menu_button_reset">Сбросить</button>
    </form>
</div>
<div id="div_table">
</div>
        
<? include ROOT.'/views/layouts/footer.php';?>