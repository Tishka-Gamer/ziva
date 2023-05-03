<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";

session_start();

unset($_SESSION["errors"]);

use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
$extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
$types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];
// $_POST['photo'] = "1625657511_5-kartinkin-com-p-kaktus-art-milii-art-krasivo-5.jpg";
$names = [];
$surnames = [];
$firstnames = [];
$numbers = [];
$mails = [];
// var_dump($_POST);

if (isset($_POST['btn'])) {

    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["firstname"] = $_POST["firstname"];
    $_SESSION["date_birthday"] = $_POST["date_birthday"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["number"] = $_POST["number"];
    
    // $_SESSION['photo'] = $_POST['photo'];

    //проверка имени
    if (empty($_POST["name"])) {
        $_SESSION["errors"]["name"] = "имя пустое";
    } elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["name"], $names)) {
        $_SESSION["errors"]["name"] = "некорректное имя";
    } else $_SESSION["name"] = $names[0];

    //проверка фамилии
    if (empty($_POST["surname"])) {
        $_SESSION["errors"]["surname"] = "фамилия пуста";
    } elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["surname"], $surnames)) {
        $_SESSION["errors"]["surname"] = "некорректная фамилия";
    } else $_SESSION["surname"] = $surnames[0];

    //проверка отчества
    if (empty($_POST["firstname"])) {
        $_SESSION["errors"]["firstname"] = "отчетсво пустое";
    } 
    elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]*$/u", $_POST["firstname"], $firstnames)) {
        $_SESSION["errors"]["firstname"] = "некорректное отчество";
    } else $_SESSION["firstname"] = $firstnames[0];

    //проверка почты
    if (empty($_POST["email"])) {
        $_SESSION["errors"]["email"] = "email пустой";
    } elseif(User::findEmail($_POST['email'])){
        $_SESSION["errors"]["email"] = "Такой email уже существует";
    }
    elseif (!preg_match("/([A-Za-z0-9]+@[a-z]+\.[a-z]+)/u", $_POST["email"], $mails)) {
        $_SESSION["errors"]["email"] = "некорректный email";
    } else $_SESSION["email"] = $mails[0];

    //проверка логина
    if (empty($_POST["number"])) {
        $_SESSION["errors"]["number"] = "Номер пустой";
    } elseif(User::findNumber($_POST["number"])){
        $_SESSION["errors"]["number"] = "Такой номер уже зарегистрирован";
    }
    elseif (!preg_match("/^[A-Za-z0-9]+$/u", $_POST["number"], $numbers)) {
        $_SESSION["errors"]["number"] = "некорректный номер";
    } else $_SESSION["number"] = $numbers[0];

    //проверка паролей
    if (empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
        $_SESSION["errors"]["password"] = "пустой пароль";
    } elseif ($_POST["password"] != $_POST["password_confirmation"]) {
        $_SESSION["errors"]["password"] = "пароли не совпадают";
    }
    if (empty($_POST["date_birthday"])) {
        $_SESSION["errors"]["date_birthday"] = "заполните дату рождения";
    } 
    if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {
        $size = $_FILES["image"]["size"];
        $name = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];

        $path_parts = pathinfo("name");


        if (in_array(mime_content_type($tmpName), $types)) {

            if ($size > 4097152) {
                $_SESSION["errors"] = "Файл слишком большой";
            }
            if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/upload/$name",)) {
                $_SESSION["errors"] = "Не удалось переместить файл";
            } 
            // else {
            //     unlink($_SERVER["DOCUMENT_ROOT"] . "/upload/$name");
            //     $name = $newName;
            // }
        } else {
            $_SESSION["errors"] = "Неправильное расширение файла. Выберите файлы с расширением: " . implode(", ", $extensions);
        }       
    }
    else
    {
        $name = "ava.svg";
    }
    if (empty($_SESSION["errors"])) {
        $_POST['photo'] = $name;
        $_SESSION["res"] = "Данные отправлены успешно";

        if (User::insert($_POST)) {
            $user = User::getUser($_POST['number'], $_POST['password']);
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $user->id;
            $_SESSION["number"] = $_POST["number"];
            header("Location: /");
            die();
        } else {
            header("Location: /app/tables/users/create.php");
            die();
        }
    } else { 
        header("Location: /app/tables/users/create.php");
        $_SESSION["res"] = "Имеются ошибки ввода";}
}

