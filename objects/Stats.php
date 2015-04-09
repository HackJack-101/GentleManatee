<?php

class Stats
{

	public $minValues;
	public $maxValues;
	public $counters;

	public function __construct()
	{
		$this->minValues = array();
		$this->maxValues = array();
		$this->counters	 = array();
	}

	public function setMax($key, $value)
	{
		if (!isset($this->maxValues[$key]))
			$this->maxValues[$key]	 = $value;
		elseif ($this->maxValues[$key] < $value)
			$this->maxValues[$key]	 = $value;
	}

	public function setMin($key, $value)
	{
		if (!isset($this->minValues[$key]))
			$this->minValues[$key]	 = $value;
		elseif ($this->minValues[$key] > $value)
			$this->minValues[$key]	 = $value;
	}

	public function count($key, $value)
	{
		if (!isset($this->counters[$key]))
			$this->counters[$key] = $value;
		else
			$this->counters[$key] += $value;
	}

}
