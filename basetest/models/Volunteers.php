<?php
	
	class Volunteers
	{
		
	    public function getVolunteers($idkart ,$surname, $name, $patronymic, $depart, $mail, $phone, $datetest, $age, $datebirth, $passport, $address, $sort_attribute, $sort){

	    	//Поиск по атрибуту
	    	if (($idkart != "") || ($surname != "") || ($name != "") || ($patronymic != "") || ($depart != "") || ($mail != "") || ($phone != "") || ($datetest != "")  || ($age != "") || ($datebirth != "") || ($passport != "") || ($address != "")){

				$array = array(
				        "Номер_карточки" => $idkart,
				    	"Фамилия" => $surname,
				    	"Имя" => $name,
						"Отчество" => $patronymic,
				    	"отдел`.`Наименование" => $depart,
				    	"Почта" => $mail,
						"Телефон" => $phone,
				    	"тестирование`.`Дата" => $datetest,
				    	"анкета_волонтера`.`Возраст" => $age,
				    	"Дата_рождения" => $datebirth,
				    	"Паспорт" => $passport,
						"Адрес" => $address
				);
				$firstcheck = 0;
				$extra = "WHERE ";

				foreach ($array as $key => $value) {
					if ($value != ""){
						if ($firstcheck == 0){
							$extra .= "`".$key."` = '".$value."' ";
							$firstcheck = 1;
						} else {
							$extra .= "AND `".$key."` = '".$value."' ";
						}
					}
				}
			}

			//Сортировка по атрибуту
	    	if ($sort_attribute != ''){
				
				$sort_array = array(
				        "Номер_карточки" => 'Номеру карточки',
				    	"Фамилия" => 'Фамилии',
				    	"Имя" => 'Имени',
						"Отчество" => 'Отчеству',
				    	"Телефон" => 'Телефону',
				    	"Наименование" => 'Отделу',
						"Почта" => 'Почте',
				    	"Дата" => 'Дате тестирования',
				    	"Возраст" => 'Возрасту',
				    	"Дата_рождения" => 'Дате рождения',
						"Паспорт" => 'Паспорту',
						"Адрес" => 'Адресу',
				);

				$sortbyattribute = "ORDER BY ";

				foreach ($sort_array as $key => $value) {
					if ($sort_attribute == $value){
						$sortbyattribute .= "`".$key."`";
					}
				}
			} else $sort = "ORDER BY `Номер_карточки`";

			if ($sort == 'по убыванию')
				$sort = 'DESC';
			elseif($sort == 'по возрастанию')
				$sort = 'ASC';

		    $db = Db::getConnection();
	    	$volunteers = array();
	    	$result = $db->query("SELECT * FROM `карточка_волонтера`
									left join `отдел` on `карточка_волонтера`.`Код_отдела` = `отдел`.`Код_отдела`
								    left join `список_потенциальных_волонтеров` on `список_потенциальных_волонтеров`.`Номер_анкеты` = `карточка_волонтера`.`Номер_анкеты` 
								    	and `список_потенциальных_волонтеров`.`Код_тестирования` = `карточка_волонтера`.`Код_тестирования`
								    left join `тестирование` on `тестирование`.`Код_тестирования` = `список_потенциальных_волонтеров`.`Код_тестирования`
								    left join `анкета_волонтера` on `анкета_волонтера`.`Номер_анкеты` = `список_потенциальных_волонтеров`.`Номер_анкеты` ".$extra." ".$sortbyattribute." ".$sort." ");

	    	$i = 0;
	    	while ($row = $result->fetch()){
	    		$volunteers[$i]['id'] = $row['Номер_карточки'];
	    		$volunteers[$i]['surname'] = $row['Фамилия'];
	    		$volunteers[$i]['name'] = $row['Имя'];
	    		$volunteers[$i]['patronymic'] = $row['Отчество'];
	    		$volunteers[$i]['depart'] = $row['Наименование'];
	    		$volunteers[$i]['photo'] = $row['Изображение'];
	    		$volunteers[$i]['testresult'] = $row['Результат'];
	    		$volunteers[$i]['testdate'] = $row['Дата'];
	    		$volunteers[$i]['age'] = $row['Возраст'];
	    		$volunteers[$i]['birthday'] = $row['Дата_рождения'];
	    		$volunteers[$i]['passport'] = $row['Паспорт'];	    		
	    		$volunteers[$i]['email'] = $row['Почта'];
	    		$volunteers[$i]['address'] = $row['Адрес'];
	    		$volunteers[$i]['tel'] = $row['Телефон'];
	    		$i++;	    		
	    	}

	    	return $volunteers;
	    }

	    public function getStatements(){

		    $db = Db::getConnection();
		    $statements = array();
	    	$result = $db->query("SELECT * FROM `анкета_волонтера` left join `план_набора` on `анкета_волонтера`.`Код_набора` = `план_набора`.`Код_набора`");

	    	$i = 0;
	    	while ($row = $result->fetch()){
	    		$statements[$i]['id'] = $row['Номер_анкеты'];
	    		$statements[$i]['support'] = $row['Сфера_помощи'];
	    		$statements[$i]['surname'] = $row['Фамилия'];
	    		$statements[$i]['name'] = $row['Имя'];
	    		$statements[$i]['patronymic'] = $row['Отчество'];
	    		$statements[$i]['sex'] = $row['Пол'];
	    		$statements[$i]['birth'] = $row['Дата_рождения'];
	    		$statements[$i]['comment'] = $row['Комментарии'];
	    		$statements[$i]['mail'] = $row['Почта'];
	    		$statements[$i]['address'] = $row['Адрес'];
	    		$statements[$i]['phone'] = $row['Телефон'];
	    		$statements[$i]['city'] = $row['Город'];
	    		$statements[$i]['profession'] = $row['Профессия'];
	    		$statements[$i]['status'] = $row['Статус'];
	    		$i++;	    		
	    	}

	    	return $statements;
	    }



	    public function getVolunteerCard($idVolunteer){

			$db = Db::getConnection();
			$volunteerCard = $db->prepare("SELECT * FROM `карточка_волонтера`
									left join `отдел` on `карточка_волонтера`.`Код_отдела` = `отдел`.`Код_отдела`
								    left join `список_потенциальных_волонтеров` on `список_потенциальных_волонтеров`.`Номер_анкеты` = `карточка_волонтера`.`Номер_анкеты` 
								    	and `список_потенциальных_волонтеров`.`Код_тестирования` = `карточка_волонтера`.`Код_тестирования`
								    left join `тестирование` on `тестирование`.`Код_тестирования` = `список_потенциальных_волонтеров`.`Код_тестирования`
								    left join `анкета_волонтера` on `анкета_волонтера`.`Номер_анкеты` = `список_потенциальных_волонтеров`.`Номер_анкеты` 
								    WHERE `Номер_карточки` = ".$idVolunteer." ");

			$volunteerCard->setFetchMode(PDO::FETCH_ASSOC);
			$volunteerCard->execute();

			$i = 0;
	    	while ($row = $volunteerCard->fetch()){
	    		$volunteers[$i]['id'] = $row['Номер_карточки'];
	    		$volunteers[$i]['idank'] = $row['Номер_анкеты'];
	    		$volunteers[$i]['surname'] = $row['Фамилия'];
	    		$volunteers[$i]['name'] = $row['Имя'];
	    		$volunteers[$i]['patronymic'] = $row['Отчество'];
	    		$volunteers[$i]['depart'] = $row['Наименование'];
	    		$volunteers[$i]['photo'] = $row['Изображение'];
	    		$volunteers[$i]['testresult'] = $row['Результат'];
	    		$volunteers[$i]['testdate'] = $row['Дата'];
	    		$volunteers[$i]['age'] = $row['Возраст'];
	    		$volunteers[$i]['birthday'] = $row['Дата_рождения'];
	    		$volunteers[$i]['passport'] = $row['Паспорт'];	    		
	    		$volunteers[$i]['email'] = $row['Почта'];
	    		$volunteers[$i]['address'] = $row['Адрес'];
	    		$volunteers[$i]['tel'] = $row['Телефон'];
	    		$i++;	    		
	    	}

			return $volunteers;
	    }

	    public function getStatementCard($idStatement){

		    $db = Db::getConnection();
		    $statements = array();
	    	$result = $db->query("SELECT * FROM `анкета_волонтера` left join `план_набора` on `анкета_волонтера`.`Код_набора` = `план_набора`.`Код_набора` where `Номер_анкеты` = ".$idStatement." ");

	    	$i = 0;
	    	while ($row = $result->fetch()){
	    		$statements[$i]['id'] = $row['Номер_анкеты'];
	    		$statements[$i]['support'] = $row['Сфера_помощи'];
	    		$statements[$i]['surname'] = $row['Фамилия'];
	    		$statements[$i]['name'] = $row['Имя'];
	    		$statements[$i]['patronymic'] = $row['Отчество'];
	    		$statements[$i]['sex'] = $row['Пол'];
	    		$statements[$i]['birth'] = $row['Дата_рождения'];
	    		$statements[$i]['comment'] = $row['Комментарии'];
	    		$statements[$i]['mail'] = $row['Почта'];
	    		$statements[$i]['address'] = $row['Адрес'];
	    		$statements[$i]['phone'] = $row['Телефон'];
	    		$statements[$i]['city'] = $row['Город'];
	    		$statements[$i]['profession'] = $row['Професcия'];
	    		$statements[$i]['status'] = $row['Статус'];
	    		$i++;	    		
	    	}

	    	return $statements;
	    }

	    public function EditVolunteer($idkart, $idank, $surname, $name, $patronymic, $phone, $mail, $passport, $datebirth, $depart, $address){

			$db = Db::getConnection();
			
			$edit_volunteer = $db->prepare("UPDATE `анкета_волонтера`
	     									 SET `Фамилия` = ".$surname.", `Имя` = ".$name.", `Отчество` = ".$patronymic.", `Дата_рождения` = ".$datebirth.", `Почта` = ".$mail.", `Адрес` = ".$address.", `Телефон` = ".$phone."
									         WHERE `Номер_анкеты` = ".$idank."
									        ");
	        
	        $edit_volunteer->execute();
			
	        $edit_volunteer = $db->prepare("UPDATE `карточка_волонтера`
									         SET `Паспорт` = ".$passport."
									         WHERE `Номер_карточки` = ".$idkart."
									        ");

	        $edit_volunteer->execute();

			return true;
	    }


	}