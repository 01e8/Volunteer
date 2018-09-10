<div id="volcard_head" class="card_head">
    <div id="volcard_head_text" class="card_head_text">Карточка волонтера № <?echo $volunteer[0]['id'];?></div>
    <div id="volcard_head_exit" class="card_head_exit"><img class="card_head_exit_img" src="/template/img/krest.png"></div>
</div>
<form action="" method="POST" id="volcard_form">
<div class="main_col_with_padding">
    <div class="col_1_of_3">
        <div class="col_1_of_1">
            <div class="card_cell">
                <div id="profile_photo" class="round">
                    <img id="profile_photo_img" src="<?
                    if (isset($volunteer[0]['photo'])){
                        echo 'data:image/jpeg;base64,'.base64_encode($volunteer[0]['photo']);
                    }else{
                        echo "/template/img/avatar_default.jpg";
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col_2_of_3">
        <div class="col_1_of_2">
            <div class="card_cell">
                <div class="card_atr">Фамилия</div>
                <div class="card_val"><?echo $volunteer[0]['surname'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_surname" id="volcard_input_surname" value="<?echo $volunteer[0]['surname'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Имя</div>
                <div class="card_val"><?echo $volunteer[0]['name'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_name" id="volcard_input_name" value="<?echo $volunteer[0]['name'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Отчество</div>
                <div class="card_val"><?echo $volunteer[0]['patronymic'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_patronymic" id="volcard_input_patronymic" value="<?echo $volunteer[0]['patronymic'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Телефон</div>
                <div class="card_val"><?echo $volunteer[0]['tel'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_tel" id="volcard_input_tel" value="<?echo $volunteer[0]['tel'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Почта</div>
                <div class="card_val"><?echo $volunteer[0]['email'];?></div>
                <input type="email" class="card_input disp_none" name="volcard_input_email" id="volcard_input_email" value="<?echo $volunteer[0]['email'];?>">
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="col_1_of_2">
            <div class="card_cell">
                <div class="card_atr">№ Карты</div>
                <div class="card_val"><?echo $volunteer[0]['id'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_id" id="volcard_input_id" value="<?echo $volunteer[0]['id'];?>" disabled>
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Паспорт</div>
                <div class="card_val"><?echo $volunteer[0]['passport'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_passport" id="volcard_input_passport" value="<?echo $volunteer[0]['passport'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Возраст</div>
                <div class="card_val"><?echo $volunteer[0]['age'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_age" id="volcard_input_age" value="<?echo $volunteer[0]['age'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Дата рожд.</div>
                <div class="card_val"><?echo $volunteer[0]['birthday'];?></div>
                <input type="date" class="card_input card_input_date disp_none" name="volcard_input_birthday" id="volcard_input_birthday" value="<?echo $volunteer[0]['birthday'];?>">
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="col_1_of_1">
            <div class="card_cell">
                <div class="card_atr">Отдел</div>
                <div class="card_val"><?echo $volunteer[0]['depart'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_depart" id="volcard_input_depart" value="<?echo $volunteer[0]['depart'];?>">
                <div style="clear: both;"></div>
            </div>
            <div class="card_cell">
                <div class="card_atr">Адрес</div>
                <div class="card_val"><?echo $volunteer[0]['address'];?></div>
                <input type="text" class="card_input disp_none" name="volcard_input_address" id="volcard_input_address" value="<?echo $volunteer[0]['address'];?>">
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
</div>
</form>
<div id="volcard_bottom" class="card_bottom">
    <div id="volcard_bottom_exit" class="card_bottom_button button_red">Закрыть</div>
    <div id="volcard_bottom_edit" class="card_bottom_button button_grey">Редактировать</div>
    <div id="volcard_bottom_save" class="card_bottom_button button_green disp_none">Сохранить</div>
</div>
<div style="clear: both;"></div>