<?php

namespace App\controllers;

use App\database\models\User;

class HomeController extends Controller
{
	public function index()
	{
		$user = new User;
		$user->fetch();
		$this->view('home', [
			'name' => 'Página Home',
			'title' => 'pag. home'
		]);
	}
}
