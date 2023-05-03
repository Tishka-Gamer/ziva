<?php

use App\models\TypeAdm;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    unset($_SESSION["error"]);
    $extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
    $types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];
    // $categories = CategoryAdm::all();
    if (isset($_POST["save"])) {
        // $name = $_POST["oldImage"];
        if (isset($_FILES["photo"]) && $_FILES["photo"]["name"] != "") {
            $size = $_FILES["photo"]["size"];
            $newName = $_FILES["photo"]["name"];
            $tmpName = $_FILES["photo"]["tmp_name"];
            $error = $_FILES["photo"]["error"];

            $path_parts = pathinfo("name");

            $newName = time() . "_" . $newName;

            // var_dump($_FILES);

            if (in_array(mime_content_type($tmpName), $types)) {

                if ($size > 4097152) {
                    $_SESSION["error"] = "Файл слишком большой";
                }
                if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/upload/$newName",)) {
                    $_SESSION["error"] = "Не удалось переместить файл";
                }
            } else {
                $_SESSION["error"] = "Неправильное расширение файла. Выберите файлы с расширением: " . implode(", ", $extensions);
            }
        }

        if (!isset($_SESSION["error"])) {
            // echo $newName;
            TypeAdm::add($_POST, $newName);
            header("Location: /app/admin/tables/type/type.php");
        } else {
            header("Location: /app/admin/tables/type/addType.php");
        }
    }
}

// require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/view/product/add.view.php";