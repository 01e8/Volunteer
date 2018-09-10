<div class="card_head">
    <div id="ankcard_head_text" class="card_head_text">Анкета № <?echo $volunteer[0]['id'];?></div>
    <div id="ankcard_head_exit" class="card_head_exit"><img id="ankcard_head_exit_img" class="card_head_exit_img" src="/template/img/krest.png"></div>
</div>
<div class="main_col_with_padding">
    <div class="col_1_of_2">
        <div class="card_cell">
            <div class="card_atr">Фамилия</div>
            <div class="card_val"><?echo $volunteer[0]['surname'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Имя</div>
            <div class="card_val"><?echo $volunteer[0]['name'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Отчество</div>
            <div class="card_val"><?echo $volunteer[0]['patronymic'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Телефон</div>
            <div class="card_val"><?echo $volunteer[0]['phone'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Почта</div>
            <div class="card_val"><?echo $volunteer[0]['mail'];?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <div class="col_1_of_2">
        <div class="card_cell">
            <div class="card_atr">№ Анкеты</div>
            <div class="card_val"><?echo $volunteer[0]['id'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Профессия</div>
            <div class="card_val"><?echo $volunteer[0]['profession'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Пол</div>
            <div class="card_val"><?echo $volunteer[0]['sex'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Город</div>
            <div class="card_val"><?echo $volunteer[0]['city'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Дата рожд.</div>
            <div class="card_val"><?echo $volunteer[0]['birth'];?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <div class="col_1_of_1">
        <div class="card_cell">
            <div class="card_atr">Помощь</div>
            <div class="card_val"><?echo $volunteer[0]['support'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Адрес</div>
            <div class="card_val"><?echo $volunteer[0]['address'];?></div>
            <div style="clear: both;"></div>
        </div>
        <div class="card_cell">
            <div class="card_atr">Коммент.</div>
            <div class="card_val"><?echo $volunteer[0]['comment'];?></div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>
<div id="ankcard_bottom" class="card_bottom">
    <div id="ankcard_bottom_exit" class="card_bottom_button button_red">Закрыть</div>
    <div id="ankcard_bottom_create" class="card_bottom_button button_green">Создать карточку</div>
</div>
<div style="clear: both;"></div>