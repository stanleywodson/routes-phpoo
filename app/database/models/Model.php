<?php

namespace App\database\models;

use App\database\Filters;
use PDOException;

abstract class Model
{
	private string $filds = '*';
	private string $filters = '';

	public function setFilds($filds)
	{
		$this->filds = $filds;
	}

	public function setFilters(Filters $filters)
	{
		$this->filters = $filters->dump();
	}

	public function findAll()
	{
		try {
			$sql = "SELECT $this->filds FROM $this->table $this->filters"; 
			dd($sql);
		}catch (PDOException $e) {
			dd($e->getMessage());
		}
	}
}
