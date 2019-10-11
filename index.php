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

    <?php
    include ('config.php');
    ?>

    <div class="container">
    <h1>Регистрация</h1>
        <?php if (!isset($_REQUEST['doGo'])) {?>
            <form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
                <input type="text" name="login" class="form-control" required>
                <input type="email" name="email" class="form-control" required>
                <input type="password" name="password" class="form-control" required>
                <input type="submit" name="doGo" value="Зарегистрироваться" class="btn btn-info">
                <a href="/auth.php" class="btn btn-success">Авторизация</a>
            </form>
    </div>
    <?php }
    
        $sql = 'INSERT INTO test(name, email, password) VALUES(:name, :email, :password)';
        $query = $pdo->prepare($sql);
        $query -> execute(['name' => $_REQUEST['login'], 'email' => $_REQUEST['email'], 'password' => $_REQUEST['password']]);
    ?>

</body>
</html>