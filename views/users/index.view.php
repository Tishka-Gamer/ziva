<?php

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="block">
        <div>
            <a href="/app/tables/users/create.php">Создать нового пользователя</a>
        </div>

        <?php foreach ($users as $user) : ?>
            <div class="conteiner">
                <p>Фамилия Имя Отчество</p>
                <div> <?= $user->surname ?> <?= $user->name ?> <?= $user->firstname ?></div>
                <p>Телефон</p>
                <div><?= $user->phone ?></div>
                <p>E-mail</p>
                <div><?= $user->email ?></div>
                <p>Дата рождения</p>
                <div><?= $user->date_birthday?></div>
                
                <form action="/app/users/delete.php" method="post">
                    <input name="id" type="hidden" value="<?= $user->id ?>">
                    <p><button name="del" >Удалить</button></p>
                </form>
            </div>
        <?php endforeach?>
    </div>
</body>

</html>