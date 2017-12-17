<?php
    require_once 'functions.php';
    if (isAuthorized()) {
        redirect('admin');
    }
    $errors = [];
    if (isPost()) {
        if(login(getParamPost('login'), getParamPost('password'))) {
            redirect('admin');
        }
        if (!empty($_POST['login']) && !isset($_POST['passowrd']))
        {
        	$_SESSION['user']['username'] = $_POST['login'];
        	redirect('list');
        }
        $errors[] = 'Неверный логин или пароль';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Вход</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700&amp;subset=cyrillic,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="wrapper">
		<p><?php foreach ($errors as $error) {
			echo $error;
		} ?></p>
        <h2>Введите имя(логин) и пароль <br>(или  введите только имя, что бы войти как гость)</h2>
		<form action="" method="post">
			<input class="fio" type="text" name="login" placeholder="Введите имя"><br><br>
			<input class="fio" type="password" name="password" placeholder="Введите пароль"><br><br>
			<input class="button" type="submit" value="Войдти">
		</form>
	</div>
</body>
</html>