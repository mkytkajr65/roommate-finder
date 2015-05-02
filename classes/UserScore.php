<?php

class UserScore
{
	public $score, $id;
	public function __construct($id, $score)
	{
		$this->id = $id;
		$this->score = $score;
	}
}

?>