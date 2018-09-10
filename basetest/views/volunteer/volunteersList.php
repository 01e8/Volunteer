<table>
    <tr style="background-color: #e5e5e5;">
        <td>КВ</td>
        <td>№ Карточки</td>
        <?
            if (isset($_POST['check_surname'])) {echo "<td>Фамилия</td>";}
            if (isset($_POST['check_name'])) {echo "<td>Имя</td>";}
            if (isset($_POST['check_patronymic'])) {echo "<td>Отчество</td>";}
            if (isset($_POST['check_depart'])) {echo "<td>Отдел</td>";}
            if (isset($_POST['check_mail'])) {echo "<td>Почта</td>";}
            if (isset($_POST['check_phone'])) {echo "<td>Телефон</td>";}
            if (isset($_POST['check_datatest'])) {echo "<td>Дата тестирования</td>";}
            if (isset($_POST['check_age'])) {echo "<td>Возраст</td>";}
            if (isset($_POST['check_datebirth'])) {echo "<td>Дата рождения</td>";}
            if (isset($_POST['check_passport'])) {echo "<td>Паспорт</td>";}
            if (isset($_POST['check_address'])) {echo "<td>Адрес</td>";}
        ?>
    </tr>
    <?foreach($volunteersList as $volunteers):?>
    <tr>
        <?
            echo"<td><img class='VC_img' id='kv".$volunteers['id']."' src='/template/img/C_max.png'></td>";
            echo"<td align='right'>".$volunteers['id']."</td>";
            if (isset($_POST['check_surname'])) {echo "<td>".$volunteers['surname']."</td>";}
            if (isset($_POST['check_name'])) {echo "<td>".$volunteers['name']."</td>";}
            if (isset($_POST['check_patronymic'])) {echo "<td>".$volunteers['patronymic']."</td>";}
            if (isset($_POST['check_depart'])) {echo "<td>".$volunteers['depart']."</td>";}
            if (isset($_POST['check_mail'])) {echo "<td>".$volunteers['email']."</td>";}
            if (isset($_POST['check_phone'])) {echo "<td align='right'>".$volunteers['tel']."</td>";}
            if (isset($_POST['check_datatest'])) {echo "<td align='right'>".$volunteers['testdate']."</td>";}
            if (isset($_POST['check_age'])) {echo "<td align='right'>".$volunteers['age']."</td>";}
            if (isset($_POST['check_datebirth'])) {echo "<td align='right'>".$volunteers['birthday']."</td>";}
            if (isset($_POST['check_passport'])) {echo "<td align='right'>".$volunteers['passport']."</td>";}
            if (isset($_POST['check_address'])) {echo "<td>".$volunteers['address']."</td>";}
        ?>
    </tr>
    <?endforeach;?>
</table>