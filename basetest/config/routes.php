<?php

	return array(

		'volunteer/statement/getStatementCard=([0-9]+)' => 'volunteer/getStatementCard/$1',
		'volunteer/getVolunteerCard=([0-9]+)/update' => 'volunteer/getVolunteerCard/$1/1',
		'volunteer/getVolunteerCard=([0-9]+)' => 'volunteer/getVolunteerCard/$1',

		'volunteer/getStatements' => 'volunteer/getStatements',
		'volunteer/getVolunteers' => 'volunteer/getVolunteers',

		'volunteer/statement' => 'volunteer/statement',
		'volunteer' => 'volunteer/index',
		'' => 'site/index',
	);