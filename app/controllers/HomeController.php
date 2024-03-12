<?php

namespace App\controllers;

class HomeController extends Controller
{
	public function index()
	{
		$this->view('home', [
			'name' => 'Página Home',
			'title' => 'pag. home'
		]);
	}
}
