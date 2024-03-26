<?php

namespace App\database;

class Filters
{
	private array $filters = [];

	public function where(string $field, string $operator, mixed $value, string $logic = '')
	{
		$formatter = '';

		if (is_array($value)) {
			$formatter = "('" . implode("','", $value) . "')";
		} else if (is_string($value)) {
			$formatter = "'$value'";
		} else if (is_bool($value)) {
			$formatter = $value ? 1 : 0;
		} else {
			$formatter = $value;
		}

		$formatter = strip_tags($formatter);

		$this->filters['where'][] = "$field $operator $formatter $logic";
	}

	public function orderBy(string $field, string $order)
	{
		$this->filters['order'] = "ORDER BY $field $order";
	}

	public function limit(int $limit)
	{
		$this->filters['limit'] = "LIMIT $limit";
	}

	public function dump()
	{
		$filter = !empty($this->filters['where']) ? ' WHERE ' . implode(' ', $this->filters['where']) : '';
		$filter .= $this->filters['order'] ?? '';
		$filter .= $this->filters['limit'] ?? '';
		return $filter;
	}
}
