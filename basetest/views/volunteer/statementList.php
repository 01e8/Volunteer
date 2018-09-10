<table>
    <tr style="background-color: #e5e5e5;">
        <td>АВ</td>
        <td>№ Анкеты</td>
        <?
            if (isset($_POST['check_surname'])) {echo "<td>Фамилия</td>";}
            if (isset($_POST['check_name'])) {echo "<td>Имя</td>";}
            if (isset($_POST['check_patronymic'])) {echo "<td>Отчество</td>";}
            if (isset($_POST['check_type_assistance'])) {echo "<td>Вид помощи</td>";}
            if (isset($_POST['check_male'])) {echo "<td>Пол</td>";}
            if (isset($_POST['check_mail'])) {echo "<td>Почта</td>";}
            if (isset($_POST['check_phone'])) {echo "<td>Телефон</td>";}
            if (isset($_POST['check_datebirth'])) {echo "<td>Дата рождения</td>";}
            if (isset($_POST['check_address'])) {echo "<td>Адрес</td>";}
            if (isset($_POST['check_status'])) {echo "<td>Cтатус</td>";}
        ?>
    </tr>
    <?foreach($statementList as $statements):?>
    <tr>
        <?
            echo"<td><img class='AC_img' id='ka".$statements['id']."' src='/template/img/C_max.png'></td>";
            echo"<td align='right'>".$statements['id']."</td>";
            if (isset($_POST['check_surname'])) {echo "<td>".$statements['surname']."</td>";}
            if (isset($_POST['check_name'])) {echo "<td>".$statements['name']."</td>";}
            if (isset($_POST['check_patronymic'])) {echo "<td>".$statements['patronymic']."</td>";}
            if (isset($_POST['check_type_assistance'])) {echo "<td>".$statements['support']."</td>";}
            if (isset($_POST['check_male'])) {echo "<td>".$statements['sex']."</td>";}
            if (isset($_POST['check_mail'])) {echo "<td align='right'>".$statements['mail']."</td>";}
            if (isset($_POST['check_phone'])) {echo "<td align='right'>".$statements['phone']."</td>";}
            if (isset($_POST['check_datebirth'])) {echo "<td align='right'>".$statements['birth']."</td>";}
            if (isset($_POST['check_address'])) {echo "<td align='right'>".$statements['address']."</td>";}
            if (isset($_POST['check_status'])) {echo "<td align='right'>".$statements['status']."</td>";}
        ?>
    </tr>
    <?endforeach;?>
</table>