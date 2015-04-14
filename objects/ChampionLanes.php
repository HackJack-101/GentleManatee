<?php

class ChampionLanes
{

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function setLanes($level, $value)
	{
		switch ($level)
		{
			case 4:
				$this->jungle	 = $value;
				break;
			case 3:
				$this->bottom	 = $value;
				break;
			case 2:
				$this->top		 = $value;
				break;
			case 1:
			case 0:
			default:
				$this->mid		 = $value;
				break;
		}
		$this->total += $value;
	}

	public $id		 = 0;
	public $total	 = 0;
	public $mid		 = 0;
	public $top		 = 0;
	public $bot		 = 0;
	public $jungle	 = 0;

}
