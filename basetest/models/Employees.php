<?php 

	class Employees
	{
	    public function getEmployees($surname, $name, $patronymic, $position, $phone, $depart, $passport, $mail, $address, $datebirth){

		    	//Поиск по атрибуту
		    	if (($surname != "") || ($name != "") || ($patronymic != "") || ($position != "") || ($phone != "") || ($depart != "") || ($passport != "") || ($mail != "") || ($address != "") || ($datebirth != "")){

					$array = array(
					    	"Фамилия" => $surname,
					    	"Имя" => $name,
							"Отчество" => $patronymic,
					    	"должность`.`Наименование" => $position,
							"Телефон" => $phone,
					    	"Почта" => $mail,
					    	"отдел`.`Наименование" => $depart,
					    	"Паспорт" => $passport,
							"Адрес" => $address,
					    	"Дата_рождения" => $datebirth
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

			    $db = Db::getConnection();

		    	$employees = array();

		    	$result = $db->query("SELECT `Номер_сотрудника`, `Фамилия`, `Имя`, `Отчество`, `Паспорт`, `должность`.`Наименование` AS `Должность`, `отдел`.`Наименование` AS `Отдел`, `Телефон`, `Почта`, `Адрес`, `Дата_рождения` FROM `сотрудники` 
		    							right join `должность` on `должность`.`Код_должности` = `сотрудники`.`Код_должности` 
		    							right join `отдел` on `отдел`.`Код_отдела` = `сотрудники`.`Код_отдела` ".$extra." ");

		    	$i = 0;
		    	while ($row = $result->fetch()){
		    		$employees[$i]['id'] = $row['Номер_сотрудника'];
		    		$employees[$i]['surname'] = $row['Фамилия'];
		    		$employees[$i]['name'] = $row['Имя'];
		    		$employees[$i]['patronymic'] = $row['Отчество'];
		    		$employees[$i]['passport'] = $row['Паспорт'];
		    		$employees[$i]['position'] = $row['Должность'];
		    		$employees[$i]['depart'] = $row['Отдел'];
		    		$employees[$i]['tel'] = $row['Телефон'];
		    		$employees[$i]['email'] = $row['Почта'];
		    		$employees[$i]['address'] = $row['Адрес'];
		    		$employees[$i]['birthday'] = $row['Дата_рождения'];
		    		$i++;	    		
		    	}

		    	return $employees;
		    }
	}
?>