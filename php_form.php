<?php
	class User 
	{
		protected $pib;
		protected $yob;

		function __construct($pib, $yob)
		{
			$this->pib = $pib;
			$this->yob = $yob;
		}

		function getPIB()
		{
			echo ("ПIБ: $this->pib</br>");
		}

		function getYOB()
		{
			echo ("Рік народження: $this->yob</br>");
		}

		
	}

	class Student extends User
	{
		private $group;
		private $email;

		function __construct($pib, $yob, $group, $email)
		{
			parent::__construct($pib, $yob);
			$this->group = $group;
			$this->email = $email;
		}

		function getGROUP()
		{
			echo ("Група: $this->group</br>");
		}

		

		function getEMAIL()
		{
			echo ("Email: $this->email");
		}
	}

	$person = $_POST['PIB'];
	$yob = $_POST['YEAR'];
	$group = $_POST['GROUP'];

	$email = $_POST['EMAIL'];

	if($person == '')
	{
		echo 'Поле ПІБ не може бути пустим';
		return;
	}

	if($group == '')
	{
		echo 'Поле Група не може бути пустим';
		return;
	}

	if($yob == '')
	{
		echo 'Поле Рік народження не може бути пустим';
		return;
	}

	if($yob <=1960 || $yob >= 2005)
	{
		echo 'Недопустимий рік народження</br> Інтервал: 1960-2004';
		return;
	}


	if($email == '')
	{
		echo 'Поле Email не може бути пустим';
		return;
	}

	else {
		echo 'Дані збережено: </br>';
	    $obj = new Student($person, $yob, $group, $email);
		$obj->getPIB();
		$obj->getYOB();
		$obj->getGROUP();
		$obj->getEMAIL();
	}
?>