<?php
require_once "recaptchalib.php";
//секретный ключ
$secret = "6Lf5S1gUAAAAAK5xiV95NjSwmRNZS3CYv_tuD_S2";
//ответ
$response = null;
//проверка секретного ключа
$reCaptcha = new ReCaptcha($secret);
 
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


if (!empty($_POST)) {
 
    //Валидация $_POST['name'] и $_POST['email']
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
 
    if ($response != null && $response->success) {
        //Обработка формы и запись в БД
        
        
        echo "".$_POST["name"].", мы получили вашу анкету!<br> Уже скоро мы с вами свяжемся :)";

        $support = $_POST['anketa_select_support'];
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $patronymic = $_POST['patronymic'];
        $sex = $_POST['anketa_select_sex'];
        $datebirth = $_POST['datebirth'];
        $comment = $_POST['comment'];
        $mail = $_POST['mail'];
        $adress = $_POST['adress'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $proffession = $_POST['anketa_select_profession'];
        if($_POST['anketa_select_profession'] == 'Другая')
            $proffession = $_POST['profession'];

        $insert_statement = $pdo->prepare(
        "INSERT INTO `анкета_волонтера` (`Код_набора`, `Фамилия`, `Имя`, `Отчество`, `Пол`, `Дата_рождения`, `Комментарии`, `Почта`, `Адрес`, `Телефон`, `Город`, `Професcия`) 
            VALUES (".$support.", '".$surname."', '".$name."', '".$patronymic."', '".$sex."', '".$datebirth."', '".$comment."', '".$mail."', '".$adress."', '".$phone."', '".$city."', '".$proffession."')
        ");

        $insert_statement->execute();

    } else {
        echo "Проверка на робота <br>не пройдена";
    }
}
?>