<?php

namespace App\database\models;

use App\database\Connnection;

class User
{
public function fetch()
{
	$connection = Connnection::connect();
	dd($connection);
}
}
