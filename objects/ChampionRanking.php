<?php

class ChampionRanking
{

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function setPlayed($level, $value)
	{
		switch ($level)
		{
			case 7:
				$this->challenger	 = $value;
				break;
			case 6:
				$this->master		 = $value;
				break;
			case 5:
				$this->diamond		 = $value;
				break;
			case 4:
				$this->platinum		 = $value;
				break;
			case 3:
				$this->gold			 = $value;
				break;
			case 2:
				$this->silver		 = $value;
				break;
			case 1:
				$this->bronze		 = $value;
				break;
			case 0:
			default:
				$this->unranked		 = $value;
				break;
		}
	}

	public $id			 = 0;
	public $unranked	 = 0;
	public $bronze		 = 0;
	public $silver		 = 0;
	public $gold		 = 0;
	public $platinum	 = 0;
	public $diamond		 = 0;
	public $master		 = 0;
	public $challenger	 = 0;

}
