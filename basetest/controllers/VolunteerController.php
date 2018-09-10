<?php
	
	class VolunteerController
	{
	    public function actionIndex(){

	    	require_once(ROOT.'/views/volunteer/index.php');

	    	return true;
	    }

	    public function actionStatement(){


	    	require_once(ROOT.'/views/volunteer/statement.php');

	    	return true;
	    }

	    public function actionGetVolunteers(){

            $idkart = $_POST['idkart'];
	     	$surname = $_POST['surname'];
	    	$name = $_POST['name'];
	    	$patronymic = $_POST['patronymic'];
	    	$depart = $_POST['depart'];
	    	$mail = $_POST['mail'];
	    	$phone = $_POST['phone'];
	    	$datetest = $_POST['datetest'];
	    	$age = $_POST['age'];
	    	$datebirth = $_POST['datebirth'];
	    	$passport = $_POST['passport'];
	    	$address = $_POST['address'];

	    	$sort_attribute = $_POST['sort_attribute'];
	    	$sort = $_POST['sort'];

	    	$volunteersList = Volunteers::getVolunteers($idkart, $surname, $name, $patronymic, $depart, $mail, $phone, $datetest, $age, $datebirth, $passport, $address, $sort_attribute, $sort);

	    	require_once(ROOT.'/views/volunteer/volunteersList.php');

	    	return true;
	    }

	    public function actionGetStatements(){

	    	$statementList = Volunteers::getStatements();

	    	require_once(ROOT.'/views/volunteer/statementList.php');

	    	return true;
	    }

	    public function actionGetVolunteerCard($idVolunteer, $update = 0){

	    	$volunteer = Volunteers::getVolunteerCard($idVolunteer);

	    	$idank = $volunteer[0]['idank'];
	     	$surname = $_POST['volcard_input_surname'];
	    	$name = $_POST['volcard_input_name'];
	    	$patronymic = $_POST['volcard_input_patronymic'];
	    	$phone = $_POST['volcard_input_tel'];
	    	$mail = $_POST['volcard_input_email'];
	    	$passport = $_POST['volcard_input_passport'];
	    	$depart = '';//Добавить Отдел
	    	$datebirth = $_POST['volcard_input_birthday'];
	    	$address = $_POST['volcard_input_address'];

	    	if ($update == 1) {
	    		Volunteers::EditVolunteer($idVolunteer, $idank, $surname, $name, $patronymic, $phone, $mail, $passport, $datebirth, $depart, $address);
	    	}

	    	require_once(ROOT.'/views/volunteer/volunteerCard.php');

	    	return true;
	    }

	    public function actionGetStatementCard($idStatement){

	    	$volunteer = Volunteers::getStatementCard($idStatement);

	    	require_once(ROOT.'/views/volunteer/statementCard.php');

	    	return true;
	    }

	}