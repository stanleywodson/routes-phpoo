<?php

namespace App\database;

use PDO;

class Connnection
{
	private static $connection = null;

	public static function connect()
	{
		if (!self::$connection) {
			self::$connection = new PDO(
				"mysql:host=localhost;dbname=rotasphpoo",
				"wsl_root",
				"password",
				[
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
				]
			);
		}

		return self::$connection;
	}
}
