<?php

namespace App\controllers;


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
		dd($params);
	}
}
