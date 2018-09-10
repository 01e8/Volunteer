<?php
$params = array(
        'host' => 'localhost',
        'dbname' => 'host1463471_por2018test',
        'user' => 'host1463471_kam',
        'password' => '9TNgnxj5',
        );
$dsn = "mysql:dbname={$params['dbname']};host={$params['host']}";
$user = $params['user'];
$password = $params['password'];

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$anketa_select_support = $pdo->prepare("SELECT `Код_набора`, `Сфера_помощи` FROM `план_набора`");

$anketa_select_support->setFetchMode(PDO::FETCH_ASSOC);
$anketa_select_support->execute();

$support = array();
$i = 0;
while ($row = $anketa_select_support->fetch()){
    $support[$i]['id'] = $row['Код_набора'];
    $support[$i]['name'] = $row['Сфера_помощи'];
    $i++;               
}

?>

<!DOCTYPE html>
<html lang="ru">
  
    <head>
        <title>Анкета POR 2018</title>
        <link rel="shortcut icon" href="icon/ico.ico">
        <meta charset="utf-8">
        <meta name="author" Content="DKP-152p">
        <meta name="copyright" Content="DKP-152p"> 
        <meta name="keywords" content="POR">
        <meta name=viewport content="width=device-width, user-scalable=yes">
        <meta property="og:type" content="website" /> 
        <meta property="og:title" content="POR 2018" /> 
        <meta property="og:description" content="" /> 
        <meta property="og:image" content="" />

        <script type="text/javascript" src="jquery.min.js"></script>
        <link rel="stylesheet" href="style/style.css" />
        
    </head>
   
    <body>
        <div id="mess_shadow"></div>
        <div id="messagee">
            <div id="mess_text">Сообщение</div>
            <div id="mess_button">OK</div>
        </div>
        <div id="main">
            <div id="header">
                <f1>Заполни анкету</f1><br>
                <f2>Cтань волонтером</f2><br>
                <f3>"Прививки от равнодушия"</f3>
            </div>
            <div id="anketa_div">
                <form action="" method="POST" id="anketa_form">
                    <div class="anketa_cell">
                        <div id="anketa_text">ФИО</div>
                        <input type="text" class="anketa_input mandat" name="surname" id="surname" placeholder="Фамилия"><br>
                        <input type="text" class="anketa_input mandat" name="name" id="name" placeholder="Имя"><br>
                        <input type="text" class="anketa_input mandat" name="patronymic" id="patronymic" placeholder="Отчество">
                    </div>
                    
                    <div class="anketa_cell">
                        <div id="anketa_text">Контактные данные</div>
                        <input type="text" class="anketa_input mandat" name="city" id="city" placeholder="Город"><br>
                        <input type="tel" class="anketa_input mandat" name="phone" id="phone" placeholder="Телефон"><br>
                        <input type="email" class="anketa_input mandat" name="mail" id="mail" placeholder="e-mail">
                    </div>
                    
                    <div class="anketa_cell_big">
                        <div id="anketa_text">Адрес</div>
                        <input type="text" placeholder="" class="anketa_input_big" name="adress" id="adress">
                    </div>
                    
                                        
                    <div class="anketa_cell">
                        <div id="anketa_text">Дата рождения</div>
                        <input type="date" class="anketa_input mandat" name="datebirth" id="datebirth">
                        <div id="anketa_text">Пол</div>
                        <select class="anketa_select mandat" name="anketa_select_sex" id="anketa_select_sex">
                            <option selected disabled hidden></option>
                            <option value="М" >М</option>
                            <option value="Ж" >Ж</option>
                        </select>
                    </div>
                    
                    <div class="anketa_cell">
                        <div id="anketa_text">Профессия</div>
                        <select class="anketa_select mandat" name="anketa_select_profession" id="anketa_select_profession">
                            <option selected disabled hidden></option>
                            <option>Студент/Школьник</option>
                            <option>Водитель</option>
                            <option>Зоопсихолог</option>
                            <option>Рекламщик/PR-менеджер</option>
                            <option>Дизайнер/Художник</option>
                            <option>Кинолог/Дрессировщик</option>
                            <option>Педагог</option>
                            <option>Фотограф</option>
                            <option>Врач/Ветеринар</option>
                            <option>Строитель</option>
                            <option>Юрист</option>
                            <option>Другая</option>
                        </select>
                        <input type="text" class="anketa_input" name="profession" id="profession">
                    </div>
                    
                    <div class="anketa_cell_big">
                        <div id="anketa_text">В какой сфере могли бы оказать помощь</div>
                        <select class="anketa_select_big mandat" name="anketa_select_support" id="anketa_select_support">
                            <option selected disabled hidden></option>
                            <?foreach($support as $value):?>
                                <option value="<?=$value['id']?>"><?=$value['name']?></option>
                            <?endforeach;?>
                        </select>
                    </div>
                    
                    <div class="anketa_cell_big">
                        <div id="anketa_text">Ваши предложения, комментарии</div>
                        <textarea name="comment"></textarea>
                    </div>
                    <div class="anketa_cell">
                        
                    </div>
                    <div class="anketa_cell">
                        
                        <div class="g-recaptcha" data-sitekey="6Lf5S1gUAAAAALIiK1UPk1H9jcjcdEn_VTlaKP7a"></div>
                        <button type="submit" id="anketa_button">Отправить</button>
                    </div>
                    <div style="clear: both;"></div>
                </form>
            </div>
        </div>
    </body>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="script.js"></script>
</html>