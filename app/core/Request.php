<?php

namespace App\core;

class Request
{
	public static function input(string $name)
	{
		return $_POST[$name] ?? null;
	}

	public static function all()
	{
		return $_POST;
	}

	public static function only(string|array $only)
	{
		$fieldsPost = self::all();
		$fieldsPostKeys = array_keys($fieldsPost);

        $arr = [];
		foreach ($fieldsPostKeys as $index => $value) {
            $onlyField = (is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null));

            if (isset($fieldsPost[$onlyField])) {
                $arr[$onlyField] = $fieldsPost[$onlyField];
            }
		}
		return $arr;
	}

    public static function excepts(string|array $exepts)
    {
        $fieldsPost = self::all();

        if (is_array($exepts)) {
            foreach ($exepts as $index => $value) {
                unset($fieldsPost[$value]);
            }
        }

        if (is_string($exepts)) {
            unset($fieldsPost[$exepts]);
        }

        return $fieldsPost;
    }

    public static function query($name)
    {
        if (!isset($_GET[$name])) {
            throw new \Exception("Não existe a query string {$name}");
        }

        return $_GET[$name];
    }

    public static function toJoson(array $data)
    {
        return json_encode($data);
    }

    public static function toArray($data)
    {
        json_decode($data);

        if (isJson($data)) {
            return json_decode($data);
        }
    }
}
