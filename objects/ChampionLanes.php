<?php

class ChampionLanes
{

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function setLane($lane, $value)
	{
		switch ($lane)
		{
			case 8:
				$this->jungleWon += $value;
				break;
			case 4:
				$this->jungleLost += $value;
				break;
			case 7:
				$this->bottomWon += $value;
				break;
			case 3:
				$this->bottomLost += $value;
				break;
			case 6:
				$this->topWon += $value;
				break;
			case 2:
				$this->topLost += $value;
				break;
			case 5:
				$this->midWon += $value;
				break;
			case 1:
			case 0:
			default:
				$this->midLost += $value;
				break;
		}
		$this->total += $value;
	}

	public $id			 = 0;
	public $total		 = 0;
	public $midWon		 = 0;
	public $topWon		 = 0;
	public $bottomWon	 = 0;
	public $jungleWon	 = 0;
	public $midLost		 = 0;
	public $topLost		 = 0;
	public $bottomLost	 = 0;
	public $jungleLost	 = 0;

}
