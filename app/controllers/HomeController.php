<?php

namespace App\controllers;

use App\database\Filters;
use App\database\models\User;

class HomeController extends Controller
{
	public function index()
	{
		$filters = new Filters;
		$filters->where('id', '=', [1,23,44]);
		$filters->dump();
		$this->view('home', [
			'name' => 'Página Home',
			'title' => 'pag. home'
		]);
	}
}
