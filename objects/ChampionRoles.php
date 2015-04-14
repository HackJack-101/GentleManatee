<?php

class ChampionRoles
{

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function setRole($role, $value)
	{
		switch ($role)
		{
			case 5:
				$this->duoSupport	 = $value;
				break;
			case 4:
				$this->duoCarry		 = $value;
				break;
			case 3:
				$this->solo			 = $value;
				break;
			case 2:
				$this->none			 = $value;
				break;
			case 1:
			case 0:
			default:
				$this->duo			 = $value;
				break;
		}
		$this->total += $value;
	}

	public $id			 = 0;
	public $total		 = 0;
	public $duoSupport	 = 0;
	public $duoCarry	 = 0;
	public $duo			 = 0;
	public $solo		 = 0;
	public $none		 = 0;

}

