<?php $this->layout('master', ['title' => 'User Profile']) ?>

<h1>User Profile</h1>

<form action="/user/update/12" method="post">
	<input type="text" name="firstName" value="Stanley">
	<input type="text" name="lastName" value="Wodson">
	<input type="text" name="email" value="stanleypt@outlook.com">
	<input type="password" name="password" value="12345678">
	<button type="submit">Atualizar</button>
</form>