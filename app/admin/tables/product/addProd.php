<?php

use App\models\CategoryAdm;
use App\models\Contraindications;
use App\models\ProductAdm;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    $cont = $_POST["cont"];
    unset($_SESSION["error"]);
    $extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
    $types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];
    $categories = CategoryAdm::all();
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
            if (!isset($_SESSION["error"])) {
                // echo $newName;
                $res = Contraindications::add($_POST, $newName, $cont);
                echo json_encode($res, JSON_UNESCAPED_UNICODE);
                header("Location: /app/admin/tables/product/product.php");
            } else {
                header("Location: /app/admin/tables/product/addProd.php");
            }
        }
    }
    var_dump($_POST);
}

// require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/view/product/add.view.php";