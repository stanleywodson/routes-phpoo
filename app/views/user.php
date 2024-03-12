<?php $this->layout('master', ['title' => 'User Profile']) ?>

<?php $this->start('css') ?>
<link rel="stylesheet" href="/css/styles.css">
<?php $this->stop() ?>

<h1>User Profile</h1>
<p>Hello, <?= $this->e($name) ?></p>

<?php $this->start('js') ?>
<script>
	alert('Hello, <?= $this->e($name) ?>');
</script>
<?php $this->stop() ?>