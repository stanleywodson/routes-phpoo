<?php

namespace App\controllers;

use App\core\Request;

class UserController extends Controller
{
	public function index()
	{
		echo 'UserController';
	}

	public function show($params = "")
	{
		$this->view('user', ['name' => 'Wodson Stanley']);	
	}

	public function edit($params = "")
	{
		$this->view('user', ['title' => 'Edit User']);	
	}

	public function update($params)
	{
		$stanley = Request::only(['password', 'lastName']);

		dd($stanley);
	}
}
