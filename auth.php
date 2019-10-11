<?php
require "config.php";

$login = isset($_REQUEST['login']) ? $_REQUEST['login'] : ''; //проверка на наличие пустой строки. 
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
$doGo = isset($_REQUEST['doGo']); //проверка на нажатие кнопки.

$user_login ='';
    if ($doGo){
        $query = $pdo-> prepare("SELECT * FROM test where name = ? and password = ?");
        $query -> execute([$login, $password]);

    if ($query -> rowCount());
        $user_login = $login;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
    input{
        margin:10px;
    }
    </style>

</head>
<body>
    <div class="container">
        <h2>Авторизация</h2>

        <?php if($user_login): ?>
            Доступ открыт <?=$login?>
        <?php else: ?>

            <?php if ($doGo) echo 'введите данные.'?>
            <form method="post">
                <input type="text" name="login" class="form-control" value ="<?=$login?>">
                <input type="password" name="password" class="form-control" value ="<?=$password?>">
                <input type="submit" name="doGo" value="Зарегистрироваться" class="btn btn-info">
            </form>
        <?php endif ?>
    </div>
</body>
</html>